<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 21:06
 */

namespace Serpstat\Sdk\Core;


use Psr\Http\Message\ResponseInterface;
use Serpstat\Sdk\Exceptions\ParseResponseException;
use Serpstat\Sdk\Interfaces\IApiResponse;

class ApiResponse implements IApiResponse
{
    /**
     * @var
     */
    protected $request;

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusMsg;

    /**
     * @var string
     */
    protected $jsonResponse;

    /**
     * @var array|\stdClass
     */
    protected $result;

    /**
     * @var bool
     */
    protected $resultToArray;

    /**
     * ApiResponse constructor.
     * @param string $jsonString
     * @param bool $resultToArray
     */
    public function __construct($jsonString, $resultToArray = true)
    {
        $this->jsonResponse = $jsonString;
        $this->resultToArray = $resultToArray;
        $this->parseResponse();
        ApiErrorHandler::handle($this);
    }

    /**
     * @param ResponseInterface $response
     * @param bool $resultToArray
     * @return ApiResponse
     */
    public static function fromGuzzleResponse(ResponseInterface $response, $resultToArray = true)
    {
        return new static((string)$response->getBody(), $resultToArray);
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getStatusMsg()
    {
        return $this->statusMsg;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->jsonResponse;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }

    protected function parseResponse()
    {
        if ($this->resultToArray) {
            $this->parseAsArray();
        } else {
            $this->parseAsObject();
        }
    }

    protected function parseAsArray()
    {
        $array = $this->decodeResponse();
        $this->result = $array[IApiResponse::RESPONSE_RESULT];

        $this->setStatusCodeAndMessage($array[IApiResponse::RESPONSE_STATUS_CODE], $array[IApiResponse::RESPONSE_STATUS_MSG]);
    }

    protected function parseAsObject()
    {
        $stdClass = $this->decodeResponse(false);
        $this->result = $stdClass->{IApiResponse::RESPONSE_RESULT};

        $this->setStatusCodeAndMessage($stdClass->{IApiResponse::RESPONSE_STATUS_CODE}, $stdClass->{IApiResponse::RESPONSE_STATUS_MSG});
    }

    /**
     * @param int $statusCode
     * @param string $statusMsg
     * @return $this
     */
    protected function setStatusCodeAndMessage($statusCode, $statusMsg)
    {
        if ($statusCode !== 200) {

        }
        $this->statusCode = $statusCode;
        $this->statusMsg = $statusMsg;
        return $this;
    }

    /**
     * @param bool $asArray
     * @return array|\stdClass
     * @throws ParseResponseException
     */
    protected function decodeResponse($asArray = true)
    {
        $result = json_decode($this->jsonResponse, $asArray);

        if (is_null($result)) {
            throw new ParseResponseException();
        }

        return $result;
    }
}