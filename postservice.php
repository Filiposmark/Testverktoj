<?php
include_once "includes/db_connect.php";

$actionNoMatch = true;
$response = array();
$response["success"] = false;


@$postdata = file_get_contents("php://input");
@$request = json_decode($postdata);
@$action = filter_var($request->action, FILTER_SANITIZE_STRING);
@$login_id = filter_var((int)$request->login_id, FILTER_SANITIZE_NUMBER_INT);
@$ticket = preg_replace("/[^a-zA-Z0-9]+/", "", $request->ticket);

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header('HTTP/1.0 405 Method Not Allowed');
    exit;
}
elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    $headerToken = $_SERVER['HTTP_TOKEN'];
    $sessionToken = $_SESSION['XSRF'];
    if ($headerToken != $sessionToken) {
        header('HTTP/1.0 401 Unauthorized');
        $response["msg"] = "Wrong token";
        exit;
    }
}


$sql = "SELECT role, ticket FROM users WHERE id=? LIMIT 1";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $login_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["ticket"] === $ticket) {
            $role = $row["role"];
        } else {
            $user_level = "Error";
            header('HTTP/1.0 403 Forbidden');
        }
    }
} else {
    header('HTTP/1.0 403 Forbidden');
    echo 'Not logged in!';
}


// Now everything is done, now we can handle the request
if (!isset($request->action)) {
    $response["msg"] = "No action defined";
    echo json_encode($response);
} else {
    if ($action == "saveTest") {

    }


    if ($actionNoMatch) {
        $response["msg"] = "No action matched";
        echo json_encode($response);
    }
}

