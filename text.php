<?php include 'server/header.php';?>
<?php include 'server/sidebar.php'?>
<?php include 'server/counter.php'?>
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
            <i class="icon fa fa-angle-right"></i> EXAMINATION  INSTRSTRUCTIONS
          </div>
          <div class="card-body">
 <section id="callaction" class="home-section paddingtop-20">
 <div class="col-md-12">
<div class="container">
          
          <div class="col-md-10" style="max-height: 500px; overflow-x: auto; border: 0px solid #CECECE; background: #f4f4f4; padding: 18px 18px 18px 18px; border-radius: 10px;">
            <div class="row">
            <div class="col-md-10">
             <form method="POST" role="form" class="login" action="Success">
             <table class="table">
             <?php 
                        $remainder = 0;
                        $c = 1;
                        $Number = $_POST['number'];
                        $course = $_POST['course'];
                        for($i=1;$i<=$Number;$i++){
                        ?>
             <?php if($i==0){?>
              <div id='question<?php echo $i;?>' class='cont'>
               <div class="form-group">
                  <label style="font-weight: normal; text-align: justify;" class="questions"><b><?php echo "Question" . " " . $c++; ?></b></label><br>
                  <div id="quiz-options">
                         <tr>
                            <td colspan="2">
                                Question Number #<?php echo $i; ?>
                                <input type="hidden" value="<?php echo $Number; ?>" name="number" />
                            </td>
                        </tr>
                        <tr>
                            <th>Select Course</th>
                            <td>
                            <input class="form-control" id="" name="course_title[]" type="text" autocomplete="off" value="<?php echo $course; ?>" readonly  />
                        </td>
                        </tr>
                        <tr>
                            <th>Enter Question</th>
                            <td>
                            <textarea class="form-control" placeholder="Enter Question" rows="10" cols="40" id="" name="question[]" ></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Option A</th>
                            <td>
                                <input class="form-control" placeholder="Option A" id="" name="option_A[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option B</th>
                            <td>
                            <input class="form-control" placeholder="Option B" id="" name="option_B[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option C</th>
                            <td>
                            <input class="form-control" placeholder="Option C" id="" name="option_C[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option D</th>
                            <td>
                            <input class="form-control" placeholder="Option D" id="" name="option_D[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option E</th>
                            <td>
                            <input class="form-control" placeholder="Option E" id="" name="option_E[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Select Correct Option</th>
                            <td>
                            <select class="form-control" name="correct_answer[]">
                            <option value="Null">Select Correct Option</option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                            <option value="D">Option D</option>
                            <option value="E">Option E</option>
                            </select>
                            </td>
                        </tr>
                  
                    <button id='next<?php echo $i;?>' class='next btn btn-default pull-right' type='button' >Next</button>
                    
                  </div>
                </div>
              </div>
              <?php }elseif($i<0){?>
                <div id='question<?php echo $i;?>' class='cont'>
               <div class="form-group">
                  <label style="font-weight: normal; text-align: justify;" class="questions"><b><?php echo "Question" . " " . $c++; ?></b>&nbsp</label><br>
                  <div id="quiz-options">
                         <tr>
                            <td colspan="2">
                                Question Number #<?php echo $i; ?>
                                <input type="hidden" value="<?php echo $Number; ?>" name="number" />
                            </td>
                        </tr>
                        <tr>
                            <th>Select Course</th>
                            <td>
                            <input class="form-control" id="" name="course_title[]" type="text" autocomplete="off" value="<?php echo $course; ?>" readonly  />
                        </td>
                        </tr>
                        <tr>
                            <th>Enter Question</th>
                            <td>
                            <textarea class="form-control" placeholder="Enter Question" rows="10" cols="40" id="" name="question[]" ></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Option A</th>
                            <td>
                                <input class="form-control" placeholder="Option A" id="" name="option_A[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option B</th>
                            <td>
                            <input class="form-control" placeholder="Option B" id="" name="option_B[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option C</th>
                            <td>
                            <input class="form-control" placeholder="Option C" id="" name="option_C[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option D</th>
                            <td>
                            <input class="form-control" placeholder="Option D" id="" name="option_D[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option E</th>
                            <td>
                            <input class="form-control" placeholder="Option E" id="" name="option_E[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Select Correct Option</th>
                            <td>
                            <select class="form-control" name="correct_answer[]">
                            <option value="Null">Select Correct Option</option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                            <option value="D">Option D</option>
                            <option value="E">Option E</option>
                            </select>
                            </td>
                        </tr>
                    <br>                  
                    <button id='pre<?php echo $i;?>' class='previous btn btn-default' type='button'>Previous</button>                    
                    <button id='next<?php echo $i;?>' class='next btn btn-default pull-right' type='button' >Next</button>
                  </div>
               </div>
              </div>
            <?php }elseif(( $remainder < 1 ) || ( $i && $remainder == 1 ) ){?>
                <div id='question<?php echo $i;?>' class='cont'>
               <div class="form-group">
               <label style="font-weight: normal; text-align: justify;" class="questions"><b><?php echo "Question" . " " . $c++; ?></b>&nbsp</label><br>
                  <div id="quiz-options">
                         <tr>
                            <td colspan="2">
                                Question Number #<?php echo $i; ?>
                                <input type="hidden" value="<?php echo $Number; ?>" name="number" />
                            </td>
                        </tr>
                        <tr>
                            <th>Select Course</th>
                            <td>
                            <input class="form-control" id="" name="course_title[]" type="text" autocomplete="off" value="<?php echo $course; ?>" readonly  />
                        </td>
                        </tr>
                        <tr>
                            <th>Enter Question</th>
                            <td>
                            <textarea class="form-control" placeholder="Enter Question" rows="10" cols="40" id="" name="question[]" ></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Option A</th>
                            <td>
                                <input class="form-control" placeholder="Option A" id="" name="option_A[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option B</th>
                            <td>
                            <input class="form-control" placeholder="Option B" id="" name="option_B[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option C</th>
                            <td>
                            <input class="form-control" placeholder="Option C" id="" name="option_C[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option D</th>
                            <td>
                            <input class="form-control" placeholder="Option D" id="" name="option_D[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Option E</th>
                            <td>
                            <input class="form-control" placeholder="Option E" id="" name="option_E[]" type="text" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>Select Correct Option</th>
                            <td>
                            <select class="form-control" name="correct_answer[]">
                            <option value="Null">Select Correct Option</option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                            <option value="D">Option D</option>
                            <option value="E">Option E</option>
                            </select>
                            </td>
                        </tr>
                
                     <br>      
                    <button id='pre<?php echo $i;?>' class='previous btn btn-default' type='button'>Previous</button>
                    <input type="submit" class="btn btn-primary pull-right" name="add" id="addBtn" value="Add Question">                    
                  </div>
               </div>
              </div>
    <!--/ All Subject box-->
              <?php }
            $i++;} ?>
            </form>
            </table>
            </div>
            <!--<p><?php echo count($remainder); ?> Of <?php echo $c; ?></p>-->
          </div>
        </div>
        </div>
            </div>
 </section>

            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <div class="modal fade" id="finsh" role="dialog">
    <div class="modal-dialog modal-lg" style="max-height: 600px; overflow-x: auto;">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body padtrbl">
        <div class="form-group">
                  <h3 style="text-align: center;">Are You Sure You Want To Submit This Exam?</h3>
                <div class="row">
                <div class="col-md-6">
                <div class="col-md-3">
                <button type="button" class="btn btn-success" onclick = "submitForm();" >SUBMIT</button>
                </div>
                <div class="col-md-3">
                <button data-dismiss="modal" class="btn btn-primary" >CANCEL</button>
                </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<script src="js/jquery/jquery-2.1.3.min.js" type="text/javascript"> </script>
<script src="js/jquery/bootstrap.min.js" type="text/javascript"> </script>
<script src="js/sweet-alert.js" type="text/javascript"> </script>
<script src="js/jGrowl/jquery.jgrowl.js" type="text/javascript"> </script>

<script>
$(document).ready(function() {

$('.cont').addClass('hide');
    count=$('.questions').length;
     $('#question'+1).removeClass('hide');

     $(document).on('click','.next',function(){
         element=$(this).attr('id');
         last = parseInt(element.substr(element.length - 1));
         nex=last+1;
         $('#question'+last).addClass('hide');

         $('#question'+nex).removeClass('hide');
     });

     $(document).on('click','.previous',function(){
         element=$(this).attr('id');
         last = parseInt(element.substr(element.length - 1));
         pre=last-1;
         $('#question'+last).addClass('hide');

         $('#question'+pre).removeClass('hide');
     });
    });
</script>

</body>
</html>
