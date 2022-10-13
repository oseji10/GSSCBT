<?php  
include 'server.php';

$OmangStudentCount = "SELECT * FROM student WHERE course1 = '$course' || course2 = '$course'";
$OmangCheckCount1 = $conn->query($OmangStudentCount);
  $studentscount = $OmangCheckCount1->num_rows;


$OmangNewCount = "SELECT * FROM student WHERE course1 = '$course' OR course2 = '$course' AND pin = 1 ";
$OmangCheckCount2 = $conn->query($OmangNewCount);
  $PinCount = $OmangCheckCount2->num_rows;


$OmangAssignmentcountCount = "SELECT * FROM questions WHERE course_title = '$course' ";
$OmangCheckCount3 = $conn->query($OmangAssignmentcountCount);
$questioncount = $OmangCheckCount3->num_rows;       


  $OmangSumitAssignCount = "SELECT * FROM student WHERE course1 = '$course' OR course2 = '$course' AND pin = 0 ";
$OmangCheckCount4 = $conn->query($OmangSumitAssignCount);
  $AllowStudent = $OmangCheckCount4->num_rows; 
         
  
  $OmangTestResultCount = "SELECT * FROM result WHERE course_title = '$course' ";
  $OmangCheckCount6 = $conn->query($OmangTestResultCount);
  $ResultCount = $OmangCheckCount6->num_rows; 
 
  $TotalExamNotTeken = $questioncount - $ResultCount;
// $Omangitstudentcount = "SELECT balanceamount FROM savingaccount WHERE admissionNo = '$User' ";
// $OmangCheckCount7 = $conn->query($Omangitstudentcount);
// if($OmangCheckCount7->num_rows > 0) {
//   while ($i = $OmangCheckCount7->fetch_assoc()) {
//     $saving = $i['balanceamount']; 
//   } 
//   }else{
//     echo"0";
//   } 


  
//   $Omangbalance = "SELECT balance FROM contributionstudent WHERE admissionNo = '$User' ";
// $OmangCheckCount8 = $conn->query($Omangbalance);
// if($OmangCheckCount8->num_rows > 0) {
//   while ($i = $OmangCheckCount8->fetch_assoc()) {
//   $balance = $i['balance']; 
//   } 
//   }
  
//   $Omangbalance1 = "SELECT SUM(balance) FROM deposit WHERE admissionNo = '$User' ";
//   $OmangCheckCount9 = $conn->query($Omangbalance1);
//   if($OmangCheckCount9->num_rows > 0) {
//     while ($i = $OmangCheckCount9->fetch_assoc()) {
//     $balance1 = $i['SUM(balance)']; 
//     } 
//     }else{
//       echo"0";
//     } 
?>