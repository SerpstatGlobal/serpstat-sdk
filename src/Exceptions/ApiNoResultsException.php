<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 17:12
 */

namespace Serpstat\Sdk\Exceptions;


class ApiNoResultsException extends ApiException
{
    protected $message = 'No results';
    protected $code = 404;
}