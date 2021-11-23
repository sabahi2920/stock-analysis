<?php
    include "dbConn.php"; // Using database connection file here
    if(isset($_POST['login']))
    {
        $loginUser = $_POST["loginuser"]; // get user through query string
        $loginPass = $_POST["loginpass"]; // get user through query string
        $validate = mysqli_query($db,"SELECT userId FROM users WHERE userName = '$loginUser' AND password ='$loginPass'"); // find query
        $result = mysqli_fetch_assoc($validate);
        $userId = $result['userId'];
        $row_count = $validate->num_rows;
        if($row_count != 0){
            header('location:https://stockanalysis.web.illinois.edu/add_portfolio.php?id='.$userId.'&userName='.$loginUser); // redirects to login page
            echo '<script>alert("login successful")</script>';
            mysqli_close($db); // Close connection
            exit;
        }else{
            mysqli_close($db); // Close connection
            header("location:https://stockanalysis.web.illinois.edu"); // redirects to login page
            echo '<script>alert("login unsuccessful, please try again")</script>'; // display error message if not added
            exit;
        }
    }
?>
