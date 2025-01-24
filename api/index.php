<?php
// Check if 'id' parameter is set
if (!isset($_GET['id'])) {
    http_response_code(400);
    echo "Error: Missing 'id' parameter.";
    exit;
}

// Get the 'id' parameter value
$id = htmlspecialchars($_GET['id']);

// Input M3U8 base URL
$baseUrl = "https://chd.entertain2india1921.workers.dev/?id=";

// Full M3U8 URL with the dynamic 'id' parameter
$m3u8Url = $baseUrl . $id;

// Set headers to handle the M3U8 stream
header("Content-Type: application/vnd.apple.mpegurl");

// Optional: Set custom headers like User-Agent or Referer
$options = [
    "http" => [
        "header" => "User-Agent: LOKIIPTV\r\n" .
                    "Referer: https://example.com\r\n" // Change this if necessary
    ]
];

$context = stream_context_create($options);

// Fetch the M3U8 content
$m3u8Content = @file_get_contents($m3u8Url, false, $context);

// Check if the URL is accessible
if ($m3u8Content === false) {
    // Return error if the URL can't be fetched
    http_response_code(500);
    echo "Error: Unable to fetch the M3U8 stream.";
    exit;
}

// Output the M3U8 content
echo $m3u8Content;
?>
