<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 07/01/2018
 * Time: 20:30
 */

function dateParse($date)
{
    // DD/MM/YYYY -> YYYY/MM/DD
    $dateArray = explode('/', $date);

    // [dd, mm, yyyy]
    $dateArray = array_reverse($dateArray);

    // [yyy, mm, dd]
    return implode('-', $dateArray);

}

function numberParse($number)
{
    // 1.000,00 to 1000.00
    $newNumber = str_replace('.', '',$number);
    $newNumber = str_replace(',', '.', $newNumber);
    return $newNumber;

}