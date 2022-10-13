<?php include 'login-header.php'; ?>
<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100 " style="padding: 25px;">
      <form class="login100-form validate-form flex-sb flex-w  login" id="loginForm" method="POST" action="login_form.php">
        <span class="login100-form-title m-20" style="margin: 15px; text-align: center;">
          Account Login
        </span>


        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <span class="txt1 p-b-11">
                Reg No
              </span>
              <input class="form-control" type="text" id="admissionNo" name="admissionNo" placeholder="Reg NO">
              <!-- <span class="focus-input100"></span> -->
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <span class="txt1 p-b-11">
                Password
              </span>
              <input class="form-control" type="password" id="pass" name="password" placeholder="Enter Password">
              <!-- <span class="focus-input100"></span> -->
            </div>
          </div>
        </div>

        <div class="container-login100-form-btn">
          <button type="submit" class="btn btn-primary form-control " name="loginbtn" id="">
            Login
          </button>
        </div>
      </form>
      <div style="display: flex; justify-content: center; align-items: center;">
        <strong style="text-align: center;">Demo Login Details: RegNo: 16/csc/116, Password: 1234</strong>
      </div>
    </div>
  </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<!--jQuery JS-->
<script src="assets/admin/js/jquery-1.10.2.js"></script>
<!--Bootstrap JS-->
<script src="assets/frontend/js/bootstrap.min.js"></script>
<script src="assets/frontend/js/popper.js"></script>
<script src="assets/frontend/js/owl.carousel.min.js"></script>
<script src="assets/admin/js/jGrowl/jquery.jgrowl.js"></script>

<!--YTPlayer-->
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('.login').submit(function(e) {
      e.preventDefault();
      var formData = jQuery(this).serialize();
      $.ajax({
        type: 'post',
        url: 'login_form.php',
        data: formData,
        success: function(html) {
          if (html == 200) {
            $.jGrowl("Proccessing Your Request Please Wait......", {
              sticky: true
            });
            $.jGrowl("Welcome to GSS CBT Management System", {
              header: 'Access Granted'
            });
            var delay = 3000;
            setTimeout(function() {
              window.location = 'Dashboard-Student'
            }, delay);
          } else {
            $.jGrowl("Request Fail" + html, {
              header: 'Sorry!!'
            });
          }
        }

      });
      return true;
    });
  });
</script>

</body>

</html>