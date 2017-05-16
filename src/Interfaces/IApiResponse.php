<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 07.04.2017
 * Time: 20:57
 */

namespace Serpstat\Sdk\Interfaces;


interface IApiResponse
{
    const RESPONSE_RESULT = 'result';
    const RESPONSE_STATUS_CODE = 'status_code';
    const RESPONSE_STATUS_MSG = 'status_msg';

    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @return string
     */
    public function getStatusMsg();

    /**
     * @return array|\stdClass
     */
    public function getResult();

    /**
     * @return string
     */
    public function __toString();

}