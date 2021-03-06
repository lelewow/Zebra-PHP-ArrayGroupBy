<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 15-1-21
 * Time: 下午10:07
 */

require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$records = array(
    array(
        "state" => "IN",
        "city" => "Indianapolis",
        "object" => "School bus"
    ),
    array(
        "state" => "IN",
        "city" => "Indianapolis",
        "object" => "Manhole"
    ),
    array(
        "state" => "IN",
        "city" => "Plainfield",
        "object" => "Basketball"
    ),
    array(
        "state" => "CA",
        "city" => "San Diego",
        "object" => "Light bulb"
    ),
    array(
        "state" => "CA",
        "city" => "Mountain View",
        "object" => "Space pen"
    )
);

$group_by_fields = [
    'state' => function($value){
            return substr($value, 0, 1);
        }
];

$group_by_value = [
    'state', 'object',
    'city' => function($value){
            return count($value);
        }
];

$grouped = \Jenner\Zebra\ArrayGroupBy::groupBy($records, $group_by_fields, $group_by_value);
print_r($grouped);
