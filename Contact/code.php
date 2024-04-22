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
        header("Location: contact.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: contact.php");
        exit(0);    
    }
}

if(isset($_POST['update_user']))
{
    $info_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE information SET firstName='$firstName', lastName='$lastName', email='$email', phone='$phone' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: contact.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: contact.php");
        exit(0);
    }

}


if(isset($_POST['submit']))
{
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO information (firstName,lastName,email,phone) VALUES ('$firstName','$lastName','$email','$phone')";

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