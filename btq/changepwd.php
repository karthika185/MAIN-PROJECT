<?php
session_start();
$username=$_SESSION["username"];
if(!isset($_SESSION['btq_name']))
{
header('location:../login.php');
}
$conn = mysqli_connect("localhost", "root", "", "etailor") or die("Connection Error: " . mysqli_error($conn));

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
    <title>boutique home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #fff;
    }

    th {
        background-color: #ffb03b;
        color: white;
    }

    .btn {
        background: #ffb03b;
        color: #fff;
        border-radius: 30px;
        margin: 0 0 0 20px;
        padding: 5px 20px;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 1px;
        transition: 0.3s;
        white-space: nowrap;
    }

    * {
        box-sizing: border-box;
    }

    html,
    body {
        min-height: 100vh;
        padding: 0;
        margin: 0;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        color: #666;
    }

    input,
    textarea {
        outline: none;
    }

    .section-1 {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px 20px 10px 10px;
        background: #f5d09a;
    }

    h1 {
        margin-top: 0;
        font-weight: 500;
    }

    form {
        position: relative;
        width: 80%;
        border-radius: 30px;
        background: #fff;
    }

    .form-left-decoration,
    .form-right-decoration {
        content: "";
        position: absolute;
        width: 50px;
        height: 20px;
        border-radius: 20px;
        background: #f5d09a;
    }

    .form-left-decoration {
        bottom: 60px;
        left: -30px;
    }

    .form-right-decoration {
        top: 60px;
        right: -30px;
    }

    .form-left-decoration:before,
    .form-left-decoration:after,
    .form-right-decoration:before,
    .form-right-decoration:after {
        content: "";
        position: absolute;
        width: 50px;
        height: 20px;
        border-radius: 30px;
        background: #fff;
    }

    .form-left-decoration:before {
        top: -20px;
    }

    .form-left-decoration:after {
        top: 20px;
        left: 10px;
    }

    .form-right-decoration:before {
        top: -20px;
        right: 0;
    }

    .form-right-decoration:after {
        top: 20px;
        right: 10px;
    }

    .circle {
        position: absolute;
        bottom: 80px;
        left: -55px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #fff;
    }

    .form-inner {
        padding: 40px;
    }

    .form-inner input,
    .form-inner textarea {
        display: block;
        width: 100%;
        padding: 15px;
        margin-bottom: 10px;
        border: none;
        border-radius: 20px;
        background: #d0dfe8;
    }

    .form-inner textarea {
        resize: none;
    }

    .button {
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        border-radius: 20px;
        border: none;
        border-bottom: 4px solid #ffb03b;
        background: #ffb03b;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
    }

    .button:hover {
        background: #ffb03b;
    }

    @media (min-width: 568px) {
        form {
            width: 80%;
        }
    }
    </style>
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
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">e<b>Tailoring</b>
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <i class="fa fa-user" aria-hidden="true"></i>
    </header>
    <div class="body">
        <nav class="side-bar">
            <div class="user-p">
                <h4><?php echo $_SESSION["btq_name"];?></h4>
            </div>
            <ul>
                <li>
                    <a href="btqhome.php">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="changepwd.php">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="viewbtqprofile.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="addmaterial.php">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                        <span>Add Materials</span>
                    </a>
                </li>
                <li>
                    <a href="btqhelp.php">
                        <i class="fa fa-info" aria-hidden="true"></i>
                        <span>Help</span>
                    </a>
                </li>
                
                
                
                <li>
                    <a href="../destroysession.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
 
    <section class="section-1">
        <form action="" method="post" class="decor" enctype="multipart/form-data">

            <center><p style="color: black;font-family:satisfy">CHANGE PASSWORD</p></center>
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">
                    <table>
                        <tr>
                            <td><label>CURRENT PASSWORD<h5>(if you are changing password for the first time otp will be your current password)</h5></label></td>
                               <td> <input type="password" name="currentPassword" /><span
                            id="currentPassword" class="required"></span></td>
                            </td>
                        </tr>
                        <tr>
                            <td><label>NEW PASSWORD</label></td>
                               <td><input type="password" name="newPassword" id ="newPassword" class="txtField" onblur="mypassword()" /><span id="span1"></span></td>
                            </td>
                        </tr>
                        <tr>
                            <td><label>CONFIRM PASSWORD</label></td>
                               <td><input type="password" name="confirmPassword" id="confirmPassword" class="txtField" onblur="mycpassword()"/><span 
                        id="span2"></span></td>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
                        </tr>
                    </table>
                    <h5><font color="red"><?php if(isset($message)) { echo $message; } ?><h5>
                </div>
        </form>
    </section>
  </div>
</body>

</html>
