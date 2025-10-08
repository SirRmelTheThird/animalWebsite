<?php

declare(strict_types=1);

function is_input_empty(string $fname, string $lname, string $username, string $pwd, string $email) 
{
    if (empty($fname) || empty($lname) || empty($username) || empty($pwd) || empty($email)) {
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

function same_password(string $pwd, string $Cpwd) 
{
    if ($pwd != $Cpwd) {
        return true;
    } else{
        return false;
    }
}

function create_user(object $db, string $fname, string $lname, string $username, string $pwd, string $email) 
{
    set_user($db, $fname, $lname, $username, $pwd, $email);
}