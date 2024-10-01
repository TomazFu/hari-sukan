<?php
//Home Page highlights display
    function highlights_r($acara, $conn) {
        $sql = 'SELECT murid.namaMurid, markah.catatan FROM `acara` JOIN markah ON acara.idAcara = markah.idAcara JOIN murid ON markah.idMurid = murid.idMurid WHERE acara.idAcara = ? ORDER BY markah.catatan ASC LIMIT 3;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../home.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $acara);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if (!$resultData){
            header("location: ../home.php?error=stmtfailed");
            exit();
        }
        $i = 0;
        while ($row = mysqli_fetch_row($resultData)) {
            $i++;
            printf(nl2br("<p>" . $i . ". %s (%s)\r\n</p>"), $row[0], $row[1]);
        }
        mysqli_free_result($resultData);
        mysqli_stmt_close($stmt);
    }

    function highlights_j($acara, $conn) {
        $sql = 'SELECT murid.namaMurid, markah.catatan FROM `acara` JOIN markah ON acara.idAcara = markah.idAcara JOIN murid ON markah.idMurid = murid.idMurid WHERE acara.idAcara = ? ORDER BY markah.catatan DESC LIMIT 3;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../home.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $acara);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if (!$resultData){
            header("location: ../home.php?error=stmtfailed");
            exit();
        }
        $i = 0;
        while ($row = mysqli_fetch_row($resultData)) {
            $i++;
            printf(nl2br("<p>" . $i . ". %s (%s)\r\n</p>"), $row[0], $row[1]);
        }
        mysqli_free_result($resultData);
        mysqli_stmt_close($stmt);
    }

//Login Page
    function loginUser($conn, $email, $paswd, $tablename) {
        $uidExistsLogin = uidExists($conn, $email, $tablename);

        if ($uidExistsLogin === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        if ($tablename == "hakim"){
            $correctpaswd = $uidExistsLogin["passwordHakim"];
        } else if ($tablename == "admin"){
            $correctpaswd = $uidExistsLogin["passwordAdmin"];
        }
        
        if ($paswd !== $correctpaswd) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if ($paswd === $correctpaswd) {
            session_start();
            if ($tablename == "hakim"){
                $_SESSION["userid"] = $uidExistsLogin["idHakim"];
                $_SESSION["useruid"] = $uidExistsLogin["namaHakim"];
            } else if ($tablename == "admin"){
                $_SESSION["userid"] = $uidExistsLogin["idAdmin"];
                $_SESSION["useruid"] = $uidExistsLogin["namaAdmin"];
                $_SESSION["adminstatus"] = true;
            }
            $_SESSION["loginalert"] = true;
            header("location: ../home.php");
            exit();
        }
    }

    function uidExists($conn, $id, $tablename) {
        if ($tablename == "murid") {
            $sql = "SELECT `murid`.idMurid, `murid`.namaMurid, `murid`.jantina, `murid`.kelas, `no telefon murid`.noTelefon FROM `murid` JOIN `no telefon murid` ON `no telefon murid`.`namaMurid` = `murid`.namaMurid WHERE `murid`.idMurid = ?;";
        }else if ($tablename == "hakim"){
            $sql = "SELECT `hakim`.idHakim, `hakim`.idAcara, `hakim`.namaHakim, `hakim`.passwordHakim, `no telefon hakim`.noTelefon FROM `hakim` JOIN `no telefon hakim` ON `no telefon hakim`.namaHakim = `hakim`.namaHakim WHERE `hakim`.namaHakim = ?;";
        }else if ($tablename == "admin"){
            $sql = "SELECT * FROM `admin` WHERE `admin`.namaAdmin = ?;";
        }else if ($tablename == "acara"){
            $sql = "SELECT * FROM `acara` WHERE `acara`.idAcara = ?;";
        }

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../home.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }
//signup functions
    function paswdMatch($paswd1, $paswd2) {
        if ($paswd1 === $paswd2){
            return true;
        }
        else {
            return false;
        }
    }

    function createHakim($conn, $idHakim, $idAcara, $namaHakim, $paswd) {
        $sql = "INSERT INTO `hakim` (idHakim, idAcara, namaHakim, passwordHakim) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../admin/add-acc-hakim.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $idHakim, $idAcara, $namaHakim, $paswd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function createAdmin($conn, $idAdmin, $namaAdmin, $paswd, $noTelefon) {
        $sql = "INSERT INTO `admin` (idAdmin, namaAdmin, passwordAdmin, noTelefon) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../admin/add-acc-admin.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $idAdmin, $namaAdmin, $paswd, $noTelefon);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $idMurid, $namaMurid, $jantina, $kelas) {
        $sql = "INSERT INTO `murid` (idMurid, namaMurid, jantina, kelas) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../info/add-info.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $idMurid, $namaMurid, $jantina, $kelas);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function addNoTelefon($conn, $nama, $noTelefon, $tablename) {
        if ($tablename === "murid") {
            $sql = "INSERT INTO `no telefon murid` (namaMurid, noTelefon) VALUES (?, ?);";
        }
        else if ($tablename === "hakim") {
            $sql = "INSERT INTO `no telefon hakim` (namaHakim, noTelefon) VALUES (?, ?);";
        }
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../home.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $nama, $noTelefon);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function createAcara($conn, $idAcara, $namaAcara) {
        $sql = "INSERT INTO `acara` (idAcara, namaAcara) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../info/add-acara.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $idAcara, $namaAcara);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

//user details editing
    function editUser($conn, $idMurid, $namaMurid, $jantina, $kelas, $noTelefon) {
        $sql = "UPDATE murid JOIN `no telefon murid` ON murid.namaMurid = `no telefon murid`.`namaMurid` SET murid.namaMurid = ?, murid.jantina = ?, murid.kelas = ?, `no telefon murid`.`noTelefon` = ? WHERE idMurid = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../info/add-info.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssss", $namaMurid, $jantina, $kelas, $noTelefon, $idMurid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../info/edit-student.php?error=none");
        exit();
    }

//marks inserting functions
    function duplicateMarks($conn, $idMurid, $idAcara){
        $sql = 'SELECT * FROM markah WHERE idMurid = ? AND idAcara = ?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../info/insert-marks.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $idMurid, $idAcara);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);

        if (mysqli_num_rows($resultData) > 0) {
            return true;
        }
        else {
            return false;
        }

    }

    function insertMarks($conn, $idMurid, $idAcara, $catatan){
        $sql = "INSERT INTO `markah` (idMurid, idAcara, catatan) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../info/insert-marks.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", $idMurid, $idAcara, $catatan);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
//search function
    function searchTableMurid_Id($conn, $modifiedText) {
        $sql = 'SELECT `murid`.idMurid, `murid`.namaMurid, `murid`.jantina, `murid`.kelas, `no telefon murid`.noTelefon FROM `murid` JOIN `no telefon murid` ON `no telefon murid`.`namaMurid` = `murid`.namaMurid WHERE `murid`.idMurid LIKE ?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../info/search.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $modifiedText);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if (!$resultData){
            header("location: ../info/search.php?error=stmtfailed");
            exit();
        }

        if (!mysqli_num_rows($resultData) > 0){
            return false;
        }

        while ($row = mysqli_fetch_row($resultData)) {
            printf(nl2br("ID: %s\r\n\nNama: %s\r\n\nJantina: %s\r\n\nKelas: %s\r\n\nNo. Telefon: %s\r\n\n"), $row[0], $row[1], $row[2], $row[3], $row[4]);
        }

        mysqli_free_result($resultData);

        mysqli_stmt_close($stmt);
        
    }

    function searchTableMurid_Name($conn, $modifiedText) {
        $sql = 'SELECT `murid`.idMurid, `murid`.namaMurid, `murid`.jantina, `murid`.kelas, `no telefon murid`.noTelefon FROM `murid` JOIN `no telefon murid` ON `no telefon murid`.`namaMurid` = `murid`.namaMurid WHERE `murid`.namaMurid LIKE ?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../info/search.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $modifiedText);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if (!$resultData){
            header("location: ../info/search.php?error=stmtfailed");
            exit();
        }

        if (!mysqli_num_rows($resultData) > 0){
            return false;
        }

        while ($row = mysqli_fetch_row($resultData)) {
            printf(nl2br("ID: %s\r\n\nNama: %s\r\n\nJantina: %s\r\n\nKelas: %s\r\n\nNo. Telefon: %s\r\n\n"), $row[0], $row[1], $row[2], $row[3], $row[4]);
        }

        mysqli_free_result($resultData);

        mysqli_stmt_close($stmt);

    }

