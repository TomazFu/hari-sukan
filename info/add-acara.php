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
    <title>Menambah Acara</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
        <div class="container-2">
        <a href="infos.php"><button><~</button></a>
        <form action="../includes/add-acara-inc.php" method="post" class="login-form">
        <h2>Info Acara</h2>
        <br>
        <label>ID Acara:   </label><input type="text" name="idAcara" class="input-box-1" placeholder="Contoh: K1..." required><br>
        <label>Nama Acara: </label><input type="text" name="namaAcara" class="input-box-1" placeholder="Contoh: 100-Meter..." required><br>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "acaraaldindb") {
                    echo "<p>Info acara sudah di dalam pangkalan data.</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Sesuatu perkara menghadapi masalah. Sila cuba lagi.</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo '<script>alert("Anda telah berjaya menambahkan info acara ke dalam sistem ini.");</script>';
                }
            }
        ?>
        <button  type="submit" name="submit">Daftar Acara</button>
        </form>
        </div>

<?php
    require_once "../footer.php";
?>
