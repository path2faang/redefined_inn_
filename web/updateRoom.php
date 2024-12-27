<?php
@session_start();
require("./requireAuth.php");
require("./validateData.php");
require("./dbConnection.php");
$error = null;
$success = null;


$userId = $_SESSION['userId'] ?? null;
$filenames = [];

$roomId = @$_GET['id'];
$roomName = null;
$roomType = null;
$roomDesc = null;
$roomPictures = null;


if ($roomId) {
    $selectRoom = $conn->query("SELECT * FROM room_tb WHERE id='$roomId'");
    if($selectRoom -> num_rows > 0) {
        $room = $selectRoom->fetch_assoc();
       $roomName = $room['room_name'];
    }
} else {
    echo "No Room ID";
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // in addition for not authenticate user to help them in registration
    $room_name = validateData($_POST['room_name']);
    $room_type = validateData($_POST['room_type']);
    $room_description = validateData($_POST['room_description']);
    $room_cost = validateData($_POST['room_cost']);
    $creator_id = $_SESSION['userId'];
    $roomPictures = $_FILES['room_pictures']; //array of pictures

    //move uploaded file if any

    if (isset($_FILES['room_pictures']['name']) && is_array($_FILES['room_pictures']['name']) && count($_FILES['room_pictures']['name']) > 0) {
        // Define the upload directory
        $uploadDir = 'uploads/';

        // Ensure the directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Loop over each uploaded file
        foreach ($_FILES['room_pictures']['name'] as $key => $filename) {

            // Extract details of the file
            $fileTemp = $_FILES['room_pictures']['tmp_name'][$key];
            $fileType = $_FILES['room_pictures']['type'][$key];


            $uploadFile = $uploadDir . basename($filename);

            // Move uploaded file to the upload directory
            if (move_uploaded_file($fileTemp, $uploadFile)) {
                $filenames[] = $filename; // Add the filename to the array
            }
        }
    }

    $allRoomPictures = implode(",", $filenames);

    $bookingResponse = $conn->query("UPDATE room_tb SET room_type='$room_type', room_name='$room_name', room_description='$room_description', room_pictures='$$allRoomPictures', creator_id='$userId', room_cost='$room_cost') WHERE id='$$roomId'");

    if ($bookingResponse) {
        $success = strtolower($room_name) . " successfully updated";
        echo "<script> 
        setTimeout(() => {
    window.location.href='roomListing.php';
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
    <title>Update Room || Experience a better world</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../assets/js/main.js"></script>
</head>


<div class="w-4/5 mx-auto md:w-1/3 md:mt-5 mt-8">

    <h3 class="text-gray-800 my-3 text-xl md:text-2xl">Update Form <?=@$roomName?></h3>

    <form method="POST" action="" class="mt-5" enctype="multipart/form-data">

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
            <label>Room Name:</label>
            <input type="text" name="room_name" placeholder="Room Name" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>

        </div>
        <div class="block relative mt-4">
            <label>Room Type:</label>
            <input type="text" name="room_type" placeholder="Room Type" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
        </div>
        <div class="block relative mt-4">
            <label>Room Cost:</label>
            <input type="number" name="room_cost" placeholder="Room Cost" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 border-gray-300 rounded-full" required>
        </div>

        <div class="block relative mt-4">
            <label>Room Description:</label>

            <textarea name="room_description" rows="4" placeholder="Please add or comment more information here" class="py-1.5 w-full block mt-2 px-5 resize-none outline-none border-2 border-gray-100 border-gray-300 rounded"></textarea>
        </div>

        <div class="block relative mt-4">

            <input type="file" class="file:border-none file:py-2 file:px-5 file:text-gray-700" name="room_pictures[]" id="" multiple>
        </div>



        <div class="mx-auto mt-3">
            <button type="submit" class="py-2 px-5 bg-sky-600 w-full text-white rounded-full">Submit</button>
        </div>

    </form>
</div>

<body>
</body>

</html>