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
 * plagiarism_compilatio.php - Contains english Plagiarism plugin translation.
 *
 * @since 2.0
 * @package    plagiarism_compilatio
 * @subpackage plagiarism
 * @author     Compilatio <support@compilatio.net>
 * @copyright  2017 Compilatio.net {@link https://www.compilatio.net}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$string['pluginname'] = 'Compilatio plagiarism plugin';
$string['studentdisclosuredefault'] = 'All files uploaded here will be submitted to the similarities detection service Compilatio';
$string['students_disclosure'] = 'Student Disclosure';
$string['students_disclosure_help'] = 'This text will be displayed to all students on the file upload page.';
$string['compilatioexplain'] = 'For more information on this plugin see: <a href="http://www.compilatio.net/en/" target="_blank">compilatio.net</a>';
$string['compilatio'] = 'Compilatio plagiarism plugin';
// API configuration.
$string['read_only_apikey_title'] = 'Read-only API key.';
$string['read_only_apikey_error'] = 'Your read-only API key does not allow uploading or analyzing documents.';
$string['compilatioapi'] = 'Compilatio API Address';
$string['compilatioapi_help'] = 'This is the address of the Compilatio API';
$string['compilatiopassword'] = 'API key';
$string['compilatiopassword_help'] = 'Personal code provided by Compilatio to access the API';
$string['compilatiodate'] = 'Activation date';
$string['compilatiodate_help'] = 'Click "Enable" if you want this API configuration to be automatically activated on a desired date. Leave the date blank if you want to activate it right away.';
$string['apiconfiguration'] = "API configuration";
$string['formenabled'] = "Enabled";
$string['formurl'] = "API url";
$string['formapikey'] = "API key";
$string['formstartdate'] = "Activation date";
$string['formcheck'] = "Check";
$string['formdelete'] = "Delete";

$string['disable_ssl_verification'] = "Ignore SSL certificate verification.";
$string['disable_ssl_verification_help'] = "Enable this option if you have problems verifying SSL certificates or if you experience errors when sending files to Compilatio.";

$string['tooltip_detailed_scores'] = '% of suspect texts, including:';
$string['simscore'] = 'Similarities';
$string['utlscore'] = 'Language not recognized';
$string['aiscore'] = 'AI-generated text';
$string['unmeasured'] = 'not measured';

$string['migration_title'] = "Migration v4 to v5";
$string['migration_info'] = "Compilatio is implementing a new v5 technical platform for all its customers.<br>
    When prompted by the technical team, you will need to perform an action to complete this migration.";
$string['migration_np'] = "You can use the Compilatio plugin even if the migration is not finished.";
$string['migration_apikey'] = "Enter the new v5 API key";
$string['migration_btn'] = "Initiate the update of the data stored in Moodle";
$string['migration_completed'] = 'Update completed:';
$string['migration_toupdate_doc'] = 'documents to update';
$string['migration_success_doc'] = 'documents have been updated';
$string['migration_failed_doc'] = "document couldn't be updated, you can try again to update of these documents at the end of the update";
$string['migration_restart'] = "Retry";
$string['migration_inprogress'] = "Update in progress, it can take several hours <small>(you can exit this page during the update)</small>";
$string['migration_form_title'] = "Launch the update of the data stored in Moodle, to complete the migration from v4 to v5.";
$string['errormigration'] = "";

$string['use_compilatio'] = 'Allow similarity detection with Compilatio';
$string['activate_compilatio'] = 'Enable Compilatio';
$string['savedconfigsuccess'] = 'Plagiarism Settings Saved';
$string['compilatio_display_student_score'] = 'Show similarity score to student';
$string['compilatio_display_student_score_help'] = 'The similarity score is the percentage of the submission that has been matched with other content.';
$string['compilatio_display_student_report'] = 'Show similarity report to student';
$string['compilatio_display_student_report_help'] = 'The similarity report gives a breakdown on what parts of the submission were plagiarised and the location of the detected sources.';
$string['showwhenclosed'] = 'When Activity closed';
$string['defaultupdated'] = 'Default values updated';
$string['defaults_desc'] = 'The following settings are the defaults set when enabling Compilatio within an Activity Module';
$string['compilatiodefaults'] = 'Compilatio defaults';
$string['compilatio:enable'] = 'Allow the teacher to enable/disable Compilatio inside an activity';
$string['compilatio:resetfile'] = 'Allow the teacher to resubmit the file to Compilatio after an error';
$string['compilatio:triggeranalysis'] = 'Allow the teacher to manually trigger analysis';
$string['compilatio:viewreport'] = 'Allow the teacher to view the full report from Compilatio';
$string['processing_doc'] = 'Compilatio is analyzing this file.';
$string['pending'] = 'This file is pending submission to Compilatio';
$string['previouslysubmitted'] = 'Previously submitted as';
$string['report'] = 'report';
$string['unknownwarning'] = 'An error occurred trying to send this file to Compilatio';
$string['unsupportedfiletype'] = 'This file type is not supported by Compilatio';
$string['toolarge'] = 'This file is too large for Compilatio to process. Maximum size : {$a->Mo} MB';
$string['tooshort'] = 'This document doesn’t contain enough words for Compilatio to process. Minimum size : {$a} words';
$string['toolong'] = 'This document contain too many words to be analyzed. Maximum size : {$a} words';
$string['failed'] = 'The analysis of this document did not work correctly.';
$string['notfound'] = 'This document was not found. Please contact your moodle administrator. Error : document not found for this API key.';
$string['compilatio_studentemail'] = 'Send Student email';
$string['compilatio_studentemail_help'] = 'This will send an e-mail to the student when a file has been processed to let them know that a report is available.';
$string['studentemailsubject'] = 'File processed by Compilatio';
$string['studentemailcontent'] = 'The file you submitted to {$a->modulename} in {$a->coursename} has now been processed by the Plagiarism tool Compilatio.
{$a->modulelink}';
$string['filereset'] = 'A file has been reset for re-submission to Compilatio';
$string['analysis'] = 'Analysis Start';
$string['analysis_help'] = "<p>You have two options:
    <ul>
        <li><strong>Manual:</strong> Analysis of documents must be triggered manually with the “Analyze” button of each document or with the “Analyze all documents” button.</li>
        <li><strong>Scheduled: </strong> All documents are analyzed at the selected time/date.</li>
    </ul>
    To have all documents compared with each other during the analyses, wait until all works are submitted by students then trigger the analyses.</p>";
$string['analysis_auto'] = 'Analysis Start';
$string['analysis_auto_help'] = "<p>You have three options:
    <ul>
        <li><strong>Manual:</strong> Analysis of documents must be triggered manually with the “Analyze” button of each document or with the “Analyze all documents” button.</li>
        <li><strong>Scheduled: </strong> All documents are analyzed at the selected time/date.</li>
        <li><strong>Direct: </strong> Each document is analyzed as soon as the student submits it. The documents in the activity will not be compared to each other.</li>
    </ul>
    To have all documents compared with each other during the analyses, wait until all works are submitted by students then trigger the analyses.</p>";
$string['analysistype_manual'] = 'Manual';
$string['analysistype_prog'] = 'Scheduled';
$string['analysistype_auto'] = 'Direct';
$string['analysis_date'] = 'Analysis Date (Scheduled analysis only)';
$string['enabledandworking'] = 'The Compilatio plugin is enabled and working.';
$string['subscription_will_expire'] = 'Your Compilatio subscription will expire at the end of';
$string['startanalysis'] = 'Start analysis';
$string['compilatioenableplugin'] = 'Enable Compilatio for {$a}';
$string['failedanalysis'] = 'Compilatio failed to analyze your document: ';
$string['extraction_in_progress'] = 'document extraction in progress, please try again later';
$string['waitingforanalysis'] = 'This file will be processed on {$a}';
$string['updatecompilatioresults'] = 'Refresh the informations';
$string["update_in_progress"] = "Updating informations";
$string['updated_analysis'] = 'Compilatio analysis results have been updated.';
$string['compilatio:enable'] = 'Allow the teacher to enable/disable Compilatio inside an activity';
$string['compilatio:resetfile'] = 'Allow the teacher to resubmit the file to Compilatio after an error';
$string['compilatio:triggeranalysis'] = 'Allow the teacher to manually trigger analysis';
$string['compilatio:viewreport'] = 'Allow the teacher to view the full report from Compilatio';
$string['unextractablefile'] = 'This document could not be loaded on Compilatio.';
$string['sending_failed'] = 'File upload to Compilatio failed {$a}';
$string['immediately'] = "Immediately";
$string['quiz_help'] = 'Only essay questions whose answer contain at least {$a} words will be analyzed.';
$string["allow_analyses_auto"] = "Possibility to start the analyses directly";
$string["allow_analyses_auto_help"] = "This option will allow teachers to activate the automatic launch of documents analysis on an activity (i.e. immediately after they have been submitted).<br>
Note that in this case:
<ul>
    <li>The number of scans performed by your institution may be significantly higher.</li>
    <li>The documents of the first submitters are not compared with the documents of the last depositors.</li>
</ul>
In order to compare all the documents of an assignement, it is necessary to use the “scheduled” analysis, by choosing a date after the submission deadline.";
$string['keep_docs_indexed'] = "Keep documents in reference library";
$string['keep_docs_indexed_help'] = "When deleting a course, resetting a course or deleting an activity, you can choose to permanently delete the documents sent to Compilatio or to keep them in the reference library (only the text will be kept and will be used as comparison material in your next analyses)";
$string['document_deleting'] = "Documents deletion";
$string['redirect_report_failed'] = "An error occurred while retrieving the analysis report. Please try again later or contact support (support@compilatio.net) if the problem persists.";

// Auto diagnostic.
$string["auto_diagnosis_title"] = "Auto-diagnosis";
// API key.
$string["api_key_valid"] = "Your API key is valid.";
$string["api_key_not_tested"] = "Your API key haven't been verified because the connection to Compilatio.net has failed.";
$string["api_key_not_valid"] = "Your API key is not valid. It is specific to the used platform. You can obtain one by contacting <a href='mailto:ent@compilatio.net'>ent@compilatio.net</a>.";
// CRON.
$string['cron_check_never_called'] = 'CRON has never been executed since the activation of the plugin. It may be misconfigured in your server.';
$string['cron_check'] = 'CRON has been executed on {$a} for the last time.';
$string['cron_check_not_ok'] = 'It hasn\'t been executed in the last hour.';
$string['cron_frequency'] = ' It seems to be run every {$a} minutes.';
$string['cron_recommandation'] = 'We recommend using a delay below 15 minutes between each CRON execution.';
// Connect to webservice.
$string['webservice_ok'] = "The server is able to connect to the web service.";
$string['webservice_not_ok'] = "The server wasn't able to connect to the web service. Your firewall may be blocking the connection.";
// Plugin enabled.
$string['plugin_enabled'] = "The plugin is enabled in the Moodle platform.";
$string['plugin_disabled'] = "The plugin isn't enabled in the Moodle platform.";
// Plugin enabled for "assign".
$string['plugin_enabled_assign'] = "The plugin is enabled for assignments.";
$string['plugin_disabled_assign'] = "The plugin isn't enabled for assignments.";
// Plugin enabled for "workshop".
$string['plugin_enabled_workshop'] = "The plugin is enabled for workshops.";
$string['plugin_disabled_workshop'] = "The plugin isn't enabled for workshops.";
// Plugin enabled for "forum".
$string['plugin_enabled_forum'] = "The plugin is enabled for forums.";
$string['plugin_disabled_forum'] = "The plugin isn't enabled for forums.";
// Plugin enabled for "quiz".
$string['plugin_enabled_quiz'] = "The plugin is enabled for quiz.";
$string['plugin_disabled_quiz'] = "The plugin isn't enabled for quiz.";
$string['programmed_analysis_future'] = 'Documents will be analyzed by Compilatio on {$a}.';
$string['programmed_analysis_past'] = 'Documents have been submitted for analysis to Compilatio on {$a}.';
$string['webservice_unreachable_title'] = "Compilatio.net is unavailable.";
$string['webservice_unreachable_content'] = "Compilatio.net is currently unavailable. We apologize for the inconvenience.";
$string['saved_config_failed'] = '<strong>The combination API key - adress entered is invalid. Compilatio is disabled, please try again.<br/>
								The <a href="autodiagnosis.php">auto-diagnosis</a> page can help you to configure this plugin.</strong><br/>
								Error : ';
$string['startallcompilatioanalysis'] = "Analyze all documents";
$string['numeric_threshold'] = "Threshold must be a number.";
$string['green_threshold'] = "Green up to";
$string['orange_threshold'] = "Orange up to";
$string['red_threshold'] = "red otherwise";
$string['similarity_percent'] = '% of similarities';
$string['thresholds_settings'] = "Limits :";
$string['thresholds_description'] = "Indicate the threshold that you want to use, in order to facilitate the finding of analysis report (% of similarities) :";
// Student submit.
$string['compi_student_analyses'] = "Allow students to analyze their documents";
$string['compi_student_analyses_help'] = "This allows students to analyze their draft files with Compilatio Magister, before final submission to the teacher.";
$string['activate_submissiondraft'] = 'To allow students to analyze their drafts, you must enable the <b>{$a}</b> option in the section';
$string['allow_student_analyses'] = "Possibility to enable student analysis on drafts.";
$string['allow_student_analyses_help'] = "This option will allow teachers to activate on an activity the analysis by students of their documents submitted in draft mode with Compilatio Magister, before final submission to the teacher.";
$string['student_analyze'] = "Student analysis";
$string['student_start_analyze'] = "The analysis can be started by the student";
$string['student_help'] = "You can analyze your draft with Compilatio Magister, to measure similarities in the text of your files.<br/>
The contents of your draft will not be used by Compilatio as comparison material for future analyses.<br/>
Your teacher will, however, have access to this analysis report.";

$string['similarities_disclaimer'] = "You can analyze similarities in this activity's documents with <a href='http://www.compilatio.net/en/' target='_blank'>Compilatio</a>.<br/> Be careful: similarities measured during analysis do not necessarily mean plagiarism. The analysis report helps you to identify if the similarities matched to suitable quotation or to plagiarism.";
$string['progress'] = "Progress :";
$string['results'] = "Results :";
$string['errors'] = "Errors :";
$string['documents_analyzing'] = '{$a} document(s) are being analyzed.';
$string['documents_in_queue'] = '{$a} document(s) are in the queue to be analyzed.';
$string['documents_analyzed'] = '{$a->countAnalyzed} document(s) out of {$a->documentsCount} have been sent and analyzed.';
$string['average_similarities'] = 'In this activity, the average similarities ratio is {$a}%.';
$string['documents_analyzed_lower_green'] = '{$a->documentsUnderGreenThreshold} document(s) lower than {$a->greenThreshold}%.';
$string['documents_analyzed_between_thresholds'] = '{$a->documentsBetweenThresholds} document(s) between {$a->greenThreshold}% and {$a->redThreshold}%.';
$string['documents_analyzed_higher_red'] = '{$a->documentsAboveRedThreshold} document(s) greater than {$a->redThreshold}%.';
$string['documents_notfound'] = '{$a} document(s) were not found.';
$string['documents_failed'] = '{$a} document(s) whose analysis did not work correctly.';
$string['unsupported_files'] = 'The following file(s) can\'t be analyzed by Compilatio because their format is not supported :';
$string['unextractable_files'] = 'The following file(s) can\'t be analyzed because they could not be loaded on Compilatio :';
$string['tooshort_files'] = 'The following file(s) can\'t be analyzed by Compilatio because they doesn’t contain enough words (Minimum size : {$a} words) :';
$string['toolong_files'] = 'The following file(s) can\'t be analyzed by Compilatio because they contain too many words (Maximum size : {$a} words) :';
$string['failedanalysis_files'] = "The analysis of the following documents did not work correctly. You can reset these documents and re-launch their analysis:";
$string['no_document_available_for_analysis'] = 'No documents were available for analysis';
$string["analysis_started"] = '{$a} analysis have been requested.';
$string["start_analysis_title"] = 'Analysis start';
$string["start_analysis_in_progress"] = 'Launching of the analyses in progress';
$string["not_analyzed"] = "The following documents can't be analyzed :";
$string["not_analyzed_extracting"] = "The following documents can't be analyzed because they are being extracted, please try again later";
$string["account_expire_soon_title"] = "Your Compilatio.net account expires soon";
$string["admin_account_expire_content"] = "Your current subscription will end at the end of the current month. If your contract does not expire at the end of the month, a new subscription will automatically be set up by our services. When this is done, this message will disappear. For more information, you can contact our sales or support department at support@compilatio.net.";
$string["news_update"] = "Compilatio.net update";
$string["news_incident"] = "Compilatio.net incident";
$string["news_maintenance"] = "Compilatio.net maintenance";
$string["news_analysis_perturbated"] = "Compilatio.net - Analysis perturbated";
$string["display_stats"] = "Display statistics about this activity";
$string["analysis_completed"] = 'Analysis completed: {$a}% of similarities.';
$string["compilatio_help_assign"] = "Display help about Compilatio plugin";
$string["display_notifications"] = "Display notifications";
$string["compilatio_search_tab"] = "Find the author of a document.";
$string["compilatio_search"] = "Search";
$string["compilatio_iddocument"] = "Document identifier";
$string["compilatio_search_notfound"] = "No document was found for this identifier among the documents loaded on your Moodle platform.";
$string["compilatio_author"] = 'Le document {$a->idcourt} in activity <b>{$a->modulename}</b> belongs to <b>{$a->lastname} {$a->firstname}</b>.';
$string["compilatio_search_help"] = "You can find the author of a document by retrieving the document identifier from the sources of the analysis report. Example: 1. Your document: <b>1st5xfj2</b> - Assign_Name(30)Name_Copied_Document.odt.";
$string["allow_search_tab"] = "Search tool to identify the author of a document.";
$string["allow_search_tab_help"] = "The search tool allows you to search for a student's first and last name based on a document identifier visible in the analysis reports among all the documents present on your platform.";
$string["teacher_features_title"] = "Features enabled for teachers";
$string["enable_activities_title"] = "Enable Compilatio for activities";

// CSV.
$string["firstname"] = "First name";
$string["lastname"] = "Last name";
$string["filename"] = "Filename";
$string["similarities"] = "Similarities";
$string["unextractable"] = "The document could not be loaded on Compilatio";
$string["unsupported"] = "Unsupported document";
$string["analysing"] = "Analysing document";
$string['timesubmitted'] = "Submitted to Compilatio on";
$string["not_analyzed_unextractable"] = '{$a} document(s) haven\'t been analysed because they could not be loaded on Compilatio.';
$string["not_analyzed_unsupported"] = '{$a} document(s) haven\'t been analysed because their format isn\'t supported.';
$string["not_analyzed_tooshort"] = '{$a} document(s) haven\'t been analysed because they doesn\'t contain enough words.';
$string["not_analyzed_toolong"] = '{$a} document(s) haven\'t been analysed because they contain too many words.';
$string['export_csv'] = 'Export data about this activity into a CSV file';
$string['hide_area'] = 'Hide Compilatio informations';
$string['tabs_title_help'] = 'Help';
$string['tabs_title_stats'] = 'Statistics';
$string['tabs_title_notifications'] = 'Notifications';
$string['queued'] = 'The document is now in queue and it is going to be analyzed soon by Compilatio';
$string['no_documents_available'] = 'No documents are available for analysis in this activity.';
$string['manual_analysis'] = 'The analysis of this document must be triggered manually.';
$string['disclaimer_data'] = 'By enabling Compilatio, you accept the fact that data about your Moodle configuration will be collected in order to improve support and maintenance of this service.';
$string['reset'] = 'Reset';
$string['error'] = 'Error';
$string['analyze'] = 'Analyze';
$string['queue'] = 'Queue';
$string['analyzing'] = 'Analyzing';
$string['enable_mod_assign'] = 'Enable Compilatio for assignments';
$string['enable_mod_workshop'] = 'Enable Compilatio for workshops';
$string['enable_mod_forum'] = 'Enable Compilatio for forums';
$string['enable_mod_quiz'] = 'Enable Compilatio for quiz';
$string['planned'] = "Planned";
$string['enable_javascript'] = "Please enable Javacript in order to have a better experience with Compilatio plugin.<br/>
 Here are the <a href='http://www.enable-javascript.com/' target='_blank'>
 instructions how to enable JavaScript in your web browser</a>.";
$string["manual_send_confirmation"] = '{$a} file(s) have been submitted to Compilatio.';
$string["unsent_documents"] = 'Document(s) not sent';
$string["unsent_documents_content"] = 'This activity contains document(s) not submitted to Compilatio.';
$string["statistics_title"] = 'Statistics';
$string["no_statistics_yet"] = 'No documents have been analyzed yet.';
$string["minimum"] = 'Minimum rate';
$string["maximum"] = 'Maximum rate';
$string["average"] = 'Average rate';
$string["documents_number"] = 'Analyzed documents';
$string["stats_errors"] = "Errors";
$string["stats_failed"] = 'Analyses failed';
$string["stats_notfound"] = 'File not found';
$string["stats_unextractable"] = 'File could not be loaded on Compilatio';
$string["stats_unsupported"] = 'File format not supported';
$string["stats_tooshort"] = 'File doesn\'t contain enough words';
$string["stats_toolong"] = 'File contain too many words';
$string["export_raw_csv"] = 'Click here to export raw data in CSV format';
$string["export_global_csv"] = 'Click here to export this data in CSV format';
$string["global_statistics_description"] = 'All the documents data send to Compilatio.';
$string["global_statistics"] = 'Global statistics';
$string["assign_statistics"] = 'Statistics about assignments';
$string["similarities"] = 'Similarities';
$string["context"] = 'Context';
$string["pending_status"] = 'Pending';
$string["allow_teachers_to_show_reports"] = "Possibility to show similarity reports to students";
$string["admin_disabled_reports"] = "The administrator does not allow the teachers to display the similarity reports to the students.";
$string["teacher"] = "Teacher";
$string["loading"] = "Loading, please wait...";
// ALERTS.
$string["unknownlang"] = "Caution, the language of some passages in this document was not recognized.";
$string["badqualityanalysis"] = "Issues were encountered while analysing the document. It is possible that certain sources may not have been identified, or the result may be incomplete.";
// HELP.
$string['help_compilatio_format_content'] = "Compilatio.net handles most formats used in word processors and on the internet.
The following formats are supported :";
$string['goto_compilatio_service_status'] = "See Compilatio services status.";
$string['helpcenter'] = "Access the Compilatio Help Center for the using of Compilatio plugin in Moodle.";
$string['goto_helpcenter'] = "Click on the question mark to open a new window and connect to the Compilatio Help Center.";
$string['admin_goto_helpcenter'] = "Access the Compilatio Help Center to see articles related to administration of the Moodle plugin.";
$string['helpcenter_error'] = "We can't automatically connect you to the help centre. Please try again later or go there directly using the following link : ";
// Buttons.
$string['get_scores'] = "Retrieve plagiarism scores from Compilatio.net";
$string['send_files'] = "Upload files to Compilatio.net for plagiarism detection";
$string['update_meta'] = "Perform Compilatio.net's scheduled operations";
$string['trigger_analyses'] = "Trigger analyses";
$string['migration_task'] = "Update documents from v4 to v5";
// Indexing state.
$string['indexing_state'] = "Add documents into the Document Database";
$string['indexing_state_help'] = "Yes: Add documents in the document database. These documents will be used as comparison material for future analysis.
No: Documents are not added in document database and won't be used for comparisons.";
$string['indexed_document'] = "Document added to your institution's document database. Its content may be used to detect similarities with other documents.";
$string['not_indexed_document'] = "Document not added to your institution's document database. Its content will not be used to detect similarities with other documents.";
// Information settings.
$string['information_settings'] = "Informations";
// Max file size allowed.
$string['max_file_size_allowed'] = 'Maximum document size : <strong>{$a->Mo} MB</strong>';
// Failed documents.
$string['reset_failed_document'] = 'Reset documents in error';
$string['reset_failed_document_title'] = 'Reset documents in error:';
$string['reset_failed_document_in_progress'] = 'Reset documents in error in progress';
// Max attempt reached.
$string['max_attempts_reach_files'] = 'Analysis has been interrupted for the following files. Analyses were sent too many times, you cannot restart them anymore :';

// Privacy (GDPR).
$string['privacy:metadata:core_files'] = 'Files attached to submissions or created from online text submissions';
$string['privacy:metadata:core_plagiarism'] = 'This plugin is called by Moodle plagiarism subsystem';

$string['privacy:metadata:plagiarism_compilatio_files'] = "Information about files submitted to Compilatio";
$string['privacy:metadata:plagiarism_compilatio_files:userid'] = "The Moodle ID of the user who made the submission";
$string['privacy:metadata:plagiarism_compilatio_files:filename'] = "Name of file submitted or generated name for online text";

$string['privacy:metadata:external_compilatio_document'] = 'Information and content of the documents in Compilatio database';
$string['privacy:metadata:external_compilatio_document:authors'] = 'First name, last name and email of the Moodle user (or members of group) who submitted the file';
$string['privacy:metadata:external_compilatio_document:depositor'] = 'First name, last name and email of the Moodle user who submitted the file';
$string['privacy:metadata:external_compilatio_document:filename'] = "Name of file submitted or generated name for online text";

$string['owner_file'] = 'GDPR and document ownership';
$string['owner_file_school'] = 'The school owns the documents';
$string['owner_file_school_details'] = 'When a student request to delete all his data, the documents and reports will be stored and available for future comparison with other documents. At the end of the contract with Compilatio, all your school\'s personnal data, including analyzed documents, are deleted within the contractual deadlines.';
$string['owner_file_student'] = 'The student is the only owner of his document';
$string['owner_file_student_details'] = 'When a student request to delete all his data, his documents and reports will be deleted from Moodle and the Compilatio document database. Documents will no longer be available for comparison with other documents.';
