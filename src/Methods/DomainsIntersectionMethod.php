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

class DomainsIntersectionMethod extends AbstractApiMethod
{
    /**
     * @var array
     */
    protected $domains;

    /**
     * DomainInfoMethodQuery constructor.
     * @param array $domains
     * @param string $searchEngine
     */
    public function __construct($domains, $searchEngine = IApiClient::SE_GOOGLE_US)
    {
        $this->domains = $domains;

        parent::__construct(null, $searchEngine);
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

}