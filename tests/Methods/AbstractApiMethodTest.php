<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 23.05.17
 * Time: 19:07
 */

use PHPUnit_Framework_Constraint_IsType as IsType;
use Serpstat\Sdk\Methods\AbstractApiMethod;
use Serpstat\Sdk\Interfaces\IApiClient;
use Serpstat\Sdk\Exceptions\InvalidParamException;

class AbstractApiMethodTest extends PHPUnit_Framework_TestCase
{
    const QUERY_PARAMETER_KEY = 'query';

    const QUERY_PARAMETER_VALUE = 'mocked_class_name';

    const MOCK_CLASS_NAME = 'MockedClassName';

    const ADDITIONAL_QUERY_PARAMETER_KEY = 'additional_query_parameter_key';

    const ADDITIONAL_QUERY_PARAMETER_VALUE = 'additional_query_parameter_value';

    /**
     * @var AbstractApiMethod
     */
    protected $abstractApiMethod;

    public function setUp()
    {
        $this->abstractApiMethod = $this->getMockForAbstractClass(
            AbstractApiMethod::class,
            [
                static::QUERY_PARAMETER_VALUE,
                IApiClient::SE_GOOGLE_CA
            ],
            static::MOCK_CLASS_NAME
        );
    }

    public function testGetMethodName()
    {
        $this->assertEquals(
            static::QUERY_PARAMETER_VALUE,
            $this->abstractApiMethod->getMethodName()
        );

        $this->assertNotEmpty(
            $this->abstractApiMethod->getMethodName()
        );


        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->abstractApiMethod->getMethodName()
        );
    }

    public function testAddUrlQueryParam()
    {
        $queryStringBeforeAddingAdditionalParameter = $this->abstractApiMethod->getUrlQueryString();
        $objectWithAddedParameter = $this->abstractApiMethod->addUrlQueryParam(
            static::ADDITIONAL_QUERY_PARAMETER_KEY,
            static::ADDITIONAL_QUERY_PARAMETER_VALUE
        );
        $queryStringAfterAddingAdditionalParameter = $objectWithAddedParameter->getUrlQueryString();

        $this->assertInstanceOf(
            AbstractApiMethod::class,
            $objectWithAddedParameter
        );

        $this->assertNotEmpty(
            $this->abstractApiMethod->getUrlQueryString()
        );

        $this->assertContains(
            static::ADDITIONAL_QUERY_PARAMETER_KEY,
            $queryStringAfterAddingAdditionalParameter
        );

        $this->assertContains(
            static::ADDITIONAL_QUERY_PARAMETER_VALUE,
            $queryStringAfterAddingAdditionalParameter
        );

        $this->assertGreaterThan(
            $queryStringBeforeAddingAdditionalParameter,
            $queryStringAfterAddingAdditionalParameter
        );
    }

    public function testAddUrlQueryParamException()
    {
        $this->expectException(InvalidParamException::class);
        $this->abstractApiMethod->addUrlQueryParam(
            static::QUERY_PARAMETER_KEY,
            static::QUERY_PARAMETER_VALUE
        );
    }

    public function testGetUrlQueryString()
    {
        $this->assertNotEmpty(
            $this->abstractApiMethod->getUrlQueryString()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->abstractApiMethod->getUrlQueryString()
        );

        $buildedQueryString = http_build_query(
            array_merge(
                $this->abstractApiMethod->getUrlQueryParamsArray(),
                [
                    static::ADDITIONAL_QUERY_PARAMETER_KEY => static::ADDITIONAL_QUERY_PARAMETER_VALUE
                ]
            )
        );
        $this->abstractApiMethod->addUrlQueryParam(
            static::ADDITIONAL_QUERY_PARAMETER_KEY,
            static::ADDITIONAL_QUERY_PARAMETER_VALUE
        );

        $this->assertEquals(
            $buildedQueryString,
            $this->abstractApiMethod->getUrlQueryString()
        );
    }

    public function testToString()
    {
        $this->assertNotEmpty(
            $this->abstractApiMethod->__toString()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->abstractApiMethod->__toString()
        );

        $this->assertEquals(
            '/' . $this->abstractApiMethod->getMethodName() . '?' . $this->abstractApiMethod->getUrlQueryString(),
            $this->abstractApiMethod->__toString()
        );

        $this->assertStringStartsWith(
            '/',
            $this->abstractApiMethod->__toString()
        );
    }
}
