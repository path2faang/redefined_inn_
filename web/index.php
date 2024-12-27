<?php
@session_start();
require("./requireAuth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User || Experience a better world</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../assets/js/main.js"></script>
</head>

<body>

    <div class="md:h-screen md:w-screen ">

        <div class="md:flex gap-5 md:gap-10">
            <div class="md:w-72 px-4 bg-[#008CFF] md:h-screen">
                <div class="logo w-fit mx-auto">
                    <a href="./index.php" class="">
                        <img src="../assets/logo.png" alt="">
                    </a>
                </div>

                <fieldset class="menu-item ml-2 border-t-2 text-center border-gray-200">
                    <legend class="text-gray-100 font-medium text-center hover:text-gray-300 transition-colors cursor-not-allowed px-2">MENU</legend>
                </fieldset>

                <ul class="md:ml-4">
                    <!-- <?php
                    // if ($_SESSION['role'] == "ADMIN" || $_SESSION['role'] == "STAFF") {
                    ?> -->
                        <li class="mt-8">
                            <a href="?tab=userListing.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Users</a>
                        </li>
                        <li class="mt-8">
                        <a href="?tab=applicantListing.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Applicants</a>
                    </li>
                    <li class="mt-8">
                        <a href="?tab=inventoryListing.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Inventory</a>
                    </li>
                    <li class="mt-8">
                        <a href="?tab=roomListing.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Room Mgt</a>
                    </li>
                     
                    <li class="mt-8">
                        <a href="?tab=discountListing.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Discount</a>
                    </li>
                   
                    <!-- <?php
                    // }
                    // ?> -->

                    <li class="mt-8">
                        <a href="?tab=listBooking.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Booking</a>
                    </li>
                  

                    <li class="mt-8">
                        <a href="?tab=transactionListing.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Transactions</a>
                    </li>
                    <li class="mt-8">
                        <a href="?tab=settings.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Settings</a>
                    </li>
                    <li class="mt-8">
                        <a href="./logger.php" class="py-2 px-5 border-2 rounded-lg hover:border-blue-400 transition-colors font-medium text-gray-100 hover:bg-[#008dF9] hover:shadow-sm">Logout</a>
                    </li>

                </ul>
            </div>
            <div class="w-full">
                <?php
                $tab = @$_GET['tab'];

                switch ($tab) {
                    case 'login.php':
                        return require("./login.php");

                    case 'register.php':
                        return require("./register.php");

                    case 'resetpassword.php':
                        return require("./resetpassword.php");

                    case './index.php';
                        return require("./index.php");

                    case "listBooking.php":
                        return require("listBooking.php");

                    case "./newBooking.php":
                        return require("./newBooking.php");

                    case "./updateBooking.php":
                        return require("./updateBooking.php");

                    case "userListing.php":
                        return require("userListing.php");

                    case "applicantListing.php":
                        return require("applicantListing.php");

                    case "discountListing.php":
                        return require("discountListing.php");

                    case "inventoryListing.php":
                        return require("inventoryListing.php");

                    case "roomListing.php":
                        return require("roomListing.php");

                    case "settings.php":
                        return require("settings.php");

                    default:
                        require("./dashboard.php");
                }
                ?>

            </div>
        </div>

    </div>


</body>

</html>