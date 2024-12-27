<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefined Inn - Luxury Stays | Book Your Perfect Getaway at</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/main.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./assets/js/main.js"></script>
</head>

<body>


    <?php
    $tab = @$_GET['tab'];

    switch ($tab) {
        case 'login.php':
            return require("login.php");

        case 'resetpassword.php':
            return require("resetpassword.php");
        case 'register.php':
            return require("register.php");

        default:
            return require("homepage.php");
    }
    ?>

</body>

</html>