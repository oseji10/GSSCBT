<?php
include 'server/server.php';


    $Time = $_POST['exam_time'];
    $Course_tittle = $_POST['course_title'];

    $Omangqry = "INSERT INTO time (exam_time, course_title) VALUES ('$Time', '$Course_tittle')";
    $Omangqrycheck = $conn->query($Omangqry);
    if ($Omangqrycheck){
        
		 echo "True";

    } else {

        echo "False";
        
    }

?>