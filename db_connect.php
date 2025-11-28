<?php
require 'config.php';

try {
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    // echo "Connection successful"; // 
} catch (PDOException $e) {
    file_put_contents('db_errors.log', $e->getMessage()."\n", FILE_APPEND);
    die("Connection failed: " . $e->getMessage());
}