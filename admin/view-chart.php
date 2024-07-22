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
$pieDataQuery = "SELECT order_status, COUNT(*) as count FROM payment GROUP BY order_status";
$pieDataStmt = $pdo->query($pieDataQuery);
$pieData = $pieDataStmt->fetchAll();

// 折线图数据查询（假设按日期分组）
$lineDataQuery = "SELECT create_datetime, customer_name FROM qoutation ORDER BY create_datetime";
$lineDataStmt = $pdo->query($lineDataQuery);
$lineData = $lineDataStmt->fetchAll();

// 将数据编码为JSON供前端使用
$pieJsonData = json_encode($pieData);
$lineJsonData = json_encode($lineData);
?>