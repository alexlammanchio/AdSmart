 <?php  include('../partials-front/after_customer_login_menu.php');?>
 

<div style="background:#1b0075">
   <?php  include('../partials-front/customer_left_bar.php');?>
  
    <div class="container-fluid" id="content">  
    	
           <?php  
        // 根据传递的菜单项ID，显示相应的内容  
        if (isset($_GET['page'])) {  
            $menuItemId = $_GET['page'];  
            if ($menuItemId === '1') {  
                include('Adsmart_customers_dashboard.php'); 
            }elseif ($menuItemId === '2') {
                include('Adsmart_customers_create_quotation.php');
            }
            elseif ($menuItemId === '3') {  
                include('Adsmart_customers_quotation_status.php'); 
            } elseif ($menuItemId === '4') {  
                include('Adsmart_customers_recommandation.php');
            }  elseif ($menuItemId === '5') {
                include('Adsmart_order.php');
            }  
            elseif ($menuItemId === '6') {
                include('Adsmart_customers_profile.php');
            }  
            elseif ($menuItemId === '7') {
                include('Adsmart_order_inprogress.php');
            }  
            elseif ($menuItemId === '8') {
                include('Adsmart_checkout_item.php');
            }   elseif ($menuItemId === '9') {
                include('transaction_report.php');
            }
            elseif ($menuItemId === '10') {
                include('spend_report.php');
            }
            elseif ($menuItemId === '11') {
                include('product_type_report.php');
            }  
            
        }  else{
            
            include('Adsmart_customers_dashboard.php'); 
        }
        ?>  
        
    </div>  
</div>




<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>