<?php
session_start();
$id = $_SESSION['id'];
if(!$id){
	header('Location: ../login.php');
}	
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$phone = $_SESSION['phone'];
$colid = $_SESSION['colid'];
$mobile = $_SESSION['phone'];
$event = $_SESSION['event'];
$status = "Paid";
$eventDate = "04/04/2020";
$eventTime = "7:00 pm";
require('fpdf.php');
$pdf = new FPDF('P','mm',array(100,200));
$pdf->AddPage();
$pdf->Image('../purva.png', 15, 5, 70, 30);
$pdf->SetFont('helvetica','I',10);
$pdf->setTextColor(30, 60, 114);
$pdf->SetXY(10,10);
$pdf->Cell(0, 55, 'Indian Institute of Information Technology', 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(0, 65, 'Jaipur, Rajasthan, India', 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(0, 75, 'Ph. : 0542 118945', 0, 0, 'C');
$pdf->line(0, 52, 100, 52);
$pdf->SetXY(10,10);
$pdf->setTextColor(100, 100, 100);
$pdf->SetFont('helvetica','',12);
$pdf->SetXY(10,10);
$pdf->Cell(0, 95, 'Name : '. $name, 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(0,107, 'Purva Id : '. $id, 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(0,119, 'College Id : '. $colid, 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(0,131, 'Event : '. $event, 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(0,143, 'Event Date : '. $eventDate, 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(0,155, 'Event Time : '. $eventTime, 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(0,167, 'Status : '. $status, 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Image('../images/paid.png', 25, 95, 50, 50);
$pdf->SetXY(10,10);
$pdf->Image('../images/confirmed.png', 25, 145, 50, 50);
$filename="../pdfFile/"."$event"."$id".".pdf";
$pdf->Output($filename,'F');
$pdf->Output();

date_default_timezone_set('Etc/UTC');
	require '../PHPMailer/src/PHPMailer.php';
	require("../PHPMailer/src/SMTP.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true; 
    $mail->Username = "sat.test1000@gmail.com"; 
    $mail->Password = "33404328"; 
	$mail->setFrom('sat.test1000@gmail.com', 'Purva20.0'); 
	$mail->addAddress($email, $name); 
	$mail->Subject = 'Ticket confirmation'; 
	$mail->Body = "Your Ticket is booked. Please find the below attachment \n\n Team\nPurva20.0";
	$mail->AddAttachment($filename, '', $encoding = 'base64', $type = 'application/pdf');
	if ($mail->send()) {
		echo "Congratulation, You are successfull registered in Purva20.0!";
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
?>