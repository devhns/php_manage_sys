<?php
session_start();
include('index.php');
include('db_conn.php');
$user_name = $_SESSION['user_name'];
$sql = mysqli_query($conn,"UPDATE users SET durum='1' WHERE user_name='$user_name' ");
header('Location:http://localhost/uyelik/index.php');
?>