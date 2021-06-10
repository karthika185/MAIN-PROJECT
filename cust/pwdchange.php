<?php
session_start();
$username=$_SESSION["username"];
if(!isset($_SESSION['cust_name']))
{
header('location:../login.php');
}
include("../dbconn.php");
if (count($_POST) > 0)
{
    $result = mysqli_query($conn, "SELECT *from tbl_login WHERE username='" . $_SESSION["username"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"])
    {
        mysqli_query($conn, "UPDATE tbl_login set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
        $message = "Password Changed";
    } 


    else
    {
        $message = "Current Password is not correct";
    }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Tailoring</title>
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<script>
    function mypassword()
  {
  var n6=document.getElementById("newPassword");
  var ps=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,}/;
  if(n6.value == "")
  {
    document.getElementById("span1").innerHTML = "<span class='error'>Please enter a valid password</span>";
   // txt7.focus();
        return false;
  }
  if(!n6.value.match(ps))
  {
  document.getElementById("span1").innerHTML = "<span class='error'>This is not a valid Password. Please try again</span>";
     document.getElementById("txt7").value="";
      return false;
  }
  else if(n6.value.match(ps))
    {
      document.getElementById("span1").innerHTML = "<span class='error'></span>";
          return false;
    }
  }
  function mycpassword()
  {
  var n7=document.getElementById("newPassword");
  var n8=document.getElementById("confirmPassword");
  if(n8.value == "")
  {
    document.getElementById("span2").innerHTML = "<span class='error'>Please enter a valid password</span>";
        return false;
  }
  if(n7.value==n8.value)
  {

  document.getElementById("span2").innerHTML = "<span class='error'></span>";
      return false;
  }
  else {
  document.getElementById("span2").innerHTML = "<span class='error'> Password Missmatch</span>";
  document.getElementById("newPassword").value="";
  document.getElementById("confirmPassword").value="";
      return false;
  }
  }
    </script>
	<?php
	include("custnav.html");
	?>
	<div class="center">
		<h1>Change Password</h1>
		<form action="" method="post" class="decor" enctype="multipart/form-data">
            <br><br><br>
			<div class="txt_field">
				<input type="password" name="currentPassword" id="currentPassword" required>
                <span></span>
                <label>CURRENT PASSWORD</label>
			</div>
			<div class="txt_field">
				<input type="password" name="newPassword" id="newPassword" onblur="mypassword()" required>
                <span id="span1"></span>
                <label>NEW PASSWORD</label>
			</div>
			<div class="txt_field">
				<input type="password" name="confirmPassword" id="confirmPassword" onblur="mycpassword()" required>
                <span id="span2"></span>
				<label>CONFIRM PASSWORD</label>
			</div>
			<input type="submit" name="submit" value="change">
			<h5><font color="red"><?php if(isset($message)) { echo $message; } ?><h5><br><br>
		</form>
	</div>
</body>
</html>