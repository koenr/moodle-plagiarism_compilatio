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
 * plagiarism.php - allows the admin to configure plagiarism stuff
 *
 * @package   plagiarism_compilatio
 * @author    Dan Marsden <dan@danmarsden.com>
 * @copyright 2012 Dan Marsden http://danmarsden.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(dirname(dirname(__FILE__)) . '/../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->libdir . '/plagiarismlib.php');
require_once($CFG->dirroot . '/plagiarism/compilatio/lib.php');
require_once($CFG->dirroot . '/plagiarism/compilatio/compilatio_form.php');

require_login();
admin_externalpage_setup('plagiarismcompilatio');

$context = context_system::instance();
require_capability('moodle/site:config', $context, $USER->id, true, "nopermissions");

$mform = new compilatio_setup_form();
$plagiarismplugin = new plagiarism_plugin_compilatio();

if ($mform->is_cancelled()) {
    redirect('settings.php');
}
// Boolean to test only once the connection if it has failed.
$incorrectconfing = false;

echo $OUTPUT->header();
$currenttab = 'compilatiosettings';
require_once('compilatio_tabs.php');
if (($data = $mform->get_data()) && confirm_sesskey()) {
    if (!isset($data->compilatio_use)) {
        $data->compilatio_use = 0;
    }
    if (!isset($data->compilatio_enable_mod_assign)) {
        $data->compilatio_enable_mod_assign = 0;
    }
    if (!isset($data->compilatio_enable_mod_assignment)) {
        $data->compilatio_enable_mod_assignment = 0;
    }
    if (!isset($data->compilatio_enable_mod_forum)) {
        $data->compilatio_enable_mod_forum = 0;
    }
    if (!isset($data->compilatio_enable_mod_workshop)) {
        $data->compilatio_enable_mod_workshop = 0;
    }
    if (!isset($data->compilatio_allow_teachers_to_show_reports)) {
        $data->compilatio_allow_teachers_to_show_reports = 0;
    }

    foreach ($data as $field => $value) {
        if (strpos($field, 'compilatio') === 0) {
            if ($field == 'compilatio_api') { // Strip trailing slash from api.
                $value = rtrim($value, '/');
            }
            if ($configfield = $DB->get_record('config_plugins', array('name' => $field, 'plugin' => 'plagiarism'))) {
                $configfield->value = $value;
                if (!$DB->update_record('config_plugins', $configfield)) {
                    error("errorupdating");
                }
            } else {
                $configfield = new stdClass();
                $configfield->value = $value;
                $configfield->plugin = 'plagiarism';
                $configfield->name = $field;
                if (!$DB->insert_record('config_plugins', $configfield)) {
                    error("errorinserting");
                }
            }
        }
    }

    cache_helper::invalidate_by_definition('core', 'config', array(), 'plagiarism');
    // TODO - check settings to see if valid.



    $quotas = compilatio_getquotas();
    if ($quotas["quotas"] == null) {
        // Disable compilatio as this config isn't correct.
        $rec = $DB->get_record('config_plugins', array('name' => 'compilatio_use', 'plugin' => 'plagiarism'));
        $rec->value = 0;
        $DB->update_record('config_plugins', $rec);

        echo $OUTPUT->notification(get_string("saved_config_failed", "plagiarism_compilatio") . $quotas["error"]);
        $incorrectconfing = true;
    }
}

$plagiarismsettings = (array) get_config('plagiarism');
$mform->set_data($plagiarismsettings);

if (!empty($plagiarismsettings['compilatio_use']) && !$incorrectconfing) {
    $quotasarray = compilatio_getquotas();
    $quotas = $quotasarray['quotas'];
    if ($quotas == null) {
        // Disable compilatio as this config isn't correct.
        $rec = $DB->get_record('config_plugins', array('name' => 'compilatio_use', 'plugin' => 'plagiarism'));
        $rec->value = 0;
        $DB->update_record('config_plugins', $rec);

        echo $OUTPUT->notification(get_string("saved_config_failed", "plagiarism_compilatio") . $quotasarray['error']);
    } else {
        echo $OUTPUT->box_start('generalbox boxaligncenter', 'intro');
        echo $OUTPUT->notification(get_string('enabledandworking', 'plagiarism_compilatio'), 'notifysuccess');
        $a = new stdClass();
        $a->used = $quotas['usedCredits'];
        $a->end_date = strtolower(compilatio_format_date(compilatio_get_account_expiration_date()));
        echo "<p>" . get_string('subscription_state', 'plagiarism_compilatio', $a) . '</p>';
        echo $OUTPUT->box_end();
    }
    $plagiarismsettings = get_config('plagiarism');

    $compilatio = new compilatioservice($plagiarismsettings->compilatio_password, $plagiarismsettings->compilatio_api);
}
echo $OUTPUT->box_start('generalbox boxaligncenter', 'intro');
$mform->display();
echo $OUTPUT->box_end();
echo $OUTPUT->footer();
