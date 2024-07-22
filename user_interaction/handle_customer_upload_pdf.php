 <?php  include('../partials-front/after_customer_login_menu.php');?>
<!--  header -->
<?php 
    
if (isset($_POST["submit"])) {
    
    $id = $_POST['id'];
    $req_number = $_POST['req_number'];
    date_default_timezone_set('Asia/Hong_Kong');
    $created_time = date('Y-m-d H:i:s'); 
    // 检查是否有文件被上传且没有错误
    if(isset($_FILES['uploadedFile']['name'])){
        // 获取PDF文件的详细信息
        $filename =$_FILES['uploadedFile']['name'];
        
        // 检查文件是否存在
        if($filename !=""){
            // 文件存在
            $ext = end(explode('.',$filename));
            
            // 仅接受PDF文件
            if($ext != 'pdf'){
                $_SESSION['upload'] = "<div class='error'> Only PDF files are allowed. </div>";
                header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=3');
                exit();
            }
            
            // 重命名PDF文件
            $filename ="AdSmart_Customer_PDF".rand(000,999).'.'.$ext;
            
            $source_path = $_FILES['uploadedFile']['tmp_name'];
            $destination_path = "../pdf/customer/".$filename;
            
            // 上传文件
            $upload = move_uploaded_file($source_path, $destination_path);
            
            // 检查文件是否上传成功
            if($upload == false){
                $_SESSION['upload'] = "<div class='error'> Failed to Upload PDF file. <div>";
                header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=3');
                die();
            }
            
            // 获取文件大小和类型
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileType = $_FILES['uploadedFile']['type'];
            
            // 插入PDF文件的详细信息到数据库
            $sql = "Update quotation_content set cs_filename ='$filename', cs_size ='$fileSize', cs_type ='$fileType', cs_file_upload_date = '$created_time'
                    Where quotation_id = '$id' ";
            $res1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            
            // 根据结果重定向
            if($res1){
                $_SESSION['update'] = "<div style='color:green; font-size:28px;'> Upload PDF file successfully. </div>";
                header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=3');
            } else {
                $_SESSION['update'] = "<div style='color:red; font-size:28px;'> Failed to upload PDF file. </div>";
                header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=3');
            }
        }
    } else {
        // 文件上传失败或未选择文件
        $_SESSION['upload'] = "<div class='error'> Please select a PDF file to upload. </div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=3');
    }
}
    	       
    	    ?>
    		          
    
    	
    	
    	
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>