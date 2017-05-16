<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 * Date: 07.04.2017
 * Time: 14:48
 */

namespace Serpstat\Sdk\Interfaces;


interface IApiClient
{
    const API_HOST = 'http://api.serpstat.com/v3';

    const SE_GOOGLE_RU = 'g_ru';
    const SE_GOOGLE_UA = 'g_ua';
    const SE_GOOGLE_BY = 'g_by';
    const SE_GOOGLE_BG = 'g_bg';
    const SE_GOOGLE_LV = 'g_lv';
    const SE_GOOGLE_LT = 'g_lt';
    const SE_GOOGLE_US = 'g_us';
    const SE_GOOGLE_UK = 'g_uk';
    const SE_GOOGLE_CA = 'g_ca';
    const SE_GOOGLE_AU = 'g_au';
    const SE_GOOGLE_ZA = 'g_za';
    const SE_GOOGLE_KZ = 'g_kz';

    const SE_YANDEX_MSK = 'y_213';
    const SE_YANDEX_SPB = 'y_2';
    const SE_YANDEX_UA = 'y_187';

    /**
     * @param IApiMethod $apiMethod
     * @param bool $resultToArray
     * @return IApiResponse
     */
    public function call(IApiMethod $apiMethod, $resultToArray = true);

}