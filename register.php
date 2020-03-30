<?php
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
	$name = filter_input(INPUT_POST, 'name');
	$email = filter_input(INPUT_POST, 'email');
	$gender = filter_input(INPUT_POST, 'gender');
	$phone = filter_input(INPUT_POST, 'phone');
	$password = encryptIt(filter_input(INPUT_POST, 'password'));
	$course = filter_input(INPUT_POST, 'course');
	$year = filter_input(INPUT_POST, 'year');
	$branch = filter_input(INPUT_POST, 'branch');
	$college = filter_input(INPUT_POST, 'college');
	$collegeName = filter_input(INPUT_POST, 'collegename');
	$colid = filter_input(INPUT_POST, 'colid');
	$city = filter_input(INPUT_POST, 'city');
	$accommondation = filter_input(INPUT_POST, 'accommondation');
	$register = filter_input(INPUT_POST, 'register');
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
            $en1 = encryptIt($email);
			if($college == "Other"){
				$college = $collegeName;
			}
			$sql4 = "SELECT * FROM festDetail WHERE colid = '$colid' and email = '$email'";
			$result = $conn->query($sql4);
			if($result->num_rows > 0){	
				echo '<script language="javascript">';
				echo 'alert("Fest20.0"+ "\n"  +  "You are already registered"); window.location.href = "register.php"';
				echo '</script>';
			}
			else{
				if(($conn->query("SHOW TABLES LIKE '".$table."'"))->num_rows == 1){
					$sql4 = "INSERT INTO festDetail (email, password, name, phone, colid, course, year, branch, collegeName, city, accommondation, emailVerification)
							values('$email', '$password', '$name', '$phone', '$colid', '$course', '$year', '$branch', '$college', '$city', '$accommondation', 'Not Verified');";
							
					$sql5 = "SELECT * FROM `" . $table . "` WHERE colid = '$colid'";
					
					if($conn->query($sql4) && $conn->query($sql5)){
						
						$result = $conn->query($sql5);
						$row = mysqli_fetch_array($result);
						$festId = $row['id'];
						
						$mail->setFrom('sat.test1000@gmail.com', 'Purva20.0'); 
						$mail->addAddress($email, $name); 
						$mail->Subject = 'Successfull Registration'; 
						$mail->Body = "Congratulation, {$name} \t\t\t\t\n You are successfully registered in Purva20.0 \n\t\t your Purva20.0 Id is {$festId}  \n\t\t verify your email http://localhost/fest/email.php?en1={$en1}";
						if ($mail->send()) {
							echo "Congratulation, You are successfull registered in Purva20.0!";
							header('Location: index.php');
						} else {
							echo "Mailer Error: " . $mail->ErrorInfo;
						}
						
						echo"success";
						
					}
					else{
						echo "Error: ". $sql ."<br>". $conn->error;
					}		
				}
				else{
					$sql1 = "CREATE TABLE festDetail (id VARCHAR(12) NOT NULL DEFAULT '0', email VARCHAR(60) PRIMARY KEY, password VARCHAR(40), name VARCHAR(50), phone VARCHAR(13), colid VARCHAR(20), course varchar(40), year varchar(20), branch varchar(40), collegeName varchar(40), city varchar(40), accommondation varchar(40), emailVerification varchar(30))";

					$sql2 = "CREATE TABLE incFestDetail
							(
							  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
							);";
					$sql3 ="CREATE TRIGGER tg_table1_insert
							BEFORE INSERT ON festDetail
							FOR EACH ROW
							BEGIN
							  INSERT INTO incFestDetail VALUES (NULL);
							  SET NEW.id = CONCAT('fest@1', LPAD(LAST_INSERT_ID(), 3, '0'));
							END";
					if($conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3)){
						$sql4 = "INSERT INTO festDetail (email, password, name, phone, colid, course, year, branch, collegeName, city, accommondation, emailVerification)
							values('$email', '$password', '$name', '$phone', '$colid', '$course', '$year', '$branch', '$college', '$city', '$accommondation', 'Not Verified');";
						
							$sql5 = "SELECT * FROM `" . $table . "` WHERE colid = '$colid'";
						
						if($conn->query($sql4) && $conn->query($sql5)){
							
							$result = $conn->query($sql5);
							$row = mysqli_fetch_array($result);
							$festId = $row['id'];
							
							$mail->setFrom('sat.test1000@gmail.com', 'Purve20.0'); 
							$mail->addAddress($email, $name); 
							$mail->Subject = 'Successfull Registration'; 
							$mail->Body = "Congratulation, {$name} \t\t\t\t\n You are successfully registered in Purva20.0 \n\t\t your Purva20.0 Id is {$festId}  \n\t\t verify your email http://localhost/fest/email.php?en1={$en1}";
							if ($mail->send()) {
								echo "Congratulation, You are successfull registered in Purva20.0!";
							} else {
								echo "Mailer Error: " . $mail->ErrorInfo;
							}
							echo"success";
						}
						else{
							echo "Error: ". $sql5 ."<br>". $conn->error;
						}
					}
					else{
						echo "Error: ". $sql1 ."<br>". $conn->error;
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
	<title>Register</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
				<form class="login100-form-register validate-form" method="post" action="register.php">
					<span class="login100-form-title">
						Fest Registration
					</span>
					<div class = "form-274">
						<div class = "scroll " id = "style-11">
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="name" placeholder="Full Name" value="" required="">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-user icon" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input100" type="text" name="email" placeholder="Email" value="" required="">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input">
								<select class="input100 round" id="gender" name="gender" placeholder="gender" required="true">
										<option selected="" disabled="">Select Gender</option>
										<option value="Male" class="input100">Male</option>
										<option value="Female" class="input100">Female</option>
										<option value="Other" class="input100">Don't want to disclose</option>
									
								</select>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-male" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<select   id = "selectcollege" class="input100" name="college" placeholder="College" required="true">
										<option selected="" disabled="">Select College</option>
										<option value="clg1" class="input100">College Name 1</option>
										<option value="clg2" class="input100">College Name 2</option>
										<option value="clg3" class="input100">College Name 3</option>
										<option value="Other" class="input100" onclick="disable()">Other College</option>								
								</select>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-institution" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="collegename" placeholder="College Name" id = "ocollege" disabled = "true" value="College Name" onfocus = "this.value=''" required = "false">
								<script>
									$('#selectcollege').change(function() {
										if( $(this).val() == "Other") {
											$('#ocollege').prop( "disabled", false );
										} else {       
											$('#ocollege').prop( "disabled", true );
										}
									});
								</script>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-institution" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<select class="input100" id="course" name="course" placeholder="Select Year" required="true">
										<option selected="" disabled="">-Select Course-</option>
										<option value="B-Tech">B-Tech</option>
										<option value="B-Arch">B-Arch</option>
										<option value="PHD">PHD</option>
										<option value="M-Tech">M-Tech</option>
										<option value="M-Plan">M-Plan</option>
										<option value="OTHER">OTHER</option>
									
								</select>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-cubes" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<select class="input100" id="year" name="year" placeholder="Select Year" required="true">
										<option selected="" disabled="">-Select Year-</option>
										<option value="I Year">I Year</option>
										<option value="II Year">II Year</option>
										<option value="III Year">III Year</option>
										<option value="IV Year">IV Year</option>
										<option value="V Year">V Year</option>
										<option value="OTHER">OTHER</option>
									
								</select>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-viacoin" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="branch" placeholder="Branch" value="" required="">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-steam" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="colid" placeholder="College Id" value="" required="">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-id-card" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="city" placeholder="City" value="" required="">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</span>
							</div>
							
							
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="phone" placeholder="Phone No." data-parsley-length="[10, 10]" data-parsley-error-message="Enter valid phone no" maxlength="10" placeholder="Enter your phone no" required="" value="">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-phone " aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<select class="input100" name="accommondation" placeholder="Accommodation Needed" required="true" >
										<option selected="" disabled="True" >Accommodation Needed</option>
										<option value="Yes" class="input100">Yes</option>
										<option value="No" class="input100">No</option>
								</select>
								
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-bed" aria-hidden="true"></i>
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