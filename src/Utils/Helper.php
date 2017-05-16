<?php
/**
 * @author Doctor <doctor.netpeak@gmail.com>
 *
 *
 * Date: 08.04.2017
 * Time: 19:25
 */

namespace Serpstat\Sdk\Utils;


class Helper
{
    /**
     * Transform CamelCaseString to snake_case_string
     *
     * @param string $string
     * @return string
     */
    public static function camelCaseToSnakeCase($string)
    {
        return mb_strtolower(preg_replace('/(?<!^)([A-Z]|\d+)/', '_$0', (string)$string));
    }

    /**
     * Get class name without namespace from object
     *
     * @param object $object
     * @return string
     */
    public static function getShortClassNameByObject($object)
    {
        $className = null;
        if (is_object($object)) {
            $classPath = explode('\\', get_class($object));
            $className = end($classPath);
        }
        return $className;
    }
}