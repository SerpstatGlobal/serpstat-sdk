<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 23.05.17
 * Time: 17:17
 */

use PHPUnit_Framework_Constraint_IsType as IsType;
use Serpstat\Sdk\Methods\AbstractApiMethod;
use Serpstat\Sdk\Methods\DomainsUniqKeywordsMethod;

class DomainsUniqKeywordsMethodTest extends PHPUnit_Framework_TestCase
{
    const DOMAINS_UNIQ_KEYWORDS_METHOD = [
        'test.com',
        'domain.com',
        'test-domain.com'
    ];

    const EXCLUDE_DOMAINS_UNIQ_KEYWORDS_METHOD = [
        'exclude.com',
        'domain.co.uk',
        'exclude-domain.com'
    ];

    const DOMAIN_TO_ADD = 'to-add.com';

    const EXCLUDE_DOMAIN_TO_ADD = 'exclude-to-add.com';

    /**
     * @var DomainsUniqKeywordsMethod
     */
    protected $domainsUniqKeywordsMethod;

    protected $implodedDomains;

    public function setUp()
    {
        $this->implodedDomains = implode(',', static::DOMAINS_UNIQ_KEYWORDS_METHOD);

        $this->domainsUniqKeywordsMethod = new DomainsUniqKeywordsMethod(
            static::DOMAINS_UNIQ_KEYWORDS_METHOD,
            static::EXCLUDE_DOMAINS_UNIQ_KEYWORDS_METHOD
        );
    }

    public function testClassInstanceOfAbstract()
    {
        $this->assertInstanceOf(
            AbstractApiMethod::class,
            $this->domainsUniqKeywordsMethod
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
                DomainsUniqKeywordsMethod::class,
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
            DomainsUniqKeywordsMethod::class
        );
    }

    public function testGetUrlQueryParamsArray()
    {
        $this->assertClassHasAttribute(
            'domains',
            DomainsUniqKeywordsMethod::class
        );

        $this->assertNotEmpty(
            $this->domainsUniqKeywordsMethod->getUrlQueryParamsArray()
        );

        $this->assertInternalType(
            IsType::TYPE_ARRAY,
            $this->domainsUniqKeywordsMethod->getUrlQueryParamsArray()
        );

        $this->assertArrayHasKey(
            DomainsUniqKeywordsMethod::PARAM_EXCLUDE_DOMAINS,
            $this->domainsUniqKeywordsMethod->getUrlQueryParamsArray()
        );
    }

    public function testGetQuery()
    {
        $this->assertNotEmpty(
            $this->domainsUniqKeywordsMethod->getQuery()
        );

        $this->assertEquals(
            $this->implodedDomains,
            $this->domainsUniqKeywordsMethod->getQuery()
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            $this->domainsUniqKeywordsMethod->getQuery()
        );
    }

    public function testGetDomains()
    {
        $this->assertNotEmpty(
            $this->domainsUniqKeywordsMethod->getDomains()
        );

        $this->assertInternalType(
            IsType::TYPE_ARRAY,
            $this->domainsUniqKeywordsMethod->getDomains()
        );

        $this->assertEquals(
            static::DOMAINS_UNIQ_KEYWORDS_METHOD,
            $this->domainsUniqKeywordsMethod->getDomains()
        );
    }

    public function testAddDomain()
    {
        $domainNumbersBeforeAddition = count($this->domainsUniqKeywordsMethod->getDomains());
        $this->domainsUniqKeywordsMethod->addDomain(static::DOMAIN_TO_ADD);
        $domainsNumberAfterAddition = count($this->domainsUniqKeywordsMethod->getDomains());

        $this->assertContains(
            static::DOMAIN_TO_ADD,
            $this->domainsUniqKeywordsMethod->getDomains()
        );

        $this->assertNotEmpty(
            $this->domainsUniqKeywordsMethod->getDomains()
        );

        $this->assertGreaterThan(
            $domainNumbersBeforeAddition,
            $domainsNumberAfterAddition
        );
    }

    public function testGetExcludeDomains()
    {
        $this->assertNotEmpty(
            $this->domainsUniqKeywordsMethod->getExcludeDomains()
        );

        $this->assertInternalType(
            IsType::TYPE_ARRAY,
            $this->domainsUniqKeywordsMethod->getExcludeDomains()
        );

        $this->assertEquals(
            static::EXCLUDE_DOMAINS_UNIQ_KEYWORDS_METHOD,
            $this->domainsUniqKeywordsMethod->getExcludeDomains()
        );
    }

    public function testAddExcludeDomain()
    {
        $excludeDomainNumbersBeforeAddition = count($this->domainsUniqKeywordsMethod->getExcludeDomains());
        $this->domainsUniqKeywordsMethod->addExcludeDomain(static::EXCLUDE_DOMAIN_TO_ADD);
        $excludeDomainsNumberAfterAddition = count($this->domainsUniqKeywordsMethod->getExcludeDomains());

        $this->assertContains(
            static::EXCLUDE_DOMAIN_TO_ADD,
            $this->domainsUniqKeywordsMethod->getExcludeDomains()
        );

        $this->assertNotEmpty(
            $this->domainsUniqKeywordsMethod->getExcludeDomains()
        );

        $this->assertGreaterThan(
            $excludeDomainNumbersBeforeAddition,
            $excludeDomainsNumberAfterAddition
        );
    }

    public function allPublicMethodsNamesDataProvider()
    {
        return [
            ['getUrlQueryParamsArray'],
            ['getQuery'],
            ['getDomains'],
            ['addDomain'],
            ['getExcludeDomains'],
            ['addExcludeDomain'],
        ];
    }

    public function allClassPropertiesDataProvider()
    {
        return [
            ['domains'],
            ['excludeDomains'],
        ];
    }
}
