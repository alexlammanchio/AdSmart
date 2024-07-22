 <?php  include('../partials-front/after_customer_login_menu.php');?>
<!--  header -->

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if the file ID is set as a query parameter
if (isset($_GET['id'])) {
    // Get the file ID
    $file_id = $_GET['id'];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT cs_filename FROM quotation_content WHERE quotation_id = ?");
    $stmt->bind_param("i", $file_id);
    $stmt->execute();
    $res1 = $stmt->get_result();
    $row1 = $res1->fetch_assoc();
    
    if ($row1) {
        // Specify the correct path to the file
        $filepath = '../pdf/customer/'.$row1['cs_filename']; // Fixed to use 'bp_filename'
        
        // Check if the file exists
        if (file_exists($filepath)) {
            // Set headers to trigger the download
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: '.filesize($filepath));
            ob_clean();
            flush(); // Flush system output buffer
            
            // Read the file and send it to the output buffer
            readfile($filepath);
            
            exit;
        } else {
            // The file does not exist
            $_SESSION['message'] = 'Full signoff File not found';
            header('location:'.USER_INTERACTION."Adsmart_customers_download_quotation.php?id=".$file_id);
            exit;
        }
    } else {
        // No record found in the database
        $_SESSION['message'] = 'No full signoff record found';
        header('location:'.USER_INTERACTION."Adsmart_customers_download_quotation.php?id=".$file_id);
        exit;
    }
} else {
    // No file ID provided
    $_SESSION['message'] = 'No full signoff file specified';
    header('location:'.USER_INTERACTION."Adsmart_customers_download_quotation.php?id=".$file_id);
    exit;
}
?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>