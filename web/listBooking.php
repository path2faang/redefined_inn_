<?php
@session_start();
require("./dbConnection.php");
?>
<div class="booking-container md:mt-4 md:w-11/12 mx-auto">
    <div class="my-4 flex justify-between items-center">
        <div class="block relative md:w-10/12">
            <input type="search" id="search" name="search" placeholder="Search User details..." class="py-1.5 w-full block mt-2 px-5 rounded outline-none text-gray-600 border-2 border-gray-100 border-gray-300 rounded-lg" required>

        </div>
        <a href="./newBooking.php" target="_blank">
            <button class="px-4 py-2 text-white bg-[#008CFF] rounded shadow hover:bg-blue-500 focus:ring-2 focus:ring-blue-300">
                New Booking
            </button>
        </a>

    </div>


    <div class="overflow-x-auto">
        <h3 class="text-gray-800 my-3 text-xl md:text-2xl">Booking Details</h3>

        <table class="min-w-full table-auto border-collapse border border-gray-300 shadow-md">
            <thead>
                <tr class="bg-[#008CFF] text-white text-sm">
                    <th class="px-3 py-2 text-left border-b border-gray-200">S/N</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Name</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Email</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Tel</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Role</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Amount Paid</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Discount Applied</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Actual Amount</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Ref</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Booked Date</th>
                    <th class="px-3 py-2 text-center border-b border-gray-200">Remark</th>
                    <th class="px-3 py-2 text-center border-b border-gray-200 no-wrap">New Client</th>
                    <th class="px-3 py-2 text-center border-b border-gray-200">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $query = null;
                if ($_SESSION['role'] == "ADMIN" || $_SESSION['role'] == "STAFF") {
                    $query = $conn->query("SELECT * FROM booking_tb");
                } else {
                    $query = $conn->query("SELECT * FROM booking_tb WHERE user_id='$_SESSION[userId]' ");
                }
                while ($row = $query->fetch_assoc()) {


                ?>
                    <tr class="bg-white hover:bg-gray-100 text-sm">
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['id'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['fullname'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['email'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['phone_number'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['status'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['role'] ?></td>
                        <td class="px-3 py-2 text-center border-b border-gray-300">
                            <form action="" method="post">
                                <input type="hidden" name="user_id" value="<?= @$row['id'] ?>">
                                <button class="px-3 py-1 text-white bg-green-600 rounded shadow hover:bg-green-500 focus:ring-2 focus:ring-green-400">
                                    Block User
                                </button>
                                <button class="px-3 py-1 text-white bg-orange-600 rounded shadow hover:bg-orange-500 focus:ring-2 focus:ring-orange-400">
                                    View Bookings
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>