<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM signup WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)   
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: index.php");
        exit(0);    
    }
}

if (isset($_POST['update_user'])) {
    $signup_id = mysqli_real_escape_string($con, $_POST['signup_id']);
    $name = mysqli_real_escape_string($con, $_POST['signup_username']);
    $email = mysqli_real_escape_string($con, $_POST['signup_email']);

    // Update query with WHERE clause to specify the user_id
    $query = "UPDATE signup SET signup_username='$name', signup_email='$email' WHERE user_id='$signup_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "User Not Updated";
        header("Location: index.php");
        exit(0);
    }
}


if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($con, $_POST['signup_username']);
    $email = mysqli_real_escape_string($con, $_POST['signup_email']);

    $query = "INSERT INTO signup (signup_username,signup_email) VALUES ('$name','$email')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "New User Created Successfully";
        header("Location: add-user.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Created";
        header("Location: add-user.php");
        exit(0);
    }
}

?>