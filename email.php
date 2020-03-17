<?php
	if($_GET['en1']){
		$email = $_GET['en1'];
		$table = 'festDetail';
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
			$sql = "SELECT emailVerification FROM `" . $table . "` WHERE email = '$email'";
			if ($conn->query($sql)) {
				$result = $conn->query($sql);
				$row = mysqli_fetch_array($result);
				if($row['emailVerification'] != "Not Verified"){
					$sql1 = "UPDATE `".$table."` SET emailVerification = 'Verified' WHERE email = '$email'";
					if($conn->query($sql1)){
						echo $row['emailVerification'].$table.$email;
						/*echo '<script language="javascript">';
						echo 'alert("Fest.0"+ "\n"  +  "Your email is verified successfully"); window.location.href = "email.html"';
						echo '</script>';
						*/
						
					}
					else{
						echo '<script language="javascript">';
						echo 'alert("Fest.0"+ "\n"  +  "Ooops Something went wrong"); window.location.href = "index.html"';
						echo '</script>';
					}	
				}
				else{
					echo $email;
					
					/*echo '<script language="javascript">';
					echo 'alert("Fest.0"+ "\n"  +  "Your email is already verified."); window.location.href = "index.html"';
					echo '</script>';*/
					
				}	
			}
			
			else{
				echo "Error: ". $sql ."<br>". $conn->error;
				echo $table."<br>".$colid;
			}
		}
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Blitzchlag20.0")';
		echo 'alert("Please fill the registration form")';
		echo '</script>';
	}	
	function decryptIt( $q ) {
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $decryption_iv = '1234567891011121'; 
        $decryption_key = "YourFest2020";
        $decryption=openssl_decrypt ($q, $ciphering, $decryption_key, $options, $decryption_iv);
        return ($decryption);
        /*
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded  = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );*/
    }
?>