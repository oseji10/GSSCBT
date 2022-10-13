<?php
include 'server/server.php';

$First = $_POST['first_name'];
$Last = $_POST['last_name'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];
$User = $_POST['username'];
$Pass = $_POST['password'];

$Omang = "INSERT INTO students (`first_name`, `last_name`, `email`, `username`, `phone`,  `password`, `pin`) VALUES ('$First', '$Last', '$Email', '$User', '$Phone', '$Pass', '0')";
$OmangConnect = $conn->query($Omang);
if($OmangConnect){
    echo 'true';
}else{
    echo 'false';
}
?>