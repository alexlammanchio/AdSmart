
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

?>
	   <!-- Main content Section Starts -->
	   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<h1>DASHBARD</h1>
			
			<br>
			<br>
			<?php 
    			if(isset($_SESSION['login']))
    			{
    			    
    			    echo $_SESSION['login'];
    			    unset($_SESSION['login']); //removing seesion
    			}
    			?>
    			<br>
    			
    			<div class="small-container">
				<div class="row">
				
    			<div class="col-3" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Order (Completed)</p>
				<br>
				<br>
			<hr>
    				<?php 
    				
    				
    				//sql query
    				$sql = "SELECT * FROM payment where order_status ='completed'";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$count = mysqli_num_rows($res);
    				
    				?>
    				
    				<h1><?php echo $count; ?></h1>
    				
    				
    			</div>
    		<div class="col-3" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Commission (Received) <a href="<?php echo ADMIN; ?>admin/business_partner_detail.php"  style="background:#00F; color:#FFF;"> Detail </a> </p>
				
				<br>
				<br>
			<hr>
    				<?php 
    				
    				
    				//sql query
    				$sql = "SELECT ROUND((SUM(total) / 1.11)*0.1, 2) as commission FROM payment where order_status ='completed'";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$rows=mysqli_fetch_assoc($res);
    				$commission = $rows['commission'];
    				?>
    				
    				<h1><?php echo '$'.$commission; ?></h1>
    				
    			</div>    							
			
    			
    		<div class="col-3" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Category</p>
				<br>
				<br>
			<hr>
    				<?php 
    				
    				
    				//sql query
    				$sql = "SELECT * FROM adsmart_category";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$count = mysqli_num_rows($res);
    				
    				?>
    				
    				<h1><?php echo $count; ?></h1>
    				
    				
    			</div>
    		 <div id="pieChartContainer" style="padding-bottom:100px;">
    <h1>AdSmart User Registration</h1>
        <canvas id="pieChart2"></canvas>
    </div>
	</div>
			</div>
		
	    <!-- Main content Section Ends -->
	   
<script>
var pieData2 = <?php echo $pieJsonData2; ?>;
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
</script>
	    
	   <?php include('partials/footer.php')?>
