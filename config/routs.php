<?php


return [
    [
        'pattern' => 'catalog/<brand_id>/<model_id>/<filters>',
        'route' => 'catalog/index',
        'defaults' => ['brand_id'=>'','model_id' => '', 'filters' => '']
    ],
//    [
//        'pattern' => 'catalog/<brand_id>/<filters>',
//        'route' => 'catalog/brand',
//        'defaults' => ['filters' => '']
//    ],
//    [
//        'pattern' => 'catalog/<filters>',
//        'route' => 'catalog/index',
//        'defaults' => ['filters' => '']
//    ],
//
    [
        'pattern' => 'car/catalog',
        'route' => 'car/catalog/index',
        //'defaults' => ['filters' => '']
    ],
];