<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 16:05
 */

namespace Serpstat\Sdk\Methods\Traits;


trait MethodHasSearchEngineTrait
{
    /**
     * @var string
     */
    protected $searchEngine;

    /**
     * @return string
     */
    public function getSearchEngine()
    {
        return $this->searchEngine;
    }
}