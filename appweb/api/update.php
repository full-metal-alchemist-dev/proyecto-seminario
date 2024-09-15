<?php
$id = $_POST['id'];
$valor = $_POST['valor'];

$data = http_build_query(['id' => $id, 'valor' => $valor]);

$options = [
    'http' => [
        'method' => 'PUT',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $data
    ]
];

$context = stream_context_create($options);

$response = file_get_contents('http://localhost/appweb/api/api.php', false, $context);
echo $response;
