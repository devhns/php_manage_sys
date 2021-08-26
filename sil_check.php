<?php 
session_start(); 
include "db_conn.php";


$gorev = $_SESSION['gorev'];

if ($gorev==1)
{


        include "baglan.php";

		$sil = $db->prepare("delete from users where id=:id");
		$kontrol = $sil->execute(array("id"=>$_GET["id"]));

		if($kontrol) {
	    header("Location:uyeler.php");
	    exit;
		} 
		else {
	    echo "hata";
		} 
	

}

else{
	header("Location: admindegil.php");
	exit();
}


