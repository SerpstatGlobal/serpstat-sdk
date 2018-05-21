<?php
/**
 * Created by PhpStorm.
 * User: escobar
 * Date: 21.05.18
 * Time: 12:27
 */

require_once __DIR__ . '/vendor/autoload.php';

// configure your application
$config = [
    'token' => '5ef58df8d6a5ef19efa6b9d460f41806',
];

//domain name
$domain = 'olx.ua';

//pagination result page (optional)
$page = 1;

// init client with your serpstat api token
$apiClient = new \Serpstat\Sdk\Core\ApiGuzzleHttpClient($config['token']);

// create instance of api method class
$apiMethod = new \Serpstat\Sdk\Methods\GetSubDomainsMethod(
    $domain,
    \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_UA,
    $page
);

try {
    // try call api method
    $response = $apiClient->call($apiMethod)->getResult();
} catch (\Exception $e) {
    // catch api error
    $response = $e->getMessage();
}
var_dump($response);