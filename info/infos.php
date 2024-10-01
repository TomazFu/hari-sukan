<?php
    session_start();
    $_SESSION["tablename"] = "murid";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Pengubahan Info</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
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
            <li class="menu-item"><a href="add-info.php" class="menu-link">Murid Penambahan</a></li>
            <li class="menu-item"><a href="edit-student.php" class="menu-link">Info Murid Pengubahan</a></li>
            <li class="menu-item"><a href="search.php" class="menu-link">Mencari</a></li>
            <li class="menu-item"><a href="insert-marks.php" class="menu-link">Masuk Markah</a></li>
            <li class="menu-item"><a href="add-acara.php" class="menu-link">Menambah Acara-acara</a></li>
        </ul>
    </nav>
    </div>
<?php
    require_once "../footer.php";
?>
