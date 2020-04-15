<?php
	ob_start();
	date_default_timezone_set('Etc/UTC');
	require '../PHPMailer/src/PHPMailer.php';
	require("../PHPMailer/src/SMTP.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true; 
    $mail->Username = "your email"; 
    $mail->Password = "email password"; 
	
	session_start();
	$id = $_SESSION['id'];
	if(empty($id)){
		header('Location: ../login.php');
	}	
	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
	$phone = $_SESSION['phone'];
	$colid = $_SESSION['colid'];
	$course = $_SESSION['course'];
	$year = $_SESSION['year'];
	$branch = $_SESSION['branch'];
	$collegeName = $_SESSION['collegeName'];
	$city = $_SESSION['city'];
	$accommodation = $_SESSION['accommodation'];
	$emailVerification = $_SESSION['emailVerification'];
	$ticket = filter_input(INPUT_POST, 'ticket');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$_SESSION['event'] = $ticket;
	}	
?>








<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDM Night</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" href="../p.png" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<body>
	<!-- Preloader
   ================================================== -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<div id="loading"><img src = "../images/preloader1.gif"></div>
	<style>
	#loading{
	  position: fixed;
	  height: 100%;
	  top:0;
	  left:0;
	  right:0;
	  bottom:0;
	  background-color: #000;
	  color: white;
	  
	  transition: 0.5s;
	  z-index: 999999;
	}
	#loading img{
	  height: 350px;
	  width: 350px;
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	  top: 35%;
	  left: 45%;
	  position: absolute;
      margin: -100px 0 0 -100px;
	}
	#loading.hidden{
	  opacity: 0;
	  visibility: hidden;
	}
	@media only screen and (max-width: 480px){
		#loading img{
			height: 250px;
			width: 250px;
			top: 45%;
			left: 45%;
		}	
	}	
	@media only screen and (max-width: 767px){
		#loading img{
			height: 250px;
			width: 250px;
			top: 45%;
			left: 45%;
		}
	}	
	@media only screen and (max-width: 900px){
		#loading img{
			height: 250px;
			width: 250px;
			top: 45%;
			left: 45%;
		}
	}	
	@media only screen and (max-width: 1024px){
		#loading img{
			height: 250px;
			width: 250px;
			top: 45%;
			left: 47%;
		}
	}	
	</style>
	<script>
	setTimeout(function() {
	  $('#loading').addClass('hidden');
	}, 2000);

	</script>
	
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="container-right" style = "background-image: url('../images/edm.jpg'); background-size: cover;">
				</div>
				<form class="login100-form-register validate-form" method="post" action="pdf.php">
					<span class="login100-form-title">
						Instruction
					</span>
					<div class = "form-274">
						<div class = "scroll " id = "style-11">
							<div class="wrap-input100" style = "color: #fefefe;">
								<ul>
								<li>The User hereby consents, expresses and agrees that he has read and fully understands the Privacy Policy of Bigtree in respect of the Website, The User further consents that the terms and contents of such Privacy Policy are acceptable to him.
								</li>
								<li>The User agrees and undertakes not to sell, trade or resell or exploit for any commercial purposes, any portion of the Service. For the removal of doubt, it is clarified that the Website is not for commercial use but is specifically meant for personal use only.
								</li>
								<li>The User further agrees and undertakes not to reverse engineer, modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information, software, products or services obtained from the Website. For the removal of doubt, it is clarified that unlimited or wholesale reproduction, copying of the content for commercial or non-commercial purposes and unwarranted modification of data and information within the content of the Website is not permitted.
								</li>
							</div>
							
							<div class="wrap-input100">
								<input type="checkbox" name="check" id = "check" >
								 <span style = "color: #fefefe">I acknowledge that I have read, and do hereby accept the terms and conditions </span><br>
							</div>
						</div>	
					</div>	
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type = "submit" value="EDM Night" name="ticket" onclick="return testcheck()">
							Book Ticket
						</button>
					</div>
					<script>
						function testcheck()
						{
							if (!jQuery("#check").is(":checked")) {
								alert("Click on checkbox to proceed further");
								return false;
							}
							else{
								return true;
							}
						}
					</script>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<!--<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<!--<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<!--<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<!--<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<!--<script src="../js/main.js"></script>-->

</body>
</html>