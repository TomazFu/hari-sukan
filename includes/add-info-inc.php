<?php
session_start();
$_SESSION["tablename"] = "murid";
if(isset($_POST["submit"])) {
    $idMurid = $_POST["idMurid"];
    $namaMurid = $_POST["namaMurid"];
    $jantina = $_POST["jantina"];
    $kelas = $_POST["kelas"];
    $noTelefon = $_POST["noTelefon"];

    require_once "connect.php";
    require_once "functions.php";
    
    if (uidExists($conn, $idMurid, $_SESSION["tablename"]) !== false) {
        header("location: ../info/add-info.php?error=studentaldindb");
        exit(); 
    }

    createUser($conn, $idMurid, $namaMurid, $jantina, $kelas);
    addNoTelefon($conn, $namaMurid, $noTelefon, $_SESSION["tablename"]);
    header("location: ../info/add-info.php?error=none");

}
else {
    header("location: ../info/add-info.php");
}