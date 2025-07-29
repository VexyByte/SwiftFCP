<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $con->real_escape_string($_POST['first_name']);
  $last_name  = $con->real_escape_string($_POST['last_name']);
  $phone      = $con->real_escape_string($_POST['phone']);
  $email      = $con->real_escape_string($_POST['email']);
  $user_role  = $con->real_escape_string($_POST['user_role']);
  $password   = password_hash($_POST['pass'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO users (First_Name, Last_Name, Phone, Email, User_Role, Pass)
          VALUES ('$first_name', '$last_name', '$phone', '$email', '$user_role', '$password')";

  if ($con->query($sql) === TRUE) {
      echo "<script>alert('User inserted successfully!'); window.location.href='./admin.php';</script>";
  } else {
      echo "Error: " . $con->error;
  }

  $con->close();
}
?>
