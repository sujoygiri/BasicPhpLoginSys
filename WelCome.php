<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("Location: ./SignIn.php");
    exit;
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
    <link rel="icon" href="static/img/password.png" type="image"/>
    <title>Welcome - <?php echo $_SESSION['user_name']?></title>
</head>

<body>
    <?php require 'Navbar/_navbar.php'; ?>
    <div class="container mt-4">
        <h1>Welcome - <strong> <?php echo $_SESSION['user_name']?> </strong></h1>
    </div>











    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script src="static/js/bootstrap.min.js"></script>
</body>

</html>