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
$barDataQuery3 = "SELECT  item_name, sum(total) as total_amount from payment a join adsmart_business_product b on a.item_name = b.product_name  where a.cus_user_id ='$account_name' group by a.item_name;
";$barDataStmt3 = $pdo->query($barDataQuery3);
$barData3 = $barDataStmt3->fetchAll();
$barJsonData3 = json_encode($barData3);
// 将数据编码为JSON供前端使用
$barJsonData3 = json_encode($barData3);

?>

<div id="barChartContainer">
    <h1>Spend By Product</h1>
        <canvas id="barChart3"></canvas>
    </div>
   
    <script>
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