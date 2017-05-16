<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 16:01
 */

namespace Serpstat\Sdk\Methods\Traits;


use Serpstat\Sdk\Interfaces\IApiMethod;

trait MethodHasQueryAndSearchEngineTrait
{
    use MethodHasQueryTrait, MethodHasSearchEngineTrait;

    /**
     * @return array
     */
    public function getUrlQueryParamsArray()
    {
        return [
            IApiMethod::PARAM_QUERY => $this->getQuery(),
            IApiMethod::PARAM_SEARCH_ENGINE => $this->getSearchEngine(),
        ];
    }

}