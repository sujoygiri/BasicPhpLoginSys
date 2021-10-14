<?php
$insert = false;
$pass_match = true;
$user_exist = false;
require 'DBconnect/db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $email_id = $_POST['email_id'];
    $pass = $_POST['pass'];
    $re_enter_pass = $_POST['re_enter_pass'];
    $user_search_query = "SELECT * FROM `user_details` WHERE `user_name` = '$user_name';";
    $user_search = mysqli_query($conn, $user_search_query);
    $num = mysqli_num_rows($user_search);
    if (!$num) {
        if ($pass == $re_enter_pass) {
            $user_data = "INSERT INTO `user_details` (`user_name`, `email_id`, `password`, `date`) 
                                VALUES ('$user_name', '$email_id', '$pass', current_timestamp());";
            $insert_data = mysqli_query($conn, $user_data);
            if ($insert_data) {
                $insert = True;
            }
        } else {
            $pass_match = false;
        }
    } else {
        $user_exist = true;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="static/css/main.css" />
    <link rel="icon" href="static/img/password.png" type="image" />
    <title>Sign Up</title>
</head>

<body>
    <?php require 'Navbar/_navbar.php'; ?>
    <?php

    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Bolha!</strong> Your account created successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if (!$pass_match) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!! Sign Up Failed</strong> Your Password Did Not Match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if ($user_exist) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!! Sign Up Failed</strong> This Username is already resistered!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>
    <div class="container col-md-6 my-4">
        <h1 class="text-center mt-4">Sign Up To Best Login System</h1>
        <form class="mt-4 " action="./SignUp.php" method="post">
            <div class="mb-3">
                <label for="user_name" class="form-label">Enter Your User Name</label>
                <input type="text" class="form-control" maxlength="15" name="user_name" id="user_name" required>
            </div>
            <div class="mb-3">
                <label for="email_id" class="form-label">Enter Your Email address</label>
                <input type="email" class="form-control" name="email_id" id="email_id" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Enter Your Password</label>
                <input type="password" class="form-control" name="pass" id="pass" required>
            </div>
            <div class="mb-3">
                <label for="re_enter_pass" class="form-label">Re-enter Your Password</label>
                <input type="password" class="form-control" name="re_enter_pass" id="re_enter_pass" aria-describedby="re_enter" required>
                <div id="re_enter" class="form-text">Make Sure You Enter The Same Password</div>
            </div>
            <button type="submit" class="btn btn-outline-primary col-md-12">Sign Up</button>
        </form>

    </div>








    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script src="static/js/bootstrap.min.js"></script>
</body>

</html>