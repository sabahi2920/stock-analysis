<?php

include "dbConn.php"; // Using database connection file here

$portfolioId = $_GET['id']; // get id through query string
$sendBack = mysqli_query($db,"SELECT * FROM users JOIN portfolio ON portfolio.userName = users.userName WHERE portfolio.id = '$portfolioId'"); // find query
$result = mysqli_fetch_assoc($sendBack);
$userId = $result['userId'];
$userName = $result['userName'];
$del = mysqli_query($db,"delete from portfolio where id = '$portfolioId'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header('location:add_portfolio.php?id='.$userId.'&userName='.$userName); // redirects to all records page
    echo '<script>alert("Portfolio Deleted")</script>';
    exit;	
}
else
{
    echo '<script>alert("Error deleting record")</script>'; // display error message if not delete
}
?>
