<?php 
session_start();
unset($_SESSION['username']);
header('location: Home');
exit();
?>