<?php
@session_start();
require("./validateData.php");
require("./dbConnection.php");


$accountRole = [
    "USER" => "USER",
    "STAFF" => "STAFF",
    "APPLICANT" => "APPLICANT",
    "ADMIN" => "ADMIN",
    "SUPER_ADMIN" => "SUPER_ADMIN",
];


$accountStatus = [
    "ACTIVE" => "ACTIVE",
    "DELETED" => "DELETED",
    "DISABLED" => "DISABLED",
    "CONFIRMED" => "CONFIRMED",
];


class ProcessAuthentication
{

    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = validateData($_POST['email']);
            $password = validatePassword($_POST['password']);

            try {
                $fetchUserDetail = $conn->query("SELECT * FROM users WHERE email='$email'");

                if ($fetchUserDetail->num_rows > 0) {

                    $user = $fetchUserDetail->fetch_assoc(); // Fetch user details

                    if (password_verify($password, $user['password'])) {
                        // Password is correct, start session and redirect to the dashboard
                        $_SESSION['user_id'] = $user['id']; // Save user ID in session
                        $_SESSION['email'] = $user['email']; // Save username in session
                        $_SESSION['role'] = $user['role']; // Save username in session
                        echo json_encode(["message" => "Login successfull", "success"=> true]); // Redirect to dashboard
                    } else {
                        echo json_encode(["message" => "incorrect user credential", "success"=> true]); 
                    }
                } else {
                    echo "No account found";
                }
            } catch (\Throwable $th) {
                echo json_encode(["message" => $th->getMessage(), "success" => false]);
            }
        }
    }

    function registerUser() {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = validateEmail($_POST['email']);
            $password = validatePassword($_POST['password']);
            $userRole = $_POST['role'];

            $phoneNumber = trim($_POST['phone_number']);

            $password = password_hash($password, PASSWORD_ARGON2ID);

            if($userRole) $userRole = $accountRole['USER'];

            $accountStatus = $accountStatus['ACTIVE'];
            
            try {
                //code...
                $isExist = $conn->query("SELECT * FROM users WHERE email='$email'");

                if ($isExist->num_rows > 0) {
                   echo json_encode(["message" => "account already exist", "success" => false])
                } else {
                    $insert = $conn->query("INSERT INTO users(email, password, role, phone_number, status) VALUES('$email', '$password', '$userRole', '$phoneNumber', $accountStatus')");
                    echo json_encode(['message' => "account successfully created", "success" => true])
                }
            } catch (\Throwable $th) {
                echo json_encode(["message" => $th->getMessage(), "success" => false]);
            }

        }
    }
}

$processAuth = new ProcessAuthentication();

$processAuth->login();

$processAuth->registerUser();


?>