<?php
session_start();
$_SESSION["tablename"] = "acara";
if(isset($_POST["submit"])) {
    $idAcara = $_POST["idAcara"];
    $namaAcara = $_POST["namaAcara"];


    require_once "connect.php";
    require_once "functions.php";
    
    if (uidExists($conn, $idAcara, $_SESSION["tablename"]) !== false) {
        header("location: ../info/add-acara.php?error=acaraaldindb");
        exit(); 
    }

    createAcara($conn, $idAcara, $namaAcara);
    header("location: ../info/add-acara.php?error=none");

}
else {
    header("location: ../info/add-acara.php");
}