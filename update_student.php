<?php
require 'db_connect.php';

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$matricule = $_POST['matricule'];
$group_id = $_POST['group_id'];

$stmt = $pdo->prepare("UPDATE students SET fullname=?, matricule=?, group_id=? WHERE id=?");
$stmt->execute([$fullname,$matricule,$group_id,$id]);

echo json_encode(['success'=>true,'message'=>'Student updated']);