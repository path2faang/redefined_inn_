<div class="w-4/5 mx-auto md:w-1/3 md:mt-24 mt-20">

    <h3 class="text-gray-800 my-3 text-xl md:text-2xl">Reset Password</h3>

    <form method="POST" action="" class="mt-5">

        <div class="block relative">
            <label>Email address</label>
            <input type="text" name="userId" placeholder="Enter Email or Username" class="py-1.5 w-full block mt-2 px-5 rounded outline-none border-2 border-gray-100 focus:border-gray-300 rounded-full" required>
            <div class="absolute text-gray-500 right-3 top-11">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg>
            </div>

        </div>


        <div class="mt-4 flex justify-between text-sm">
            <a href="?tab=login.php" class="text-gray-600">
                Already have an account? Login
            </a>
            <a href="?tab=register.php" class="text-gray-600">
                Don't an account? Register
            </a>
        </div>

        <div class="mx-auto mt-3">
            <button type="submit" class="py-2 px-5 bg-sky-600 w-full text-white rounded-full">Submit</button>
        </div>

    </form>
</div>