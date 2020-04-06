<?php
	ob_start();
	date_default_timezone_set('Etc/UTC');
	require 'PHPMailer/src/PHPMailer.php';
	require("PHPMailer/src/SMTP.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true; 
    $mail->Username = "sat.test1000@gmail.com"; 
    $mail->Password = "33404328"; 
	if (isset($_POST['sendOtp'])){
		$email = filter_input(INPUT_POST, 'email');
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
			$table = "festDetail";
			$sql1 = "SELECT * FROM `".$table."` WHERE email = '$email'";
			$result = $conn->query($sql1);
			if($result->num_rows > 0){
				$randomid = mt_rand(100000,999999); 
				session_start();
				$_SESSION["randomid"] = $randomid;
				$_SESSION["email"] = $email;
				$mail->setFrom('sat.test1000@gmail.com', 'Purve20.0'); 
				$mail->addAddress($email, "Purva20.0"); 
				$mail->Subject = 'One Time Code'; 
				$mail->Body = "Your one time password, {$randomid} \n\n Team \n Purva20.0";
				if ($mail->send()){
					echo '<script language="javascript">';
					echo 'alert("OTP send to your email")';
					echo 'alert("Please check your email")';
					echo '</script>';
				}
				else{
					echo '<script language="javascript">';
					echo 'alert("Something went wrong")';
					echo 'alert("Please try after sometime")';
					echo '</script>';
				}
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Email not registered")';
				echo '</script>';
				header('Location: forgotPassword.php');
			}	
		}
		$conn->close();
	}
	if(isset($_POST['reset'])){
		$otp = $_POST['otp'];
		$password = encryptIt($_POST['password']);
		
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
			$table = "festDetail";
			session_start();
			$randomid = $_SESSION["randomid"];
			$email = $_SESSION["email"];
			if($otp == $randomid){
				$sql2 = "UPDATE `".$table."` SET password = '$password' WHERE email = '$email'";
				if($conn->query($sql2)){
					echo '<script language="javascript">';
					echo 'alert("Your password has been successfully updated")';
					echo '</script>';
					header('Location: login.php');
				}
				else{
					echo "Error: ". $sql2 ."<br>". $conn->error;
				}
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("OTP not match")';
				echo '</script>';
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
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" href="p.png" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<!-- Preloader
   ================================================== -->

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<div id="loading"><img src = "images/preloader1.gif"></div>-->
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
	</style>
	<script>
	setTimeout(function() {
	  $('#loading').addClass('hidden');
	}, 2000);

	</script>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="container-right">
					<div class="login100-pic js-tilt" data-tilt style = "padding-bottom: 40px">
						<img src="images/forgot.png" alt="IMG">
					</div>
					<div id = "form1cont">
					<form method = "post" id = "formTop" action = "forgotPassword.php">
						<div class="wrap-input100">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
						<div class="container-login100-form-btn" style = "padding-top: 20px; padding-bottom: 20px;">
							<button class="login100-form-btn" type = "submit" style = "background-color: #2A5298" id = "form1but" name = "sendOtp" value = "sendOtp" onclick = "ValidateEmail(document.formTop.email)">
								Send otp
							</button>
						</div>
					</form>
					</div>
				</div>

				<form class="login100-form validate-form" method = "post" action = "forgotPassword.php">
					<span class="login100-form-title" style = "padding-bottom: 50px;">
						Forgot Password
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "OTP is required">
						<input class="input100" type="text" name="otp" placeholder="OTP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-shield" aria-hidden="true"></i>
						</span>
					</div>	
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="pass" placeholder="Password" value="" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Confirm Password"  data-parsley-equalto="#pass" value="" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type = "submit" value = "reset" name = "reset">
							Submit
						</button>
					</div>
					<div class="text-center p-t-12" style = "padding-bottom: 50px;">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>