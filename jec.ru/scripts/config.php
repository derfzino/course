<?php
$host = "localhost";
$db = "course";
$user = "root";
$pass = ""; 

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Подключено к базе данных";
} catch (PDOException $e) {
    die("Подключение не удалось: " . $e->getMessage());
}
?>
