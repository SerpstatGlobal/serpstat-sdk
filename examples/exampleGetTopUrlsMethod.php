<?php
/**
 * Created by PhpStorm.
 * User: escobar
 * Date: 22.05.18
 * Time: 12:21
 */

require_once __DIR__ . '/vendor/autoload.php';

// configure your application
$config = [
    'token' => '5ef58df8d6a5ef19efa6b9d460f41806',
];

//domain name
$domain = 'olx.ua';

//optional params
$additionalParams =[
    'page' => 1,                        //pagination result page
    'order' => 'asc',                   //order (asc, desc)
    'sort' => 'organic_keywords',];     /*sort by value of (can be sorted by - organic_keywords
                                         *                                   - facebook_shares
                                         *                                   - linkedin_shares
                                         *                                   - google_shares
                                         *                                   - potencial_traff
                                         */

// init client with your serpstat api token
$apiClient = new \Serpstat\Sdk\Core\ApiGuzzleHttpClient($config['token']);

// create instance of api method class
$apiMethod = new \Serpstat\Sdk\Methods\GetTopUrlsMethod(
    $domain,
    \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_UA,
    $additionalParams
);

try {
    // try call api method
    $response = $apiClient->call($apiMethod)->getResult();
} catch (\Exception $e) {
    // catch api error
    $response = $e->getMessage();
}
var_dump($response);