<?php
    session_start();
    require_once "../includes/connect.php";
    require_once "../includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
    <div class="container-3">
    <a href="../home.php"><button><~</button></a>
    <nav>
        <ul class="menu">
        <br>
        <li class="menu-item"><a href="judges-list.php" class="menu-link">Info Hakim-hakim</a></li>
        <li class="menu-item"><a href="add-acc-hakim.php" class="menu-link">Menambah akaun hakim</a></li>
        <li class="menu-item"><a href="paswd-change.php" class="menu-link">Mengubah password hakim</a></li>
        <li class="menu-item"><a href="add-acc-admin.php" class="menu-link">Menambah akaun admin</a></li>
        <li class="menu-item"><a href="file-upload.php" class="menu-link">Import Fail Data</a></li>
        <li class="menu-item"><a href="../../phpmyadmin" class="menu-link">Pangkalan Data</a></li>
        </ul>
    </nav>
    </div>
<?php
    require_once "../footer.php";
?>
