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
    'token' => '19666fc1ae1724da1d5ea2f3a99d5f5a',
];

$domain = 'example.com';

// init client with your serpstat api token
$apiClient = new \Serpstat\Sdk\Core\ApiGuzzleHttpClient($config['token']);

// create instance of any api method class
// e.g. DomainKeywordsMethod
// list of methods classes in folder src\Methods
$apiMethod = new \Serpstat\Sdk\Methods\DomainKeywordsMethod(
    $domain,
    \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_RU
);

try {
    // try call api method
    $response = $apiClient->call($apiMethod);
} catch (\Exception $e) {
    // catch api error
    $response = $e->getMessage();
}