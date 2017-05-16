<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 9:37
 */

namespace Serpstat\Sdk\Core;


use Serpstat\Sdk\Exceptions\ApiException;
use Serpstat\Sdk\Exceptions\ApiInvalidRequestException;
use Serpstat\Sdk\Interfaces\IApiResponse;

class ApiErrorHandler
{
    const EXCEPTIONS_NAMESPACE = 'Serpstat\\Sdk\\Exceptions\\';

    const INVALID_REQUEST = 400;
    const LIMITS_ERROR = 402;
    const ACCESS_ERROR = 403;
    const NO_RESULT = 404;
    const FREQUENCY_EXCEEDED = 429;
    const SERVER_ERROR = 500;

    protected static $errorMapping = [
        self::INVALID_REQUEST => 'ApiInvalidRequestException',
        self::LIMITS_ERROR => 'ApiLimitExceededException',
        self::ACCESS_ERROR => 'ApiAccessErrorException',
        self::NO_RESULT => 'ApiNoResultsException',
        self::FREQUENCY_EXCEEDED => 'ApiFrequencyExceededException',
        self::SERVER_ERROR => 'ApiServerException',
    ];

    /**
     * @param IApiResponse $apiResponse
     * @throws ApiException
     */
    public static function handle(IApiResponse $apiResponse)
    {
        if ($apiResponse->getStatusCode() != 200) {

            if (isset(static::$errorMapping[$apiResponse->getStatusCode()])) {
                $exceptionClassName = static::EXCEPTIONS_NAMESPACE . static::$errorMapping[$apiResponse->getStatusCode()];
                throw new $exceptionClassName($apiResponse->getStatusMsg());
            }

            throw new ApiException($apiResponse->getStatusMsg(), $apiResponse->getStatusCode());
        }
    }
}