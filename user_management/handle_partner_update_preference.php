 <?php  include('../partials-front/after_company_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    $id = $_POST['id'];    	    	   	
    	    $print_ads=$_POST['print_ads'];
    	    $broadcast_ads=$_POST['broadcast_ads'];
    	    $outdoor_ads=$_POST['outdoor_ads'];
    	    $telemarketing_ads=$_POST['telemarketing_ads'];
    	    $events_ads=$_POST['events_ads'];
    	    $placement_ads=$_POST['placement_ads'];
    	    $display_ads=$_POST['display_ads'];
    	    $search_ads=$_POST['search_ads'];
    	    $social_ads=$_POST['social_ads'];
    	    $video_ads=$_POST['video_ads'];
    	    $native_ads=$_POST['native_ads'];
    	    $influencer_ads=$_POST['influencer_ads'];   	
    	    
    	    
    	    //update the db
    	    $sql2 ="UPDATE adsmart_business_partner SET
                   
                     
                                 
                   print_ads= '$print_ads',
                    outdoor_ads= '$outdoor_ads',
                    broadcast_ads= '$broadcast_ads',
                    telemarketing_ads= '$telemarketing_ads',
                   events_ads ='$events_ads',
                    placement_ads= '$placement_ads',
                    display_ads= '$display_ads',
                    search_ads ='$search_ads',
                    social_ads= '$social_ads',
                    video_ads= '$video_ads',
                    native_ads= '$native_ads',
                    influencer_ads= '$influencer_ads'                  
                  
                    WHERE shop_code =$id
                
                    ";
    		          
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> Service & Product Types updated successfully. </div>";
    	        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=6');
    	    }else{
    	        
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to update Service & Product Types. </div>";
    	        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=6');
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>