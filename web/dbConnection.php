<?php
$conn = new mysqli("localhost", "root", "", "redefined_inn");

if (!$conn) {
    die("Failed to connect to database");
}
