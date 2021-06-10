<?php
session_start();

$admin_id=$_SESSION["admin_id"];

$db = mysqli_connect("localhost","root","","etailor");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['guest_id']; // get id through query string

$del = mysqli_query($db,"delete from tbl_guest where guest_id = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:guestenq.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
