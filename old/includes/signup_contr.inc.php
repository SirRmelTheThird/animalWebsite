<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email) 
{
    if (empty($username) || empty($pwd) || empty($email)) {
        return true;
    } else{
        return false;
    }
}

function is_email_valid($email) 
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else{
        return false;
    }
}

function is_username_taken(object $db, string $username) 
{
    if (get_username($db, $username)) {
        return true;
    } else{
        return false;
    }
}


function is_email_registered(object $db, string $email) 
{
    if (get_email($db, $email)) {
        return true;
    } else{
        return false;
    }
}

function create_user(object $db, string $username, string $pwd, string $email) 
{
 set_user($db, $username, $pwd, $email);
}