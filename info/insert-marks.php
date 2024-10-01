<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Markah-markah</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
    
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
        <div class="container-2">
        <a href="infos.php"><button><~</button></a>
        <form action="../includes/insert-marks-inc.php" method="post" class="login-form">
        <h2>Markah-markah</h2>
        <label>ID Murid: </label><input type="text" name="idMurid" class="input-box-1" placeholder="Contoh: A0001..." required><br>
        <label>ID Acara:    </label><input type="text" name="idAcara" class="input-box-1" placeholder="Contoh: K1..." required><br>
        <label>Catatan:     </label><input type="text" name="catatan" class="input-box-1" placeholder="Contoh: 30.0s/6.0m..." required><br>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "duplicatedata") {
                    echo "<p>Markah sudah di dalam pangkalan data.</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Sesuatu perkara menghadapi masalah. Sila cuba lagi.</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo '<script>alert("Anda telah berjaya memasukkan keputusan ke dalam sistem ini.");</script>';
                }
            }
        ?>    
        <button type="submit" name="submit">Menginput Markah</button>
        </form>
    </div>
<?php
    require_once "../footer.php";
?>
