<?php
require_once('VirusTotalApiV2.php');

/* Initialize the VirusTotalApi class. */
$api = new VirusTotalAPIV2('477693d6eb0f5278122b109ba0a09ca1fbb7338671bc170111d12f00c6c37f2f');

/* Upload and scan a local file. */
$result = $api->scanFile('Relativ-path-to-a-local-file-to-scan');
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
$api->displayResult($result);

/* Get a file report. */
$report = $api->getFileReport('Hash-of-a-file-to-check-for-a-report');
$api->displayResult($report);
print($api->getSubmissionDate($report) . '<br>');
print($api->getReportPermalink($report, TRUE) . '<br>');

/* Scan an URL. */
$result = $api->scanURL('URL-to-scan');
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
$api->displayResult($result);

/* Get an URL report. */
$report = $api->getURLReport('URL-to-check-for-a-report');
$api->displayResult($report);
print($api->getTotalNumberOfChecks($report) . '<br>');
print($api->getNumberHits($report) . '<br>');
print($api->getReportPermalink($report, FALSE) . '<br>');

/* Comment on a file. */
$report = $api->makeComment('Hash-of-a-file-to-comment-on', 'Your-comment');
$api->displayResult($report);

/* Comment on an URL. */
$report = $api->makeComment('URL-to-comment-on', 'Your-comment');
$api->displayResult($report);
?>