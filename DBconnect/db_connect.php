<?php

$servername = "localhost";
$username = "root";
$password = "";
$data_base = "site_users";

// Checking Connection with Database
$conn = mysqli_connect($servername, $username, $password, $data_base);
if (!$conn) {

  die("Sorry we failed to connect" . mysqli_connect_errno());
}

?>