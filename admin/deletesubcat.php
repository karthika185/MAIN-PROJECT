<?php
include("../dbconn.php");
?>

<?php 
$subcatid = $_GET['subcatid'];

$query = "DELETE FROM tbl_subcategory WHERE subcat_id='$subcatid'";
$res=mysqli_query($conn,$query);
if (isset($res)) {
	
	header("location:addsubcat.php");
}

?>