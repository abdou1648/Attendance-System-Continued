<?php
require 'db_connect.php';

$id = $_POST['id'];

$stmt = $pdo->prepare("DELETE FROM students WHERE id=?");
$stmt->execute([$id]);

echo json_encode(['success'=>true,'message'=>'Student deleted']);