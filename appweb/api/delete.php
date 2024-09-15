<?php
$id = $_POST['id'];

$data = http_build_query(['id' => $id]);

$options = [
    'http' => [
        'method' => 'DELETE',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $data
    ]
];

$context = stream_context_create($options);

$response = file_get_contents('http://localhost/appweb/api/api.php', false, $context);
echo $response;
