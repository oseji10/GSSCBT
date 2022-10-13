<?php include 'header-exam.php'; ?>
<?php
$quizpack = "";
$counter = 1;
$counter1 = 1;

(isset($_GET['subject_id'])) ? $subjects = $conn->subject($_GET['subject_id']) : '';
(isset($_GET['subject_id'])) ? $subject_id = $_GET['subject_id'] : $redirect->redirect('Start');
// $qryquestions1c = "SELECT * FROM questions WHERE `course_title`='" . $course_title . "' AND pin = '0' ORDER BY RAND() ";
// $question_rowcount2 = $conn->query($qryquestions1c);

?>
<!-- <link rel="stylesheet" href="scr/paginationcss.css" /> -->
<style type="text/css">
  .page_navigation {
    padding-bottom: 10px;
  }

  .page_navigation a {
    border: 1px solid blue;
    border-radius: 5px;
    padding: 5px 5px;
    margin: 5px;
    color: white;
    text-decoration: none;
    float: left;
    font-family: Tahoma;
    font-size: 12px;
    background-color: blue;
  }

  .active_page {
    background-color: white !important;
    color: black !important;
  }

  .checkedactive {
    background-color: red !important;
    color: white !important;
  }

  .justify-content-center {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* The container */
  .container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    margin-top: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  .container1 {
    margin-bottom: 12px;
    margin-top: 12px;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default radio button */
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  /* Create a custom radio button */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #ccc;
    border-radius: 50%;
  }

  /* On mouse-over, add a grey background color */
  .container:hover input~.checkmark {
    background-color: #ccc;
  }

  /* When the radio button is checked, add a blue background */
  .container input:checked~.checkmark {
    background-color: #2196F3;
  }

  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the indicator (dot/circle) when checked */
  .container input:checked~.checkmark:after {
    display: block;
  }

  /* Style the indicator (dot/circle) */
  .container .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
  }
