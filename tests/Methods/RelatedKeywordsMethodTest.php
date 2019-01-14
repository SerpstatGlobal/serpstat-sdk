<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 23.05.17
 * Time: 15:49
 */

use PHPUnit_Framework_Constraint_IsType as IsType;
use Serpstat\Sdk\Methods\AbstractApiMethod;
use Serpstat\Sdk\Methods\RelatedKeywordsMethod;

class RelatedKeywordsMethodTest extends PHPUnit_Framework_TestCase
{
    const RELATED_KEYWORDS_MIN_WEIGHT = 0;

    const RELATED_KEYWORDS_MAX_WEIGHT = 25;

    /**
     * @var RelatedKeywordsMethod
     */
    protected $relatedKeywordsMethod;

    public function setUp()
    {
        $this->relatedKeywordsMethod = new RelatedKeywordsMethod(
            'ad_keywords_method',
            static::RELATED_KEYWORDS_MAX_WEIGHT
        );
    }


    public function testClassInstanceOfAbstract()
    {
        $this->assertInstanceOf(
            AbstractApiMethod::class,
            $this->relatedKeywordsMethod
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
                RelatedKeywordsMethod::class,
                $publicMethodsNames
            )
        );
    }

    public function testPropertiesExistence()
    {
        $this->assertClassHasAttribute(
            'weight',
            RelatedKeywordsMethod::class
        );
    }

    public function testGetWeight()
    {
        $this->assertInstanceOf(
            RelatedKeywordsMethod::class,
            $this->relatedKeywordsMethod
        );

        $this->assertNotEmpty(
            $this->relatedKeywordsMethod->getWeight()
        );

        $this->assertEquals(
            static::RELATED_KEYWORDS_MAX_WEIGHT,
            $this->relatedKeywordsMethod->getWeight()
        );

        $this->assertInternalType(
            IsType::TYPE_INT,
            $this->relatedKeywordsMethod->getWeight()
        );
    }

    public function testSetWeight()
    {
        $this->assertInstanceOf(
            RelatedKeywordsMethod::class,
            $this->relatedKeywordsMethod->setWeight(static::RELATED_KEYWORDS_MAX_WEIGHT)
        );

        $this->assertNotEmpty(
            $this->relatedKeywordsMethod->setWeight(static::RELATED_KEYWORDS_MAX_WEIGHT)
        );

        $this->assertInternalType(
            IsType::TYPE_OBJECT,
            $this->relatedKeywordsMethod->setWeight(static::RELATED_KEYWORDS_MAX_WEIGHT)
        );

        $this->assertEquals(
            RelatedKeywordsMethod::WEIGHT_MAX,
            $this->relatedKeywordsMethod->getWeight()
        );

        $minWeight = $this->relatedKeywordsMethod->setWeight(static::RELATED_KEYWORDS_MIN_WEIGHT);
        $this->assertEquals(
            RelatedKeywordsMethod::WEIGHT_MIN,
            $this->relatedKeywordsMethod->getWeight()
        );
    }

    public function testGetUrlQueryParamsArray()
    {
        $this->assertNotEmpty(
            $this->relatedKeywordsMethod->getUrlQueryParamsArray()
        );

        $this->assertInternalType(
            IsType::TYPE_ARRAY,
            $this->relatedKeywordsMethod->getUrlQueryParamsArray()
        );

        $this->assertArrayHasKey(
            RelatedKeywordsMethod::PARAM_WEIGHT,
            $this->relatedKeywordsMethod->getUrlQueryParamsArray()
        );

        $this->assertArraySubset(
            [RelatedKeywordsMethod::PARAM_WEIGHT => $this->relatedKeywordsMethod->getWeight()],
            $this->relatedKeywordsMethod->getUrlQueryParamsArray()
        );
    }

    public function allPublicMethodsNamesDataProvider()
    {
        return [
            ['getWeight'],
            ['getUrlQueryParamsArray'],
        ];
    }
}
