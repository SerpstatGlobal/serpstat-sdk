<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 17:14
 */

namespace Serpstat\Sdk\Exceptions;


class ApiFrequencyExceededException extends ApiException
{
    protected $message = 'Request frequency exceeded (increase the timeout between requests)';
    protected $code = 429;
}