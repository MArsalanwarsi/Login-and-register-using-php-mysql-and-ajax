<?php
include 'database.php';

if (isset($_POST['signup_name'])) {
    $name = $_POST['signup_name'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $check = mysqli_query($data, "select * from users");
    foreach ($check as $new) {
        if ($email == $new['email']) {
            echo "Email already exists";
            exit();
        }
    }
    $ins_sql = mysqli_query($data, "INSERT INTO users(`name`, `email`, `password`) VALUES ('$name','$email','$password')");

    if ($ins_sql) {
        echo "Register successfull";
    } else {
        echo "Register failed";
    }

}
if (isset($_POST['signin_email'])) {
    $email = $_POST['signin_email'];
    $password = $_POST['signin_password'];

    $check = mysqli_query($data, "select * from users");
    $alert = "Incorrect email or password";
    foreach ($check as $new) {
        if ($email == $new['email'] && $password == $new['password']) {
            $alert = "Login successfull";
        }
    }
    echo $alert;
}