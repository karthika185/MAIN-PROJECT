<?php
session_start();
$btq_id=$_SESSION["btq_id"];

if(!isset($_SESSION['btq_name']))
{
header('location:../login.php');
}

require_once("../classes/FormAssist.class.php");
require_once("../classes/DataAccess.class.php");
require_once("../classes/FormValidator.class.php");
$dao=new DataAccess();
$rules= array("boutique_name"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"nospecchars"	=>"","alphaspaceonly"=>""),
        "owner_name"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>"","nospecchars"=>""),
        "address"=>array("required"=>""),
        "phone"=>array("required"=>"","minlength"=>10,"maxlength"=>10),
        "license_no"=>array("required"),
        "email"=>array("required"=>"","email"=>"")
        );
$labels=array("boutique_name"=>"BOUTIQUE NAME","owner_name"=>"OWNER NAME","address"=>"ADDRESS","phone"=>"PHONE","license_no"=>"LICENSE NUMBER","email"=>"EMAIL");
$validator=new FormValidator($rules,$labels);
if (isset($_POST["update"]))
{
	if($validator->validate($_POST))
	{
		$data = array("btq_name"=>$_POST["boutique_name"],"btq_owner"=>$_POST["owner_name"],"btq_address"=>$_POST["address"],"btq_phone"=>$_POST["phone"],"btq_lic"=>$_POST["license_no"]);
		if($dao->update($data,"tbl_btqreg","btq_id=$btq_id"))
		{
			$msg="UPDATED";
		}
		else
		{
			$msg="Failed ,please try again";
		}
	}
	else
	{
		$msg="Failed ,validation error";
	}
}
$res=$dao->getData("*","tbl_btqreg","btq_id=$btq_id");
$details=$res[0];
$fields=array("boutique_name"=>$details["btq_name"],"owner_name"=>$details["btq_owner"],"address"=>$details["btq_address"],"phone"=>$details["btq_phone"],"license_no"=>$details["btq_lic"],"email"=>$details["btq_email"]);
$form=new FormAssist($fields,$_POST);
?>
<!DOCTYPE html>
<html>

<head>
    <title>e-Tailoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
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
        padding: 20px;
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
            width: 60%;
        }
    }
    </style>
</head>

<body>
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
                <center>
                    <p style="color: black;font-family:satisfy">UPDATE PROFILE</p>
                </center>
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">
                    <label>Boutique Name</label>
                    <?php echo $form->textBox("boutique_name",array("placeholder"=>"Boutique Name","class"=>"form-control")); ?>
                    <font color=red><?php echo $validator->error("boutique_name"); ?></font>
                    <br>
                        <label>Owner Name</label>
                        <?php echo $form->textBox("owner_name",array("placeholder"=>"Owner Name","class"=>"form-control")); ?>
                        <?php echo $validator->error("owner_name"); ?>
                        <br>
                        <label>Email</label>
                        <?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email","class"=>"form-control","readonly"=>"readonly")); ?>
                        <?php echo $validator->error("email"); ?>
                        <br>
                        <label>Address</label>
                        <?php echo $form->textArea("address",array("placeholder"=>"Address","class"=>"form-control")); ?>
                        <?php echo $validator->error("address"); ?>
                        <br>
                        <label>Phone</label>
                        <?php echo $form->textBox("phone",array("placeholder"=>"Phone Number","class"=>"form-control")); ?>
                        <?php echo $validator->error("phone"); ?>
                        <br>
                        <label>License Number</label>
                        <?php echo $form->textBox("license_no",array("placeholder"=>"License Number","class"=>"form-control","readonly"=>"readonly")); ?>
                        <?php echo $validator->error("license_no"); ?>
                        <input type="submit" name="update" />
                        <h4><?php echo isset($msg)?$msg:"";?></h4>
                </div>
            </form>
        </section>
    </div>
</body>

</html>