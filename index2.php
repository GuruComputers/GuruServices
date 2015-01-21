<?php
require_once('VirusTotalApiV2.php');

$urls = array('www.google.com', 'www.yahoo.com', 'infysec.com');

/* Initialize the VirusTotalApi class. */
$api = new VirusTotalAPIV2('477693d6eb0f5278122b109ba0a09ca1fbb7338671bc170111d12f00c6c37f2f');

$scanResult = array();

echo '<table>';

    // Obviously, VirusTotal API implements rate limit that you can't hit it too hard. You should consider implement long pulling in Javascript

foreach ( $urls as $url ) {
    $report = $api->getURLReport($url);
    printf('<h1>Url: %s</h1>', $url);
    echo '<br /><br />';
    foreach($report->scans as $name => $info){
        echo '<tr>';
        echo '<th>'.$name.'</th>';
        echo '<td>'.$info->detected.'</td>';
        echo '<td>'.$info->result.'</td>';
        echo '</tr>';
    }
}
echo '</table>';
?>