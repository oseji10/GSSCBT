<?php
include 'header.php';
include 'menubar.php';
$con=mysqli_connect('localhost','root','','OMG_Online_One');
$query="select * from examschedule";
$result=mysqli_query($con,$query);
$row=mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/CSS" href="CSS/ExamSchedule.css">-->
	<style type="text/css">
		div#ExamSchedule
		{
			width: 70%;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div id="ExamSchedule">

		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
