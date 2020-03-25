<?php
	$email = filter_input(INPUT_POST, 'email');
	$password = encryptIt(filter_input(INPUT_POST, 'password'));
	$login = filter_input(INPUT_POST, 'login');
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
			$table = "festDetail";
			$sql1 = "SELECT * FROM `".$table."` WHERE email = '$email'";
			$result = $conn->query($sql1);
			if($result->num_rows > 0){
				$row = mysqli_fetch_array($result);
				$id = $row['id'];
				$email = $row['email'];
				$name = $row['name'];
				$phone = $row['phone'];
				$colid = $row['colid'];
				$course = $row['course'];
				$branch = $row['branch'];
				$collegeName = $row['collegeName'];
				$city = $row['city'];
				$accommodation = $row['accommodation'];
				$emailVerification = $row['emailVerification'];
				session_start();
				$_SESSION['id'] = $id;
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $name;
				$_SESSION['phone'] = $phone;
				$_SESSION['colid'] = $colid;
				$_SESSION['course'] = $course;
				$_SESSION['year'] = $year;
				$_SESSION['branch'] = $branch;
				$_SESSION['collegeName'] = $collegeName;
				$_SESSION['city'] = $city;
				$_SESSION['accommodation'] = $accommodation;
				$_SESSION['emailVerification'] = $emailVerification;
				
				echo '<script language="javascript">';
				echo 'alert("Successfull login")';
				echo '</script>';
				header('Location: index.php');
				
			}
			else{
				echo "Error: ". $sql1 ."<br>". $conn->error;
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
	<title>Login V1</title>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<div id="loading"><img src = "images/preloader1.gif"></div>
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
					<div class="login100-pic js-tilt" data-tilt>
						<img src="images/img-01.png" alt="IMG">
					</div>
				</div>

				<form class="login100-form validate-form" method = "post" action = "login.php">
					<span class="login100-form-title">
						Blitz Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type = "submit" value = "login" name = "login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-50 p-b-10">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
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