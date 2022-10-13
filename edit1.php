<?php include 'server/header.php';?>
<?php include 'server/sidebar.php'?>
<?php include 'server/counter.php'?>
<?php

// get data for question
if (isset($_GET['question_id'])){
  $question_id = $_GET['question_id'];

  // fetch data with the question id
  $select_question = "SELECT * FROM `questions` WHERE `question_id`='".$question_id."' LIMIT 1";
  $check_select = $conn->query($select_question);
  if ($check_select->num_rows > 0){
    while ($row = $check_select->fetch_assoc()){
      $question_name = $row['questions'];
      $courseTitle = $row['course_title'];
      $optionA = $row['option_A'];
      $optionB = $row['option_B'];
      $optionC = $row['option_C'];
      $optionD = $row['option_D'];
      $optionE = $row['option_E'];
      $correctAnswer = $row['answer'];
    }
  } else {
    echo "Question ID not found";
    die();
  }

}
?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1>Admin Dashboard</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="margin-bottom: 20px!important;">
          <div class="card-header">
            <i class="icon fa fa-book"></i> Question ID: <?php echo $question_id; ?> (<?php echo $courseTitle; ?>)
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <table class="table">


<?php

if (isset($_POST['update'])){
    // get inputed values
    $course_title = $_POST['course_title'];
    $question = $_POST['question'];
    $option_A = $_POST['option_A'];
    $option_B = $_POST['option_B'];
    $option_C = $_POST['option_C'];
    $option_D = $_POST['option_D'];
    $option_E = $_POST['option_E'];
    $correct_answer = $_POST['correct_answer'];
    //$date_added = date('Y-m-d H:i:s');
  
    // check if all field is not empty
    if (empty($question && $option_A && $option_B && $option_C && $option_D && $option_E) == false)
    {
    
      //insert data into the data
      $sqlupdate = "UPDATE questions SET `course_title`='".$course_title."', `questions`='".$question."', `option_A`='".$option_A."', `option_B`='".$option_B."', `option_C`='".$option_C."', `option_D`='".$option_D."', `option_E`='".$option_E."', `answer`='".$correct_answer."' WHERE `question_id`='".$question_id."' LIMIT 1";
      $checksql = $conn->query($sqlupdate);
      if ($checksql){
        ?>
    <div class="alert alert-warning fadeIn">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong><span class="ti ti-announcement fa-2x"></span> </strong> <strong>&nbsp;&nbsp; Questions Updated Successfully</strong>
  </div>
  <script type="text/javascript">
  var delay = 4000;
        setTimeout(() => {
            window.location.href = 'View-Question';
        }, delay);
</script>
        <?php
      } else {
        ?>
        <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong><span class="ti ti-announcement fa-2x"></span> </strong> <strong>&nbsp;&nbsp; Massage Error</strong>.
  </div>
        <?php
      }
    } else {
      ?>
      <div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong><span class="ti ti-announcement fa-2x"></span> </strong> <strong>&nbsp;&nbsp; All Fields Are Requere</strong>.
  </div>
      <?php
    }
  
  }
?>

                    <form method="POST" action="">
                        <tr>
                            <th>Select Course</th>
                            <td>
                            <input class="form-control" id="" name="course_title" type="text" autocomplete="off" value="<?php echo $courseTitle; ?>" readonly  />
                        </td>
                        </tr>
                        <tr>
                            <th>Enter Question</th>
                            <td>
                              <script type="text/javascript" src="assets/admin/js/jquery-3.2.1.min.js"></script>
                            <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
                           <textarea class="form-control" id="editor1"  placeholder="Enter Question" style="height: 200px; border: 1px solid black; max-width: 100%;" value="<?php echo $question_name; ?>" name="question" ><?php echo $question_name; ?></textarea>
                            </td>
                            <script>
     CKEDITOR.replace('editor1', {
      extraPlugins: 'sharedspace',
      removePlugins: 'maximize,resize',
      height: 410,
      sharedSpaces: {
        top: 'top',
        bottom: 'bottom'
      }
    });
  </script>
                        </tr>
                        <tr>
                            <th>Option A</th>
                            <td>
                                <input class="form-control" placeholder="Option A" id="" name="option_A" type="text" autocomplete="off" value="<?php echo $optionA; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option B</th>
                            <td>
                            <input class="form-control" placeholder="Option B" id="" name="option_B" type="text" value="<?php echo $optionB; ?>" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option C</th>
                            <td>
                            <input class="form-control" placeholder="Option C" id="" name="option_C" type="text" value="<?php echo $optionC; ?>" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option D</th>
                            <td>
                            <input class="form-control" placeholder="Option D" id="" name="option_D" type="text" value="<?php echo $optionD; ?>" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option E</th>
                            <td>
                            <input class="form-control" placeholder="Option E" id="" name="option_E" type="text" value="<?php echo $optionE; ?>" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Select Correct Option</th>
                            <td>
                            <select class="form-control" name="correct_answer">
                            <option value="<?php echo $correctAnswer; ?>"><?php echo $correctAnswer; ?></option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                            <option value="D">Option D</option>
                            <option value="E">Option E</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" class="btn btn-primary" style="" name="update" id="addBtn" value="Update Question">
                            </td>
                        </tr>
                    </form>
                </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<!-- Essential javascripts for application to work-->
<script type="text/javascript" src="assets/admin/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/admin/js/popper.min.js"></script>
<script type="text/javascript" src="assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/admin/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script type="text/javascript" src="assets/admin/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="assets/admin/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="assets/admin/fileInput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/admin/js/jscolor.js"></script>
<script type="text/javascript" src="assets/admin/js/toastr.min.js"></script>
<script type="text/javascript" src="assets/admin/js/chart.js"></script>

<script src="assets/admin/js/raphael-min.js"></script>
    <script src="assets/admin/js/morris.min.js"></script>
    



<script>
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var title = button.data('mytitle');
        var description = button.data('mydescription');
        var cat_id = button.data('catid');
        var modal = $(this);
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #des').val(description);
        modal.find('.modal-body #cat_id').val(cat_id);
    });

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var cat_id = button.data('catid');
        var modal = $(this);
        modal.find('.modal-body #cat_id').val(cat_id);
    });



</script>

</body>
</html>
