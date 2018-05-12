<?php
/**
 * @copyright since 15:47 11/5/2018
 * @author <mc@dancis.info>
 * @link https://iso3166.thephpleague.com/using
 */

!defined('DIRECTORY_SEPARATOR') || define('DS', DIRECTORY_SEPARATOR);
require dirname(__DIR__) . DS . 'vendor' . DS . 'autoload.php';
use \McDanci\ISO3166\ISO3166Nationality as Nationality;

//region Cases

/**
 * Lookup data by name.
 * @return array
 */
function case_1($name)
{
    $name = $name ?: 'Finland';
    return Nationality::getInstance()->name($name);
}

/**
 * Lookup data by alpha2 code.
 * @param string $alpha2
 * @return array
 */
function case_2($alpha2)
{
    $alpha2 = $alpha2 ?: 'IR';
    return Nationality::getInstance()->alpha2($alpha2);
}

/**
 * Lookup data by alpha3 code.
 * @param string $alpha3
 * @return array
 */
function case_3($alpha3)
{
    $alpha3 = $alpha3 ?: 'IRQ';
    return Nationality::getInstance()->alpha3($alpha3);
}

/**
 * Lookup data by numeric code.
 * @param int $numeric
 * @return array
 */
function case_4($numeric)
{
    $numeric = $numeric ?: 388;
    return Nationality::getInstance()->numeric((string)$numeric);
}

//endregion Cases

list($action, $arg) = include __DIR__ . DS . 'selection.php';
var_dump($action($arg));
