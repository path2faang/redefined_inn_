<?php
require("./web/dbConnection.php");
require("./web/validateData.php");
$error = null;
$success = null;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = validateEmail($_POST['email']);
    $password = validateData($_POST['password']);
    $phone_number = $_POST['phone_number'];
    $fullname = validateData($_POST['fullname']);

    $fetchUser = $conn->query("SELECT * FROM users WHERE email='$email'");

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($fetchUser->num_rows > 0) {
        $user = $fetchUser->fetch_assoc();
        $error = "account already exist, please login...";
    } else {
        $insertResult = $conn->query("INSERT INTO users(
        email, password, role, phone_number, status, fullname) VALUES('$email', '$$hashPassword', 'USER', '$phone_number', 'ACTIVE', '$fullname' )");
        $success = "Account successfully created";
        echo "<script> 
        setTimeout(() => {
window.location.href = 'login.php';
}, 1500);
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration | Redefined Inn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/main.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./assets/js/main.js"></script>
</head>

<body>
    <div class="w-4/5 mx-auto md:w-1/3 md:mt-24 mt-20">

        <h3 class="text-gray-800 my-3 text-xl md:text-2xl">Create Account Form</h3>

        <form method="POST" action="" class="mt-5">

            <?php
            if ($error) {
            ?>
                <div class="text-red-600 text-sm font-semibold border border-gray-300 w-fit mx-auto py-1 px-5 rounded-full"><?= @$error ?></div>
            <?php
            }
            ?>
            <?php
            if ($success) {
            ?>
                <div class="bg-green-600 text-white text-sm font-semibold border border-gray-300 w-fit mx-auto py-1 px-5 rounded-full"><?= @$success ?></div>
            <?php
            }
            ?>
            <div class="block relative">
                <label>Fullname:</label>
                <input type="text" name="fullname" placeholder="Fullname" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>
            <div class="block relative mt-4">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Your Email address" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>
            <div class="block relative mt-4">
                <label>Phone Number:</label>
                <input type="tel" name="phone_number" placeholder="Your Phone number" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>

            <div class="block relative mt-4">
                <label>Password:</label>
                <input type="password" minlength="5" name="password" placeholder="Enter Password" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                        <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                </div>
            </div>

            <div class="mt-4 flex justify-between text-sm">
                <a href="resetpassword.php" class="text-gray-600">
                    Forgot Password? Reset
                </a>
                <a href="login.php" class="text-gray-600">
                    Already have an account? Login
                </a>
            </div>

            <div class="mx-auto mt-3">
                <button type="submit" class="py-2 px-5 bg-sky-600 w-full text-white rounded-full">Submit</button>
            </div>

        </form>
    </div>


</body>

</html>