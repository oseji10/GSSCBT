<?php 
session_start();
unset($_SESSION['email']);
header('location: Login-Staff');
exit();
?>