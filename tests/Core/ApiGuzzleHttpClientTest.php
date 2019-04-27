<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 26.05.17
 * Time: 15:50
 */

use Serpstat\Sdk\Core\ApiGuzzleHttpClient;
use Serpstat\Sdk\Methods\CheckLimitsMethod;

class ApiGuzzleHttpClientTest extends PHPUnit_Framework_TestCase
{
    const API_GUZZLE_HTTP_CLIENT_TOKEN = 'dde33fsfds8fds77fsd';

    /**
     * @var ApiGuzzleHttpClient $apiGuzzleHttpClient
     */
    protected $apiGuzzleHttpClient;

    public function setUp()
    {
        $this->apiGuzzleHttpClient = new ApiGuzzleHttpClient(
            static::API_GUZZLE_HTTP_CLIENT_TOKEN
        );
    }

    /**
     * @dataProvider allPublicMethodsNamesDataProvider
     *
     * @param $publicMethodsNames
     */
    public function testPublicMethodExistence($publicMethodsNames)
    {
        $this->assertTrue(
            method_exists(
                ApiGuzzleHttpClient::class,
                $publicMethodsNames
            )
        );
    }

    /**
     * @dataProvider allClassPropertiesDataProvider
     *
     * @param $propertiesNames
     */
    public function testPropertiesExistence($propertiesNames)
    {
        $this->assertClassHasAttribute(
            $propertiesNames,
            ApiGuzzleHttpClient::class
        );
    }

    public function testCall()
    {
        $this->expectException(\Serpstat\Sdk\Exceptions\ApiException::class);
        $method = new CheckLimitsMethod();
        $this->apiGuzzleHttpClient->call($method);
    }

    public function allPublicMethodsNamesDataProvider()
    {
        return [
            ['call'],
        ];
    }

    public function allClassPropertiesDataProvider()
    {
        return [
            ['token'],
            ['httpClient'],
        ];
    }
}