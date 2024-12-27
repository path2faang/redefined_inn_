<?php
@session_start();
require("./dbConnection.php");
?>
<div class="booking-container md:mt-4 md:w-11/12 mx-auto">
    <div class="my-4 flex justify-between items-center">
        <div class="block relative md:w-10/12">
            <input type="search" id="search" name="search" placeholder="Search User details..." class="py-1.5 w-full block mt-2 px-5 rounded outline-none text-gray-600 border-2 border-gray-100 border-gray-300 rounded-lg" required>

        </div>

        <a href="addRoom.php" target="_blank" class="">
            <button class="px-4 py-2 text-white bg-[#008CFF] rounded shadow hover:bg-blue-500 focus:ring-2 focus:ring-blue-300">
                Add New Room
            </button>
        </a>

    </div>


    <div class="overflow-x-auto">
        <h3 class="text-gray-800 my-3 text-xl md:text-2xl">Room Details</h3>

        <table class="min-w-full table-auto border-collapse border border-gray-300 shadow-md">
            <thead>
                <tr class="bg-[#008CFF] text-white text-sm">
                    <th class="px-3 py-2 text-left border-b border-gray-200">ID</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Name</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Type</th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Description </th>
                    <th class="px-3 py-2 text-left border-b border-gray-200">Added Since</th>
                    <th class="px-3 py-2 text-center border-b border-gray-200">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $selectRooms = $conn->query("SELECT * FROM room_tb");

                while ($row = $selectRooms->fetch_assoc()) {


                ?>
                    <tr class="bg-white hover:bg-gray-100 text-sm">
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['id'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['room_name'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['room_type'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['room_description'] ?></td>
                        <td class="px-3 py-2 border-b border-gray-300"><?= @$row['created_at'] ?></td>
                        <td class="px-3 py-2 text-center border-b border-gray-300">
                                <a href="updateRoom.php?id=<?= $row['id'] ?>" class="">
                                    <button class="px-3 py-1 text-white bg-blue-600 rounded shadow hover:bg-blue-500 focus:ring-2 focus:ring-blue-400">

                                        <div class="flex items-center gap-x-1 uppercase font-semibold justify-evenly">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                            <p class="">Update</p>
                                        </div>

                                    </button>
                                </a>
                                <a href="roomListing.php?id=<?= $row['id'] ?>" class="">

                                    <button class="px-3 py-1 text-white bg-orange-600 rounded shadow hover:bg-orange-500 focus:ring-2 focus:ring-orange-400">

                                        <div class="flex items-center gap-x-1 uppercase font-semibold justify-evenly">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                            <p class="">Delete</p>
                                        </div>

                                    </button>
                                </a>

                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>