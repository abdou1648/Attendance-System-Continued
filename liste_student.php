<?php
require 'db_connect.php';

$stmt = $pdo->query("SELECT * FROM students ORDER BY fullname");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($students);