<?php
include("../dbconn.php");
?>

<?php 
$id = $_GET['respond_id'];

$query = "DELETE FROM tbl_respond WHERE respond_id='$id'";
$res=mysqli_query($conn,$query);
if (isset($res)) {
	
	header("location:notify.php");
}

?>