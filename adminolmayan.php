<?php 
session_start();


$gorev = $_SESSION['gorev'];

if (isset($_SESSION['id']) && isset($_SESSION['user_name']))  {

 ?>
<!DOCTYPE html>
<html>
<head>
     <title>Ana Sayfa</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

     <h1>Hoşgeldiniz, <?php echo $_SESSION['name']; ?></h1>
        <form>

         
          <table border=1 class="ortala">
              <tr>
                  <td>Ad - Soyad</td>
                  <td>Kullanıcı Adı</td>
                  <td>Telefon</td>
                  <td>Yaş</td>
                  

              </tr>
              <tr>

                  <td><?php echo $_SESSION['name']; ?></td>
                  <td><?php echo $_SESSION['user_name']; ?></td>
                  <td><?php echo $_SESSION['phone']; ?></td>
                  <td><?php echo $_SESSION['age']; ?></td>

             </tr>
          </table>
     <br>
     
 </form>  

<br>

<form  method="post" action="profil_ayar.php">
<input type="submit" name="Submit2" value="Profil Ayarlarını Düzenle" />
</form>
<br>


           
     <a href="logout.php">Çıkış Yap</a>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>