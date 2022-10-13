<?php
// set session
session_start();
ob_start();
require 'server/server.php';

if (!isset($_SESSION['username'])){
	header ('location: ./index.php');
} else {
	// set session for sessioned data
	$username = $_SESSION['username'];
}

$quizpack = "";
$counter = 1;
// fetch out data for sessioned user
$qry="SELECT * FROM student WHERE username='".$username."' LIMIT 1";
$qrycheck=$conn->query($qry);
if ($qrycheck->num_rows > 0){
    while($fetch = $qrycheck->fetch_assoc()){
        $fullname=$fetch['fullname'];
        $username=$fetch['username'];
        $last_log_date=$fetch['last_log_date'];
        $id=$fetch['id'];
        $admissionNo=$fetch['admissionNo'];
        $log_date=strftime("%d %b, %Y %H:%M:%S",strtotime($fetch['last_log_date']));

    }
} else {
    echo "No user data found";
}

$course_title = $_SESSION['course_title'];
$question_rowcount = $_SESSION['question_rowcount'];


// fetch out questions and answers from the database
$qryquestions="SELECT * FROM questions WHERE `course_title`='".$course_title."' ";
$qryquestionscheck=$conn->query($qryquestions);
foreach ($qryquestionscheck as $row){
  $id = $row['id'];
  $questions = $row['questions'];
  $optionA = $row['option_A'];
  $optionB = $row['option_B'];
  $optionC= $row['option_C'];
  $optionD = $row['option_D'];
  $optionE = $row['option_E'];
  $answer = $row['answer'];
 }

?>
<link rel="stylesheet" href="assets/admin/css/sweet-alert.css">
<script src="js/sweet-alert.js"></script>
<?php
//check and compare anwsers


  if($_SESSION['course_title']){

  echo '<script type="text/javascript">';
  echo 'setTimeout(function () {
  swal({
    title: "Warning!",
    text: "Please Comfirm To Submit Your Exam",
    type: "warning",
    confirmButtonText: "Ok"
  },
  function(isConfirm){
    if (isConfirm) {
    window.location.href = "Success?course_title='.$course_title.'";
    }
  }); }, 50)';
  echo '</script>';
  }else{
?>

<?php
  
        $option_array = $_POST['option'];
        $each_question_correct_answer = $_POST["correct_answer"];
        //echo json_encode($each_question_correct_answer).'<br/>'; die();

        $each_question_correct_answer_string = implode(',', $each_question_correct_answer);
        //echo $each_question_correct_answer_string . '<br>';

        if (empty($option_array) == false){
          //convert answers back to array
          
          $correct_answer_array = explode(",", $each_question_correct_answer_string);
          //echo json_encode($correct_answer_array).'<br/>';
          //use array_intersect to check for corresponding answers
          $result= array_intersect_assoc($correct_answer_array,$option_array);
          $resultcount = count($result);
          $wrongAnswers = $question_rowcount - $resultcount;
          $percentage_score = ($resultcount / $question_rowcount) * 10 . "%";
          //echo $percentage_score; exit();

          $date_taken = date('Y-m-d H:i:s');


          $insertresult = "INSERT INTO result (`username`, `fullname`, `result`, `admissionNo`, `date_taken`, `course_title`, `percentage_score`) VALUES ('$username', '$fullname', '$resultcount', '$admissionNo', '$date_taken', '$course_title', '$percentage_score')";
          $checkinsert = $conn->query($insertresult);
          if ($checkinsert){

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {
            swal({
              title: "Congratulation!",
              text: "Exam Submitted Successfully",
              type: "success",
              confirmButtonText: "Thanks"
            },
            function(isConfirm){
              if (isConfirm) {
              window.location.href = "Logout-Student";
              }
            }); }, 50)';
            echo '</script>';
          }else{
            echo 'Not';
            // die ('Error inserting has occurred');

          }
        } else { 
          echo '<script type="text/javascript">';
          echo 'setTimeout(function () {
          swal({
            title: "You No Not Answer Any Question",
            text: "No Questions Answered",
            type: "warning",
            confirmButtonText: "Thanks"
          },
          function(isConfirm){
            if (isConfirm) {
            window.location.href = "Logout-Student";
            }
          }); }, 50)';
          echo '</script>';
        }
    /*?><script type="text/javascript">
     else {
      console.log('Cancel');
    }</script><?php*/
  }

?>