<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

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

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=Kullanıcı adı gerekli&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Şifre gerekli&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Şifre tekrar gerekli&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Ad soyad gerekli&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=Uyuşmayan şifre hatası! Lütfen tekrar deneyin.&$user_data");
	    exit();
	}

	else if(empty($age)){
        header("Location: signup.php?error=Yaş bilgisi gerekli&$user_data");
	    exit();
	}

	else if(empty($phone)){
        header("Location: signup.php?error=Telefon bilgisi gerekli&$user_data");
	    exit();
	}

	else{

       

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Kullanıcı adı alınmış&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, name, age, phone) VALUES('$uname', '$pass', '$name', '$age', '$phone')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Hesabınız başarılı bir şekilde oluşturuldu");
	         exit();
           }else {
	           	header("Location: signup.php?error=Bilinmeyen hata&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}