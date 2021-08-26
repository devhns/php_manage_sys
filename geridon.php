<?php
session_start();
include('db_conn.php');

 if ($_SESSION['gorev']==1)
        header('Location:http://localhost/uyelik/uye_kontrol.php');
    else 
        header('Location:http://localhost/uyelik/adminolmayan.php');
?>