// admin related functions
    function hakimList($conn) {
        $sql = 'SELECT `hakim`.idhakim, `hakim`.idAcara, `hakim`.namaHakim FROM `hakim`;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../admin/admin.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if (!$resultData){
            header("location: ../admin /admin.php?error=stmtfailed");
            exit();
        }

        while ($row = mysqli_fetch_row($resultData)) {
            printf(nl2br("<p>ID Hakim: %s\r\n\nID Acara: %s\r\n\nNama Hakim: %s\r\n\n \r</p>"), $row[0], $row[1], $row[2]);
        }

        mysqli_free_result($resultData);

        mysqli_stmt_close($stmt);

    }
    function autoIncrementId($conn, $tablename) {
        if ($tablename == "hakim"){
            $sql = "SELECT `hakim`.idHakim from `hakim` order by `hakim`.idhakim DESC LIMIT 1;";
        } else if ($tablename == "admin"){
            $sql = "SELECT `admin`.idAdmin from `admin` order by `admin`.idAdmin DESC LIMIT 1;";
        }
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../admin/add-acc.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        if ($tablename == "hakim"){
            if(mysqli_num_rows($resultData) > 0) {
                if ($row = mysqli_fetch_assoc($resultData)) {
                    $value2 = $row['idHakim'];
                    $value2 = substr($value2, 1, 5);
                    $value2 = $value2 + 1;
                    $value2 = "H" . sprintf('%04s', $value2);
                    $value = $value2; 
                }
            } 
            else {
                $value2 = "H0001";
                $value = $value2;
            }        
        } else if ($tablename == "admin"){
            if(mysqli_num_rows($resultData) > 0) {
                if ($row = mysqli_fetch_assoc($resultData)) {
                    $value2 = $row['idAdmin'];
                    $value2 = substr($value2, 1, 2);
                    $value2 = $value2 + 1;
                    $value2 = "A" . sprintf('%01s', $value2);
                    $value = $value2; 
                }
            } 
            else {
                $value2 = "A1";
                $value = $value2;
            }        }
        
        return $value;
    }

    function paswdChange($conn, $username, $newpaswd) {
        $sql = "UPDATE `hakim` SET `passwordHakim` = ? WHERE `hakim`.`namaHakim` = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../info/insert-marks.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $newpaswd, $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
