<?php

require '../vendor/autoload.php';

$payment = new \FiratOzpinar\Paywant\Payment('api_key', 'secret_key');
$payment->setCustomer([
    'id'    => 25,
    'name'  => 'Firat Ozpinar',
    'email' => 'firatozpinar@gmail.com',
    'ip'    => '127.0.0.0'
]);
$payment->setOrder([
    'id'      => 'L12D85KTR',
    'gateway' => \FiratOzpinar\Paywant\Gateway::CARD,
    'total'   => 2578.10,
    'amount'  => 2000.10,
    'extra'   => null

]);
$payment->setProducts([
    [
        'name'           => 'Pika',
        'amount'         => 400.00,
        'commissionType' => 1,
        'extraData'      => null
    ],
    [
        'name'           => 'Pika 2',
        'amount'         => 600.00,
        'commissionType' => 1,
        'extraData'      => null
    ]
]);

$response = $payment->create();

dd($response);