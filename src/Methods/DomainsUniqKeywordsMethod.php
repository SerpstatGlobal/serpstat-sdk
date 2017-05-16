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

class DomainsUniqKeywordsMethod extends AbstractApiMethod
{
    const PARAM_EXCLUDE_DOMAINS = 'minus_domain';
    /**
     * @var array
     */
    protected $domains;

    /**
     * @var array
     */
    protected $excludeDomains;

    /**
     * DomainInfoMethodQuery constructor.
     * @param array $domains
     * @param array $excludeDomains
     * @param string $searchEngine
     */
    public function __construct($domains, $excludeDomains, $searchEngine = IApiClient::SE_GOOGLE_US)
    {
        $this->domains = $domains;
        $this->excludeDomains = $excludeDomains;

        parent::__construct(null, $searchEngine);
    }

    /**
     * @return array
     */
    public function getUrlQueryParamsArray()
    {
        return array_merge(
            parent::getUrlQueryParamsArray(),
            [
                static::PARAM_EXCLUDE_DOMAINS => implode(',', $this->excludeDomains),
            ]
        );
    }


    /**
     * @return string
     */
    public function getQuery()
    {
        return implode(',', $this->domains);
    }

    /**
     * @return array
     */
    public function getDomains()
    {
        return $this->domains;
    }

    /**
     * @param string $domain
     * @return $this
     */
    public function addDomain($domain)
    {
        $this->domains[] = $domain;
        return $this;
    }

    /**
     * @return array
     */
    public function getExcludeDomains()
    {
        return $this->excludeDomains;
    }

    /**
     * @param string $domain
     * @return $this
     */
    public function addExcludeDomain($domain)
    {
        $this->excludeDomains[] = $domain;
        return $this;
    }

}