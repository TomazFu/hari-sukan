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
    <title>Info Murid Penambahan</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
        <div class="container-2">
        <a href="infos.php"><button><~</button></a>
        <form action="../includes/add-info-inc.php" method="post" class="login-form">
        <h2>Info Murid</h2>
        <br>
        <label>ID Murid:   </label><input type="text" name="idMurid" class="input-box-1" placeholder="Contoh: A0001..." required><br>
        <label>Nama Murid: </label><input type="text" name="namaMurid" class="input-box-1" placeholder="Contoh: Ali..." required><br>
        <label>Jantina:    </label><input type="text" name="jantina" class="input-box-1" placeholder="Contoh: L/P..." required><br>
        <label>Kelas:     </label><input type="text" name="kelas" class="input-box-1" placeholder="Contoh: 1A1..." required><br>
        <label>No. Telefon:     </label><input type="text" name="noTelefon" class="input-box-1" placeholder="Contoh: 0123456789..." required><br>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "studentaldindb") {
                    echo "<p>Info murid sudah di dalam pangkalan data.</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Sesuatu perkara menghadapi masalah. Sila cuba lagi.</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo '<script>alert("Anda telah berjaya menambahkan info murid ke dalam sistem ini.");</script>';
                }
            }
        ?>
        <button  type="submit" name="submit">Daftar</button>
        </form>
        </div>

<?php
    require_once "../footer.php";
?>
