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
    <title>Senarai Hakim</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
    <div class="container-4">
    <a href="admin.php"><button><~</button></a>
    <div class="judgelist">
<?php
    echo "<h3>Senarai Hakim</h3>";
    hakimList($conn); 
?>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "stmtfailed") {
            echo "<p>Sesuatu perkara menghadapi masalah. Sila cuba lagi.</p>";
        }
    }
?>
    <div class='printpage'><button onclick="window.print()">Cetak?</button></div>
    </div>
    </div>
<?php
    require_once "../footer.php";
?>


