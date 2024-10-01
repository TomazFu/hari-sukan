<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kata Laluan Penukaran</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
        <div class="container-2">
        <a href="admin.php"><button><~</button></a>
        <form action="../includes/paswd-change-inc.php" method="post" class="login-form">
            <h2>Kata laluan penukaran</h2>
            Nama: <input type="text" name="username" class="input-box-1" placeholder="Contoh: Ali..."><br>
            Kata Laluan: <input type="password" name="paswd" class="input-box-1" placeholder="Password..."><br>
            Ulang Kata Laluan: <input type="password" name="paswdRepeat" class="input-box-1" placeholder="Repeat Password..."><br>
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "passwordnotmatch") {
                        echo "<p>Kata laluan tidak padan. Sila cuba lagi.</p>";
                    }
                    else if ($_GET["error"] == "invaliduser") {
                        echo "<p>Tidak mempunyai rekod-rekod tentang user tersebut. Sila cuba lagi.</p>";
                    }
                    else if ($_GET["error"] == "none") {
                        echo '<script>alert("Anda telah berjaya mengubahkan kata laluan hakim tersebut.");</script>';
                    }
                }
            ?>
            <button type="submit" name="submit">Mengubah</button>
        </form>
        </div>

<?php
    require_once "../footer.php";
?>
