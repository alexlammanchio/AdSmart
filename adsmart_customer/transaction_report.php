<div class="small-container cart-page" style='margin-bottom:10px;'>
	<div class="reg"  style ='height:800px; width: 800px;margin-bottom:100px;'>	
<?php
// 假设你使用的是PDO
$host = 'localhost';
$db   = 'adsmart';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// 饼图数据查询
$pieDataQuery = "SELECT COALESCE(IF(order_status = '', 'pending vendor to update', order_status), 'pending vendor to update') AS order_status, COUNT(*) as count FROM payment where cus_user_id ='$account_name' GROUP BY order_status";$pieDataStmt = $pdo->query($pieDataQuery);
$pieData = $pieDataStmt->fetchAll();
$pieJsonData = json_encode($pieData);



// 将数据编码为JSON供前端使用
$pieJsonData = json_encode($pieData);

?>

<div id="pieChartContainer" >
		<h1>Transaction Report - Order ticket status</h1>
        <canvas id="pieChart"></canvas>
    </div>
   
    <script>
        // 解析JSON数据
        var pieData = <?php echo $pieJsonData; ?>;
        

        // 创建饼图
       var pieCtx = document.getElementById("pieChart").getContext("2d");
var pieChart = new Chart(pieCtx, {
    type: "pie",
    data: {
        labels: pieData.map(item => item.order_status),
        datasets: [{
            label: "Amount",
            data: pieData.map(item => item.count),
            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#36A200", "#300200"]
        }]
    },
    options: {
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 20 // 设置标签的字体大小
                    }
                }
            }
        }
    }
});
     
     
    </script>
</div>
</div>