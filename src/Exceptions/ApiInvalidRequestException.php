<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 17:05
 */

namespace Serpstat\Sdk\Exceptions;


class ApiInvalidRequestException extends ApiException
{
    protected $message = 'Invalid request';
    protected $code = 400;
}