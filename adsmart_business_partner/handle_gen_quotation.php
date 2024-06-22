<?php  
ob_start(); // 开启输出缓冲区
include('../partials-front/after_company_login_menu.php');
?>
<div style="background:#1b0075">
    <?php  
    include('../partials-front/company_left_bar.php'); 
 
    ?>

    <div class='container-fluid'>
        <div class='reg' style='width: 1000px; margin-top:100px;'>
            <!-- -Cart Items Details -->
            <div class="small-container cart-page" style="width:800px;">
            <?php
            $id =$_GET['id'];
            $sql5 = "SELECT a.*, b.company_name,b.image_name
                     FROM quotation_content a
                     JOIN adsmart_business_partner b ON a.company_id = b.shop_code
                     WHERE a.quotation_id = '$id'";
            $result = $conn->query($sql5);
            
            // 检查查询结果
            if ($result->num_rows > 0) {
                // 创建 TCPDF 对象
                require "../vendor/tecnickcom/tcpdf/tcpdf.php";
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                
                // 设置文档信息
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('AdSmart Platform');
                $pdf->SetTitle('AdSmart Auto-Contract');
                $pdf->SetSubject('PDF Contract');
                $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
                
                // 设置页眉和页脚信息
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);
                
                // 设置默认字体
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                
                // 设置页面边距
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                
                // 添加一页
                $pdf->AddPage();
                
                // 设置字体
                $pdf->SetFont('helvetica', '', 12);
                
                // 初始化 HTML 内容
                $html = '';
                
                // 获取查询结果并生成 HTML 内容
                while ($row = $result->fetch_assoc()) {
                    $imageName = $row['image_name']; // 从数据源获取图片文件名
                    $imagePath = $_SERVER['DOCUMENT_ROOT'] . 'adsmart/images/company/' . $imageName;
                    $companyName = $row['company_name'];
                    $quotationDetail = "Quotation Detail";
                    $quotationNumber = $row['req_number'];
                    $quotationDate = $row['quotation_date'];
                    $validDay = $row['valid_day'];
                    $customerName = $row['customer_name'];
                    $subject = $row['subject'];
                    $price = $row['price'];
                    $item_summary = $row['Item_summary'];
                    $delivery_term = $row['delivery_terms'];
                    $delivery_time = $row['delivery_time'];
                    $company_email = $row['company_email'];
                    $customer_email =$row['customer_email'];
                    $create_date = $row['created_date'];
                    // 打印路径进行调试
                    echo "Image path: " . $imagePath . "<br>";
                    
                    // 确认文件是否存在
                    if (file_exists($imagePath)) {
                        echo "Image exists: " . $imagePath . "<br>";
                        
                        // 在 PDF 中插入图片
                        try {
                            // 参数包括：文件路径、位置 x、位置 y、宽度、高度等
                        } catch (Exception $e) {
                            echo 'Caught exception: ',  $e->getMessage(), "\n";
                        }
                    } else {
                        echo "Image does not exist: " . $imagePath . "<br>";
                        $html .= "<p style='color: red;'>Image not found: $imagePath</p>";
                    }
                    $pdf->Image($imagePath, 90, 10, 30, 30); 
                    $pdf->SetXY(50, 10); // 设置文本位置到 x = 50, y = 10
                    $pdf->SetFont('helvetica', 'B', 25); // 设置为粗体
                    $pdf->Cell(100, 60, $companyName, 0, 1, 'C'); // 在设置的位置插入公司名称，居中对齐
                    
                    $pdf->SetXY(10, 50); // 设置文本位置到 x = 10, y = 30
                    $pdf->SetFont('helvetica', 'B', 20); // 设置为粗体
                    $pdf->Cell(0, 10, $quotationDetail, 0, 1, 'R'); // 在设置的位置插入报价详情，右对齐
                    
                    $pdf->SetXY(10, 60); // 设置文本位置到 x = 10, y = 50
                    $pdf->SetFont('helvetica', 'B', 12); // 设置为粗体
                    $pdf->Cell(0, 10, "Quotation Number: " . $quotationNumber, 0, 1, 'R');
                    // 在设置的位置插入报价号，左对齐
                    $pdf->SetXY(10, 65); // 设置文本位置到 x = 10, y = 50
                    $pdf->SetFont('helvetica', 'B', 12); // 设置为粗体
                    $pdf->Cell(0, 10, "Quotation Created Date: " . $create_date, 0, 1, 'R');
                    
                    $pdf->SetXY(10, 72); // 设置文本位置到 x = 10, y = 60
                    $pdf->SetFont('helvetica', '', 12); // 恢复为常规字体
                    $pdf->Cell(0, 10, "Quotation Date: " . $quotationDate, 0, 1, 'R'); // 在设置的位置插入报价日期，左对齐
                    
                    $pdf->SetXY(10, 80); // 设置文本位置到 x = 10, y = 70
                    $pdf->SetFont('helvetica', '', 12); // 恢复为常规字体
                    $pdf->Cell(0, 10, "Quotation Valid for: " . $validDay, 0, 1, 'R'); // 在设置的位置插入报价有效期，左对齐
                    
                    $pdf->SetXY(10, 100); // 设置文本位置到 x = 10, y = 90
                    $pdf->SetFont('helvetica', 'B', 12); // 设置为粗体
                   
                    
                    $html .= '<table border="1" cellpadding="2">';
                    $html .= "<tr><th>Client</th><th>Subject</th></tr>";
                    $html .= "<tr><th>".$customerName."</th><th>".$subject."</th></tr>";
                    $html .= "</table>";
                    
                    // 根据需要添加更多字段
                }
                
                // 写入 PDF
                $pdf->writeHTML($html, true, false, true, false, '');
                
                // 添加多个文本域及其值
                $pdf->SetFont('helvetica', 'B', 18);
                $pdf->SetXY(10, 120);
                $pdf->Cell(0, 10, 'Item Summary:', 0, 1, 'L'); // 标签
                $pdf->Rect(10, 130, 190, 30); // 绘制矩形区域用于文本域
                $pdf->SetXY(10, 130); // 设置文本位置到矩形区域内
                $pdf->SetFont('helvetica', '', 12);
                $pdf->MultiCell(190, 30, $item_summary, 0, 'L', false, 1, '', '', true); // 填充值
               
                $pdf->SetXY(10, 165); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', 'B', 20); // 设置为粗体
                $pdf->Cell(0, 10,'Total Price:$'. $price, 0, 1, 'R'); // 在设置的位置插入报价详情，右对齐
                
                $pdf->SetXY(10, 180);
                $pdf->SetFont('helvetica', 'B', 20); // 设置为粗体
                $pdf->Cell(0, 10, 'Delivery Term:', 0, 1, 'L'); // 标签
                $pdf->Rect(10, 190, 190, 30); // 绘制第二个矩形区域用于文本域
                $pdf->SetXY(10, 190); // 设置文本位置到矩形区域内
                $pdf->SetFont('helvetica', '', 12);
                $pdf->MultiCell(190, 30, $delivery_term, 0, 'L', false, 1, '', '', true);
               
                $pdf->SetXY(10, 220);
                $pdf->SetFont('helvetica', 'B', 16);
                $pdf->Cell(0, 10, 'Delivery Time:', 0, 1, 'L'); // 标签
                
                $pdf->SetXY(50, 220);
                $pdf->SetFont('helvetica', '', 14);
                $pdf->Cell(0, 10, $delivery_time, 0, 1, 'L'); // 标签
                
                $pdf->SetXY(10, 230); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', 'B', 16); // 设置为粗体
                $pdf->Cell(0, 10, 'AdSmart Business Partner:', 0, 1, 'L'); // 在设置的位置插入报价详情，右对齐
                
                $pdf->SetXY(10, 240); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', '', 12); // 设置为粗体
                $pdf->Cell(0, 10, 'Company Name:'.$companyName, 0, 1, 'L'); // 在设置的位置插入报价详情，右对齐
                
                $pdf->SetXY(10, 250); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', '', 12); // 设置为粗体
                $pdf->Cell(0, 10, 'Contact Email:'.$company_email, 0, 1, 'L'); 
                
                $pdf->SetXY(10, 260); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', '', 12); // 设置为粗体
                $pdf->Cell(0, 0, 'Signoff Area:', 0, 1, 'L'); // 标签
                $pdf->Rect(10, 270, 80, 20); // 绘制第二个矩形区域用于文本域// 在设置的位置插入报价详情，右对齐
                $pdf->SetXY(40, 260); // 设置文本位置到矩形区域内
                $pdf->SetFont('helvetica', '', 12);
                $pdf->MultiCell(260, 0, 'Date:_______________', 0, 'L', false, 1, '', '', true);
                
                $pdf->SetXY(10, 230); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', 'B', 16); // 设置为粗体
                $pdf->Cell(0, 10, 'AdSmart Customer:', 0, 1, 'R'); // 在设置的位置插入报价详情，右对齐
                
                $pdf->SetXY(10, 240); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', '', 12); // 设置为粗体
                $pdf->Cell(0, 10, 'Customer Name:'.$customerName, 0, 1, 'R'); // 在设置的位置插入报价详情，右对齐
                
                $pdf->SetXY(10, 250); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', '', 12); // 设置为粗体
                $pdf->Cell(0, 10, 'Customer Email:'.$customer_email, 0, 1, 'R');
                
                $pdf->SetXY(10, 260); // 设置文本位置到 x = 10, y = 30
                $pdf->SetFont('helvetica', '', 12); // 设置为粗体  
                $pdf->Cell(130, 0, 'Signoff Area:', 0, 1, 'R');
                $pdf->Rect(115, 270, 80, 20); // 绘制第二个矩形区域用于文本域// 在设置的位置插入报价详情，右对齐
                $pdf->SetXY(40, 260); // 设置文本位置到矩形区域内
                $pdf->SetFont('helvetica', '', 12);
                $pdf->MultiCell(0, 0, 'Date:_______________', 0, 'R', false, 1, '', '', true);
                // 关闭并输出 PDF 文档
                ob_end_clean(); // 清空并
                $pdf->Output('example.pdf', 'I');
            } else {
                echo "没有找到数据";
            }
            
            // 关闭数据库连接
            $conn->close();
                ?>
            </div>
        </div>
    </div>
</div>

<!--------------------- footer -------------->

<?php  
include('../partials-front/footer.php');
?>