<?php
if(isset($_POST["submit"])) {
    $idMurid = $_POST["idMurid"];
    $idAcara = $_POST["idAcara"];
    $catatan = $_POST["catatan"];

    require_once "connect.php";
    require_once "functions.php";

    if (duplicateMarks($conn, $idMurid, $idAcara) !== false) {
        header("location: ../info/insert-marks.php?error=duplicatedata");
        exit(); 
    }

    insertMarks($conn, $idMurid, $idAcara, $catatan);

    header("location: ../info/insert-marks.php?error=none");

}
else {
    header("location: ../info/insert-marks.php");
}