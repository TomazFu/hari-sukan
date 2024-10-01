<?php
session_start();

if(isset($_POST["submit"])) {
    $idMurid = $_POST["idMurid"];

    require_once "connect.php";
    require_once "functions.php";
    
    if (uidExists($conn, $idMurid, $_SESSION["tablename"]) === false) {
        header("location: ../info/edit-student.php?error=studentnotindb");
        exit(); 
    }
    
    header("location: ../info/edit-student.php?idmurid=". $idMurid);

}
else {
    header("location: ../info/edit-student.php");
}