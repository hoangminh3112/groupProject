<?php

include 'database.php';

$sql = 'INSERT INTO students (fullname, student_code, address, gender, created_at, class_id) VALUES (?,?,?,?,?,?)';

try {
    $statement = $conn->prepare($sql);
    $statement->bindParam(1, $fullname);
    $statement->bindParam(2, $studentCode);
    $statement->bindParam(3, $address);
    $statement->bindParam(4, $gender);
    $statement->bindParam(5, $createdAt);
    $statement->bindParam(6, $classId);
    $statement->bindParam(6, $classId);

    $students = [
        [
            'fullname' => 'Nguyen Van Th',
            'student_code' => '123456',
            'address' => 'Ha Noi',
            'gender' => 1,
            'created_at' => '2020-12-12',
            'class_id' => 1,
        ],
        [
            'fullname' => 'Tran Van X',
            'student_code' => '1234567',
            'address' => 'Nghe An',
            'gender' => 2,
            'created_at' => '2020-12-12',
            'class_id' => 1,
        ],
        [
            'fullname' => 'Nguyen Thi H',
            'student_code' => '1234568',
            'address' => 'Thanh Hoa',
            'gender' => 1,
            'created_at' => '2020-12-12',
            'class_id' => 2,
        ],
    ];

    foreach ($students as $student) {
        $fullname = $student['fullname'];
        $studentCode = $student['student_code'];
        $address = $student['address'];
        $gender = $student['gender'];
        $createdAt = $student['created_at'];
        $classId = $student['class_id'];
        $statement->execute();
    }

    echo 'Insert success, ' . count($students) . ' students';
} catch (Exception $e) {
    echo "Error ocur" . $e->getMessage();
}
