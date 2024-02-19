<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Check if the 'url' parameter is provided
if (isset($_GET['url'])) {
    $rssFeedUrl = $_GET['url'];

    // Fetch the RSS feed using cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $rssFeedUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $rssFeedData = curl_exec($ch);
    curl_close($ch);

    // Output the RSS feed data
    echo $rssFeedData;
} else {
    // 'url' parameter is not provided
    http_response_code(400);
    echo json_encode(array("error" => "Missing 'url' parameter"));
}

?>
