<?php
include 'server/server.php';

if(!isset($_POST['searchTerm'])){ 
  $fetchData = mysqli_query($conn,"select * from staff order by id ");
}else{ 
  $search = $_POST['searchTerm'];   
  $fetchData = mysqli_query($conn,"select * from staff where fullname like '%".$search."%' ");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  $data[] = array("id"=>$row['id'], "text"=>$row['fullname']);
}
echo json_encode($data);
?>