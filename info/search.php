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
    <link rel="stylesheet" href="../style.css">
    <title>Cari</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
        <div class="container-2">
        <a href="infos.php"><button><~</button></a>
        <form action="search.php" method="post" class="login-form">
            <label>ID/ Nama Murid: </label><br><input type="text" name="searchText" class="input-box-1" placeholder="Type your keywords here..." required>
            <br>
            <?php
                if(isset($_POST["submit"])) {
                    $searchText = $_POST["searchText"];
                    require_once "../includes/connect.php";
                    require_once "../includes/functions.php";
                    
                    echo "<h3>Search results</h3><br>";
                    if (searchTableMurid_Id($conn, $searchText) === false && searchTableMurid_Name($conn, $searchText) === false){
                        echo "<p>Tiada keputusan.</p>";
                    }
                }
            ?>
            
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "stmtfailed") {
                        echo "<p>Sesuatu perkara menghadapi masalah. Sila cuba lagi.</p>";
                    }

            }
            ?>
            <button type="submit" name="submit">Cari</button>
        </form>
        <div class='printpage'><button onclick="window.print()">Cetak?</button></div>
        </div>


<?php
    require_once "../footer.php";
?>
