<?php
/**
 * Created by PhpStorm.
 * User: escobar
 * Date: 15.01.19
 * Time: 16:33
 */

use Serpstat\Sdk\Methods\GetTopUrlsMethod;
use PHPUnit_Framework_Constraint_IsType as IsType;

class GetTopUrlsMethodTest extends PHPUnit_Framework_TestCase
{
    const QUERY = 'example.com';

    protected $getTopUrlsMethod;

    public function setUp()
    {
        $this->getTopUrlsMethod = new GetTopUrlsMethod(
            static::QUERY
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
                GetTopUrlsMethod::class,
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
            GetTopUrlsMethod::class
        );
    }

    public function testGetOrder()
    {
        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->getTopUrlsMethod->getOrder()
        );
    }

    public function testGetSort()
    {
        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->getTopUrlsMethod->getSort()
        );
    }

    /**
     * @coversNothing
     */
    public function testClassHasAttribute()
    {
        $this->assertClassHasAttribute(
            'query',
            GetTopUrlsMethod::class
        );
    }

    public function testGetUrlQueryParamsNotEmpty()
    {
        $this->assertNotEmpty(
            $this->getTopUrlsMethod->getUrlQueryParamsArray()
        );
    }

    public function testGetUrlQueryParamsResultType()
    {
        $this->assertInternalType(
            IsType::TYPE_ARRAY,
            $this->getTopUrlsMethod->getUrlQueryParamsArray()
        );
    }

    public function testGetUrlQueryParamsResultHasKey()
    {
        $this->assertArrayHasKey(
            GetTopUrlsMethod::PARAM_QUERY,
            $this->getTopUrlsMethod->getUrlQueryParamsArray()
        );
    }

    public function allPublicMethodsNamesDataProvider()
    {
        return [
            ['getUrlQueryParamsArray'],
            ['getSort'],
            ['getOrder'],
        ];
    }

    public function allClassPropertiesDataProvider()
    {
        return [
            ['order'],
            ['sort'],
        ];
    }
}