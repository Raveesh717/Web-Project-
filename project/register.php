<?php 

$conn = new mysqli('localhost', 'root', '', 'App');

if ($conn->connect_error) {
    die('connection failed :' . $conn->connect_error);
}

$email = $_POST["email"];
$user = $_POST["username"];
$pass1 = $_POST["password"];
$pass2 = $_POST["confirmpassword"];

$result = $conn->query("SELECT * FROM userlog WHERE email = '$email'");

if ($result->num_rows > 0) {
    echo " Email already registered.";
} else {
    // if ($pass1 == $pass2) then

    $stmt = $conn->prepare("INSERT INTO userlog(email, username, password) VALUES(?,?,?)");
    $stmt->bind_param("sss", $email, $user, $pass2);
    
    if ($stmt->execute()) {
        echo 'Registration successful';
    } else {
        echo 'Error doing registration: ' . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();

?>