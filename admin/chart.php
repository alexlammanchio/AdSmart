<!DOCTYPE html>
<html>
<head>
    <title>Chart.js Example</title>
     <style>
     #pieChartContainer, #barChartContainer {
            width: 800px;
            height: 800px;
           margin-left:400px;;
            padding-top:100px;
        }
     </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php  include('partials/menu.php')?>
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
$pieDataQuery = "SELECT COALESCE(IF(order_status = '', 'pending vendor to update', order_status), 'pending vendor to update') AS order_status, COUNT(*) as count FROM payment GROUP BY order_status";$pieDataStmt = $pdo->query($pieDataQuery);
$pieData = $pieDataStmt->fetchAll();
$pieJsonData = json_encode($pieData);

// 饼图数据查询
$pieDataQuery2 = "SELECT  'adsmart_customer' AS table_name, COUNT(*) as record_count FROM adsmart_customer
UNION ALL
SELECT 'adsmart_business_partner' AS table_name, COUNT(*) AS record_count
FROM adsmart_business_partner
UNION ALL
SELECT 'adsmart_admin' AS table_name, COUNT(*) AS record_count
FROM adsmart_admin;
";$pieDataStmt2 = $pdo->query($pieDataQuery2);
$pieData2 = $pieDataStmt2->fetchAll();
$pieJsonData2 = json_encode($pieData2);


// bar chart
$barDataQuery = "SELECT  cus_address as country, sum(total) as total_amount from payment  where company_user_id ='abccompany' group by cus_address ;
";$barDataStmt = $pdo->query($barDataQuery);
$barData = $barDataStmt->fetchAll();
$barJsonData = json_encode($barData);

// bar chart
$barDataQuery2 = "SELECT  month(created_day) as month, sum(total) as total_amount from payment  where company_user_id ='abccompany' group by month(created_day) ;
";$barDataStmt2 = $pdo->query($barDataQuery2);
$barData2 = $barDataStmt2->fetchAll();
$barJsonData2 = json_encode($barData2);

// bar chart
$barDataQuery3 = "SELECT  item_name, sum(total) as total_amount from payment a join adsmart_business_product b on a.item_name = b.product_name  where a.company_user_id ='abccompany' group by a.item_name;
";$barDataStmt3 = $pdo->query($barDataQuery3);
$barData3 = $barDataStmt3->fetchAll();
$barJsonData3 = json_encode($barData3);
// 将数据编码为JSON供前端使用
$pieJsonData = json_encode($pieData);
$pieJsonData2 = json_encode($pieData2);
$barJsonData = json_encode($barData);
$barJsonData2 = json_encode($barData2);
$barJsonData3 = json_encode($barData3);
?>

<div id="pieChartContainer">
		<h1>Order Status</h1>
        <canvas id="pieChart"></canvas>
    </div>
    <div id="pieChartContainer">
    <h1>AdSmart User Registration</h1>
        <canvas id="pieChart2"></canvas>
    </div>
<div id="barChartContainer">
    <h1>Revenus From Customer's country</h1>
        <canvas id="barChart"></canvas>
    </div>
    
    <div id="barChartContainer">
    <h1>Revenus By Month</h1>
        <canvas id="barChart2"></canvas>
    </div>
    
    <div id="barChartContainer">
    <h1>Revenus By Product</h1>
        <canvas id="barChart3"></canvas>
    </div>
    <script>
        // 解析JSON数据
        var pieData = <?php echo $pieJsonData; ?>;
        var pieData2 = <?php echo $pieJsonData2; ?>;

        // 创建饼图
        var pieCtx = document.getElementById("pieChart").getContext("2d");    
        var pieChart = new Chart(pieCtx, {
            type: "pie",
            data: {
                labels: pieData.map(item => item.order_status),
                datasets: [{
                	label: "Amount",
                    data: pieData.map(item => item.count),
                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56","#36A200","#300200"]
                }]
            }	
            
        });
     
        // 创建折线图
        var pieCtx = document.getElementById("pieChart2").getContext("2d");    
        var pieChart2 = new Chart(pieCtx, {
            type: "pie",
            data: {
                labels: pieData2.map(item => item.table_name),
                datasets: [{
                	label: "Amount",
                    data: pieData2.map(item => item.record_count),
                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
                }]
            }	
            
        });

     // 获取柱状图数据
        var barData = <?php echo $barJsonData; ?>;

        // 提取标签和数值
        var labels = barData.map(function(item) {
            return item.country;
        });
        var values = barData.map(function(item) {
            return item.total_amount;
        });

        // 创建柱状图
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Revenus',
                    data: values,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)', // 第一个柱的颜色
                        'rgba(192, 75, 192, 0.6)', // 第二个柱的颜色
                        'rgba(192, 192, 75, 0.6)', // 第三个柱的颜色
                        // 可以根据需要添加更多的颜色
                    ], // 设置柱状图颜色
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // 获取柱状图数据
        var barData2 = <?php echo $barJsonData2; ?>;

        // 提取标签和数值
        var labels = barData2.map(function(item) {
            return item.month;
        });
        var values = barData2.map(function(item) {
            return item.total_amount;
        });

        // 创建柱状图
        var ctx = document.getElementById('barChart2').getContext('2d');
        var barChart2 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Revenus',
                    data: values,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)', // 第一个柱的颜色
                        'rgba(192, 75, 192, 0.6)', // 第二个柱的颜色
                        'rgba(192, 192, 75, 0.6)', // 第三个柱的颜色
                        // 可以根据需要添加更多的颜色
                    ], // 设置柱状图颜色
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
     // 获取柱状图数据
        var barData3 = <?php echo $barJsonData3; ?>;

        // 提取标签和数值
        var labels = barData3.map(function(item) {
            return item.item_name;
        });
        var values = barData3.map(function(item) {
            return item.total_amount;
        });
        // 创建柱状图
        var ctx = document.getElementById('barChart3').getContext('2d');
        var barChart2 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Revenus',
                    data: values,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)', // 第一个柱的颜色
                        'rgba(192, 75, 192, 0.6)', // 第二个柱的颜色
                        'rgba(192, 192, 75, 0.6)', // 第三个柱的颜色
                        // 可以根据需要添加更多的颜色
                    ], // 设置柱状图颜色
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>