<?php
/**
 * Created by PhpStorm.
 * User: escobar
 * Date: 26.08.2018
 * Time: 15:44
 * @author Doctor <doctor.netpeak@gmail.com>
 */

namespace Serpstat\Sdk\Methods;


use Serpstat\Sdk\Interfaces\IApiClient;

class GetTopUrlsMethod extends AbstractApiMethod
{
    const PARAM_ORDER = 'order';
    const PARAM_SORT = 'sort';

    const ORDER_DESC = 'desc';
    const ORDER_ASC = 'asc';

    const SORT_ORGANIC_KEYWORD = 'organic_keyword';
    const SORT_FB_SHARES = 'facebook_shares';
    const SORT_LINKEDIN_SHARES = 'linkedin_shares';
    const SORT_GOOGLE_SHARES = 'google_shares';
    const SORT_POTENCIAL_TRAFF = 'potencial_traff';

    /**
     * @var string
     */
    protected $order;

    /**
     * @var string
     */
    protected $sort;

    /**
     * GetTopUrlsMethod constructor.
     * @param $query
     * @param string $searchEngine
     * @param string $order
     * @param string $sort
     */
    public function __construct($query, $searchEngine = IApiClient::SE_GOOGLE_US, $order = GetTopUrlsMethod::ORDER_DESC, $sort = GetTopUrlsMethod::SORT_ORGANIC_KEYWORD)
    {
        $this->order = $order;
        $this->sort = $sort;
        parent::__construct($query, $searchEngine);
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @return array
     */
    public function getUrlQueryParamsArray()
    {
        return array_merge(
            parent::getUrlQueryParamsArray(),
            [
                static::PARAM_ORDER => $this->getOrder(),
                static::PARAM_SORT => $this->getSort(),
            ]
        );
    }

}