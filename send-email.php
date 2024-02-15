<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $employeeId = $_POST["employeeId"];
    $department = $_POST["department"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $reason = $_POST["reason"];

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  
    $mail->Port = 587;  // SMTP server port (usually 587 for TLS or 465 for SSL)
    $mail->SMTPAuth = true;
    $mail->Username = 'khusushackingsaja@gmail.com';
    $mail->Password = 'godmaster008%';
    $mail->SMTPSecure = 'tls';  

    $mail->setFrom('khusushackingsaja@gmail.com', 'Iyyan');  // Sender email address and name
    $mail->addAddress('gungdiah55@gmail.com', 'Gungdiah');  // Recipient email address and name


    $mail->isHTML(true);  
    $mail->Subject = 'WFH Request';  
    $mail->Body = "Employee ID: $employeeId\n" .
                  "Department: $department\n" .
                  "Start Date: $startDate\n" .
                  "End Date: $endDate\n" .
                  "Reason: $reason\n";  

    if ($mail->send()) {
        echo 'Email sent successfully!';
    } else {
        echo 'Failed to send email. Error: ' . $mail->ErrorInfo;
    }
} else {
    header("Location: index.html");
    exit();
}
?>
