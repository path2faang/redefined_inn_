<?php
@session_start();
if (!$_SESSION['userId']) {
    header("location: ../login.php?msg=session expired, please login");
}
