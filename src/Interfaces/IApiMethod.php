<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 15:46
 */

namespace Serpstat\Sdk\Interfaces;


interface IApiMethod
{
    const PARAM_QUERY = 'query';
    const PARAM_SEARCH_ENGINE = 'se';
    const PARAM_TOKEN = 'token';

    /**
     * @return string
     */
    public function getMethodName();

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function addUrlQueryParam($key, $value);

    /**
     * @return array
     */
    public function getUrlQueryParamsArray();

    /**
     * @return string Url Query String
     */
    public function getUrlQueryString();

    /**
     * @return string
     */
    public function __toString();
}