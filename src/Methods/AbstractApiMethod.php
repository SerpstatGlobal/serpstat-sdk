<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 19:08
 */

namespace Serpstat\Sdk\Methods;


use Serpstat\Sdk\Exceptions\InvalidParamException;
use Serpstat\Sdk\Interfaces\IApiClient;
use Serpstat\Sdk\Interfaces\IApiMethod;
use Serpstat\Sdk\Methods\Traits\MethodHasQueryAndSearchEngineTrait;
use Serpstat\Sdk\Utils\Helper;

abstract class AbstractApiMethod implements IApiMethod
{
    use MethodHasQueryAndSearchEngineTrait;

    /**
     * @var string|null
     */
    protected $methodName = null;

    /**
     * @var array
     */
    protected $additionalParams = [];

    /**
     * @param string $query
     * @param string $searchEngine
     */
    public function __construct($query, $searchEngine = IApiClient::SE_GOOGLE_US)
    {
        $this->query = $query;
        $this->searchEngine = $searchEngine;
    }

    /**
     * @return string
     */
    public function getMethodName()
    {
        if (is_null($this->methodName)) {
            $this->setApiMethodNameFromClassName();
        }
        return $this->methodName;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     * @throws InvalidParamException
     */
    public function addUrlQueryParam($key, $value) {
        $key = (string)$key;
        if (isset($this->getUrlQueryParamsArray()[$key])) {
            throw new InvalidParamException(sprintf('The predefined parameter "%s" can not be set.', $key));
        }
        $this->additionalParams[$key] = (string)$value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlQueryString()
    {
        return http_build_query(array_merge($this->getUrlQueryParamsArray(), $this->additionalParams));
    }

    /**
     * @return string
     */
    public function __toString(){
        return '/' . $this->getMethodName() . '?' . $this->getUrlQueryString();
    }

    protected function setApiMethodNameFromClassName()
    {
        $name = Helper::camelCaseToSnakeCase(Helper::getShortClassNameByObject($this));
        $this->methodName = str_replace('_method', null, $name);
    }
}