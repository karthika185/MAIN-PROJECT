<?php
include("../dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Tailoring</title>
</head>
<body>
<?php
$respond_id = $_GET["id"];
$sql="SELECT tbl_custreg.cust_name,tbl_custreg.cust_phone,tbl_respond.respond_custmail,tbl_respond.respond_cost,tbl_respond.respond_id FROM tbl_respond INNER JOIN tbl_custreg ON tbl_custreg.cust_email=tbl_respond.respond_custmail WHERE respond_id = '$respond_id'";
$result=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_array($result))
{
	$name = $rows['cust_name'];
	$phone = $rows['cust_phone'];
	$email = $rows['respond_custmail'];
	$amount = $rows['respond_cost'];

}
?>

<form action="../razorpay-api/pay.php?name=<?php echo $name?>&phn=<?php echo $phone ?>&email=<?php echo $email ?>&amount=<?php echo $amount ?>" method="POST">

<table>
<tbody>
<tr>
<td><label>Customer Name</label></td>
<td><input type="text" name="custname" value="<?php echo $name; ?>"></td>
</tr>
<tr>
<td><label>Phone Number</label></td>
<td><input type="text" name="phn" value="<?php echo $phone; ?>"></td>
</tr>
<tr>
<td><label>Email</label></td>
<td><input type="text" name="email" value="<?php echo $email; ?>"></td></tr>
<tr>
<td><label>Total Cost</label></td>
<td><input type="text" name="costs" value="<?php echo $amount; ?>" disabled></td>
</tr>
</tbody>
</table>

<input type="submit" name="submit" value="Pay Now">
</form>



</body>
</html>