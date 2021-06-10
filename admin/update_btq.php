<?php
if(!isset($_GET["id"]))
{
	header("location:viewbtq.php");
}
require_once("../classes/FormAssist.class.php");
require_once("../classes/DataAccess.class.php");
require_once("../classes/FormValidator.class.php");

$fields=array("boutique_name"=>"","owner_name"=>"","address"=>"","phone"=>"","license_no"=>"","password"=>"","email"=>"","cpassword"=>"");
$rules= array("boutique_name"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"nospecchars"=>"","alphaspaceonly"=>""),
        "owner_name"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>"","nospecchars"=>""),
        "address"=>array("required"=>""),
        "phone"=>array("required"=>"","minlength"=>10,"maxlength"=>10),
        "license_no"=>array("required"),
        "email"=>array("required"=>"","email"=>""),
        "password"=>array("required"=>"","regexp"=>'/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{6,30}$/',"compare"=>array("compareto"=>"email","operator"=>"!=")),
        "cpassword"=>array("required"=>"","compare"=>array("compareto"=>"password","operator"=>"=")),
        
        );
$labels=array("boutique_name"=>"BOUTIQUE NAME","password"=>"PASSWORD","address"=>"Address","cpassword"=>"Confirm Password");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["reg"]))
{
  if($validator->validate($_POST))
  {
       
    
       $data = array("btq_name"=>$_POST["boutique_name"],"btq_owner"=>$_POST["owner_name"],"btq_address"=>$_POST["address"],"btq_email"=>$_POST["email"],"btq_phone"=>$_POST["phone"],"btq_lic"=>$_POST["license_no"],"btq_status"=>"A");

if($dao->insert($data,"tbl_btqreg"))
{

$data1=array("username"=>$_POST["email"],"password"=>$_POST["password"],"usertype"=>"B");
if($dao->insert($data1,"tbl_login"))
{
//header("location:index.php");
$msg="Registered, please Login";
header("location:login.php");
}
else
{    
$msg="Failed ,please try again";
}
}
else
{
$msg="Failed ,please try again";
//var_dump($dao->getQuery());

}
}
else
{
$error=true;
}


  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>e-Tailoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    body {
        color: #fff;
        background-image: url("image.jpg");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        font-family: 'Roboto', sans-serif;

    }

    .form-control {
        font-size: 15px;
    }

    .form-control,
    .form-control:focus,
    .input-group-text {
        border-color: #e1e1e1;
    }

    .form-control,
    .btn {
        border-radius: 3px;
    }

    .signup-form {
        width: 400px;
        margin: 0 auto;
        padding: 30px 0;
    }

    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .signup-form h2 {
        color: #333;
        font-weight: bold;
        margin-top: 0;
    }

    .signup-form hr {
        margin: 0 -30px 20px;
    }

    .signup-form .form-group {
        margin-bottom: 20px;
    }

    .signup-form label {
        font-weight: normal;
        font-size: 15px;
    }

    .signup-form .form-control {
        min-height: 38px;
        box-shadow: none !important;
    }

    .signup-form .input-group-addon {
        max-width: 42px;
        text-align: center;
    }

    .signup-form .btn,
    .signup-form .btn:active {
        font-size: 16px;
        font-weight: bold;
        background: #19aa8d !important;
        border: none;
        min-width: 140px;
    }

    .signup-form .btn:hover,
    .signup-form .btn:focus {
        background: #179b81 !important;
    }

    .signup-form a {
        color: #fff;
        text-decoration: underline;
    }

    .signup-form a:hover {
        text-decoration: none;
    }

    .signup-form form a {
        color: #19aa8d;
        text-decoration: none;
    }

    .signup-form form a:hover {
        text-decoration: underline;
    }

    .signup-form .fa {
        font-size: 21px;
    }

    .signup-form .fa-paper-plane {
        font-size: 18px;
    }

    .signup-form .fa-check {
        color: #fff;
        left: 17px;
        top: 18px;
        font-size: 7px;
        position: absolute;
    }
    </style>
</head>

<body>
    <div class="signup-form">
        <form method="post" enctype="multipart/form-data">
            <h2>Sign Up</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <?php echo $form->textBox("boutique_name",array("placeholder"=>"Boutique Name","class"=>"form-control")); ?>
                    <font color=red size=2><?php echo $validator->error("boutique_name"); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <?php echo $form->textBox("owner_name",array("placeholder"=>"Owner Name","class"=>"form-control")); ?>
                    <?php echo $validator->error("owner_name"); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                    </div>
                    <?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email","class"=>"form-control")); ?>
                    <?php echo $validator->error("email"); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <?php echo $form->textArea("address",array("placeholder"=>"Address","class"=>"form-control")); ?>
                    <?php echo $validator->error("address"); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <?php echo $form->textBox("phone",array("placeholder"=>"Phone Number","class"=>"form-control")); ?>
                    <?php echo $validator->error("phone"); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <?php echo $form->textBox("license_no",array("placeholder"=>"License Number","class"=>"form-control")); ?>
                    <?php echo $validator->error("license_no"); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <?php echo $form->passwordBox("password",array("placeholder"=>"Password","type"=>"password","class"=>"form-control")); ?>
                    <?php echo $validator->error("password"); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    <?php echo $form->passwordBox("cpassword",array("placeholder"=>"Confirm Password","type"=>"password","class"=>"form-control")); ?>
                    <?php echo $validator->error("cpassword"); ?>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" name="reg" value="register" />
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="login.php">Login here</a></div>
    </div>
</body>

</html>