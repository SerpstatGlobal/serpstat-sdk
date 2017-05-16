<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 19:08
 */

namespace Serpstat\Sdk\Methods;


use Serpstat\Sdk\Interfaces\IApiClient;
use Serpstat\Sdk\Interfaces\IApiMethod;

class CheckLimitsMethod extends AbstractApiMethod
{

    /**
     * @var string|null
     */
    const METHOD_NAME = 'stats';

    /**
     * CheckLimitsMethod constructor.
     */
    public function __construct()
    {
        parent::__construct(null, IApiClient::SE_GOOGLE_US);
    }

    /**
     * @return string
     */
    public function getMethodName()
    {
        return static::METHOD_NAME;
    }

    /**
     * @return array
     */
    public function getUrlQueryParamsArray()
    {
        return [
            IApiMethod::PARAM_SEARCH_ENGINE => $this->getSearchEngine(),
        ];
    }
}