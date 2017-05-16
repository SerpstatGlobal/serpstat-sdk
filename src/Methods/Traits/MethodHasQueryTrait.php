<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 16:01
 */

namespace Serpstat\Sdk\Methods\Traits;


trait MethodHasQueryTrait
{
    /**
     * @var string
     */
    protected $query;

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

}