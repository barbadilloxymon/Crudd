<?php
session_start();
require 'dbcon.php';

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit User Details</title>
</head>
<body>
<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User Details 
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php 
                    if(isset($_GET['user_id']))
                    {
                        $signup_id = mysqli_real_escape_string($con, $_GET['user_id']);
                        $query = "SELECT * FROM signup WHERE user_id='$signup_id'";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $signup = mysqli_fetch_assoc($query_run);
                            ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="signup_id" value="<?= $signup['user_id']; ?>">
                                <div class="mb-3">
                                    <label>User Name</label>
                                    <input type="text" name="signup_username" value="<?= $signup['signup_username']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="signup_email" value="<?= $signup['signup_email']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_user" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <?php
                        }
                        else
                        {
                            echo "<h4>No Such User ID Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
