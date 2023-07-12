<?php

use App\Models\order_type;
use App\Models\Promo;

foreach (Promo::all() as $promo) {
    $promoArr['name'][] = $promo->name;
    $promoArr['amount'][] = $promo->amount;
}

foreach (Order_type::all() as $type) {
    $typeArr['name'][] = $type->name;
    $typeArr['amount'][] = $type->amount;
}


$promo20 = new \Darryldecode\Cart\CartCondition(array(
    'name' => $promoArr['name'][0],
    'type' => 'promo',
    'target' => 'subtotal',
    'value' => '-'.$promoArr['amount'][0],
));

$promo30 = new \Darryldecode\Cart\CartCondition(array(
    'name' => $promoArr['name'][1],
    'type' => 'promo',
    'target' => 'subtotal',
    'value' => '-'.$promoArr['amount'][1],
));

$promo50 = new \Darryldecode\Cart\CartCondition(array(
    'name' => $promoArr['name'][2],
    'type' => 'promo',
    'target' => 'subtotal',
    'value' => '-'.$promoArr['amount'][2],
));

$tDine = new \Darryldecode\Cart\CartCondition(array(
    'name' => $typeArr['name'][0],
    'type' => 'order-type',
    'target' => 'subtotal',
    'value' => '+'.$typeArr['amount'][0],
));


$tTake = new \Darryldecode\Cart\CartCondition(array(
    'name' => $typeArr['name'][1],
    'type' => 'order-type',
    'target' => 'subtotal',
    'value' => '+'.$typeArr['amount'][1],
));

$tDeliv = new \Darryldecode\Cart\CartCondition(array(
    'name' => $typeArr['name'][2],
    'type' => 'order-type',
    'target' => 'subtotal',
    'value' => '+'.$typeArr['amount'][2],
));
