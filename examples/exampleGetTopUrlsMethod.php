<?php
/**
 * Created by PhpStorm.
 * User: escobar
 * Date: 22.05.18
 * Time: 12:21
 */

require_once __DIR__ . '/../vendor/autoload.php';
// configure your application
$config = [
    'token' => '1942ae9911cf1fab62314a5d63ec240e',
];
$domain = 'allo.ua';
// init client with your serpstat api token
$apiClient = new \Serpstat\Sdk\Core\ApiGuzzleHttpClient($config['token']);
// create instance of api method class
$apiMethod = new \Serpstat\Sdk\Methods\GetTopUrlsMethod(
    $domain,
    \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_RU,
    \Serpstat\Sdk\Methods\GetTopUrlsMethod::ORDER_DESC,
    \Serpstat\Sdk\Methods\GetTopUrlsMethod::SORT_ORGANIC_KEYWORD
);
try {
    // try call api method
    $response = $apiClient->call($apiMethod)->getResult();
} catch (\Exception $e) {
    // catch api error
    $response = $e->getMessage();
}
var_dump($response);