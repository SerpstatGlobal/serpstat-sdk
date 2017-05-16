<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 15:44
 */

namespace Serpstat\Sdk\Methods;


use Serpstat\Sdk\Interfaces\IApiClient;

class RelatedKeywordsMethod extends AbstractApiMethod
{
    const WEIGHT_MIN = 1;
    const WEIGHT_MAX = 20;
    const WEIGHT_DEFAULT = 5;

    const PARAM_WEIGHT = 'weight';
    /**
     * @var int
     */
    protected $weight;

    /**
     * DomainInfoMethodQuery constructor.
     * @param string $query
     * @param int $weight
     * @param string $searchEngine
     * @internal param array $domains
     */
    public function __construct($query, $weight = RelatedKeywordsMethod::WEIGHT_DEFAULT, $searchEngine = IApiClient::SE_GOOGLE_US)
    {
        $this->weight = $weight;
        parent::__construct($query, $searchEngine);
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return $this
     */
    protected function setWeight($weight)
    {
        $weight = (int)$weight;
        if ($weight < static::WEIGHT_MIN) {
            $weight = static::WEIGHT_MIN;
        } elseif ($weight > static::WEIGHT_MAX) {
            $weight = static::WEIGHT_MAX;
        }
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return array
     */
    public function getUrlQueryParamsArray()
    {
        return array_merge(
            parent::getUrlQueryParamsArray(),
            [
                static::PARAM_WEIGHT => $this->getWeight(),
            ]
        );
    }

}