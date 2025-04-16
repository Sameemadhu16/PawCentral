<?php
require_once('stripe/init.php'); // path to the Stripe PHP SDK

\Stripe\Stripe::setApiKey('sk_test_51REdIxFTo4VHHbeOHSLcbBaXmJnCiM2rHqyrMVEwS9eksOVHTIXSfupIP8MTBn5KaEDQvdisKdF1nOHa1zwkbr3r00ZYAWN6PV'); // your secret test key

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'LKR',
            'product_data' => [
                'name' => 'PawCentral Helping Hands',
            ],
            'unit_amount' => 5000, // $50.00
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/PawCentral/public/',
    'cancel_url' => 'http://localhost/PawCentral/public/donationsnsupport',
]);

header("Location: " . $session->url);
exit();
