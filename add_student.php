<?php

header('Content-Type: application/json');

$dataFile = 'students.json';
$response = ['success' => false, 'message' => ''];


$student_id = $_POST['student_id'] ?? '';
$name = $_POST['name'] ?? '';
$group = $_POST['group'] ?? '';


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