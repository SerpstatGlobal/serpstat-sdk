<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 14:41
 */

require_once __DIR__ . '/../vendor/autoload.php';

$domain = 'akrosta.ru';
$keywords = 'Викторины онлайн';
$url = 'http://akrosta.ru/faq/';


$apiClient = new \Serpstat\Sdk\Core\ApiGuzzleHttpClient('d9632fc1ae1724da4d5ea2f3a99d5f5f');
$apiMethod = new \Serpstat\Sdk\Methods\DomainKeywordsMethod($keywords, \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_RU);

try {
    $response = $apiClient->call($apiMethod);
} catch (\Exception $e) {
    $response = $e->getMessage();
}
var_dump($response->getResult());

