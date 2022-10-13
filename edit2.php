<?php include 'server/header.php';?>
<?php include 'server/sidebar.php'?>
<?php include 'server/counter.php'?>
<?php

// get data for Staff
if (isset($_GET['staff_id'])){
  $staff_id = $_GET['staff_id'];

  // fetch data with the question id
  $select_question = "SELECT * FROM `staff` WHERE `staff_id`='".$staff_id."' LIMIT 1";
  $check_select = $conn->query($select_question);
  if ($check_select->num_rows > 0){
    while ($row = $check_select->fetch_assoc()){
      $staff_id = $row['staff_id'];
      $fullname = $row['fullname'];
      $email = $row['email'];
      $phone = $row['phone'];
      $department = $row['department'];
      $faulcuty = $row['faulcuty'];
      
    }
  } else {
    echo "Staff ID not found";
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
            <i class="icon fa fa-book"></i> STAFF ID: <?php echo $staff_id; ?> (<?php echo $fullname; ?>)
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <table class="table">


<?php

if (isset($_POST['update'])){
    // get inputed values
    // $staff_id = $_POST['staff_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $faulcuty = $_POST['faulcuty'];

    // check if all field is not empty
    if (empty($fullname && $email && $phone && $department && $faulcuty ) == false)
    {
    
      //insert data into the data
      $sqlupdate = "UPDATE staff SET `fullname`='".$fullname."', `email`='".$email."', `phone`='".$phone."', `department`='".$department."', `faulcuty`='".$faulcuty."' WHERE `staff_id`='".$staff_id."' LIMIT 1";
      $checksql = $conn->query($sqlupdate);
      if ($checksql){
        ?>
    <div class="alert alert-warning fadeIn">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong><span class="ti ti-announcement fa-2x"></span> </strong> <strong>&nbsp;&nbsp; Staff Updated Successfully</strong>
  </div>
  <script type="text/javascript">
  var delay = 4000;
        setTimeout(() => {
            window.location.href = 'View-Staff';
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
                            <th>FULLNAME</th>
                            <td>
                            <input class="form-control" id="" name="fullname" type="text" autocomplete="off" value="<?php echo $fullname; ?>"   />
                        </td>
                        </tr>
                        <tr>
                            <th>EMAiL</th>
                            <td>
                            <input class="form-control" type="email" placeholder="Email"  id="" value="<?php echo $email; ?>" name="email" >
                            </td>
                        </tr>
                        <tr>
                            <th>PHONE NUMBER</th>
                            <td>
                                <input class="form-control" placeholder="Phone Number" id="" name="phone" type="text" autocomplete="off" value="<?php echo $phone; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <th>DEPARTMENT</th>
                            <td>
                            <input class="form-control" placeholder="Department" id="" name="department" type="text" value="<?php echo $department; ?>" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <th>FAULCUTY</th>
                            <td>
                            <input class="form-control" placeholder="Faulcuty" id="" name="faulcuty" type="text" value="<?php echo $faulcuty; ?>" autocomplete="off"  />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" class="btn btn-primary" name="update" id="addBtn" value="Update Staff">
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
