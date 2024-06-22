<div class="small-container cart-page">
	<div class="reg"  style ='height:800px; width: 800px;margin-bottom:150px;'>	
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

// bar chart
$barDataQuery = "SELECT  COALESCE(IF(quantity  = '0', 'Advertisement Service', 'Product Service')) as service, sum(total) as total_amount from payment  where cus_user_id ='$account_name' group by quantity ;
";$barDataStmt = $pdo->query($barDataQuery);
$barData = $barDataStmt->fetchAll();
$barJsonData = json_encode($barData);

// bar chart
$barDataQuery2 = "SELECT  month(created_day) as month, sum(total) as total_amount from payment  where cus_user_id ='$account_name' group by month(created_day) ;
";$barDataStmt2 = $pdo->query($barDataQuery2);
$barData2 = $barDataStmt2->fetchAll();
$barJsonData2 = json_encode($barData2);

// 将数据编码为JSON供前端使用
$barJsonData = json_encode($barData);
$barJsonData2 = json_encode($barData2);

?>

<div id="barChartContainer">
    <h1>Spend From Advertisement Type</h1>
        <canvas id="barChart"></canvas>
    </div>
    
    <div id="barChartContainer">
    <h1>Spend By Month</h1>
        <canvas id="barChart2"></canvas>
    </div>
    
   
    <script>
    // 获取柱状图数据
    var barData = <?php echo $barJsonData; ?>;

    // 提取标签和数值
    var labels = barData.map(function(item) {
        return item.service;
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
                label: 'Total Spend',
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
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y.toFixed(2); // 设置数据标签的字体大小
                            }
                            return label;
                        }
                    }
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
                label: 'Total Spend',
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
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y.toFixed(2); // 设置数据标签的字体大小
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
     
    </script>
</div>
</div>