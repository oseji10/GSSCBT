<?php
// set session
session_start();
require 'server/server.php';

if (!isset($_SESSION['admissionNo'])){
	header ('location: Home');
} else {
	// set session for sessioned data
	$admissionNo = $_SESSION['admissionNo'];
}

// fetch out data for sessioned user
$session_track = $pdo->session_track($admissionNo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script lang="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <link rel="shortcut icon" href="assets/image/favicon.png" type="image/x-icon">
    <meta name="description" content="">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="">
    <meta property="twitter:site" content="">
    <meta property="twitter:creator" content="">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="">
    <meta property="og:site_name" content="">
    <meta property="og:title" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <title>CRUTECH | CBT</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/main.css">
   
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="assets/admin/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style/style.css" type="text/css" rel="stylesheet" />
    <link href="style/sweet-alert.css" type="text/css" rel="stylesheet" />
    <link href="style/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style/lineicons/style.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   

    <style type="text/css">
hr { 
  height: 30px; 
  border-style: solid; 
  border-color: #8c8b8b; 
  border-width: 1px 0 0 0; 
  border-radius: 20px; 
} 
hr { 
  display: block; 
  content: ""; 
  height: 30px; 
  margin-top: 15px; 
  border-style: solid; 
  border-color: #8c8b8b; 
  border-width: 0 0 1px 0; 
  border-radius: 20px; 
}
</style>
<script lang="javascript" type="text/javascript">
    document.onkeydown = function (e) {
        if(event.keyCode == 116){
          event.preventDefault();
        }
        
        // if(event.keyCode = 123){
        //     return false;
        // }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
    }
 </script>
<style>
 :root {
  --modal-duration: 1s;
  --modal-color: #428bca;
}

.button {
  background: #428bca;
  padding: 1em 2em;
  color: #fff;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
}

.button:hover {
  background: #3876ac;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  margin: 10% auto;
  width: 60%;
  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
  animation-name: modalopen;
  animation-duration: var(--modal-duration);
}

.modal-header h2,
.modal-footer h3 {
  margin: 0;
}

.modal-header {
  background: var(--modal-color);
  padding: 15px;
  color: #fff;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.modal-body {
  padding: 10px 20px;
  background: #fff;
}

.modal-footer {
  background: var(--modal-color);
  padding: 10px;
  color: #fff;
  text-align: center;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.close {
  color: #ccc;
  float: right;
  font-size: 30px;
  color: #fff;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

@keyframes modalopen {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

 </style>
</head>
<body oncontextmenu="return false;" class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header" style="background-color: #004196;">
  <a class="app-header__logo" href="#" style="background-color: #004196;">GSS CBT </a>
    <ul class="app-nav">
      <!-- <h4 style="color: white;" id="timertwo">Time Remaining <span class="btn btn-danger" id="timertwooo">00m:00s</span></h4> -->
        <h4 style="color: white;" id="timerrr" >Time Remaining <span class="btn btn-danger" id="timer">00m:00s</span></h4>
        <h4><button id="modal-btn" class="btn btn-success"><i class="fa fa-calculator"></i></button></h4>
    </ul>
</header>



  <div id="my-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
      <div class=" calc box-shadow " >
    <div class="well display">
    <div id="calculation" class="text-right">
    </div>
    <div id="result" class="text-right">
    </div>
  </div>
  <div class="container-fluid numbersWell">
    <button id="btnClearOne" class="col-xs-2 btn btn-default ">Del</button>
    <button id="btnClear" class=" col-xs-2 btn btn-default">CE</button>
    <button id="btnBracket1" class="col-xs-2 btn btn-default numbers">(</button>
    <button id="btnBracket2" class=" col-xs-2 btn btn-default numbers">)</button>
    <button id="btnSign" class=" col-xs-2 btn btn-default">-/+</button>
    <button id="btnPower" class=" col-xs-2 btn btn-default">ON</button>


    <button id="btnSin" class=" col-xs-3 btn btn-default trig">sin</button>
    <button id="btnCos" class=" col-xs-3 btn btn-default trig">cos</button>
    <button id="btnTan" class="col-xs-3 btn btn-default trig">tan</button>
    <button id="btnDivide" class=" col-xs-3 btn btn-default numbers arithmetic">/</button>

    <button id="btn7" class=" col-xs-3  btn btn-default numbers">7</button>
    <button id="btn8" class="col-xs-3  btn btn-default numbers">8</button>
    <button id="btn9" class="col-xs-3 btn btn-default numbers">9</button>
    <button id="btnPlus" class="col-xs-3 btn btn-default numbers arithmetic">+</button>

    <button id="btn4" class="col-xs-3 btn btn-default numbers">4</button>
    <button id="btn5" class="col-xs-3 btn btn-default numbers">5</button>
    <button id="btn6" class=" col-xs-3 btn btn-default numbers">6</button>
    <button id="btnMinus" class=" col-xs-3 btn btn-default numbers arithmetic">-</button>

    <button id="btn1" class="col-xs-3 btn btn-default numbers">1</button>
    <button id="btn2" class="col-xs-3 btn btn-default numbers">2</button>
    <button id="btn3" class="col-xs-3 btn btn-default numbers">3</button>
    <button id="btnTimes" class="col-xs-3 btn btn-default numbers arithmetic">*</button>


    <button id="btnPoint" class=" col-xs-3  btn btn-default numbers">.</button>
    <button id="btn0" class=" col-xs-3 btn btn-default numbers">0</button>
    <button id="btnPercent" class=" col-xs-3 btn btn-default">%</button>

    <button id="btnEquals" class="col-xs-3  btn btn-default">=</button>

    </li>
  </div>
</div>
      </div>
      <div class="modal-footer">
        <h3 class="text-center">CRUTECH GSS EXAMINATION BOARD CALCULATOR</h3>
      </div>
    </div>
  </div>                         

<script>
// Get DOM Elements
const modal = document.querySelector('#my-modal');
const modalBtn = document.querySelector('#modal-btn');
const closeBtn = document.querySelector('.close');

// Events
modalBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);

// Open
function openModal() {
  modal.style.display = 'block';
}

// Close
function closeModal() {
  modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}

</script>
<script src='js/jquery-ui.min.js'></script>
<script src='js/jquery.min.js'></script>
<script  src="js/index.js"></script>
 
