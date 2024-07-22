 <?php

 require_once '../stripe/stripe-php/init.php';
 ?>
<!--  header -->
<?php





$stripe_secret_key = "sk_test_51PX4VQAOtzugZbMwCfDHwiTCXt5vviecP8sWE7yg2HWzrsHGsDNbeACJMlIqKaCMafxXOm4olfajvWGVWiRCdBzL00ZpEDJQFJ";
// Create a PaymentIntent
\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/adsmart/adsmart_content/success.php",    
    "cancel_url" => "http://localhost/adsmart/adsmart_content/checkout1.php", 
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 100,
                "product_data" => [
                    "name" => "T-shirt"
                ]
            ]
        ]
       
    ]
]);
http_response_code(303);
header("Location: " . $checkout_session->url);


    	?>

