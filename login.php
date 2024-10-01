<?php
    require_once "header.php";
?>
<link rel="stylesheet" href="style.css">
    <form action="includes/login-inc.php" method="post" class="login-form">
        <img src="images/user.png" alt="User Icon">
        <input type="text" name="email" class="input-box-1" placeholder="Nama..." required><br>
        <input type="password" name="paswd" class="input-box-1" placeholder="Kata Laluan..." required><br>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "wronglogin") {
                echo "<p>Username atau kata laluan tidak sah.</p>";
            }
        }
    ?>
        <button type="submit" name="submit">Log Masuk</button>
    </form>

<?php
    require_once "footer.php";
?>
