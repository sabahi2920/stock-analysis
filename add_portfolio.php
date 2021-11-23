<!DOCTYPE html>
<html>
<head>
  <title>Portfolio Management</title>
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
   <?php
    include "dbConn.php"; // Using database connection file here
    if(isset($_POST['submit']))
    {	
        $portfolioName = $_POST['portfolioname'];
        $usernme = $_GET['userName'];
        $stock1 = strtoupper($_POST['txt1']);
        $stock2 = strtoupper($_POST['txt2']);
        $stock3 = strtoupper($_POST['txt3']);
        $stock4 = strtoupper($_POST['txt4']);
        $stock5 = strtoupper($_POST['txt5']);
        $count1 = $_POST['cnt1'];
        $count2 = $_POST['cnt2'];
        $count3 = $_POST['cnt3'];
        $count4 = $_POST['cnt4'];
        $count5 = $_POST['cnt5'];
        if($stock1==''){
            $count1 = 0;
        }if($stock2==''){
            $count2 = 0;
        }if($stock3==''){
            $count3 = 0;
        }if($stock4==''){
            $count4 = 0;
        }if($stock5==''){
            $count5 = 0;
        }
        // echo($usernme);
        // echo($portfolioName);
        // echo($stock1);
        // echo($count1);
        // echo($stock2);
        // echo($count2);
        // echo($stock3);
        // echo($count3);
        // echo($stock4); 
        // echo($count4); 
        // echo($stock5);
        // echo($count5);
        $insert = mysqli_query($db,"INSERT INTO `portfolio`(`userName`, `portfoilioName`, `Stock1`, `stock_count_1`, `Stock2`, `stock_count_2`, `Stock3`, `stock_count_3`, `Stock4`, `stock_count_4`, `Stock5`, `stock_count_5`) VALUES ('$usernme','$portfolioName','$stock1',$count1,'$stock2',$count2,'$stock3',$count3,'$stock4',$count4,'$stock5',$count5);");
        if(!$insert)
        {
            echo 'could not add error';
        }
        else
        {
          echo '<script>alert("Portfolio Added")</script>';
        }
    }
    
    mysqli_close($db); // Close connection
    ?>
    <div class=fullpage>
        <div class="right-half">
            <h1 class="login100-form-title">Add Portfolio</h1>
            <form class="login100-form" method="POST">
                <input class="input100" type="text" name="portfolioname" placeholder="myportfolio" required><br/>
                <input class="stckname" type="text" name="txt1" placeholder="ABCD"><br/>
                <input class="stckname" type="text" name="cnt1" placeholder="how many to add?"><br/>
                <input class="stckname" type="text" name="txt2" placeholder="ABCD"><br/>
                <input class="stckname" type="text" name="cnt2" placeholder="how many to add?"><br/>
                <input class="stckname" type="text" name="txt3" placeholder="ABCD"><br/>
                <input class="stckname" type="text" name="cnt3" placeholder="how many to add?"><br/>
                <input class="stckname" type="text" name="txt4" placeholder="ABCD"><br/>
                <input class="stckname" type="text" name="cnt4" placeholder="how many to add?"><br/>
                <input class="stckname" type="text" name="txt5" placeholder="ABCD"><br/>
                <input class="stckname" type="text" name="cnt5" placeholder="how many to add?"><br/>
                <button class="login100-form-btn" type="submit" name="submit">Add Portfolio! </button>
            </form>
        </div>
        <div class="left-half">
            <h1 class="login100-form-title2">Your Portfolios</h1>
            <input class="searchbar" id="myInput" type="text" onkeyup="myFunction()" placeholder="Search for portfolios using portfolioName..">
            <script>
            function myFunction() {
              // Declare variables
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("prtfoliotble");
              tr = table.getElementsByTagName("tr");
            
              // Loop through all table rows, and hide those who don't match the search query
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
              }
            }
            </script>
        <div class="table-wrapper" tabindex="0">
            <table id=prtfoliotble>
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Portfolio Name</th>
                        <th>User</th>
                        <th>Stock #1</th>
                        <th>Stock #2</th>
                        <th>Stock #3</th>
                        <th>Stock #4</th>
                        <th>Stock #5</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $dbserver = "localhost";
                        $dbusername = "stockanalysis_root";
                        $dbpass = "%2Y&?JfcO-u$";
                        $dbname = "stockanalysis_db";
                        $usernme = $_GET['userName'];
                        $conn = mysqli_connect($dbserver, $dbusername, $dbpass, $dbname);
                        $sql3 = "SELECT * FROM portfolio WHERE userName='$usernme';";
                        
                        $result = mysqli_query($conn, $sql3);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                            <tr>
                            <td> <a href="Edit.php?id=<?php echo $row['id']; ?>" class="tablebtn"> Edit </a> </td>
                            <td><a href="stock_data/display_stocks.php?id=<?php echo $row['id']; ?>&userName=<?php echo $row['userName']; ?>" class="tablepftflio"> <?php echo ($row['portfoilioName']) ?> </a></td>
                            <td><?php echo($row['userName']) ?></td>
                            <td><?php echo(strtoupper($row['Stock1'])) ?></td>
                            <td><?php echo(strtoupper($row['Stock2'])) ?></td>
                            <td><?php echo(strtoupper($row['Stock3'])) ?></td>
                            <td><?php echo(strtoupper($row['Stock4'])) ?></td>
                            <td><?php echo(strtoupper($row['Stock5'])) ?></td>
                            <td> <a href="delete.php?id=<?php echo $row['id']; ?>" class="tablebtn"> Delete </a></td>
                            </tr>
                    <?php
                        }                         
                        mysqli_close($conn); // Close connection
                    ?>
                </tbody>
            </table>
        </div>
        </div>
</body>
</html>