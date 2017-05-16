<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 10.04.2017
 * Time: 9:22
 */

namespace Serpstat\Sdk\Exceptions;


class InvalidParamException extends \Exception
{
    protected $message = 'Invalid parameter';
    protected $code = 500;
}