<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 26.05.17
 * Time: 11:33
 */

use PHPUnit_Framework_Constraint_IsType as IsType;
use Serpstat\Sdk\Core\ApiResponse;
use Serpstat\Sdk\Interfaces\IApiResponse;

class ApiResponseTest extends PHPUnit_Framework_TestCase
{
    use \Serpstat\Tests\EasyMockObjectTrait;

    const REQUEST_JSON_STATUS_CODE_KEY = 'status_code';
    const REQUEST_JSON_STATUS_CODE_VALUE = 200;
    const REQUEST_JSON_STATUS_MESSAGE_KEY = 'status_msg';
    const REQUEST_JSON_STATUS_MESSAGE_VALUE = 'Status message.';
    const REQUEST_JSON_RESULT_KEY = 'result';
    const REQUEST_JSON_RESULT_VALUE = 'Result message.';

    const INVALID_REQUEST_JSON = '{a : "a"}';

    protected static $requestJson = [
        self::REQUEST_JSON_STATUS_CODE_KEY => self::REQUEST_JSON_STATUS_CODE_VALUE,
        self::REQUEST_JSON_STATUS_MESSAGE_KEY => self::REQUEST_JSON_STATUS_MESSAGE_VALUE,
        self::REQUEST_JSON_RESULT_KEY => self::REQUEST_JSON_RESULT_VALUE
    ];

    /**
     * @var ApiResponse $apiResponse
     */
    protected $apiResponse;

    /**
     * @param
     */
    public function setUp()
    {
        $this->apiResponse = new ApiResponse(
            json_encode(self::$requestJson)
        );
    }

    public function testClassInstanceOfAbstract()
    {
        $this->assertInstanceOf(
            IApiResponse::class,
            $this->apiResponse
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
                ApiResponse::class,
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
            ApiResponse::class
        );
    }

    public function testParseObject()
    {
        $parseObject = new ApiResponse(
            json_encode(static::$requestJson),
            false
        );

        $this->assertNotEmpty(
            $parseObject->getStatusCode()
        );

        $this->assertEquals(
            static::REQUEST_JSON_STATUS_CODE_VALUE,
            $parseObject->getStatusCode()
        );

        $this->assertInternalType(
            IsType::TYPE_INT,
            $parseObject->getStatusCode()
        );

        $this->assertNotEmpty(
            $parseObject->getStatusMsg()
        );

        $this->assertEquals(
            static::REQUEST_JSON_STATUS_MESSAGE_VALUE,
            $parseObject->getStatusMsg()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $parseObject->getStatusMsg()
        );

        $this->assertNotEmpty(
            $parseObject->getResult()
        );

        $this->assertEquals(
            static::REQUEST_JSON_RESULT_VALUE,
            $parseObject->getResult()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $parseObject->getResult()
        );
    }

    public function testGetStatusCode()
    {
        $this->assertNotEmpty(
            $this->apiResponse->getStatusCode()
        );

        $this->assertEquals(
            static::REQUEST_JSON_STATUS_CODE_VALUE,
            $this->apiResponse->getStatusCode()
        );

        $this->assertInternalType(
            IsType::TYPE_INT,
            $this->apiResponse->getStatusCode()
        );
    }

    public function testGetStatusMsg()
    {
        $this->assertNotEmpty(
            $this->apiResponse->getStatusMsg()
        );

        $this->assertEquals(
            static::REQUEST_JSON_STATUS_MESSAGE_VALUE,
            $this->apiResponse->getStatusMsg()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->apiResponse->getStatusMsg()
        );
    }

    public function testToString()
    {
        $this->assertNotEmpty(
            $this->apiResponse->__toString()
        );

        $this->assertEquals(
            json_encode(static::$requestJson),
            $this->apiResponse->__toString()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->apiResponse->__toString()
        );

        $this->assertJson(
            $this->apiResponse->__toString()
        );
    }

    public function testGetResult()
    {
        $this->assertNotEmpty(
            $this->apiResponse->getResult()
        );

        $this->assertEquals(
            static::REQUEST_JSON_RESULT_VALUE,
            $this->apiResponse->getResult()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->apiResponse->getResult()
        );
    }

    public function testDecodeResponse()
    {
        $this->expectException(\Serpstat\Sdk\Exceptions\ParseResponseException::class);
        new ApiResponse(
            self::INVALID_REQUEST_JSON,
            false
        );
    }

    public function allPublicMethodsNamesDataProvider()
    {
        return [
            ['__construct'],
            ['getStatusCode'],
            ['getStatusMsg'],
            ['__toString'],
            ['getResult'],
            ['getResult'],
        ];
    }

    public function allClassPropertiesDataProvider()
    {
        return [
            ['request'],
            ['statusCode'],
            ['statusMsg'],
            ['jsonResponse'],
            ['result'],
            ['resultToArray'],
        ];
    }
}