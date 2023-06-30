<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

    
        <?php
            if (isset($_POST["submit"])) {
                $fullname = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["Password"];
                $password_repeat = $_POST["repeat_password"];

                $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();

                if (empty($fullname) OR empty($email) OR empty($password) OR empty($password_repeat)){
                    array_push($errors, "All fields are required");
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email not valid");
                }
                if (strlen($password) <8) {
                    array_push($errors, "Password too short");
                }
                if ($password != $password_repeat) {
                    array_push($errors, "Password does not match");
                }
                require_once "database.php";
                $sql = "SELECT * FROM Users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    array_push($errors, "Email already exists!");
                }

                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }else {
                    
                    $sql = "INSERT INTO Users (fullname, email, password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($preparestmt) {
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordhash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>Registration Successful</div>";
                    }else {
                        die("Something went wrong");
                    }
                }
            }
        ?>



        <form action="Registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="full name:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="Password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
    </div>
    <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
</body>
</html>