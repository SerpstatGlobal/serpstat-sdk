<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 23.05.17
 * Time: 18:30
 */

use PHPUnit_Framework_Constraint_IsType as IsType;
use Serpstat\Sdk\Methods\AbstractApiMethod;
use Serpstat\Sdk\Methods\DomainsIntersectionMethod;

class DomainsIntersectionMethodTest extends PHPUnit_Framework_TestCase
{
    const DOMAINS_INTERSECTION_METHOD = [
        'test.com',
        'domain.com',
        'test-domain.com'
    ];

    const DOMAIN_TO_ADD = 'to-add.com';

    /**
     * @var DomainsIntersectionMethod
     */
    protected $domainsIntersectionMethod;

    public function setUp()
    {
        $this->domainsIntersectionMethod = new DomainsIntersectionMethod(
            static::DOMAINS_INTERSECTION_METHOD
        );
    }

    public function testClassInstanceOfAbstract()
    {
        $this->assertInstanceOf(
            AbstractApiMethod::class,
            $this->domainsIntersectionMethod
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
                DomainsIntersectionMethod::class,
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
            DomainsIntersectionMethod::class
        );
    }

    public function testGetQuery()
    {
        $this->assertNotEmpty(
            $this->domainsIntersectionMethod->getQuery()
        );

        $this->assertEquals(
            implode(',', static::DOMAINS_INTERSECTION_METHOD),
            $this->domainsIntersectionMethod->getQuery()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->domainsIntersectionMethod->getQuery()
        );
    }

    public function testGetDomains()
    {
        $this->assertNotEmpty(
            $this->domainsIntersectionMethod->getDomains()
        );

        $this->assertInternalType(
            IsType::TYPE_ARRAY,
            $this->domainsIntersectionMethod->getDomains()
        );

        $this->assertEquals(
            static::DOMAINS_INTERSECTION_METHOD,
            $this->domainsIntersectionMethod->getDomains()
        );
    }

    public function testAddDomain()
    {
        $domainNumbersBeforeAddition = count($this->domainsIntersectionMethod->getDomains());
        $this->domainsIntersectionMethod->addDomain(static::DOMAIN_TO_ADD);
        $domainsNumberAfterAddition = count($this->domainsIntersectionMethod->getDomains());

        $this->assertContains(
            static::DOMAIN_TO_ADD,
            $this->domainsIntersectionMethod->getDomains()
        );

        $this->assertGreaterThan(
            $domainNumbersBeforeAddition,
            $domainsNumberAfterAddition
        );
    }

    public function allPublicMethodsNamesDataProvider()
    {
        return [
            ['getQuery'],
            ['getDomains'],
            ['addDomain'],
        ];
    }

    public function allClassPropertiesDataProvider()
    {
        return [
            ['domains'],
        ];
    }
}
