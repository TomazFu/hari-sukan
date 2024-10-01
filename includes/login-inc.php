<?php
session_start();
if(isset($_POST["submit"])) {
    $username = $_POST["email"];
    $paswd = $_POST["paswd"];

    require_once "connect.php";
    require_once "functions.php";

    loginUser($conn, $username, $paswd, $_SESSION["tablename"]);
    header("location: ../home.php");
}
else {
    header("location: ../home.php");
}