<?php
include_once 'inc/GetRequest.php';
include_once 'database.php';

$id = GetRequest::get('id');
$sql = 'DELETE FROM custumers where id = ' . $id;
$stament = $conn->prepare($sql);
$stament->execute();

header('location: index.php');
