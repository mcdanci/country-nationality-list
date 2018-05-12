<?php
/**
 * @copyright since 15:47 11/5/2018
 * @author <mc@dancis.info>
 * @link https://iso3166.thephpleague.com/using
 */

!defined('DIRECTORY_SEPARATOR') || define('DS', DIRECTORY_SEPARATOR);

require dirname(__DIR__) . DS . 'vendor' . DS . 'autoload.php';

//region Cases

function case_0()
{
    return new League\ISO3166\ISO3166;
}

/**
 * Lookup data by name.
 * @return array
 */
function case_1($name = 'Finland')
{
    return case_0()->name($name);
}

/**
 * Lookup data by alpha2 code.
 * @param string $alpha2
 * @return array
 */
function case_2($alpha2 = 'IR')
{
    return case_0()->alpha2($alpha2);
}

/**
 * Lookup data by alpha3 code.
 * @param string $alpha3
 * @return array
 */
function case_3($alpha3 = 'IRQ')
{
    return case_0()->alpha3($alpha3);
}

/**
 * Lookup data by numeric code.
 * @param int $numeric
 * @return array
 */
function case_4($numeric = 388)
{
    return case_0()->numeric((string)$numeric);
}

//endregion Cases

$action = include __DIR__ . DS . 'selection.php';
var_dump($action());
