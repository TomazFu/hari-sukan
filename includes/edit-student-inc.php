<?php
session_start();

if(isset($_POST["submit"])) {
    $idMurid = $_SESSION["idmuridedit"];
    $namaMurid = $_POST["namaMurid"];
    $jantina = $_POST["jantina"];
    $kelas = $_POST["kelas"];
    $noTelefon = $_POST["noTelefon"];

    require_once "connect.php";
    require_once "functions.php";

    editUser($conn, $idMurid, $namaMurid, $jantina, $kelas, $noTelefon);
    header("location: ../info/edit-student.php?error=none");

}
else {
    header("location: ../info/edit-student.php");
}