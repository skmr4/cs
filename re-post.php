<?php
include("connection.php");
if(isset($_POST['submit'])){
    $username = stripcslashes(strtolower($_POST['username']));
    $email = stripcslashes($_POST['email']);
    $password = stripcslashes($_POST['password']);

$username = htmlentities(mysqli_real_escape_string($con, $_POST["username"]));
$email = htmlentities(mysqli_real_escape_string($con, $_POST["email"]));
$password = htmlentities(mysqli_real_escape_string($con, $_POST["password"]));
$gender = htmlentities(mysqli_real_escape_string($con, $_POST["gender"]));
#$con -> qoute(var) instead of mysqli_real_escape_string($con, var)

if(isset($_POST['gender'])){
    $gender = ($_POST['gender']);
    $gender = htmlentities(mysqli_real_escape_string($con, $POST['gender']));
    if(! in_array($gender, ['male', 'female'])){
        $gender_error = "<p id='error'>Please Choose gender</p><br>";
        $err_s = 1;
    }
}

$check_user = "SELECT * FROM `USER2` WHERE username = '$username'";
// PDO :: query($username)
$check_result = mysqli_query($con, $check_user);
$num_rows = sqli_num_rows($check_result);
if($num_rows != 0){
    $user_error = 'user name already exist<br>';
    $err_s = 1;
}

if(empty($username)){
    $user_error = "<p id='error'>Please insert name</p><br>";
    $err_s = 1;
}elseif(strlen($username) < 10){
    $user_error = "<p id='error'>Your name must be at min. 10 letter</p><br>";
    $err_s = 1;
}elseif(filter_var($username, FILTER_VALIDATE_INT)){
    $user_error = "<p id='error'>Please name not number</p><br>";
    $err_s = 1;
}
if(empty($email)){
    $email_error = "<p id='error'>Please insert your email</p><br>";
    $err_s = 1; 
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_error = "<p id='error'>Please enter valid email</p><br>";
    $err_s = 1;
}
if(empty($gender)){
    $gender_error = "<p id='error'>Please Choose gender</p><br>";
    $err_s = 1;
}
if(empty($password)){
    $password_error = "<p id='error'>Please insert password</p><br>";
    $err_s = 1;
    include('register.php');
}elseif(strlen($password) < 6){
    $password_error = "<p id='error'>Your password must be greater than or equal 6 letter</p><br>";
    $err_s = 1;
    include('register.php');
}
else{
    if(($err_s == 0) && ($num_rows == 0)){
        $sql = "INSERT INTO USER2(username, email, password, gender) 
        VALUES ('$username', '$email', '$password', '$gender')";
        mysqli_query($con, $sql);
        header(location:'login.php');
        }else{
            include('register.php');
        }
    }
}

?>