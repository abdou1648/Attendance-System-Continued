<?php

header('Content-Type: application/json');

require 'db_connect.php';

$fullname = $_POST['fullname'] ?? '';
$matricule = $_POST['matricule'] ?? '';
$group_id = $_POST['group_id'] ?? '';

$stmt = $pdo->prepare("INSERT INTO students (fullname, matricule, group_id) VALUES (?, ?, ?)");
$stmt->execute([$fullname, $matricule, $group_id]);

echo json_encode(['success'=>true,'message'=>'Student added to DB']);

if (!preg_match('/^[0-9]+$/', $student_id)) {
    $response['message'] = 'Student ID must be numbers only';
    echo json_encode($response);
    exit;
}
if (empty($name)) {
    $response['message'] = 'Name is required';
    echo json_encode($response);
    exit;
}
if (empty($group)) {
    $response['message'] = 'Group is required';
    echo json_encode($response);
    exit;
}


$students = [];
if (file_exists($dataFile)) {
    $students = json_decode(file_get_contents($dataFile), true);
}


$students[] = [
    'student_id' => $student_id,
    'name' => $name,
    'group' => $group
];

file_put_contents($dataFile, json_encode($students, JSON_PRETTY_PRINT));

$response['success'] = true;
$response['message'] = 'Student added successfully';
echo json_encode($response);