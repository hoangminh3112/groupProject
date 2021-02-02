<?php
include_once 'database.php';
include_once 'inc/PostRequest.php';


    $sql = "UPDATE custumers SET custumer_names = :custumer_names,gender = :gender, contact = :contact, address = :address WHERE id = :id";
    //$sql = "UPDATE students SET fullname = 'minh' WHERE id = ?";
    $stament = $conn->prepare($sql);
    $stament->bindParam(':custumer_names', $custumerNames);
    $stament->bindParam(':gender', $gender);
    // $stament->bindParam(':date_of_birth', $dateOfBitrh);
    $stament->bindParam(':contact', $contact);
    // $stament->bindParam(':status', $status);
    // $stament->bindParam(':payment_status', $paymentStatus);
    $stament->bindParam(':address', $address);
    $stament->bindParam(':id', $id);
    
    $custumerNames = PostRequest::get('custumer_names');
    $gender = PostRequest::get('gender');
    // $dateOfBitrh = PostRequest::get('date_of_birth');
    $contact = PostRequest::get('contact');
    // $status = PostRequest::get('status');
    // $paymentStatus = PostRequest::get('payment_status');
    $address = PostRequest::get('address');
    $id = PostRequest::get('id');
    $stament->execute();

header('location: index.php');
