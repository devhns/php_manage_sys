<?php

include "baglan.php";

$banla= $db->prepare("update users set banned='0' where id=:id");
$kontrol = $banla->execute(array("id"=>$_GET["id"]));

if($kontrol) {
    header("Location:uyeler.php");
    exit;
} 
else {
    echo "hata";
}

?>