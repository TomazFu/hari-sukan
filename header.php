<header>
<script>function alertF(){alert("Anda telah berjaya logout sistem ini.");}</script>
    <div><a href="http://localhost/harisukan/home.php"><img class="logo" alt="Ikon Sekolah" src="http://localhost/harisukan/images/Chung_Ling_Butterworth.png" width="50" height="50"></a></div>
    <nav>
        <ul class="navbar">
            <li><a href="http://www.smjk.edu.my/school/index.php?schid=14">Sekolah Kita</a></li>
            <?php
                if (isset($_SESSION["useruid"])) {
                    if ($_SESSION["loginalert"] === true){echo '<script>alert("Anda telah berjaya login sistem ini.");</script>';$_SESSION["loginalert"]=false;}
                    echo '<li><a href="http://localhost/harisukan/info/infos.php">Info Murid</a><br></li>';
                    if (isset($_SESSION["adminstatus"]) && $_SESSION["adminstatus"] === true){
                        echo '<li><a href="http://localhost/harisukan/admin/admin.php">Urusan</a></li></ul>';
                    }
                } else {
                    echo '</ul></nav><a href="http://localhost/harisukan/judges-login.php"><button>Log masuk sebagai hakim?</button></a></li>';
                }
            ?>

    <?php
        if (isset($_SESSION["useruid"])) {
            echo "</nav><div class='user-box'><h3>" . $_SESSION["useruid"] . "</h3>";
            echo '<a href="http://localhost/harisukan/includes/logout-inc.php" onclick="alertF()"><button>Log keluar?</button></a>';

        }
    ?>
    </div>
</header>