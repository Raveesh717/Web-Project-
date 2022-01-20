<?php 
$conn = new mysqli('localhost', 'root', '', 'App');

if ($conn->connect_error) {
    die('connection failed :' .$conn->connect_error);
}

$email = $_POST["email"];
$password = $_POST["password"];

$result = $conn->query("SELECT password FROM userlog WHERE email = '$email'");

if ($result->num_rows == 0) {
    echo " Account with specified email does not exists.";
} else {
    $row = $result->fetch_row();

    if ($row && $row[0] == $password) {
        echo " Successfully logged in.";
    } else {
        echo " Password mismatch";
    }
}

$conn->close();

?>