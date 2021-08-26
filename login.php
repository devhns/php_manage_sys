<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$age = validate($_POST['age']);
	$phone = validate($_POST['phone']);
	$gorev = validate($_POST['gorev']);
	$durum = validate($_POST['durum']);

	if (empty($uname)) {
		header("Location: index.php?error=Kullanıcı adı gerekli");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Şifre gerekli");
	    exit();
	}else{

        
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['age'] = $row['age'];
            	$_SESSION['phone'] = $row['phone'];
            	$_SESSION['gorev'] = $row['gorev'];
            	$_SESSION['durum'] = $row['durum'];
            	$_SESSION['banned'] = $row['banned'];

            	$gorev = $_SESSION['gorev'];
            	$durum = $_SESSION['durum'];
            	$banned = $_SESSION['banned'];

            	 if ($gorev == 1 && $durum == 1 && $banned == 0){

		            	header("Location: uye_kontrol.php");
				        exit(); }

				 else if ($gorev == 1 && $durum == 0 && $banned == 0){

		            	header("Location: index2.php?error=Pasif Hesap! Hesabınızı tekrar kullanmak için sol alttan aktifleştirin. ");
				        exit();
				        }   

				 else if ($banned == 1){

		            	header("Location: index.php?error=Banlı hesap! Bir hata olduğunu düşünüyorsanız adminle iletişime geçin.");
				        exit();
				        }

			     else if ($gorev == 0 && $durum == 1 && $banned == 0){
			        	header("Location: adminolmayan.php");
			        	exit(); }

			     else if ($gorev == 0 && $durum == 0 && $banned == 0){
			        	header("Location: index2.php?error=Pasif Hesap! Sol alttan aktifleştirin!");
			        	exit(); }

			      else { //yani gorev icin hicbir bilgi atanmamissa
			       	header("Location: index.php?error=Görev bilgisi sistem hatası! Lütfen adminle iletişime geçin.");
			        	exit(); 
			       }
            	
	
            }else{
				header("Location: index.php?error=Kullanıcı adı veya şifre hatalı");
		        exit();
			}
		}else{
			header("Location: index.php?error=Kullanıcı adı veya şifre hatalı");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}