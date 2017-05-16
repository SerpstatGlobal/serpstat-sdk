<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 14:53
 */

namespace Serpstat\Sdk\Core;


use GuzzleHttp\Client;
use Serpstat\Sdk\Interfaces\IApiClient;
use Serpstat\Sdk\Interfaces\IApiMethod;

class ApiGuzzleHttpClient implements IApiClient
{

    /**
     * @var string
     */
    protected $token;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * ApiGuzzleHttpClient constructor.
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->httpClient = new Client();
    }

    /**
     * @param IApiMethod $apiMethod
     * @param bool $resultToArray
     * @return ApiResponse
     */
    public function call(IApiMethod $apiMethod, $resultToArray = true)
    {
        $httpResponse = $this->httpClient->get($this->buildApiUrl($apiMethod));
        return ApiResponse::fromGuzzleResponse($httpResponse, $resultToArray);
    }

    /**
     * @param IApiMethod $apiMethod
     * @return string
     */
    protected function buildApiUrl(IApiMethod $apiMethod)
    {
        $apiMethod->addUrlQueryParam(IApiMethod::PARAM_TOKEN, $this->token);

        return IApiClient::API_HOST . (string)$apiMethod;
    }
}