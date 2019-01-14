<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 23.05.17
 * Time: 18:44
 */

use PHPUnit_Framework_Constraint_IsType as IsType;
use Serpstat\Sdk\Methods\AbstractApiMethod;
use Serpstat\Sdk\Interfaces\IApiMethod;
use Serpstat\Sdk\Methods\CheckLimitsMethod;

class CheckLimitsMethodTest extends PHPUnit_Framework_TestCase
{
    const CHECK_LIMITS_METHOD_NAME = 'stats';

    /**
     * @var CheckLimitsMethod
     */
    protected $checkLimitsMethod;

    public function setUp()
    {
        $this->checkLimitsMethod = new CheckLimitsMethod();
    }

    public function testClassInstanceOfAbstract()
    {
        $this->assertInstanceOf(
            AbstractApiMethod::class,
            $this->checkLimitsMethod
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
                CheckLimitsMethod::class,
                $publicMethodsNames
            )
        );
    }

    public function testGetMethodName()
    {
        $this->assertNotEmpty(
            $this->checkLimitsMethod->getMethodName()
        );

        $this->assertEquals(
            static::CHECK_LIMITS_METHOD_NAME,
            $this->checkLimitsMethod->getMethodName()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->checkLimitsMethod->getMethodName()
        );
    }

    public function testGetUrlQueryParamsArray()
    {
        $this->assertNotEmpty(
            $this->checkLimitsMethod->getUrlQueryParamsArray()
        );

        $this->assertInternalType(
            IsType::TYPE_ARRAY,
            $this->checkLimitsMethod->getUrlQueryParamsArray()
        );

        $this->assertArrayHasKey(
            IApiMethod::PARAM_SEARCH_ENGINE,
            $this->checkLimitsMethod->getUrlQueryParamsArray()
        );
    }

    public function allPublicMethodsNamesDataProvider()
    {
        return [
            ['getMethodName'],
            ['getUrlQueryParamsArray'],
        ];
    }
}
