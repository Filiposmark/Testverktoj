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

    if ($action == "finishTest") {
        $actionNoMatch = false;

        $test = get_object_vars(json_decode($request->test));
        $response["test"] = $test;

        $test_id = $test["id"];
        $count_multiple_choice = 0;
        $count_correct = 0;


        $sql = "INSERT INTO test_answers (student_id, test_id, question_id, answer) VALUES (?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iiis", $login_id, $test_id, $question_id, $answer);

        foreach ($test["questions_parsed"] as $question) {
            $question_id = $question->id;
            $answer = $question->answer;
            $stmt->execute();

            // If multiple choice question
            if ($question->type == 1) {
                $count_multiple_choice++;

                $answers = $question->answers;
                if ($answers[$question->answer]->correct == true) {
                    $count_correct++;
                }
            }
        }


        // Insert result
        $percentage_correct = intval($count_correct / $count_multiple_choice * 100);
        $sql = "INSERT INTO test_results (student_id, test_id, percentage_correct) VALUES (?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iii", $login_id, $test_id, $percentage_correct);
        $stmt->execute();


        $response["MC-count"] = $count_multiple_choice;
        $response["MC-corr"] = $count_correct;
        //$response["success"] = true;
        echo json_encode($response);
    }




    // Define actions that only teachers and admins can perform
    if ($role == "teacher" || $role == "admin") {
        if ($action == "saveTest") {
            $actionNoMatch = false;

            // Get the object from json-encoded string
            $test = get_object_vars(json_decode($request->test));

            $response["test"] = $test;

            // Insert into DB
            $stmt = $mysqli->prepare("INSERT INTO tests (teacher_id, date_available, date_closed, topic, title) VALUES (?,?,?,?,?)");
            $stmt->bind_param("iiiis", $login_id, $test["date_available_millis"], $test["date_closed_millis"], $test["topic"], $test["title"]);
            $stmt->execute();

            // Get the last id from DB (which is the one we just inserted)
            $test_id = mysqli_insert_id($mysqli);
            $response["test_id"] = $test_id;

            // Now create a statement to insert questions
            $stmt = $mysqli->prepare("INSERT INTO test_questions (test_id, question, type, answers) VALUES (?,?,?,?)");
            $stmt->bind_param("isis", $test_id, $question, $type, $answers);

            // Loop through all questions and perform the query
            $response["questions"] = $test["questions"];
            $response["classes"] = $test["classes"];

            foreach ($test["questions"] as $current_question) {
                $question = $current_question->question;
                $type = $current_question->type;
                $answers = json_encode($current_question->answers);
                $stmt->execute();
            }


            // Now create statement to assign classes to test
            $stmt = $mysqli->prepare("INSERT INTO test_classes (test_id, class_id) VALUES (?,?)");
            $stmt->bind_param("ii", $test_id, $class);

            $response["classes"] = $test["classes"];
            foreach ($test["classes"] as $class) {
                $stmt->execute();
            }

            $response["success"] = true;


            echo json_encode($response);

        }
    }



    if ($actionNoMatch) {
        $response["msg"] = "No action matched";
        echo json_encode($response);
    }
}

