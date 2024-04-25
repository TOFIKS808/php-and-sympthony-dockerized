<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();
$response = $client->request(
'GET',
'https://jsonplaceholder.typicode.com/users'
);

$statusCode = $response->getStatusCode();
// $statusCode = 200
$contentType = $response->getHeaders()['content-type'][0];
// $contentType = 'application/json'
$content = $response->getContent();
// $content = '{"id":521583, "name":"symfony-docs", ...}'
$content = $response->toArray();
// $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

dump($statusCode);
foreach ($content as $r) {
    dump($r);
}