<?php
$login_failed = false;
$login_success = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'DBconnect/db_connect.php';
    $user_name = $_POST['user_name'];
    $pass = $_POST['pass'];
    $user_search_query = "SELECT * FROM `user_details` WHERE `user_name` = '$user_name';";
    $user_search = mysqli_query($conn, $user_search_query);
    $num = mysqli_num_rows($user_search);
    if ($num == 1) {
        while($row = mysqli_fetch_assoc($user_search)){
            if (password_verify($pass,$row['password'])) {
                $login_success = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user_name'] = $user_name;
                echo $_SESSION['user_name'];
                header("Location: ./WelCome.php");
            }else {
                $login_failed = true;
            }
        }
    } else {
        $login_failed = true;
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
    <title>Sign In</title>
</head>

<body>
    <?php require './_navbar.php'; ?>
    <?php
    if ($login_success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Login Successful!!</strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
    }
    if ($login_failed) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Login Failed!!</strong> User Name or Password do not match 
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
    }

    ?>
    <div class="container col-md-6 my-4">
        <h1 class="text-center mt-4">Sign In To Best Login System</h1>
        <form class="mt-4 " action="./SignIn.php" method="post">
            <div class="mb-3">
                <label for="user_name" class="form-label">Enter Your User Name</label>
                <input type="text" class="form-control" maxlength="15" name="user_name" id="user_name" required>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Enter Your Password</label>
                <input type="password" maxlength="20" class="form-control" name="pass" id="pass" required>
            </div>
            <button type="submit" class="btn btn-outline-primary col-md-12">Sign In</button>
        </form>

        <div class="mt-4">
            <h6>
                Don't have an account? <a href="./SignUp.php">Sign Up</a>
            </h6>
        </div>
    </div>









    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script src="static/js/bootstrap.min.js"></script>
</body>

</html>