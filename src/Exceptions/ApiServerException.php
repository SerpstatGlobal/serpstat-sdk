<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 22:31
 */

namespace Serpstat\Sdk\Exceptions;


class ApiServerException extends ApiException
{
    protected $message = 'Server error';
    protected $code = 500;
}