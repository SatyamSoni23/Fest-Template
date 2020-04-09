<?php
	date_default_timezone_set('Etc/UTC');
	require '../PHPMailer/src/PHPMailer.php';
	require("../PHPMailer/src/SMTP.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true; 
    $mail->Username = "Your Email Id"; 
    $mail->Password = "Password"; 
	$register = filter_input(INPUT_POST, 'register');
	
	session_start();
	$id = $_SESSION['id'];
	if(!$id){
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
	
	$teamname = filter_input(INPUT_POST, 'teamname');
	$teamsize = filter_input(INPUT_POST, 'teamsize');
	$email1 = filter_input(INPUT_POST, 'email1');
	$pass1 = encryptIt(filter_input(INPUT_POST, 'pass1'));
	$email2 = filter_input(INPUT_POST, 'email2');
	$pass2 = encryptIt(filter_input(INPUT_POST, 'pass2'));
	$email3 = filter_input(INPUT_POST, 'email3');
	$pass3 = encryptIt(filter_input(INPUT_POST, 'pass3'));
	$email4 = filter_input(INPUT_POST, 'email4');
	$pass4 = encryptIt(filter_input(INPUT_POST, 'pass4'));
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "fest_registration";
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
		if(mysqli_connect_error())
		{
			die('Connect Error ('.mysqli_connect_error().')'.mysqli_connect_error());
		}	
		else{
			$table = "linefollower";
			$flag1 = 0;
			$flag2 = 0;
			$flag3 = 0;
			$flag4 = 0;
			if(!$email1){
				$email1 = "XXXX";
				$pass1 = "XXXX";
				$flag = 1;
			}
			else{
				$sql1 = "SELECT * FROM festDetail WHERE email = '$email1' && password = '$pass1'";
				if($conn->query($sql1)->num_rows > 1){
					$flag1 = 1;
				}	
			}	
			if(!$email2){
				$email2 = "XXXX";
				$pass2 = "XXXX";
				$flag2 = 1;
			}
			else{
				$sql2 = "SELECT * FROM festDetail WHERE email = '$email12' && password = '$pass2'";
				if($conn->query($sql2)->num_rows > 1){
					$flag2 = 1;
				}
			}	
			if(!$email3){
				$email3 = "XXXX";
				$pass3 = "XXXX";
				$flag3 = 1;
			}
			else{
				$sql3 = "SELECT * FROM festDetail WHERE email = '$email3' && password = '$pass3'";
				if($conn->query($sql3)->num_rows > 1){
					$flag3 = 1;
				}
			}	
			if(!$email4){
				$email4 = "XXXX";
				$pass4 = "XXXX";
				$flag4 = 1;
			}
			else{
				$sql4 = "SELECT * FROM festDetail WHERE email = '$email4' && password = '$pass4'";
				if($conn->query($sql4)->num_rows > 1){
					$flag4 = 1;
				}
			}	
			
			$sql5 = "SELECT * FROM `".$table."` WHERE email = '$email'";
			$result = $conn->query($sql5);
			if($result->num_rows > 0){	
				echo '<script language="javascript">';
				echo 'alert("Fest20.0"+ "\n"  +  "You already registered"); window.location.href = "linefollower.php"';
				echo '</script>';
			}
			else{
				if(($conn->query("SHOW TABLES LIKE '".$table."'"))->num_rows == 1){
					$sql7 = "INSERT INTO `".$table."` (id, email, name, phone, teamname, email1, email2, email3, email4)
							values('$id', '$email', '$name', '$phone', '$teamname', '$email1', '$email2', '$email3', '$email4');";
						if($conn->query($sql7)){
							$mail->setFrom('sat.test1000@gmail.com', 'FestName'); 
							$mail->addAddress($email, $name); 
							$mail->Subject = 'Successfull Registration'; 
							$mail->Body = "Congratulation, {$name} and {$id} \t\t\t\t\n You are successfully registered in Line Follower in Purva 20.0";
							if ($mail->send()) {
								echo '<script language="javascript">';
								echo 'alert("Purve20.0"+ "\n"  +  "Congrats your registration has been successfull"); window.location.href = "../techEvents.php"';
								echo '</script>';
							} else {
								echo '<script language="javascript">';
								echo 'alert("Purve20.0"+ "\n"  +  "Oops Something went wrong, Please try after sometime"); window.location.href = "../techEvents.php"';
								echo '</script>';
							}
							echo"success";
						}
						else{
							echo "Error: ". $sql7 ."<br>". $conn->error;
						}		
				}
				else{
					$sql6 = "CREATE TABLE `".$table."` (id VARCHAR(12), email VARCHAR(60) PRIMARY KEY, name VARCHAR(50), phone VARCHAR(13), teamname VARCHAR(40), email1 VARCHAR(60), email2 VARCHAR(60), email3 VARCHAR(60), email4 VARCHAR(60))";
					if($conn->query($sql6)){
						$sql7 = "INSERT INTO `".$table."` (id, email, name, phone, teamname, email1, email2, email3, email4)
							values('$id', '$email', '$name', '$phone', '$teamname', '$email1', '$email2', '$email3', '$email4');";
						if($conn->query($sql7)){
							$mail->setFrom('sat.test1000@gmail.com', 'FestName'); 
							$mail->addAddress($email, $name); 
							$mail->Subject = 'Successfull Registration'; 
							$mail->Body = "Congratulation, {$name} and {$id} \t\t\t\t\n You are successfully registered in Line Follower in Purva 20.0";
							if ($mail->send()) {
								echo '<script language="javascript">';
								echo 'alert("Purve20.0"+ "\n"  +  "Congrats your registration has been successfull"); window.location.href = "../techEvents.php"';
								echo '</script>';
							} else {
								echo '<script language="javascript">';
								echo 'alert("Purve20.0"+ "\n"  +  "Oops Something went wrong, Please try after sometime"); window.location.href = "../techEvents.php"';
								echo '</script>';
							}
							echo"success";
						}
						else{
							echo "Error: ". $sql7 ."<br>". $conn->error;
						}
					}
					else{
						echo "Error: ". $sql6 ."<br>". $conn->error;
					}	
				}
			}
				

		}
		$conn->close();
	}	
    function encryptIt( $q ) {
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encryption_iv = '1234567891011121'; 
    $encryption_key = "YourFest2020";
    $encryption = openssl_encrypt($q, $ciphering, $encryption_key, $options, $encryption_iv); 
    return ($encryption);
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
	<title>Melodrama</title>
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
				<div class="container-right" style = "background-image: url('../images/melodrama.jpg'); background-size: cover;">
				</div>
				<form class="login100-form-register validate-form" method="post" action="linefollower.php">
					<span class="login100-form-title">
						Registration
					</span>
					<div class = "form-274">
						<div class = "scroll " id = "style-11">
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="teamname" placeholder="Team Name" id = "teamname" onfocus = "this.value=''" required = "true">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-users" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input">
								<select class="input100 round" id="teamsize" name="teamsize" placeholder="Team Size" required="true">
										<option selected="" disabled="">Select Team Size</option>
										<option value="one" class="input100">1</option>
										<option value="two" class="input100">2</option>
										<option value="three" class="input100">3</option>
										<option value="four" class="input100">4</option>
									
								</select>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-male" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="email1" placeholder="Team Member Email" id = "email1" disabled = "true"  onfocus = "this.value=''" required = "false">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="pass1" placeholder="Password" id = "pass1" disabled = "true"
								required = "false">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
					
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="email2" placeholder="Team Member Email" id = "email2" disabled = "true"  onfocus = "this.value=''" required = "false">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="pass2" placeholder="Password" id = "pass2" disabled = "true" required = "false">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="email3" placeholder="Team Member Email" id = "email3" disabled = "true"  onfocus = "this.value=''" required = "false">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="pass3" placeholder="Password" id = "pass3" disabled = "true" required = "false">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="email4" placeholder="Team Member Email" id = "email4" disabled = "true"  onfocus = "this.value=''" required = "false">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="pass4" placeholder="Password" id = "pass4" disabled = "true" required = "false">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
						<script>
								$('#teamsize').change(function() {
									if($(this).val() == "one") {
										$('#email1').prop("disabled", true);
										$('#email2').prop("disabled", true);
										$('#email3').prop("disabled", true);
										$('#email4').prop("disabled", true);
										
										$('#pass1').prop("disabled", true);
										$('#pass2').prop("disabled", true);
										$('#pass3').prop("disabled", true);
										$('#pass4').prop("disabled", true);
									}
									else if($(this).val() == "two"){
										$('#email1').prop("disabled", false);
										$('#email2').prop("disabled", true);
										$('#email3').prop("disabled", true);
										$('#email4').prop("disabled", true);
										
										$('#pass1').prop("disabled", false);
										$('#pass2').prop("disabled", true);
										$('#pass3').prop("disabled", true);
										$('#pass4').prop("disabled", true);
									}
									else if($(this).val() == "three"){
										$('#email1').prop("disabled", false);
										$('#email2').prop("disabled", false);
										$('#email3').prop("disabled", true);
										$('#email4').prop("disabled", true);
										
										$('#pass1').prop("disabled", false);
										$('#pass2').prop("disabled", false);
										$('#pass3').prop("disabled", true);
										$('#pass4').prop("disabled", true);
									}
									else if($(this).val() == "four"){
										$('#email1').prop("disabled", false);
										$('#email2').prop("disabled", false);
										$('#email3').prop("disabled", false);
										$('#email4').prop("disabled", true);
										
										$('#pass1').prop("disabled", false);
										$('#pass2').prop("disabled", false);
										$('#pass3').prop("disabled", false);
										$('#pass4').prop("disabled", true);
									}
									else if($(this).val() == "five"){
										$('#email1').prop("disabled", false);
										$('#email2').prop("disabled", false);
										$('#email3').prop("disabled", false);
										$('#email4').prop("disabled", false);
										
										$('#pass1').prop("disabled", false);
										$('#pass2').prop("disabled", false);
										$('#pass3').prop("disabled", false);
										$('#pass4').prop("disabled", false);
									}
								});	
							</script>
							</div>
					</div>	
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type = "submit" value="register" name="register">
							Register
						</button>
					</div>
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
