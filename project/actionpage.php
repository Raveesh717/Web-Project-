<?php 

$conn = new mysqli('localhost', 'root', '', 'App');

if ($conn->connect_error) {
    die('connection failed :' . $conn->connect_error);
}

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = $_POST["subject"];
$message = $_POST["message"];

// these ? gets replaced by the values 
$stmt = $conn->prepare("INSERT INTO contact(firstname, lastname, email, phone, subjectname, messagedetail) VALUES(?,?,?,?,?,?)");
$stmt->bind_param("ssssss", $firstname, $lastname, $email, $phone, $subject, $message);

if ($stmt->execute()) {
    echo 'Your message has been sent successfully';
} else {
    echo 'Error sending your message: ' . $conn->error;
}

$stmt->close();
$conn->close();

?>