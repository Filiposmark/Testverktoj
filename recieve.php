<?php
include_once "includes/db_connect.php";
//$con is connection to database

$requestPayload = file_get_contents("php://input");


$data = json_decode($requestPayload);

$stmt = $mysqli->prepare("INSERT INTO users (username, name, password) VALUES (?,?,?)");
$stmt->bind_param("sss", $username, $name, $password);

function generateusername($fname, $mysqli) {
    $userid = 0;
    $stmt_1 = $mysqli->prepare("SELECT id FROM users ORDER BY id DESC LIMIT 1");
    $stmt_1->execute();
    $result = $stmt_1->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userid = $row["id"];
        }
    }


    $subname = strtolower(substr($fname,0,4));
    $num = strval($userid);

    return $subname.$num;
    
}

foreach ($data as $key=>$val) {
    $username = generateusername($val->Fornavn, $mysqli);
    $name = $val->Fornavn;
    $password = password_hash(hash("sha512",  substr($val->Fornavn, 0, strpos($val->Fornavn, ' '))), PASSWORD_BCRYPT);
    $stmt->execute();
}

?>



