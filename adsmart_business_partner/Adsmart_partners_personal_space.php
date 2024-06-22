 <?php  include('../partials-front/after_company_login_menu.php');?>

 
  
  <div style="background:#1b0075">
  <?php  include('../partials-front/company_left_bar.php');?>
 
  
    <div class="container-fluid" id="content" >  
    	
     
        <?php  
        // 根据传递的菜单项ID，显示相应的内容  
        if (isset($_GET['page'])) {  
            $menuItemId = $_GET['page'];  
            if ($menuItemId === '1') {  
                include('Adsmart_partners_dashboard.php'); 
            }if ($menuItemId === '6') {
                include('Adsmart_partner_profile.php');
            } 
            
            elseif ($menuItemId === '4') {  
                include('Adsmart_partners_product_management.php'); 
            } elseif ($menuItemId === '2') {
                include('Adsmart_partners_bid_quotation.php');
            }
            elseif ($menuItemId === '3') {
                include('Adsmart_partners_quotation_status.php');
            } elseif ($menuItemId === '7') {
                include('Adsmart_partners_explore_requirement.php');
            } 
            
            elseif ($menuItemId === '5') {
                include('Adsmart_partners_completed_order.php');
            }   elseif ($menuItemId === '8') {
                include('Adsmart_partners_order_inprogress.php');
            }elseif ($menuItemId === '9') {
                include('Adsmart_partners_check_quotation_items.php');
            }elseif ($menuItemId === '10') {
                include('transaction_report.php');
            }elseif ($menuItemId === '11') {
                include('revenues_report.php');
            }elseif ($menuItemId === '12') {
                include('product_type_report.php');
            }
            
            
        }  else{
            
            include('Adsmart_partners_dashboard.php'); 
        }
        ?>  
    </div>  
</div>




<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>