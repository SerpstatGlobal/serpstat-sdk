<?php
/**
 * Created by PhpStorm.
 * User: FuzzY
 * Date: 18.07.17
 * Time: 15:42
 */

require_once __DIR__ . '/../vendor/autoload.php';

// configure your application
$config = [
    'token' => 'd9632fc1ae1724da4d5ea2f3a99d5f5f',
];

$domains = ['allo.ua','citrus.ua'];
$excludeDomains = ['rozetka.ua'];

// init client with your serpstat api token
$apiClient = new \Serpstat\Sdk\Core\ApiGuzzleHttpClient($config['token']);

// create instance of api method class
$apiMethod = new \Serpstat\Sdk\Methods\DomainsUniqKeywordsMethod(
    $domains,
    $excludeDomains,
    \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_RU
);

try {
    // try call api method
    $response = $apiClient->call($apiMethod)->getResult();
} catch (\Exception $e) {
    // catch api error
    $response = $e->getMessage();
}
var_dump($response);
