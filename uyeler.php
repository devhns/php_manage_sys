<!DOCTYPE html>
<html>
<head>
	<title>Kayıtlı Üyeler</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">

<table border="2">
  <tr>
    <th>ID</th>
    <th>Kullanıcı Adı</th>
    <th>Ad Soyad</th>
    <th>Telefon</th>
    <th>Yaş</th>
    <th>Görev</th>
    <th>Durum</th>
    <th>Banlı mı?</th>
    <th>Üye Sil</th>
    <th>Düzenle</th>
    <th>Banla</th>
    <th>Ban Kaldır</th>
  
</tr>

<?php
include "db_conn.php";
$sorgu = "Select * from `users`";
$sonuc = $conn->query($sorgu);

while($satir = $sonuc -> fetch_assoc())
{
  echo "<tr>";
  echo "<td>".$satir["id"]."</td>";
  echo "<td>".$satir["user_name"]."</td>";
  echo "<td>".$satir["name"]."</td>";
  echo "<td>".$satir["phone"]."</td>";
  echo "<td>".$satir["age"]."</td>";
  echo "<td>".$satir["gorev"]."</td>";
  echo "<td>".$satir["durum"]."</td>";
  echo "<td>".$satir["banned"]."</td>";
  echo "<td><a href=sil_check.php?id=$satir[id]>Sil</a></td>";
  echo "<td><a href=uye_guncelle.php?id=$satir[id]>Güncelle</a></td>";
  echo "<td><a href=banla.php?id=$satir[id]>Banla</a></td>";
  echo "<td><a href=ban_kaldir.php?id=$satir[id]>Ban Kaldır</a></td>";

  echo "</tr>";
}

?>
</table>

     </form>
<br>
<form  method="post" action="profil_ayar.php">
<input type="submit" name="Submit2" value="Profil Ayarlarını Düzenle" />


</form>



<br>
     <a href="uye_kontrol.php">Geri Dön</a>
<br>
     <a href="logout.php">Çıkış Yap</a>
         
</body>
</html>