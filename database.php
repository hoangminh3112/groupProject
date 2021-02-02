<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=niit", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // set the PDO error mode to exception
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
