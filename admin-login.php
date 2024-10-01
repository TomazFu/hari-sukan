<?php
    session_start();
    $_SESSION["tablename"] = "admin";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="shortcut icon" href="images/Chung_Ling_Butterworth.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body class='login-page'>
    <?php
        if (isset($_SESSION["adminstatus"]) && $_SESSION["adminstatus"] === true){
            header("location: home.php");
        } 
        else {
            require_once "login.php";
        }  
    ?>
</body>
</html>