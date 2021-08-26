<?php

include "db_conn.php";

$sil = $conn->prepare("delete from users where id=:id");
$kontrol = $sil->execute(array("id"=>$_GET["id"]));

if($kontrol) {
    header("Location:uyeler.php");
    exit;
} 
else {
    echo "hata";
}

?>