<!DOCTYPE html>
<html>
<head>
    <title>Employee Registration</title>
</head>
<body>

<h2>Registration Form</h2>

<form method="POST">
    Full Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    Confirm Password: <input type="password" name="cpassword"><br><br>
    Job Title: <input type="text" name="job"><br><br>
    <input type="submit" value="submit">
</form>

</body>
</html>

<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;
    $confirm = $_POST['cpassword'];
    $job = $_POST['job'] ;


    if (empty($name) || empty($email) || empty($password) || empty($confirm) || empty($job)) {
        echo "<script>alert('All fields are required')</script>";
    }
    elseif ($password !== $confirm) {
        echo "<script>alert('Password and Confirm Password is not matching')</script>";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format')</script>";
    }
    else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = $conn->prepare("insert into empregister (name, email, password, jobtitle values (?, ?, ?, ?)");
            $sql->bind_param("ssss", $name, $email, $hashed_password, $job);

            if ($sql->execute()) {
                echo "Registration successful";
            } else {
                echo "Not Register";
            }
        }
    }



?>