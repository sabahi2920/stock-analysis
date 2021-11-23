<?php
    include "dbConn.php"; // Using database connection file here
    if(isset($_POST['signup']))
    {
        $newUser = $_POST["signupuser"]; // get user through query string
        $newPass = $_POST["signuppass"]; // get user through query stringheade
        $insert = mysqli_query($db,"INSERT INTO `users`(`userName`, `password`) VALUES ('$newUser','$newPass')"); // insert query
        if($insert)
        {
            mysqli_close($db); // Close connection
            header("location:https://stockanalysis.web.illinois.edu"); // redirects to login page
            echo '<script>alert("User Added")</script>';
            exit;
        }
        else
        {
            mysqli_close($db); // Close connection
            header("location:https://stockanalysis.web.illinois.edu"); // redirects to login page
            echo '<script>alert("Error adding user, please try again")</script>'; // display error message if not added
            exit;
        }
    }
?>