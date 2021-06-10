<?php
include("../dbconn.php");
?>

<?php 
$catid = $_GET['catid'];

$query = "DELETE FROM tbl_category WHERE cat_id='$catid'";
$res=mysqli_query($conn,$query);
if (isset($res)) {
	
	header("location:addcat.php");
}

?>