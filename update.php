<?php
include 'database.php';

// $sql = 'UPDATE students SET fullname = \'Nguyễn Thị D\' WHERE id = :id';
// try {
//     $stament = $conn->prepare($sql);
//     $stament->bindParam(':id', $id);
//     $id = 1003;
//     $stament->execute();
//     echo "Đã cập nhật sinh viên";
// } catch (Exception $e) {
//     echo "Đã có lỗi xảy ra:" . $e->getMessage();
// }

$sql = 'UPDATE students SET fullname = \'Nguyễn Thị E\' WHERE id = ?';
try {
    $stament = $conn->prepare($sql);
    $stament->bindParam(1, $id);
    $id = 1003;
    $stament->execute();
    echo "Đã cập nhật sinh viên";
} catch (Exception $e) {
    echo "Đã có lỗi xảy ra:" . $e->getMessage();
}
