<?php
    session_start();
    $_SESSION["tablename"] = "hakim";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judges Login</title>
    <link rel="shortcut icon" href="images/Chung_Ling_Butterworth.ico" type="image/x-icon">
</head>
<body class='login-page'>
    <?php
        include_once "login.php";
    ?>
    