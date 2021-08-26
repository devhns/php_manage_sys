<?php
session_start();

include('db_conn.php');
include('profil.html');
if(isset($_POST['guncelle'])){
    $name = $_SESSION['name'];
    $user_name = $_SESSION['user_name'];
    $password = $_SESSION['password'];
    $phone = $_SESSION['phone'];
    $age = $_SESSION['age'];
    $newU_name = $_POST['user_name'];
    echo $newU_name;
    $newName = $_POST['name'];
    $newPass = $_POST['password'];
    $newAge = $_POST['age'];
    $newPhone = $_POST['phone'];
    $sql = mysqli_query($conn,"UPDATE users SET name='$newName',user_name='$newU_name',password='$newPass',age='$newAge',phone='$newPhone' WHERE user_name='$user_name'");

    ///bilgilerin guncellemesi sonrası tablolara yansimasi adina tekrar giris yapilmasi icin
    ///index sayfasına aktardim. database değişsede hosttaki sayfalarında güncellenebilmesi icin.

    if ($_SESSION['gorev']==1)
        header('Location:http://localhost/uyelik/index.php');
    else 
        header('Location:http://localhost/uyelik/index.php');

}   
?>

