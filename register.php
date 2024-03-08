<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
    <h1>Welcome in SKMR School</h1>
    <form action="re-post.php" method="POST">
        <?php if(isset($user_error)){
            echo $user_error;
        }
        ?>
    <input type="text" name="username" id="username" placeholder="username"><br>
    <?php if(isset($password_error)){
            echo $password_error;
        }
        ?>
    <input type="password" name="password" id="password" placeholder="password"><br>
    <?php if(isset($email_error)){
            echo $email_error;
        }
        ?>
    <input type="email" name="email" id="email" placeholder="email"><br>
    <?php if(isset($gender_error)){
            echo $gender_error;
        }
        ?>
    Gender <select name="gender">
        <option disabled selected>Choose</option>
        <option>Female</option>
        <option>Male</option>
    </select>
    <br>
    <input type="submit" name="register" id="register" value="register"><br>
</form>
</div>
</body>
</html>