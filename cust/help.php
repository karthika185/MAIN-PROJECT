
<?php
 session_start();
  $cust_id=$_SESSION["cust_id"];
  $cust_email=$_SESSION["cust_email"];
  $cust_phone=$_SESSION["cust_phone"];
  if(!isset($_SESSION['cust_name']))
{
    header('location:../login.php');
}
  include("../dbconn.php");
if (isset($_POST['submit']))
{
	$mail=$_POST['mail'];
	$phn=$_POST['phn'];
	$sub=$_POST['sub'];
	$msg=$_POST['msg'];
	$sql="INSERT INTO tbl_custhelp(cust_id,ch_mail,ch_phn,ch_sub,ch_msg,ch_status) VALUES ('$cust_id','$mail','$phn','$sub','$msg','A')";
	if (mysqli_query($conn,$sql)){
		echo "successfull !";
	}
	else
   {
    echo "Error: " . $sql . "
" . mysqli_error($conn);;
   }
   mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Tailoring</title>
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<?php
	include("custnav.html");
	?>
	<div class="center">
		<h1>Help</h1>
		<form method="post" class="decor" enctype="multipart/form-data">
			<div class="txt_field">
				<?php
				include("../dbconn.php");
				$result ="SELECT * from tbl_custreg where cust_email = '{$_SESSION["cust_email"]}'";
				$res=mysqli_query($conn,$result);
				while($row = mysqli_fetch_array($res))
				  {
				    echo"<tr>";
				    echo"<td><input type=\"text\" name=\"mail\" id=\"email\" value=\"".$row['cust_email']."\"></td>";
				    echo"</tr>";
				  }
				  echo"</table>";
				?>
				<span></span>
				<label>Email</label>
			</div>
			<div class="txt_field">
				<?php
				$phn = mysqli_query($conn,"SELECT * from tbl_custreg where cust_phone = '{$_SESSION['cust_phone']}'");
			    while($row=mysqli_fetch_array($phn))
			    {
				    echo"<tr>";
				    echo"<td><input type=\"text\" name=\"phn\" id=\"phn\" value=\"".$row['cust_phone']."\"></td>";
				    echo"</tr>";
			    }
			  echo"</table>";
			  ?>
			  <span></span>
			  <label>Phone Number</label>
			</div>
			<div class="txt_field">
				<input type="text" name="sub" required>
				<span></span>
				<label>Subject</label>
			</div>
			<div class="txt_field">
				<input type="text" name="msg" required>
				<span></span>
				<label>Message</label>
			</div>
			<input type="submit" value="submit" name="submit">
			<br><br>
		</form>
	</div>
</body>
</html>