</style>
<script src="js/jquery/jquery-2.1.3.min.js" type="text/javascript"> </script>
<script src="js/jquery.min.js"> </script>
<script src="js/jquery/bootstrap.min.js" type="text/javascript"> </script>
<script src="js/js.cookie-2.2.1.min.js"></script>
<script src="js/ui.js"></script>
<!--  <script src="js/jGrowl/jquery.jgrowl.js" type="text/javascript"> </script> -->
<!-- <script src="src/jquery.paginate.js"> </script> -->
<script src="src/pagination.js"> </script>
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
<link rel="stylesheet" href="assets/admin/css/sweet-alert.css">
<script src="js/sweet-alert.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<?php
//check and compare anwsers
if (isset($_POST['submit_tag'])) {



  $option_array = $_POST['option'];
  $each_question_correct_answer = $_POST["correct_answer"];
  //echo json_encode($each_question_correct_answer).'<br/>'; die();

  $each_question_correct_answer_string = implode(',', $each_question_correct_answer);
  //echo $each_question_correct_answer_string . '<br>';

  if (empty($option_array) == false) {
    //convert answers back to array

    $correct_answer_array = explode(",", $each_question_correct_answer_string);
    //echo json_encode($correct_answer_array).'<br/>';
    //use array_intersect to check for corresponding answers
    $result = array_intersect_assoc($correct_answer_array, $option_array);
    $resultcount = count($result);
    $wrongAnswers = $question_rowcount1 - $resultcount;
    $percentage_score = ($resultcount / $question_rowcount1) * 10 . "%";
    //echo $percentage_score; exit();

    $date_taken = date('Y-m-d H:i:s');


    $insertresult = "INSERT INTO result (`username`, `fullname`, `result`, `admissionNo`, `date_taken`, `course_title`, `percentage_score`) VALUES ('$username', '$fullname', '$resultcount', '$admissionNo', '$date_taken', '$course_title', '$percentage_score')";
    $checkinsert = $conn->query($insertresult);
    if ($checkinsert) {
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
<!-- <link rel="stylesheet" href="src/jquery.paginate.css" /> -->
<main class="" style="margin: 20px;">
  <div class="app-title">
    <div>
      <h1>Student Dashboard</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="margin-bottom: 20px!important;">
        <div class="card-header">
          <i class="icon fa fa-angle-right"></i> EXAMINATION INSTRSTRUCTIONS
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
                        <th>Level</th>
                        <th><?php echo $session_track['level'] ?></th>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <th><?php echo $session_track['email'] ?></th>
                      </tr>
                      <tr>
                        <th>Class</th>
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

          <section>
            <div class="col-md-12">
              <div class="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row" id="coure">
                      <div class="col-md-4">
                        <h2 style=" text-align: center;"><?php echo "Subject Title: " . " " . $subjects['subject_name']; ?></h2>
                      </div>
                      <div class="col-md-4">
                        <?php
                        $number_of_question = $conn->subject_question_count($subject_id);
                        ?>
                        <h2 style="text-align: center">Total Number of Questions: <?php echo $number_of_question; ?></h2>
                      </div>
                      <div class="col-md-4">
                        <?php
                        $OmangTime1 = $conn->subject_timer($subject_id);
                        ?>
                        <h2 style="text-align: center">Total time given: <?php echo $OmangTime1; ?> Minutes</h2>
                      </div>
                    </div>

                  </div>
                </div>
                <center>
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-info" id="mybut" data-value="start">START EXAM</button>
                    </div>
                    <!-- <div class="col-md-12">
              <button class="btn btn-info" id="mystop" data-value="stop">STOP EXAM</button>
            </div> -->
                  </div>
                </center>
                <br />
                <div class="row">
                  <div class="col-md-6" id="examSession">
                    <h4 style="color: #880000; font-size: 18px; text-transform: uppercase;">Exam now in session...</h4>
                  </div>
                  <!--  <div class="col-md-6" id="back">
              <button type="button" class="btn btn-primary pull-right">Back To Objective</button>
            </div> -->
                </div>
                <form method="POST" id="myForm" action="Success?subject_id=<?php echo $subject_id; ?>" class="">
                  <input type="checkbox" hidden checked name="option[]" id="option[]">
                  <div id="MyDiv" class="col-md-12" style="  border: 0px solid #CECECE; background: #f4f4f4;  border-radius: 10px;">
                    <div class="row">
                      <div class="col-md-12">
                        <div id="paging_container9" class="container">
                          <?php
                          $qryquestionscheck = $conn->questions($subject_id);

                          $i = 1;
                          foreach ($qryquestionscheck as $row) {
                            $question_id = $row['question_id'];
                            $questions = $row['questions'];
                            $optionA = $row['option_A'];
                            $optionB = $row['option_B'];
                            $optionC = $row['option_C'];
                            $optionD = $row['option_D'];
                            $optionE = $row['option_E'];
                            $correct_answer = $row['answer'];
                            //$_SESSION['course_title'] = $course_title;

                            $question_rowcount = $qryquestionscheck->rowCount();
                            $remainder = $question_rowcount / $number_of_question;
                            //echo $remainder; die();

                          ?>
                            <?php if ($i == 1) { ?>
                              <ul class="content">
                                <!-- <li style="list-style: none;"> -->
                                <div id='question<?php echo $i; ?>' class='cont'>

                                  <div class="form-group">
                                    <label style="font-weight: normal; text-align: justify;" class="questions"><b><?php echo "Question" . " " . $counter++; ?></b>&nbsp<?php echo $questions; ?></label><br>
                                    <div id="quiz-options">
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="A" data-quest="<?php echo $questions; ?>" value="A"> <?php echo $optionA; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="B" data-quest="<?php echo $questions; ?>" value=" B"> <?php echo $optionB; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="C" data-quest="<?php echo $questions; ?>" value=" C"> <?php echo $optionC; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="D" data-quest="<?php echo $questions; ?>" value=" D"> <?php echo $optionD; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="E" data-quest="<?php echo $questions; ?>" value=" E"> <?php echo $optionE; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <input type="hidden" name="correct_answer[]" id="correct_answer[]" value="<?php echo $correct_answer; ?>">
                                      <input type="text" name="id[]" value="<?php echo $question_id; ?>" />
                                      <br />
                                    </div>
                                  </div>
                                </div>
                                <!-- </li> -->
                              <?php } elseif ($i < $question_rowcount) { ?>
                                <!-- <li style="list-style: none;"> -->
                                <div id='question<?php echo $i; ?>' class='cont'>
                                  <!-- <input type="" name="id[]" value="<?php echo $questions; ?>"> -->
                                  <div class="form-group">
                                    <label style="font-weight: normal; text-align: justify;" class="questions"><b><?php echo "Question" . " " . $counter++; ?></b>&nbsp<?php echo $questions; ?></label><br>
                                    <div id="quiz-options" class="quiz_options">
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="A" data-quest="<?php echo $questions; ?>" value=" A"> <?php echo $optionA; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="B" data-quest="<?php echo $questions; ?>" value=" B"> <?php echo $optionB; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" class="checkbox" name="option[]" data-value="C" data-quest="<?php echo $questions; ?>" id=" option[]" value="C"> <?php echo $optionC; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="D" data-quest="<?php echo $questions; ?>" value=" D"> <?php echo $optionD; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="E" data-quest="<?php echo $questions; ?>" value=" E"> <?php echo $optionE; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <input type="hidden" name="correct_answer[]" id="correct_answer[]" value="<?php echo $correct_answer; ?>">
                                      <input type="hidden" name="id[]" value="<?php echo $question_id; ?>" />
                                    </div>
                                  </div>
                                </div>
                                <!-- </li> -->
                              <?php } elseif (($remainder < 1) || ($i == $number_of_question && $remainder == 1)) { ?>
                                <!-- <li style="list-style: none;"> -->
                                <div id='question<?php echo $i; ?>' class='cont'>

                                  <div class="form-group">
                                    <label style="font-weight: normal; text-align: justify;" class="questions"><b><?php echo "Question" . " " . $counter++; ?></b>&nbsp<?php echo $questions; ?></label><br>
                                    <div id="quiz-options" class="quiz_options">
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="A" data-quest="<?php echo $questions; ?>" value=" A"> <?php echo $optionA; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="B" data-quest="<?php echo $questions; ?>" value=" B"> <?php echo $optionB; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="C" data-quest="<?php echo $questions; ?>" value=" C"> <?php echo $optionC; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="D" data-quest="<?php echo $questions; ?>" value=" D"> <?php echo $optionD; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">
                                        <input type="checkbox" name="option[]" id="option[]" data-value="E" data-quest="<?php echo $questions; ?>" value=" E"> <?php echo $optionE; ?>
                                        <span class="checkmark"></span>
                                      </label>
                                      <input type="hidden" name="correct_answer[]" id="correct_answer[]" value="<?php echo $correct_answer; ?>">
                                      <input type="text" name="id[]" value="<?php echo $question_id; ?>" />

                                      <br>
                                      <button type="button" name="submit_tag" class='btn btn-info button' onclick="finish12();"> Finish & Submit </button>
                                    </div>
                                  </div>
                                </div>
                                <!-- </li> -->
                              </ul>
                              <nav class="justify-content-center">
                                <ul class="page_navigation">
                                  <li class="page-item">
                                    <a href="" class="justify-content-center"></a>
                                  </li>
                                </ul>
                              </nav>
                        </div>
                      <?php } ?>
                    <?php $i++;
                          } ?>


                      </div>
                    </div>

                  </div>
                </form>
                <script>
                  //call paginate
                  $(document).ready(function() {
                    $('#paging_container9').pajinate({
                      num_page_links_to_display: 100,
                      items_per_page: 1,
                      wrap_around: false,
                      show_first_last: false
                    });

                    //$('.button').prop('disabled', true);
                    const arrayAnswer = [];
                    const arrayAnswersingle = [];
                    const arrayNumberAnswer = [];
                    arrayAnswer.slice(" ");
                    var i = 1;
                    $('input[data-value]').click(function() {
                      var $this = $(this).data('value');
                      let quest = $(this).data('quest');
                      let checkedAnswer = $this;
                      var questionsCounter = i++;
                      var checkedArrayAnswer = arrayAnswer.push("Question:" + quest + " => " + checkedAnswer + "");
                      arrayAnswersingle.push(checkedAnswer);
                      console.log(arrayAnswersingle);
                      localStorage.setItem("answers", arrayAnswer);
                      localStorage.setItem("answers_single", JSON.stringify(arrayAnswersingle));
                      let me = $('.page_navigation').find('.active_page').text();
                      arrayNumberAnswer.push(me);

                      //$('.quiz_options').find('.me').attr('data-value').val();

                      console.log(arrayNumberAnswer);
                      console.log(arrayAnswer);
                      getChecked($this);
                      //$('.button').prop('disabled', false);
                    });

                    // var answeredQuest = localStorage.getItem("answers");
                    // var answeredDiv = document.getElementById('answeredQuest');
                    // answeredDiv.innerHTML = answeredQuest;

                    //let param = JSON.parse(localStorage.getItem("answers_single"));
                    //last_checked(param);
                    //console.log(param);
                    function getChecked($this) {
                      //localStorage.setItem('value', $this);
                      $('.page_navigation').find('.active_page').addClass('checkedactive');
                      // let me = $('.page_navigation').find('.active_page').text();
                      // let thisNumber = arrayNumberAnswer.push(me);
                      // //$('.quiz_options').find('.me').attr('data-value').val();

                      // console.log(thisNumber);
                    }
                  });



                  // function last_checked(param) {
                  //   //param.map(items => already_checked(items))
                  //   console.log(param);
                  //   for (i in param) {
                  //     console.log(param[i]);
                  //   }
                  //   //param.each(item => console.log(item))
                  // }

                  // function already_checked(items) {
                  //   switch (items) {
                  //     case 'A':
                  //       $('.content').each('#quiz-options').find('input[data-value="' + items + '"]').css('background-color', 'blue');
                  //       $('.page_navigation').find('.active_page').addClass('checkedactive');
                  //       break;
                  //     case 'B':
                  //       $('.content').each('#quiz-options').find('input[data-value="' + items + '"]').prop('checked', true);
                  //       $('.page_navigation').find('.active_page').addClass('checkedactive');
                  //       break;
                  //     case 'C':
                  //       $('.content').each('#quiz-options').find('input[data-value="' + items + '"]').prop('checked', true);
                  //       $('.page_navigation').find('.active_page').addClass('checkedactive');
                  //       break;
                  //     case 'D':
                  //       $('.content').each('#quiz-options').find('input[data-value="' + items + '"]').prop('checked', true);
                  //       $('.page_navigation').find('.active_page').addClass('checkedactive');
                  //       break;
                  //     case 'E':
                  //       $('.content').each('#quiz-options').find('input[data-value="' + items + '"]').prop('checked', true);
                  //       $('.page_navigation').find('.active_page').addClass('checkedactive');
                  //       break;
                  //     default:
                  //       $('.page_navigation').addClass('.checkedactive');
                  //       break;
                  //   }
                  // }
                </script>
                <!-- <div class="col-md-4">
   <ul id="pagination-demo" class="pagination-lg"></ul>
   </div> -->
              </div>
            </div>
          </section>

        </div>
      </div>
    </div>

    <!-- <div class="modal fade" id="button">
    <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal DB" method="POST">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" style="color: black;"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p style="color: black;">DELETE</p>
                    <h2 class="bold name" style="color: black;"></h2> <h2 class="bold" style="color: black;">Bill</h2>
                </div>
                <div class="mt-1 msgdb"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat buttondb" name="delete"><i class="fa fa-trash"></i> Delete</button>
            </div>
          </form>
        </div>
    </div>
</div> -->

    <!-- <script type="text/javascript">
$(function(){

  $(document).on('click', '.button', function(e){
    e.preventDefault();
    $('#button').modal('show');
  });
});
  </script> -->
  </div>
</main>
<?php
$Timer = $OmangTime1 * 100 * 60;
?>

<script>
  $(document).ready(function() {
    $('input[type="checkbox"]').change(function() {
      var $this = $(this).parents('#quiz-options').find('input[type="checkbox"]');
      $this.not(this).prop('checked', false);
      // ADDED THIS script
      // WILL DISABLE THE HIDDEN INPUT IF ANY OF THE CHECKBOX IS SELECTED
      var $nextthis = $(this).parents('#quiz-options').find('.null');
      $nextthis.attr('disabled', true);
    });

    var coure = document.getElementById("coure");
    var b = document.getElementById("mybut");

    $(b).click(function() {
      $(coure).hide();
    });

    var x = document.getElementById("MyDiv");
    var b = document.getElementById("mybut");
    var c = document.getElementById("examSession");
    var stop = document.getElementById("mystop");
    var timertwo = document.getElementById('timertwo');
    var button = document.getElementById('button');
    // var eassy = document.getElementById("eassy");
    // var eassybutton = document.getElementById("eassybutton");
    // var back = document.getElementById("back");


    $(x).hide();
    $(timertwo).hide();
    $(c).hide();
    $(stop).hide();
    $(b).show();
    $(coure).show();
    // $(back).hide();

    $(b).click(function() {
      //dataValue = $(this).data('value');
      //localStorage.setItem('cbt_timer_val', dataValue);
      getStarted();
    })

    $(button).click(function() {
      dataValue = $(this).data('value');
      localStorage.setItem('cbt_timer_val', '');
      getStarted(dataValue);
    })

    function startTimer() {

      var zeroFill = function(units) {
        return units < 10 ? "0" + units + "" : units;
      };
      var count = 0;

      var interval = window.setInterval(function() {
        var centisecondsRemaining = <?php echo $Timer ?>;
        var Timer = centisecondsRemaining - count;
        localStorage.setItem("Timer_cbt", Timer);
        // var hr = Math.floor((Timer % (1000 * 60 *  24)) / (1000 * 60 * 60 ));
        var min = Math.floor(Timer / 100 / 60);
        var sec = zeroFill(Math.floor(Timer / 100 % 60));
        //var cs = zeroFill(centisecondsRemaining % 100);
        document.getElementById('timer').innerHTML = min + "m" + ":" + sec + "s";
        count++;
        if (Timer === 0) {
          clearInterval(interval);
          document.getElementById("myForm").submit();
          alert('Your Time is up... Click OK to continue');
        }

        if (Timer === 15) {
          alert('Your Time is remaining... 15min');
        }
      }, 10);

    }

    // function stopTimer() {
    //   var zeroFill = function(units) {
    //     return units < 10 ? "0" + units + "" : units;
    //   };
    //   var count = 0;

    //   var interval = window.setInterval(function() {
    //     var centisecondsRemaining = <?php echo $Timer ?>;
    //     var Timer = centisecondsRemaining - count;
    //     // var hr = Math.floor((Timer % (1000 * 60 *  24)) / (1000 * 60 * 60 ));
    //     var min = Math.floor(Timer / 100 / 60 );
    //     var sec = zeroFill(Math.floor(Timer / 100 % 60));
    //     //var cs = zeroFill(centisecondsRemaining % 100);
    //     document.getElementById('timer').innerHTML =  min + "m" + ":" + sec + "s";
    //     count++;

    //   }, 10);

    //   clearInterval(interval);
    // }

    function getStarted() {
      $(x).show();
      $(c).show();
      $(stop).show();
      $(coure).hide();
      $(b).hide();
      startTimer();
    }

    function getStartedagain(dataValue) {
      if (dataValue == 'start') {
        $(x).show();
        $(c).show();
        $(stop).show();
        $(coure).hide();
        $(b).hide();
      } else {
        $(x).hide();
        $(c).hide();
        $(b).show();
        $(coure).show();
      }
    }
    // Cookies.get('starttime');
    // var value = Cookies.get('value');
    // switch(value) {
    //   case 'start':
    //     getStartedagain(value);
    //     break;
    //    case '':
    //     getStartedagain(value);
    //     break;
    //   default:
    //     $(x).hide();
    //     $(c).hide();
    //     $(b).show();
    //     $(coure).show();
    //     break;
    // }

    // $(eassybutton).click(function(){

    //   $(x).hide();
    //   $(eassy).show();
    //   $(c).show();
    //   $(back).show();
    // })

    // $(back).click(function(){

    //   $(x).show();
    //   $(eassy).hide();
    //   $(c).show();
    //   $(back).hide();
    // })

  });


  // var s = document.getElementById("MyDiv");

  // var eassy = window.getElementById("eassy");

  // $(eassy).hide();




  // $(eassybutton).click(function{
  //     $(eassy).show();
  //     $(s).hide();
  //   });

  // function myFunction() {

  //   if (x.style.display === "none") { 
  //     b.style.visibility = 'hidden';
  //     x.style.display = "block";
  //     c.style.display ="block";
  //     startTimer();
  //   }
  // }

  // function eassyFunction() {
  //   var diver = document.getElementById("MyDiv");
  //   var mybut = document.getElementById("mybut");
  //   var examSession = document.getElementById("examSession");
  //   var eassy = document.getElementById("eassy");
  //   if (diver.style.display === "block") { 
  //     mybut.style.visibility = 'hidden';
  //     diver.style.display = "hidden";
  //     examSession.style.display ="block";
  //     eassy.style.display ="block";
  //   }
  // }
  // window.onload = function () {
  //   document.getElementById('MyDiv').style.display = 'none';
  //   document.getElementById('examSession').style.display = 'none';
  //   document.getElementById('eassy').style.display = 'none';
  // };



  // $('.cont').addClass('hide');
  //     count=$('.questions').length;
  //      $('#question'+1).removeClass('hide');

  //      $(document).on('click','.next',function(){
  //          element=$(this).attr('id');
  //          last = parseInt(element.substr(element.length - 1));
  //          nex=last+1;
  //          $('#question'+last).addClass('hide');

  //          $('#question'+nex).removeClass('hide');
  //      });

  //      $(document).on('click','.previous',function(){
  //          element=$(this).attr('id');
  //          last = parseInt(element.substr(element.length - 1));
  //          pre=last-1;
  //          $('#question'+last).addClass('hide');

  //          $('#question'+pre).removeClass('hide');
  //      });
</script>

<script>
  function finish12() {

    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't Submit Your Exams You Would Not Be to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Submit it!',
      cancelButtonText: 'No, Not Yet!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        swalWithBootstrapButtons.fire(
          'Submitted',
          'success',
          document.getElementById("myForm").submit()
        )
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'GSS CBT',
          'Continue To Preview',
        )
      }
    })

  }
</script>
</body>

</html>