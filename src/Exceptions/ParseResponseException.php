<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 22:31
 */

namespace Serpstat\Sdk\Exceptions;


class ParseResponseException extends \Exception
{
    protected $message = 'Unable to parse response';
    protected $code = 500;
}