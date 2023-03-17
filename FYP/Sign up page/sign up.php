<?php
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
$password = $_POST['password'];
$location = $_POST['location'];
$phone_number = $_POST['phone_number'];

//database connection
$conn = new mysqli('localhost', 'root', '', 'testi');

//check connection
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
}

//prepare and bind statement
$stmt = $conn->prepare("INSERT INTO registration(name, birthday, email, password, location, phone_number)
VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $birthday, $email, $password, $location, $phone_number);

//execute statement and check for errors
if ($stmt->execute()) {
  echo "Sign up successful";
} else {
  echo "Error: " . $stmt->error;
}

//close statement and connection
$stmt->close();
$conn->close();
?>
