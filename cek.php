<?php
//jika belum login

if(isset($_SESSION['log'])){
    // var_dump($_POST);
} else {
    header('location:login.php');
}
?>