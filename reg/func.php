<?php

function registerUser($username, $password, $email) {
    global $link; 

 
    $check_username_query = "SELECT COUNT(*) FROM users WHERE username = '$username'";
    $check_email_query = "SELECT COUNT(*) FROM users WHERE email = '$email'";
    $check_username_result = mysqli_query($link, $check_username_query);
    $check_email_result = mysqli_query($link, $check_email_query);
    if (mysqli_fetch_assoc($check_username_result)['COUNT(*)'] > 0 || mysqli_fetch_assoc($check_email_result)['COUNT(*)'] > 0) {
        return false; 
    }

 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

  
    $query = "INSERT INTO users (username, password, email, role) 
              VALUES ('$username', '$hashed_password', '$email', 'user')";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if ($result) {
        return true;
    } else {
        return false; 
    }
}
?>