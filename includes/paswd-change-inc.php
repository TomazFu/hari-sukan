<?php
session_start();
$_SESSION["tablename"] = "hakim";
if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $paswd = $_POST["paswd"];
    $paswdRepeat = $_POST["paswdRepeat"];

    require_once "connect.php";
    require_once "functions.php";
    
    if ($uidExists = uidExists($conn, $username, $_SESSION["tablename"]) === false) {
        header("location: ../admin/paswd-change.php?error=invaliduser");
        exit();
    }

    if (paswdMatch($paswd, $paswdRepeat) !== true) {
        header("location: ../admin/paswd-change.php?error=passwordnotmatch");
        exit(); 
    }

    paswdChange($conn, $username, $paswd);

    header("location: ../admin/paswd-change.php?error=none");

}
else {
    header("location: ../admin/paswd-change.php");
}