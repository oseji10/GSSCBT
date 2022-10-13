<?php include 'header-exam.php'; ?>
<?php
$quizpack = "";
$counter = 1;

              $course_title = $_SESSION['course_title'];
              $qryquestions1c ="SELECT * FROM questions WHERE `course_title`='".$course_title."' AND pin = '0' AND question_type = 'subobjective' ORDER BY RAND() ";
              $question_rowcount2=$conn->query($qryquestions1c);
              $question_rowcount1 = $question_rowcount2->num_rows;

              $qryquestions1m ="SELECT mark FROM questions WHERE `course_title`='".$course_title."' AND pin = '0' AND question_type = 'subobjective' ";
              $question_marks=$conn->query($qryquestions1m);
              while($m = $question_marks->fetch_assoc()){

                $Marks = $m['mark'];

              }
?>
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<?php
        //check and compare anwsers
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
          $resultcount = count($result) * $Marks;
          $wrongAnswers = $question_rowcount1 - $resultcount;
          $percentage_score = $resultcount . "%";
          //echo $percentage_score; exit();

          $date_taken = date('Y-m-d H:i:s');


          $insertresult = "UPDATE result SET subobjective = '$resultcount' WHERE admissionNo = '$admissionNo' ";
          $checkinsert = $conn->query($insertresult);
          if ($checkinsert){
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
          }else{
            
            die ('Error inserting has occurred');

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
                <?php
                $User = $_SESSION['admissionNo'];
                  $OmangSelect = "SELECT * FROM student WHERE admissionNo='".$User."' LIMIT 1";
                  $OmangConnect = $conn->query($OmangSelect);
                  if ($OmangConnect->num_rows > 0){
                      while($f = $OmangConnect->fetch_assoc()){
                ?>
                <tbody>
                  <tr>
                    <th>Fullname</th>
                    <th><?php echo $f['fullname']?></th>
                  </tr>
                  <tr>
                    <th>Reg No</th>
                    <th><?php echo $f['admissionNo']?></th>
                  </tr>
                  <tr>
                    <th>Username</th>
                    <th><?php echo $f['username']?></th>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <th><?php echo $f['email']?></th>
                  </tr>
                  <tr>
                    <th>Department</th>
                    <th><?php echo $f['department']?></th>
                  </tr>
                </tbody>
                <?php }}?>
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
                    <h1 class="text-center">CONGRATULATION FOR SUCCESSFUL SUB-OBJECTIVE EXAMINATION</h1>
                    <a href="Logout-Student" class="btn btn-success form-control">Please Click Me</a>
                </div>
            </div>
        </div>
      </div>
      </div>
    </div>
  </main>
</body>
</html>
