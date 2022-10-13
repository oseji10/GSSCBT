<?php 
include 'server/server.php.php';

$OmangStudentCount = "SELECT * FROM student";
$OmangCheckCount1 = $conn->query($OmangStudentCount);
if($OmangCheckCount1->num_rows > 0) {
  while ($i = $OmangCheckCount1->fetch_assoc()) {
  $studentscount = $OmangCheckCount1->num_rows; 
  } 
  }

  $OmangNewCount = "SELECT * FROM news ";
$OmangCheckCount2 = $conn->query($OmangNewCount);
if($OmangCheckCount2->num_rows > 0) {
  while ($i = $OmangCheckCount2->fetch_assoc()) {
  $NewsCount = $OmangCheckCount2->num_rows; 
  } 
  }     

  $OmangAssignmentcountCount = "SELECT * FROM assignment ";
$OmangCheckCount3 = $conn->query($OmangAssignmentcountCount);
if($OmangCheckCount3->num_rows > 0) {
  while ($i = $OmangCheckCount3->fetch_assoc()) {
  $assignmentcount = $OmangCheckCount3->num_rows; 
  } 
  }       

  $OmangSumitAssignCount = "SELECT * FROM submitassignment ";
$OmangCheckCount4 = $conn->query($OmangSumitAssignCount);
if($OmangCheckCount4->num_rows > 0) {
  while ($i = $OmangCheckCount4->fetch_assoc()) {
  $SumitAssign = $OmangCheckCount4->num_rows; 
  } 
  }       

  $Omangquestioncount = "SELECT * FROM questions ";
$OmangCheckCount5 = $conn->query($Omangquestioncount);
if($OmangCheckCount5->num_rows > 0) {
  while ($i = $OmangCheckCount5->fetch_assoc()) {
  $questioncount = $OmangCheckCount5->num_rows; 
  } 
  }             

  $OmangTestResultCount = "SELECT * FROM results ";
$OmangCheckCount6 = $conn->query($OmangTestResultCount);
if($OmangCheckCount6->num_rows > 0) {
  while ($i = $OmangCheckCount6->fetch_assoc()) {
  $TestResultCount = $OmangCheckCount6->num_rows; 
  } 
  }
  $User = $_SESSION['admissionNo'];
// $Omangitstudentcount = "SELECT balanceamount FROM savingaccount WHERE admissionNo = '$User' ";
// $OmangCheckCount7 = $conn->query($Omangitstudentcount);
// if($OmangCheckCount7->num_rows > 0) {
//   while ($i = $OmangCheckCount7->fetch_assoc()) {
//     $saving = $i['balanceamount']; 
//   } 
//   }else{
//     echo"0";
//   } 


  
  $Omangbalance = "SELECT balance FROM contributionstudent WHERE admissionNo = '$User' ";
$OmangCheckCount8 = $conn->query($Omangbalance);
if($OmangCheckCount8->num_rows > 0) {
  while ($i = $OmangCheckCount8->fetch_assoc()) {
  $balance = $i['balance']; 
  } 
  }
  
  $Omangbalance1 = "SELECT SUM(balance) FROM deposit WHERE admissionNo = '$User' ";
  $OmangCheckCount9 = $conn->query($Omangbalance1);
  if($OmangCheckCount9->num_rows > 0) {
    while ($i = $OmangCheckCount9->fetch_assoc()) {
    $balance1 = $i['SUM(balance)']; 
    } 
    }else{
      echo"0";
    } 
?>