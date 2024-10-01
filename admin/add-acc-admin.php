<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambah Akaun</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
    <?php $_SESSION["tablename"] = "admin";?>
        
        <div class="container-2">
        <a href="admin.php"><button><~</button></a>
        <form action="../includes/add-acc-inc.php" method="post" class="login-form">
        <h2>Menciptai Akaun Admin</h2>
            Nama Admin: <input type="text" name="username" class="input-box-1" placeholder="Contoh: Ali..." required><br>
            Kata Laluan: <input type="password" name="paswd" class="input-box-1" placeholder="Kata laluan anda..." required><br>
            Ulang Kata Laluan: <input type="password" name="paswdRepeat" class="input-box-1" placeholder="Kata laluan anda..." required><br>
            No. Telefon: <input type="text" name="noTelefon" class="input-box-1" placeholder="Contoh: 0123456789..." required><br>
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "passwordnotmatch") {
                        echo "<p>Kata laluan tidak padan. Sila cuba lagi.</p>";
                    }
                    else if ($_GET["error"] == "useraldindb") {
                        echo "<p>User sudah di dalam pangkalan data. Sila cuba lagi.</p>";
                    }
                    else if ($_GET["error"] == "stmtfailed") {
                        echo '<p>Sesuatu perkara menghadapi masalah. Sila cuba lagi.</p>';
                    }
                    else if ($_GET["error"] == "none") {
                        echo '<script>alert("Anda telah berjaya mencipta akaun tersebut ke dalam sistem ini.");</script>';
                    }
                }
            ?>
            <button type="submit" name="submit">Menambah Akaun</button>
        </form>
        </div>
<?php
    require_once "../footer.php";
?>
