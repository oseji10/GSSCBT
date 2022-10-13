<?php
include 'server/server.php';
session_start();
$email=$_SESSION['email'];

//add quiz

for ($i=0;$i<$_POST['number'];$i++){
  // get inputed values
  $course_title = $_POST['course_title'][$i];
  $question = $_POST['question'][$i];
  $option_A = $_POST['option_A'][$i];
  $option_B = $_POST['option_B'][$i];
  $option_C = $_POST['option_C'][$i];
  $option_D = $_POST['option_D'][$i];
  $option_E = $_POST['option_E'][$i];
  $correct_answer = $_POST['correct_answer'][$i];
  $date_added = date('Y-m-d H:i:s')[$i];
  // generate pin for this email
  for ($index = 0; $index < 1; $index++){
    $rand = mt_rand(1000000000, (int)9999999999);
    $question_id = $rand[$i];
  }

  // check if all field is not empty
  if (empty($course_title && $question && $option_A && $option_B && $option_C && $option_D && $correct_answer) == false)
  {
    $query_question_id = "SELECT question_id FROM questions WHERE `question_id`='".$question_id."'";
    $check_query = $conn->query($query_question_id);
    if ($check_query->num_rows == 0)
    {
      //insert data into the data
      $sqlinsert = "INSERT INTO questions (`course_title`, `questions`, `option_A`, `option_B`, `option_C`, `option_D`, `option_E`, `answer`, `date_added`, `question_id`, `pin`) VALUES ('".$course_title."', '".$question."', '".$option_A."', '".$option_B."', '".$option_C."', '".$option_D."', '".$option_E."', '".$correct_answer."', '".$date_added."', '".$question_id."', '0')";
      $checksql = $conn->query($sqlinsert);
      if ($checksql){
        ?><script type="text/javascript">
          alert ('Question Added Successfully');
        </script><?php
      } else {
        ?><script type="text/javascript">
          alert ('Error has occurred');
        </script><?php
      }
    } else {
      $index -= 1;
      ?><script type="text/javascript">
        alert ('Opps! Error has occurred');
      </script><?php
    }
  } else {
    ?><script type="text/javascript">
        alert ('All fields are required');
    </script><?php
  }
   
}
?>



