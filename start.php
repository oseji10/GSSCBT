<?php include 'header-student.php'; ?>
<main style="margin: 30px; ">
  <div class="app-title">
    <div>
      <h1>Student Dashboard</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="margin-bottom: 20px!important;">
        <div class="card-header">
          <i class="icon fa fa-angle-right"></i> START EXAM
        </div>
        <div class="card-body">

          <div class="row mb-4">
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
                        <th>Leve</th>
                        <th><?php echo $session_track['level'] ?></th>
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
                            <img src="images/<?php echo $session_track['photo']; ?>" class="justify-center" style="width: 150px; height: 118px; border-radius: 10px;" />
                          </div>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="course-links">
                <table class="table table-border">
                  <thead>
                    <tr>
                      <th>Course Title</th>
                      <th>Question Count</th>
                      <th><strong class="pull-right">Action</strong></th>
                    </tr>
                  </thead>

                  <?php
                  $select = $pdo->subject_track($session_track['level_id']);
                  foreach ($select as $c) {
                    $subject_id = $c['subject_id'];
                  ?>
                    <tbody>
                      <tr>
                        <th><?php echo $c['subject_name']; ?></th>
                        <th><button class="btn btn-primary"><?php echo $pdo->subject_question_count($c['subject_id']); ?></button></th>
                        <th><?php echo $conn->handle_exam($subject_id, $admissionNo) ?></th>
                    </tbody>
                  <?php
                  }
                  ?>
                </table>
                <br>
              </div>
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
  $('#edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var title = button.data('mytitle');
    var description = button.data('mydescription');
    var cat_id = button.data('catid');
    var modal = $(this);
    modal.find('.modal-body #title').val(title);
    modal.find('.modal-body #des').val(description);
    modal.find('.modal-body #cat_id').val(cat_id);
  });

  $('#delete').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var cat_id = button.data('catid');
    var modal = $(this);
    modal.find('.modal-body #cat_id').val(cat_id);
  });
</script>

</body>

</html>