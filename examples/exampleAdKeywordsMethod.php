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

$keywords = 'keywords';
$domain = 'example.com';

// init client with your serpstat api token
$apiClient = new \Serpstat\Sdk\Core\ApiGuzzleHttpClient($config['token']);

// create instance of any api method class
// list of methods classes in folder src\Methods
$apiMethodKeywords = new \Serpstat\Sdk\Methods\AdKeywordsMethod(
    $keywords,
    \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_RU
);
$apiMethodDomain = new \Serpstat\Sdk\Methods\AdKeywordsMethod(
    $domain,
    \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_RU
);

try {
    // try call api method
    $response1 = $apiClient->call($apiMethodKeywords);
    $response2 = $apiClient->call($apiMethodDomain);
} catch (\Exception $e) {
    // catch api error
    $response1 = $e->getMessage();
    $response2 = $e->getMessage();
}
