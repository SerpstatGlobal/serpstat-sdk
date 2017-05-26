<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 26.05.17
 * Time: 10:17
 */

use Serpstat\Sdk\Core\ApiErrorHandler;
use Serpstat\Sdk\Core\ApiResponse;
use Serpstat\Sdk\Exceptions\ApiAccessErrorException;
use Serpstat\Sdk\Exceptions\ApiException;
use Serpstat\Sdk\Exceptions\ApiFrequencyExceededException;
use Serpstat\Sdk\Exceptions\ApiInvalidRequestException;
use Serpstat\Sdk\Exceptions\ApiLimitExceededException;
use Serpstat\Sdk\Exceptions\ApiNoResultsException;
use Serpstat\Sdk\Exceptions\ApiServerException;

class ApiErrorHandlerTest extends PHPUnit_Framework_TestCase
{
    const REQUEST_JSON_STATUS_CODE_KEY = 'status_code';
    const REQUEST_JSON_STATUS_MESSAGE_KEY = 'status_msg';
    const REQUEST_JSON_STATUS_MESSAGE_VALUE = 'Status message.';
    const REQUEST_JSON_RESULT_KEY = 'result';
    const REQUEST_JSON_RESULT_VALUE = 'Result message.';

    const UNEXPECTED_API_RESPONSE_STATUS_CODE = 504;

    protected $jsonDataForExceptionHandling = [
        self::REQUEST_JSON_STATUS_CODE_KEY => null,
        self::REQUEST_JSON_STATUS_MESSAGE_KEY => self::REQUEST_JSON_STATUS_MESSAGE_VALUE,
        self::REQUEST_JSON_RESULT_KEY => self::REQUEST_JSON_RESULT_VALUE
    ];

    public function testApiInvalidRequestExceptionHandler()
    {
        $this->jsonDataForExceptionHandling[self::REQUEST_JSON_STATUS_CODE_KEY] = ApiErrorHandler::INVALID_REQUEST;

        $this->expectException(ApiInvalidRequestException::class);
        new ApiResponse(json_encode($this->jsonDataForExceptionHandling));
    }

    public function testApiLimitExceededException()
    {
        $this->jsonDataForExceptionHandling[self::REQUEST_JSON_STATUS_CODE_KEY] = ApiErrorHandler::LIMITS_ERROR;

        $this->expectException(ApiLimitExceededException::class);
        new ApiResponse(json_encode($this->jsonDataForExceptionHandling));
    }

    public function testApiAccessErrorException()
    {
        $this->jsonDataForExceptionHandling[self::REQUEST_JSON_STATUS_CODE_KEY] = ApiErrorHandler::ACCESS_ERROR;

        $this->expectException(ApiAccessErrorException::class);
        new ApiResponse(json_encode($this->jsonDataForExceptionHandling));
    }

    public function testApiNoResultsException()
    {
        $this->jsonDataForExceptionHandling[self::REQUEST_JSON_STATUS_CODE_KEY] = ApiErrorHandler::NO_RESULT;

        $this->expectException(ApiNoResultsException::class);
        new ApiResponse(json_encode($this->jsonDataForExceptionHandling));
    }

    public function testApiFrequencyExceededException()
    {
        $this->jsonDataForExceptionHandling[self::REQUEST_JSON_STATUS_CODE_KEY] = ApiErrorHandler::FREQUENCY_EXCEEDED;

        $this->expectException(ApiFrequencyExceededException::class);
        new ApiResponse(json_encode($this->jsonDataForExceptionHandling));
    }

    public function testApiServerException()
    {
        $this->jsonDataForExceptionHandling[self::REQUEST_JSON_STATUS_CODE_KEY] = ApiErrorHandler::SERVER_ERROR;

        $this->expectException(ApiServerException::class);
        new ApiResponse(json_encode($this->jsonDataForExceptionHandling));
    }

    public function testApiUnexpectedStatusCode()
    {
        $this->jsonDataForExceptionHandling[self::REQUEST_JSON_STATUS_CODE_KEY] = static::UNEXPECTED_API_RESPONSE_STATUS_CODE;

        $this->expectException(ApiException::class);
        new ApiResponse(json_encode($this->jsonDataForExceptionHandling));
    }


}
