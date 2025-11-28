<?php
header('Content-Type: application/json');

$studentsFile = 'students.json';
if (!file_exists($studentsFile)) {
    echo json_encode(['success'=>false,'message'=>'No students found']);
    exit;
}

$students = json_decode(file_get_contents($studentsFile), true);


$date = date('Y-m-d');
$attendanceFile = "attendance_$date.json";


if (file_exists($attendanceFile)) {
    echo json_encode(['success'=>false,'message'=>'Attendance for today has already been taken']);
    exit;
}

// POST
$attendance = $_POST['attendance'] ?? [];

if (empty($attendance)) {
    echo json_encode(['success'=>false,'message'=>'No attendance data received']);
    exit;
}

// JSON
file_put_contents($attendanceFile, json_encode($attendance, JSON_PRETTY_PRINT));

echo json_encode(['success'=>true,'message'=>'Attendance saved successfully']);