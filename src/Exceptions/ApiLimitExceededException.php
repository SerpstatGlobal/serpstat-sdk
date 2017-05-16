<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 17:07
 */

namespace Serpstat\Sdk\Exceptions;


class ApiLimitExceededException extends ApiException
{
    protected $message = 'Tariff limits exceeded';
    protected $code = 402;
}