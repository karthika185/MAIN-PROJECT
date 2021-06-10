<?php
require_once("classes/FormAssist.class.php");
require_once("classes/DataAccess.class.php");
require_once("classes/FormValidator.class.php");
require_once("classes/Authentication.class.php");
$fields=array("email"=>"","password"=>"");
$rules= array("email"=>array("required"=>"","email"=>""),
          "password"=>array("required"=>"") );
$labels=array("email"=>"Username","password"=>"Password");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
$auth = new Authentication();
if(isset($_POST["log"]))
{
  if($validator->validate($_POST))
  {
    
      if($auth->authenticate($_POST["email"],$_POST["password"]))
      {
        session_start();
        $type = $auth->utype;
        if($type=="B")
        {
          $_SESSION["B"]=$_POST["email"];
          $data = $dao->getData("*","tbl_btqreg","btq_email='".$_POST["email"]."'");
          $_SESSION["btq_id"]=$data[0]["btq_id"];
          $_SESSION["btq_name"]=$data[0]["btq_name"];
          $_SESSION["btq_status"]=$data[0]["btq_status"];
          
          if ($_SESSION["btq_status"]=="B") {
            $msg="You are blocked";
          }
          else{
            $_SESSION["username"]=$_POST["email"];
          header("location:btq/btqhome.php");
         //$msg=$type;
          var_dump($dao->getErrors());
          }
          
        }
        elseif($type=="C")
        {
          $_SESSION["C"]=$_POST["email"];
          $data=$dao->getData("*","tbl_custreg","cust_email='".$_POST["email"]."'");
          $_SESSION["cust_id"]=$data[0
          ]["cust_id"];
          $_SESSION["username"]=$data[0]["cust_email"];
          $_SESSION["cust_name"]=$data[0]["cust_name"];
          $_SESSION["cust_email"]=$data[0]["cust_email"];
          $_SESSION["cust_phone"]=$data[0]["cust_phone"];
          header("location:cust/cust_home.php");
         //$msg=$type;
        }
        elseif($type=="A")
        {
          $_SESSION["A"]=$_POST["email"];
          $data=$dao->getData("*","tbl_admin","admin_email='".$_POST["email"]."'");
          $_SESSION["admin_id"]=$data["admin_id"];
          $_SESSION["admin_name"]=$data[0]["admin_name"];
          header("location:admin/adminhome.php");
         //$msg=$type;
        }
      }
      else
      {
        $msg=$auth->error;
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
.form-control, .form-control:focus, .input-group-text {
  border-color: #e1e1e1;
}
.form-control, .btn {        
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
.signup-form .btn, .signup-form .btn:active {        
  font-size: 16px;
  font-weight: bold;
  background: #19aa8d !important;
  border: none;
  min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
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
  <br><br><br><br>
<div class="signup-form">
    <form method="post" enctype="multipart/form-data">
    <h2>Sign In</h2>
    <p>Please fill in this form to sign in to your account!</p>
    <hr>
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
            <i class="fa fa-lock"></i>
          </span>                    
        </div>
        <?php echo $form->passwordBox("password",array("placeholder"=>"Password","type"=>"password","class"=>"form-control")); ?>
                  <?php echo $validator->error("password"); ?>
      </div>
        </div>
        
    <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg" name="log" value="login" />
        </div>
        <h4><?php echo isset($msg)?$msg:"";?></h4>
    </form>
  
</div>
</body>
</html>