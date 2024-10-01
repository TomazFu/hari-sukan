<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Memuat Naik</title>
    <link rel="shortcut icon" href="../images/Chung_Ling_Butterworth.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        require_once "../header.php";
    ?>
    <?php
    
        $message = '';
        require_once "../includes/connect.php";
        if (isset($_POST["submit"])){
            $filename = explode(".", $_FILES['file']['name']);
            if (end($filename) == "csv") {
                $handle = fopen($_FILES['file']['tmp_name'], "r");

                while (($data = fgetcsv($handle, 0, ",")) !== false){
                    $idMurid = mysqli_real_escape_string($conn, $data[0]);
                    $idAcara = mysqli_real_escape_string($conn, $data[1]);
                    $catatan = mysqli_real_escape_string($conn, $data[2]);
                    $query = "INSERT INTO `markah` (idMurid, idAcara, catatan) VALUES ('$idMurid', '$idAcara', '$catatan');";
                    mysqli_query($conn, $query);
                }
                fclose($handle);
                header("location: file-upload.php?error=none");
                exit();
            }
            else {
                $message = '<p>Hanya CSV fail yang diterimakan.</p>';
            }
        }

        if (isset($_GET["error"])){
            if ($_GET["error"] == "none") {
                $message = '<script>alert("Fail berjaya dimuat naikkan.");</script>';
            }
        }
    ?>
    <div class="container-2">
    <a href="admin.php"><button><~</button></a>
    <form action="file-upload.php" method="post" enctype="multipart/form-data" class="file-form">
    <h2>Sila pilih fail untuk mengimportkan data anda:</h2>
    <input type="hidden" name="MAX_FILE_SIZE" value="41943040">
    <input type="file" name="file" accept=".csv" class="file-input" required>
    <?php echo $message; ?>
    <br><button type="submit" name="submit" class="file-submit">Muat Naik</button>
    </form>
    </div>
<?php
    require_once "../footer.php";
?>
