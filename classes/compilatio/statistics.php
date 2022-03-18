<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * statistics.php - Contains methods to communicate with Compilatio REST API.
 *
 * @package    plagiarism_compilatio
 * @subpackage plagiarism
 * @author     Compilatio <support@compilatio.net>
 * @copyright  2020 Compilatio.net {@link https://www.compilatio.net}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 /**
 * CompilatioStatistics class
 * @copyright  2020 Compilatio.net {@link https://www.compilatio.net}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class CompilatioStatistics {
    /**
     * Get global plagiarism statistics
     *
     * @param bool   $html display HTML if true, text otherwise
     * @return array       containing associative arrays for the statistics
     */
    public static function get_global_statistics($html = true) {

        global $DB;

        $sql = '
            SELECT cm,
                course.id,
                course.fullname "course",
                modules.name "module_type",
                CONCAT(COALESCE(assign.name, \'\'), COALESCE(forum.name, \'\'), COALESCE(workshop.name, \'\'),
                COALESCE(quiz.name, \'\')) "module_name",
                AVG(similarityscore) "avg",
                MIN(similarityscore) "min",
                MAX(similarityscore) "max",
                COUNT(DISTINCT plagiarism_compilatio_files.id) "count"
            FROM {plagiarism_compilatio_files} plagiarism_compilatio_files
            JOIN {course_modules} course_modules
                ON plagiarism_compilatio_files.cm = course_modules.id
            JOIN {modules} modules ON modules.id = course_modules.module
            LEFT JOIN {assign} assign ON course_modules.instance = assign.id AND course_modules.module = 1
            LEFT JOIN {forum} forum ON course_modules.instance = forum.id AND course_modules.module = 9
            LEFT JOIN {workshop} workshop ON course_modules.instance = workshop.id AND course_modules.module = 23
            LEFT JOIN {quiz} quiz ON course_modules.instance = quiz.id AND course_modules.module = 17
            JOIN {course} course ON course_modules.course= course.id
            WHERE status=\'scored\'
            GROUP BY cm,
                course.id,
                course.fullname,
                assign.name,
                forum.name,
                quiz.name,
                workshop.name,
                modules.name
            ORDER BY course.fullname, assign.name';

        $rows = $DB->get_records_sql($sql);

        $results = array();
        foreach ($rows as $row) {
            $query = '
                SELECT usr.id "userid",
                    usr.firstname "firstname",
                    usr.lastname "lastname"
                FROM {course} course
                JOIN {context} context ON context.instanceid= course.id
                JOIN {role_assignments} role_assignments ON role_assignments.contextid= context.id
                JOIN {user} usr ON role_assignments.userid= usr.id
                WHERE context.contextlevel=50
                    AND role_assignments.roleid=3
                    AND course.id='. $row->id;

            $teachers = $DB->get_records_sql($query);
            $courseurl = new moodle_url('/course/view.php', array('id' => $row->id));
            $assignurl = new moodle_url('/mod/' . $row->module_type . '/view.php', array('id' => $row->cm, 'action' => "grading"));

            $result = array();
            if ($html) {
                $result["course"] = "<a href='$courseurl'>$row->course</a>";
                $result["assign"] = "<a href='$assignurl'>$row->module_name</a>";

            } else {
                $result["courseid"] = $row->id;
                $result["course"] = $row->course;
                $result["assignid"] = $row->cm;
                $result["assign"] = $row->module_name;
            }

            $result["analyzed_documents_count"] = $row->count;
            $result["minimum_rate"] = $row->min;
            $result["maximum_rate"] = $row->max;
            $result["average_rate"] = round($row->avg, 2);

            $result["teacher"] = "";
            $teacherid = [];
            $teachername = [];
            foreach ($teachers as $teacher) {
                $userurl = new moodle_url('/user/view.php', array('id' => $teacher->userid));
                if ($html) {
                    $result["teacher"] .= "- <a href='$userurl'>$teacher->lastname $teacher->firstname</a></br>";

                } else {
                    array_push($teacherid, $teacher->userid);
                    array_push($teachername, $teacher->lastname . " " . $teacher->firstname);
                }
            }
            if (!$html) {
                $result["teacherid"] = implode(', ', $teacherid);
                $result["teacher"] = implode(', ', $teachername);
            }

            $sql = "SELECT status, COUNT(DISTINCT id) AS count
                FROM {plagiarism_compilatio_files}
                WHERE cm = ? AND status LIKE 'error%'
                GROUP BY status";

            $countstatus = $DB->get_records_sql($sql, array($row->cm));

            if ($html) {
                $result["errors"] = "";
                foreach ($countstatus as $stat) {
                    $result["errors"] .= "- {$stat->count} " . get_string("short_{$stat->status}", "plagiarism_compilatio").'</br>';
                }
            } else {
                foreach ($countstatus as $stat) {
                    $result[$stat->status] = $stat->count;
                }
            }

            $results[] = $result;
        }

        return $results;
    }


    /**
     * Get statistics for the assignment $cmid
     *
     * @param  string $cmid Course module ID
     * @return string       HTML containing the statistics
     */
    public static function get_statistics($cmid) {

        global $DB, $PAGE;

        $plagiarismvalues = $DB->get_record('plagiarism_compilatio_module', array('cmid' => $cmid));
        $greenthreshold = $plagiarismvalues->warningthreshold ?? 10;
        $redthreshold = $plagiarismvalues->criticalthreshold ?? 25;

        $sql = "SELECT COUNT(DISTINCT pcf.id) FROM {plagiarism_compilatio_files} pcf WHERE pcf.cm=?";

        $documentscount = $DB->count_records_sql($sql, array($cmid));

        $counthigherthanredsql = $sql . "AND status = 'scored' AND similarityscore > $redthreshold";
        $counthigherthanred = $DB->count_records_sql($counthigherthanredsql, array($cmid));

        $countlowerthangreensql = $sql . "AND status = 'scored' AND similarityscore <= $greenthreshold";
        $countlowerthangreen = $DB->count_records_sql($countlowerthangreensql, array($cmid));

        $averagesql = "SELECT AVG(similarityscore) avg FROM {plagiarism_compilatio_files} pcf WHERE pcf.cm=? AND status='scored'";
        $avgresult = $DB->get_record_sql($averagesql, array($cmid));
        $avg = $avgresult->avg;

        $sql = "SELECT status, COUNT(DISTINCT id) AS count FROM {plagiarism_compilatio_files}  WHERE cm = ? GROUP BY status";
        $countstatus = $DB->get_records_sql($sql, array($cmid));

        $countanalyzed = $countstatus["scored"]->count ?? 0;

        $analysisstats = new StdClass();
        $analysisstats->countAnalyzed = $countanalyzed;
        $analysisstats->documentsCount = $documentscount;

        $statsthresholds = new StdClass();
        $statsthresholds->greenThreshold = $greenthreshold;
        $statsthresholds->redThreshold = $redthreshold;
        $statsthresholds->documentsUnderGreenThreshold = $countlowerthangreen;
        $statsthresholds->documentsAboveRedThreshold = $counthigherthanred;
        $statsthresholds->documentsBetweenThresholds = $countanalyzed - $counthigherthanred - $countlowerthangreen;

        if ($documentscount === 0) {
            $result = "<span>" . get_string("no_documents_available", "plagiarism_compilatio") . "</span>";
        } else {
            $items = array();
            $errors = '';

            $items[] = array("documents_analyzed", $analysisstats);

            foreach ($countstatus as $stat) {
                if ($stat == "queue") {
                    $items[] = array("documents_in_queue", $stat->count);
                } else if ($stat == "analyzing") {
                    $items[] = array("documents_analyzing", $stat->count);
                }

                if (strpos($stat->status, "error") === 0) {
                    if ($stat->status == "error_too_large") {
                        $stringvariable = (get_config('plagiarism_compilatio', 'max_size') / 1024 / 1024);
                    } else if ($stat->status == "error_too_long") {
                        $stringvariable = get_config('plagiarism_compilatio', 'max_word');
                    } else if ($stat->status == "error_too_short") {
                        $stringvariable = get_config('plagiarism_compilatio', 'min_word');
                    }

                    $files = self::get_files_by_status_code($cmid, $stat->status);

                    $errors .= "<h5>{$stat->count} " . get_string("short_" . $stat->status, "plagiarism_compilatio") . "</h5>"
                        . "<ul><li>" . implode("</li><li>", $files) . "</li></ul>"
                        . "<p>" . get_string("detailed_" . $stat->status, "plagiarism_compilatio", $stringvariable ?? null) . "<p>";
                }
            }

            $result = "<span>" . get_string("progress", "plagiarism_compilatio") . "</span>";
            $result .= self::display_list_stats($items);
        }

        $items = array();

        if ($countanalyzed != 0) {
            $items[] = array("average_similarities", round($avg));
            $items[] = array("documents_analyzed_lower_green", $statsthresholds);
            $items[] = array("documents_analyzed_between_thresholds", $statsthresholds);
            $items[] = array("documents_analyzed_higher_red", $statsthresholds);
        }

        if (count($items) !== 0) {
            $result .= "<span>" . get_string("results", "plagiarism_compilatio") . "</span>";
            $result .= self::display_list_stats($items);

            if (!empty($errors)) {
                $result .= "<span>" . get_string("errors", "plagiarism_compilatio") . "</span>";
                $result .= $errors;
            }

            $url = $PAGE->url;
            $url->param('compilatio_export', true);
            $result .= "<a title='" .
            get_string("export_csv", "plagiarism_compilatio") .
                "' class='compilatio-icon' href='$url'><i class='fa fa-download fa-2x'></i></a>";
        }
        return $result;
    }

    /**
     * Display an array as a list, using moodle translations and parameters
     * Index 0 for translation index and index 1 for parameter
     *
     * @param  array $listitems List items
     * @return string           Return the stat string
     */
    public static function display_list_stats($listitems) {

        $string = "<ul>";
        foreach ($listitems as $listitem) {
            $string .= "<li>" . get_string($listitem[0], "plagiarism_compilatio", $listitem[1]) . "</li>";
        }
        $string .= "</ul>";
        return $string;
    }

    /**
     * Lists files of an assignment according to the status code
     *
     * @param  string $cmid       Course module ID
     * @param  int    $status     Status
     * @return array              containing the student & the file
     */
    public static function get_files_by_status_code($cmid, $status) {

        global $DB;

        $sql = "SELECT DISTINCT pcf.id, pcf.filename, pcf.userid
            FROM {plagiarism_compilatio_files} pcf
            WHERE pcf.cm=? AND status = ?";

        $files = $DB->get_records_sql($sql, array($cmid, $status));

        if (!empty($files)) {
            // Don't display user name for anonymous assign.
            $sql = "SELECT blindmarking, assign.id FROM {course_modules} cm
                JOIN {assign} assign ON cm.instance= assign.id
                WHERE cm.id = $cmid";
            $anonymousassign = $DB->get_record_sql($sql);

            if (!empty($anonymousassign) && $anonymousassign->blindmarking) {
                foreach ($files as $file) {
                    $anonymousid = $DB->get_field('assign_user_mapping', 'id',
                        array("assignment" => $anonymousassign->id, "userid" => $file->userid));
                    $file->user = get_string('hiddenuser', 'assign') . " " . $anonymousid;
                }

                return array_map(
                    function ($file) {
                        return $file->user . " : " . $file->filename;
                    }, $files);
            } else {
                foreach ($files as $file) {
                    $user = $DB->get_record('user', array("id" => $file->userid));
                    $file->lastname = $user->lastname;
                    $file->firstname = $user->firstname;
                }

                return array_map(
                    function ($file) {
                        return $file->lastname . " " . $file->firstname . " : " . $file->filename;
                    }, $files);
            }
        } else {
            return array();
        }
    }
}
