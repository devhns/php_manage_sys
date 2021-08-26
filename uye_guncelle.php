<?php
include "baglan.php";

$sorgu = $db->prepare("select * from `users` where id=:id");
$sorgu -> execute(array("id"=>$_GET["id"]));
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Üye Bilgilerini Güncelle</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="" method="post">
     	<h2>Üye Bilgilerini Güncelle</h2>


      <input type="text" name="name" placeholder="Ad - Soyad" value="<?php echo $satir['name'];?>"><br>
      <input type="text" name="user_name" placeholder="Kullanıcı Adı" 
      value="<?php echo $satir['user_name'];?>"><br>
      <input type="text"  name="phone" placeholder="Telefon" value="<?php echo $satir['phone'];?>"><br>
      <input type="text"  name="age" placeholder="Yaş" value="<?php echo $satir['age'];?>"><br>
      <input type="text" name="gorev" placeholder="Üye Görevi" value="<?php echo $satir['gorev'];?>"><br>
      <input type="text" name="durum" placeholder="Üyelik Durumu" value="<?php echo $satir['durum'];?>"><br>

      <form action="uyeler.php" metod="post">
     	<button type="submit" name="guncelle">Güncelle</button></form>

     </form>

     <?php
        if(isset($_POST["guncelle"])) {

          $guncelle = $db->prepare("update users set
            name=:name,
            user_name=:user_name,
            phone=:phone,
            age=:age,
            gorev=:gorev,
            durum=:durum where id=:id");

          $kontrol = $guncelle->execute(array(
            "name" => $_POST["name"],
            "user_name" => $_POST["user_name"],
            "phone" => $_POST["phone"],
            "age" => $_POST["age"],
            "gorev" => $_POST["gorev"],
            "durum" => $_POST["durum"],
            "id" => $_GET["id"]));

          if ($kontrol) {
            header("Location: uyeler.php");
            exit;
          }
          else
          {
            echo "hata";
          }



        }


     ?>


     <br>
     <a href="uyeler.php">Geri Dön</a>
     <br>
     <a href="logout.php">Çıkış Yap</a>

</body>
</html>