<?php  
include('../partials-front/after_company_login_menu.php');

// 检查是否为POST请求
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // 获取所有值
    $tran_id = $_POST['trans_id'];    	
    $item_name = $_POST['item_name1'];   	
    $company_user_id = $_POST['company_user_id1'];
    $status = $_POST['status2'];   	  
    if($status == 'no_receive' or $status=='completed'){
        date_default_timezone_set('Asia/Hong_Kong');
        $created_time = date('Y-m-d H:i:s'); 
        
    }
    // 更新数据库
    $sql2 = "UPDATE payment SET order_status = '$status', cs_update_time ='$created_time' WHERE company_user_id = '$company_user_id' AND item_name = '$item_name' AND transaction_id = '$tran_id'";

    // 执行查询
    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
    
    // 重定向到管理页面
    if ($res2) {
        $_SESSION['update'] = "<div style='color:green; font-size:28px;'> Payment status updated successfully. </div>";
        header('location:'.ADSMART_CUSTOMER.'Adsmart_order_info.php?trans_id='.$tran_id);
    } else {
        $_SESSION['update'] = "<div style='color:red; font-size:28px;'> Failed to update Payment status. </div>";
        header('location:'.ADSMART_CUSTOMER.'Adsmart_order_info.php?trans_id='.$tran_id);
    }
}
?>
<!--------------------- footer -------------->
<?php include('../partials-front/footer.php'); ?>