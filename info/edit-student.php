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
    <title>Pengubahan Info Murid</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
    <?php
        if (!isset($_GET["idmurid"])) { ?>
                <div class="container-2">
                <a href="infos.php"><button><~</button></a>
                <form action="../includes/search-student-edit.php" method="post" class="login-form">
                <h2>Info Murid</h2>
                <br>
                <label>ID Murid:   </label><input type="text" name="idMurid" class="input-box-1" placeholder="Contoh: A0001..." required><br>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "studentnotindb") {
                            echo "<p>ID murid tidak berada di dalam pangkalan data.</p>";
                        }
                        else if ($_GET["error"] == "none") {
                            echo '<script>alert("Anda telah berjaya mengubahkan maklumat murid tersebut.");</script>';
                        }
                    }
                ?>
                <button type="submit" name="submit">Cari</button>
                </form>
                </div>
    
    <?php } else if (isset($_GET["idmurid"])) { 
                require_once "../includes/connect.php";
                require_once "../includes/functions.php";
                $_SESSION["idmuridedit"] = $_GET["idmurid"];
                $infoMurid = uidExists($conn, $_SESSION["idmuridedit"], $_SESSION["tablename"]); ?>
                    <div class="container-2">
                    <a href="infos.php"><button><~</button></a>
                    <form action="../includes/edit-student-inc.php" method="post" class="login-form">
                    <h2>Info Murid</h2>
                    <br>
                    <label>ID Murid:   </label><?php echo $infoMurid["idMurid"] ?><br><br>
                    <label>Nama Murid: </label><input type="text" name="namaMurid" class="input-box-1" placeholder="<?php echo $infoMurid["namaMurid"] ?>"><br>
                    <label>Jantina:    </label><input type="text" name="jantina" class="input-box-1" placeholder="<?php echo $infoMurid["jantina"] ?>"><br>
                    <label>Kelas:     </label><input type="text" name="kelas" class="input-box-1" placeholder="<?php echo $infoMurid["kelas"] ?>"><br>
                    <label>No.Telefon:     </label><input type="text" name="noTelefon" class="input-box-1" placeholder="<?php echo $infoMurid["noTelefon"] ?>"><br>
                        <button type="submit" name="submit">Mengubah</button>
                    </form>
                    </div>
        <?php } ?>

<?php
    require_once "../footer.php";
?>
