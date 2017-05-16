<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 17:11
 */

namespace Serpstat\Sdk\Exceptions;


class ApiAccessErrorException extends ApiException
{
    protected $message = 'Authorization problems (wrong token, forbidden action or user blocked)';
    protected $code = 403;
}