<?php
    session_start();
    require_once "includes/connect.php";
    require_once "includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Utama</title>
    <link rel="shortcut icon" href="images/Chung_Ling_Butterworth.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    require_once "header.php";
    
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "stmtfailed") {
            echo "<script>alert('Sesuatu perkara menghadapi masalah. Sila cuba lagi.');</script>";
        }
    }
    echo "<div class='container-1'>";
    echo "<h1>Highlights</h1>";
    echo '<div class="highlights-r">';
    echo "<div class='highlight-box-1'><h3>100-Meter</h3>";
    $acara = "K1";
    highlights_r($acara, $conn);
    echo "</div>";
    echo "<div class='highlight-box-2'><h3>200-Meter</h3>";
    $acara = "K2";
    highlights_r($acara, $conn);
    echo "</div>";
    echo "<div class='highlight-box-3'><h3>400-Meter</h3>";
    $acara = "K3";
    highlights_r($acara, $conn);
    echo "</div>";
    echo "</div>";
    echo '<div class="highlights-j">';
    echo "<div class='highlight-box-4'><h3>Lompat Jauh</h3>";
    $acara = "K4";
    highlights_j($acara, $conn);
    echo "</div>";
    echo "<div class='highlight-box-5'><h3>Lompat Tinggi</h3>";
    $acara = "K5";
    highlights_j($acara, $conn);
    echo "</div>";
    echo "</div>";

    echo '</div>';
    ?>
    </div>

<?php
    require_once "footer.php";
?>
