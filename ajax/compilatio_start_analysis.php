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
 * Start a document analysis via Compilatio SOAP API
 *
 * This script is called by amd/build/ajax_api.js
 *
 * @copyright  2018 Compilatio.net {@link https://www.compilatio.net}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @param string $_POST['id']
 * @param string $_POST['cmid']
 */

require_once(dirname(dirname(__FILE__)) . '/../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->libdir . '/plagiarismlib.php');
require_once($CFG->dirroot . '/plagiarism/lib.php');
require_once($CFG->dirroot . '/plagiarism/compilatio/compilatio.class.php');
require_once($CFG->dirroot . '/plagiarism/compilatio/lib.php');
require_once($CFG->dirroot . '/plagiarism/compilatio/helper/output_helper.php');
require_once($CFG->dirroot . '/plagiarism/compilatio/constants.php');

require_login();

global $DB, $SESSION;

$docid = required_param('docId', PARAM_RAW);

$plagiarismfile = $DB->get_record('plagiarism_compilatio_files', array('id' => $docid));
$res = compilatio_startanalyse($plagiarismfile);

if (is_string($res)) {
    echo "<p id='cmp-start-analyse-error' style='color: #b94a48;'>"
        . get_string('failedanalysis', 'plagiarism_compilatio') . $res .
    "</p>";
} else if ($res === true) {
    echo output_helper::get_plagiarism_area(
        null,
        get_string("queue", "plagiarism_compilatio"),
        "queue",
        get_string('queued', 'plagiarism_compilatio')
    );
} else {
    echo 'false';
}
