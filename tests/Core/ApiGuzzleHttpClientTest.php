<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 26.05.17
 * Time: 15:50
 */

use GuzzleHttp\Client;
use Serpstat\Sdk\Core\ApiGuzzleHttpClient;
use Serpstat\Sdk\Interfaces\IApiClient;
use Serpstat\Sdk\Interfaces\IApiMethod;
use Serpstat\Sdk\Methods\CheckLimitsMethod;

class ApiGuzzleHttpClientTest extends PHPUnit_Framework_TestCase
{
    const API_GUZZLE_HTTP_CLIENT_TOKEN = 'ijmiom4f5m34905g03um8342dm04923lre3w';

    /**
     * @var ApiGuzzleHttpClient $apiGuzzleHttpClient
     */
    protected $apiGuzzleHttpClient;

//    public function setUp()
//    {
//        $this->apiGuzzleHttpClient = new ApiGuzzleHttpClient(
//            static::API_GUZZLE_HTTP_CLIENT_TOKEN
//        );
//    }

    public function testCall()
    {
        $clientMethodMock = $this
            ->getMockBuilder(CheckLimitsMethod::class)
            ->setMethods(['addUrlQueryParam'])
            ->getMock()
        ;
        $clientMethodMock
            ->method('addUrlQueryParam')
            ->willReturn(
                [
                    IApiMethod::PARAM_SEARCH_ENGINE => IApiClient::SE_GOOGLE_US,
                ]
            );

        $guzzleClientMock = $this
            ->getMockBuilder(Client::class)
            ->setMethods(['get'])
            ->getMock()
        ;

//        $guzzleClientMock->method('get')
//            ->willReturn(IApiClient::API_HOST. $clientMethodMock->_)
//        $this->apiGuzzleHttpClient->call();
    }
}
