<?php include 'header-student.php'; ?>
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
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
          <i class="icon fa fa-angle-right"></i> EXAMINATION INSTRSTRUCTIONS
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
                        <th>Username</th>
                        <th><?php echo $session_track['username'] ?></th>
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
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-center text-info">EXAMINATION INSTRSTRUCTIONS</h2>
              <h4 class="text-center text-success">Please Read These Instructions Carefully:-</h4>
              <p> A candidate who breaches any of the Examination Regulations will be liable to disciplinary action including (but not limited to) suspension or expulsion from the University.</p>
              <dt style="font-weight: bold;font-size: 20px;">Personal Belongings:-</dt>
              <dd>
                <ul type="1">
                  <li> All your personal belongings (such as bags, pouches, ear/headphones, laptops etc.)
                    must be placed at the designated area outside the examination hall. Please do not bring any
                    valuable belongings except the essential materials required for the examinations.</li>
                  <li>The University will not be responsible for the loss or damage of any belongings in or outside the
                    examination hall.</li>
                </ul>
              </dd>
              <dt style="font-weight: bold;font-size: 20px;">Items not Permitted in the Examination Hall:-</dt>
              <dd>
                <ul type="1">
                  <li>Any unauthorised materials, such as books, paper, documents, pictures and electronic devices with communication and/or storage capabilities such as tablet PC, laptop, smart watch, portable audio/video/gaming devices etc. are not to be brought into the examination hall.</li>
                  <li><span style="font-weight: bold;">Handphones brought into the examination hall must be switched off at ALL times.</span> If your handphone is found to be switched on in the examination hall, the handphone will be confiscated and retained for investigation of possible violation of regulations.</li>
                  <li>No food or drink, other than water, is to be brought into the examination hall.</li>
                  <li>Photography is NOT allowed in the examination hall at ALL times.</li>
                </ul>
              </dd>
            </div>
            <div class="col-md-12">
              <h3>By Clicking On The Agree Button You Have Agree To The Exam Rule And Regulation</h3>
              <button onclick="agree();" class="btn btn-primary form-control"> AGREE</button>
            </div>


            <script>
              function agree() {

                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-warning'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: 'Are you sure?',
                  text: "You Have Read Through The Instuctions If Agreed To The Instructions You Will Not Be Able To Revert Your Discision, Thanks",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, I Agree!',
                  cancelButtonText: 'No, Not Yet!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    swalWithBootstrapButtons.fire(
                      'Proceed',
                      'We Wish You Success',
                      window.location.href = 'Start'
                    )
                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'GSS CBT',
                      'Continue To Read Through'
                    )
                  }
                })

              }
            </script>


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