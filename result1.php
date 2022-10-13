<?php include 'header-exam.php'; ?>
<?php
$quizpack = "";
$counter = 1;

$subject_id = $_GET['subject_id'];
$conn->subject_question_count($subject_id);
$question_rowcount1 = $conn->subject_question_count($subject_id);
?>
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<?php
//check and compare anwsers
$con = $pdo->open();
$option_array = $_POST['option'];
if (empty($option_array) == false) {

  $questionId_array = $_POST['id'];
  $each_question_correct_answer = $_POST["correct_answer"];
  //echo json_encode($each_question_correct_answer).'<br/>'; die();
  $each_question_correct_answer_string = implode(',', $each_question_correct_answer);
  //echo $each_question_correct_answer_string . '<br>';

  //convert answers back to array
  $count_option = count($option_array);
  $correct_answer_array = explode(",", $each_question_correct_answer_string);
  //echo json_encode($correct_answer_array).'<br/>';
  //use array_intersect to check for corresponding answers
  $result = array_intersect_assoc($correct_answer_array, $option_array);
  $resultcount = count($result);
  $wrongAnswers = $question_rowcount1 - $resultcount;
  $percentage_score = $resultcount . "%";
  //echo $percentage_score; exit();

  $date_taken = date('Y-m-d H:i:s');
  $choice_remark;
  $result_id = rand(1234, 4444);
  for ($i = 0; $i < $count_option; $i++) {
    $answer = $_POST['option'][$i];
    $question_id = $_POST['id'][$i];
    if (empty($answer)) {
      $answer = 'xxxxxxxxx';
    }
    $select = $conn->load_quest($question_id);
    foreach ($select as $ins) {
      $choice_answer = $ins['answer'];
      $choice_mark = $ins['mark'];
      if ($ins['answer'] == $answer) {
        $choice_remark = 'Correct';
      } else {
        $choice_remark = 'Wrong';
      }
    }

    $question_select = $conn->questions_load($question_id);
    $question = $question_select->fetch();

    $insert = $con->prepare("INSERT INTO single_result (fullname, admissionNo, class, class_id, choice, question, choice_answer, choice_mark, choice_remark, subject_id, term, result_id) VALUES (:fullname, :admissionNo, :class, :class_id, :choice, :question, :choice_answer, :choice_mark, :choice_remark, :subject_id, :term, :result_id)");
    $insert->execute(['fullname' => $session_track['fullname'], 'admissionNo' => $admissionNo, 'class' => $session_track['class'], 'class_id' => $session_track['class_id'], 'choice' => $answer, 'question' => $question['questions'], 'choice_answer' => $choice_answer, 'choice_mark' => $choice_mark, 'choice_remark' => $choice_remark, 'subject_id' => $subject_id, 'term' => '', 'result_id' => $result_id]);
  }
  // $insertresult = "INSERT INTO result (`fullname`, `result`, `admissionNo`, `department`, `date_taken`, `course_title`, `percentage_score`,`acm`,  `level`) VALUES ('$fullname', '$resultcount', '$admissionNo', '$department',  '$date_taken', '$course_title', '$percentage_score', 0, '$level' )";
  // $checkinsert = $conn->query($insertresult);
  if ($insert) {
    $total_score = $conn->single_result($result_id) && 0;
    $percentage_score = $total_score . '%';
    $subject = $conn->subject($subject_id);

    $insert_result = $con->prepare("INSERT INTO result (fullname, result_score, acm, admissionNo, level, level_id, class, class_id, subject_name, subject_id, total_score, result_id, percentage_score, term) VALUES (:fullname, :result_score, :acm, :admissionNo, :level, :level_id, :class, :class_id, :subject_name, :subject_id, :total_score, :result_id, :percentage_score, :term)");
    $insert_result->execute(['fullname' => $session_track['fullname'], 'result_score' => $total_score && 0, 'acm' => 0, 'admissionNo' => $admissionNo, 'level' => $session_track['level'], 'level_id' => $session_track['level_id'], 'class' => $session_track['class'], 'class_id' => $session_track['class_id'], 'subject_name' => $subject['subject_name'], 'subject_id' => $subject_id, 'total_score' => $total_score, 'result_id' => $result_id, 'percentage_score' => $percentage_score, 'term' => '']);
    if ($insert_result) {
?>
      <script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: 'Submitted successfully'
        })
      </script>

<?php
    } else {
      die('Error inserting has occurred');
    }
  } else {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () {
          swal({
            title: "Error Inserting Questions",
            text: "Please contact the developer",
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
} else {
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () {
    swal({
      title: "You have not answered any question",
      text: "No Questions Answered",
      type: "warning",
      confirmButtonText: "Thanks"
    },
    function(isConfirm){
      if (isConfirm) {
      window.location.href = "Logout-Student";
      }
    }); }, 50)';
}
/*?><script type="text/javascript">
     else {
      console.log('Cancel');
    }</script><?php*/
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1>Student Dashboard</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="margin-bottom: 20px!important;">
        <div class="card-header">
          <i class="icon fa fa-angle-right"></i> EXAMINATION
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div style="margin: 10px;">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Fullname</th>
                        <th><?php echo $session_track['fullname'] ?></th>
                      </tr>
                      <tr>
                        <th>Reg No</th>
                        <th><?php echo $session_track['admissionNo'] ?></th>
                      </tr>
                      <tr>
                        <th>Username</th>
                        <th><?php echo $session_track['username'] ?></th>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <th><?php echo $session_track['email'] ?></th>
                      </tr>
                      <tr>
                        <th>Department</th>
                        <th><?php echo $session_track['class'] ?></th>
                      </tr>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div style="margin: 10px;">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th style="text-align: center;">Photo</th>
                      </tr>
                      <tr>
                        <th>
                          <div align="center">
                            <img src="images/LOGO.jpg" class="justify-center" style="width: 150px; height: 118px; border-radius: 10px;" />
                          </div>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12">
              <h1 class="text-center">CONGRATULATION FOR SUCCESSFUL EXAMiNATION</h1>
              <a href="Logout-Student" class="btn btn-success form-control">Please Click Me For Total Processing</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</body>

</html>