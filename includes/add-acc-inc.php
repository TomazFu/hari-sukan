<?php
session_start();

if(isset($_POST["submit"])) {
    if ($_SESSION["tablename"] == "hakim"){
        $idAcara = $_POST["idAcara"];
    }
    $username = $_POST["username"];
    $paswd = $_POST["paswd"];
    $paswdRepeat = $_POST["paswdRepeat"];
    $noTelefon = $_POST["noTelefon"];

    require_once "connect.php";
    require_once "functions.php";
    if ($_SESSION["tablename"] == "hakim"){
        if (uidExists($conn, $username, $_SESSION["tablename"]) !== false) {
            header("location: ../admin/add-acc-hakim.php?error=useraldindb");
            exit(); 
        }
        if (paswdMatch($paswd, $paswdRepeat) !== true) {
            header("location: ../admin/add-acc-hakim.php?error=passwordnotmatch");
            exit();
        }
        createHakim($conn, autoIncrementId($conn, $_SESSION["tablename"]), $idAcara, $username, $paswd);
        addNoTelefon($conn, $username, $noTelefon, $_SESSION["tablename"]);
        header("location: ../admin/add-acc-hakim.php?error=none");
    }
    else if ($_SESSION["tablename"] == "admin"){
        if (uidExists($conn, $username, $_SESSION["tablename"]) !== false) {
            header("location: ../admin/add-acc-admin.php?error=useraldindb");
            exit(); 
        }
        if (paswdMatch($paswd, $paswdRepeat) !== true) {
            header("location: ../admin/add-acc-admin.php?error=passwordnotmatch");
            exit();
        }
        createAdmin($conn, autoIncrementId($conn, $_SESSION["tablename"]), $username, $paswd, $noTelefon);
        header("location: ../admin/add-acc-admin.php?error=none");
    }
}
else {
    header("location: ../admin/admin.php");
}