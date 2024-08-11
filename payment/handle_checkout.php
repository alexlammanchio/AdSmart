 <?php  session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}
require_once '../stripe/stripe-php/init.php';
 ?>
<!--  header -->
<?php 
IF(isset($_POST['submit'])){
    
    // get all value
    $req_number = $_POST['req_number'];
    $cus_card_name = $_POST['cus_card_name'];
    $card_number=$_POST['card_number'];
    $shopIds = $_POST['shop_id'];
    $cvv=$_POST['cvv'];
    $card_expiry_date=$_POST['card_expiry_date'];
    $cus_user_id=$_POST['cus_user_id'];
    $email = $_POST['email'];
    $contact_number=$_POST['contact_number'];
    $cus_user_id=$_POST['cus_user_id'];
    $item_name=$_POST['item_name'];
    
    if(isset($_POST['quantity'])){
        $quantity=$_POST['quantity'];}
        else{
            $quantity= '1';
            
        }
        
        $price=$_POST['price'];
        if(isset($_POST['total'])){
            $total=$_POST['total'];
        }else{
            $total=$_POST['price'];
        }
        
        $company_user_id=$_POST['company_user_id'];
        $transaction_id=$_POST['transaction_id'];
        $cus_address=$_POST['cus_address'];
        date_default_timezone_set('Asia/Hong_Kong');
        $created_dt = date('Y-m-d H:i:s');
        
        //updating new image if selected
        
        
        $sql2 = "INSERT INTO payment
    (cus_user_id, cus_email, cus_address, item_name, quantity,price, total, created_day, company_user_id, transaction_id, req_number, cus_card_name, card_expiry_date, card_number, cus_contact, cvv)
    VALUES ('$cus_user_id','$email','$cus_address','$item_name','$quantity','$price','$total','$created_dt','$company_user_id','$transaction_id','$req_number','$cus_card_name','$card_expiry_date','$card_number','$contact_number','$cvv')";
        //execute the query
        $res2 = mysqli_query($conn, $sql2);
        
        $stripe_secret_key = "sk_test_51PX4VQAOtzugZbMwCfDHwiTCXt5vviecP8sWE7yg2HWzrsHGsDNbeACJMlIqKaCMafxXOm4olfajvWGVWiRCdBzL00ZpEDJQFJ";
        // Create a PaymentIntent
        \Stripe\Stripe::setApiKey($stripe_secret_key);
        $item_total = $price * $quantity; // 计算每个商品的总价格
        $tax = $item_total * 0.01; // 假设税金为1%
        $additional_fee = $item_total * 0.1; // 额外费用为10%
        
        // 总金额需要包括税金和额外费用
        $item_total_including_extras = $item_total + $tax + $additional_fee;
        
        // 转换为美分
        $item_total_cents = $item_total_including_extras * 100;
        
        // 累加到总金额中
        $total_amount += $item_total_cents;
        $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "http://localhost/adsmart/user_management/Adsmart_customers_personal_space.php?page=7",
            "cancel_url" => "http://localhost/adsmart/user_interaction/cart.php",
            "locale" => "auto",
            "line_items" => [
                [
                    "quantity" => $quantity,
                    "price_data" => [
                        "currency" => "hkd",
                        "unit_amount" => $item_total_cents,
                        "product_data" => [
                            "name" => $item_name
                        ]
                    ]
                ]
                
            ]
        ]);
        http_response_code(303);
        header("Location: " . $checkout_session->url);
        
        // 执行查询
        
        //redirect to manage
        if($res2==true){
            
            $_SESSION['update'] ="<div style='color:green; font-size:28px;'> Payment has been checked successfully. </div>";
            header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=7');
        }else{
            
            $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to checkout the item. </div>";
            header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=7');
            
        }
}



    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>
