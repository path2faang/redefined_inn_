<?php
@session_start();
require("./requireAuth.php");
require("./validateData.php");
$error = null;
$success = null;


$userId = $_SESSION['userId'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // in addition for not authenticate user to help them in registration
    $fullName = validateData($_POST['fullname']);
    $email = validateData($_POST['email']);
    $phoneNumber = validateData($_POST['phone_number']);
    $numberOfRooms = validateData($_POST['fullname']);
    $numberOfDays = validateData($_POST['fullname']);
    $nextOfKinName = validateData($_POST['fullname']);
    $nextOfKingPhoneNumber = validateData($_POST['fullname']);
    $remarks = validateData($_POST['fullname']);


    // fetch current booking discount
    $bookingDiscount = $conn->query("SELECT discount FROM booking_critieria_tb");

    $discount = 0;

    while($rowDiscount = $bookingDiscount->fetch_assoc()) {
        $discount = $rowDiscount['discount'] ?? 0;
    }

    $amountPaid = $discount * $
    $status = "BOOKING:INITIATED";

    $bookingResponse = $conn->query("INSERT INTO booking_tb(
    user_id, amount_paid, discount_applied, default_amount, reference, created_at, updated_at, status, number_of_rooms, is_new_client, number_of_days, ) VALUES(
    '$userId',
    '$'
    )");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Mgt || Experience a better world</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../assets/js/main.js"></script>
</head>


<div class="w-4/5 mx-auto md:w-1/3 md:mt-5 mt-8">

    <h3 class="text-gray-800 my-3 text-xl md:text-2xl">Booking Form</h3>


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
        <div class="grid grid-cols-12 mt-2 gap-5">
            <div class="block relative mt-4 col-span-6">
                <label>Email Address:</label>
                <input type="email" name="email" placeholder="Your Email address" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>
            <div class="block relative mt-4 col-span-6">
                <label>Phone Number:</label>
                <input type="tel" name="phone_number" placeholder="Your Phone number" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>
        </div>
        <div class="grid grid-cols-12 gap-5 mt-2">
            <div class="block relative mt-4 col-span-6">
                <label>Number of rooms:</label>
                <input type="number" name="number_of_rooms" placeholder="Number of Rooms" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>
            <div class="block relative mt-4 col-span-6">
                <label>Number of Days:</label>
                <input type="tel" name="number_of_days" placeholder="Number of Days:" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>
        </div>

        <div class="grid grid-cols-12 gap-5 mt-2">
            <div class="block relative mt-4 col-span-6">
                <label>Next of Kin's name:</label>
                <input type="text" name="next_of_kin_name" placeholder="Next of Kin's name" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>
            <div class="block relative mt-4 col-span-6">
                <label>Next of Kin's Phone Number:</label>
                <input type="tel" name="next_of_king_phone_number" placeholder="Next of Kin's Phone Number" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
                <div class="absolute text-gray-500 right-3 top-11">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>

            </div>
        </div>


        <div class="block relative mt-4">
            <label>Remarks:</label>

            <textarea name="remarks" rows="4" placeholder="Please add or comment more information here" class="py-1.5 w-full block mt-2 px-5 resize-none outline-none border-2 border-gray-100 border-gray-300 rounded"></textarea>
        </div>


        <div class="mx-auto mt-3">
            <button type="submit" class="py-2 px-5 bg-sky-600 w-full text-white rounded-full">Submit</button>
        </div>

    </form>
</div>

<body>
</body>

</html>