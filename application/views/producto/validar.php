<?php
if (!isset($_SESSION['login'])){
    header('location:formLogin?error=1');
}
?>