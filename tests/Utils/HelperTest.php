<?php
/**
 * Created by PhpStorm.
 * User: amigo
 * Date: 22.05.17
 * Time: 16:57
 */

namespace Serpstat\Tests;

use PHPUnit_Framework_TestCase;
use PHPUnit_Framework_Constraint_IsType as IsType;
use Serpstat\Sdk\Utils\Helper;
use Serpstat\Sdk\Methods\CheckLimitsMethod;

class HelperTest extends PHPUnit_Framework_TestCase
{
    use EasyMockObjectTrait;

    /**
     * @dataProvider camelCaseToSnakeCaseDataProvider
     *
     * @param $inputString
     * @param $expectedString
     */
    public function testCamelCaseToSnakeCase($inputString, $expectedString)
    {
        $this->assertNotEmpty(
            Helper::camelCaseToSnakeCase($inputString)
        );

        $this->assertEquals(
            $expectedString,
            Helper::camelCaseToSnakeCase($inputString)
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            Helper::camelCaseToSnakeCase($inputString)
        );
    }

    public function testGetShortClassNameByObject()
    {
        $this->assertNotEmpty(
            Helper::getShortClassNameByObject(new CheckLimitsMethod())
        );

        $this->assertEquals(
            'CheckLimitsMethod',
            Helper::getShortClassNameByObject(new CheckLimitsMethod())
        );

        $this->assertInternalType(
            IsType::TYPE_STRING,
            Helper::getShortClassNameByObject(new CheckLimitsMethod())
        );
    }

    public function camelCaseToSnakeCaseDataProvider()
    {
        return [
            ['AdKeywordsMethod', 'ad_keywords_method'],
            ['CheckLimitsMethod', 'check_limits_method'],
            ['CompetitorsMethod', 'competitors_method'],
            ['DomainHistoryMethod', 'domain_history_method'],
            ['DomainInfoMethod', 'domain_info_method']
        ];
    }
}
