<!DOCTYPE html>
<html>
<head>
  <title>Edit Portfolio</title>
  	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="images/icons/circle-cropped.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>
    <!--  <div class="centerrights">-->
    <!--<img src="images/icons/circle-cropped.png" width="110" height="110">-->
    <!--    <p>All rights reserved</br>-->
    <!--    Copyright 2020</p>-->
    <!--</div>-->
   <?php
    include "dbConn.php"; // Using database connection file here
    if(isset($_POST['submit']))
    {
        $profid= $_POST['id'];
        $portfolioName = $_POST['portfolioname'];
        $stock1 = $_POST['txt1'];
        $stock2 = $_POST['txt2'];
        $stock3 = $_POST['txt3'];
        $stock4 = $_POST['txt4'];
        $stock5 = $_POST['txt5'];
        $count1 = $_POST['cnt1'];
        $count2 = $_POST['cnt2'];
        $count3 = $_POST['cnt3'];
        $count4 = $_POST['cnt4'];
        $count5 = $_POST['cnt5'];
        $insert = mysqli_query($db,"UPDATE `portfolio` SET `portfoilioName`='$portfolioName',`Stock1`='$stock1',`Stock2`='$stock2',`Stock3`='$stock3',`Stock4`='$stock4',
                                `Stock5`='$stock5',`stock_count_1`='$count1',`stock_count_2`='$count2',`stock_count_3`='$count3',`stock_count_4`='$count4',`stock_count_5`='$count5' WHERE `id`='$profid'");
        if(!$insert)
        {
            echo mysqli_error();
        }
        else
        {
          echo '<script>alert("Portfolio Saved")</script>';
        }
    }
    ?>
    <?php 
    $dbserver = "localhost";
    $dbusername = "stockanalysis_root";
    $dbpass = "%2Y&?JfcO-u$";
    $dbname = "stockanalysis_db";
    
    $conn = mysqli_connect($dbserver, $dbusername, $dbpass, $dbname);
    $profid= $_GET['id'];
    $sql = "SELECT * FROM portfolio where `id`='$profid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $User = $row['userName'];
    $sql2 = "SELECT users.userId FROM portfolio JOIN users ON portfolio.userName = users.userName WHERE portfolio.id='$profid'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $userId =  $row2['userId'];
    ?>
    <div class="fullpage">
    <div class="center">
        <h1 class="login100-form-title3">Edit Portfolio: <?php echo ($row['portfoilioName']) ?></h1>
        <a href="add_portfolio.php?id=<?php echo($userId) ?>&userName=<?php echo($User) ?>" >Back to Your Portfolios</a>
        <form class="login100-form" method="POST">
            <input class="input100" type="hidden" name="id" placeholder="id" required value="<?php echo ($row['id']) ?>"><br/>
            <input class="editinput" type="text" name="portfolioname" placeholder="Portfolio Name" value="<?php echo ($row['portfoilioName']) ?>"><br/>
            <input class="editinput" type="text" name="txt1" placeholder="Enter Stock"  value="<?echo $row['Stock1'];?>"><br/>
            <input class="editinput" type="text" name="cnt1" placeholder="How many would you like?"  value="<?echo $row['stock_count_1'];?>"><br/>
            <input class="editinput" type="text" name="txt2" placeholder="Enter Stock"  value="<?echo $row['Stock2'];?>"><br/>
            <input class="editinput" type="text" name="cnt2" placeholder="How many would you like?"  value="<?echo $row['stock_count_2'];?>"><br/>
            <input class="editinput" type="text" name="txt3" placeholder="Enter Stock"  value="<?echo $row['Stock3'];?>"><br/>
            <input class="editinput" type="text" name="cnt3" placeholder="How many would you like?"  value="<?echo $row['stock_count_3'];?>"><br/>
            <input class="editinput" type="text" name="txt4" placeholder="Enter Stock"  value="<?echo $row['Stock4'];?>"><br/>
            <input class="editinput" type="text" name="cnt4" placeholder="How many would you like?"  value="<?echo $row['stock_count_4'];?>"><br/>
            <input class="editinput" type="text" name="txt5" placeholder="Enter Stock"  value="<?echo $row['Stock5'];?>"><br/>
            <input class="editinput" type="text" name="cnt5" placeholder="How many would you like?"  value="<?echo $row['stock_count_5'];?>"><br/>
            <button class="editbtn" type="submit" name="submit">Save Portfolio </button>
        </form>
    </div>
     </div>
 <?php
     mysqli_close($conn); 
 ?>