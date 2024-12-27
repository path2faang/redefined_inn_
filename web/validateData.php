<?php
function validateData($data) {
   return trim(htmlspecialchars($data));
}


function validateEmail($email)
{
    if (empty($email)) {
        echo "email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "invalid email address";
    } else {
        return $email;
    }
}

