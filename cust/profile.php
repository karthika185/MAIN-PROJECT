
<?php
session_start();
$cust_id=$_SESSION["cust_id"];
$cust_email=$_SESSION["cust_email"];
$cust_name=$_SESSION["cust_name"];
$cust_phone=$_SESSION["cust_phone"];
if(!isset($_SESSION['cust_name']))
{
header('location:../login.php');
}

require_once("../classes/FormAssist.class.php");
require_once("../classes/DataAccess.class.php");
require_once("../classes/FormValidator.class.php");
$dao=new DataAccess();
$rules= array("customer_name"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"nospecchars"	=>"","alphaspaceonly"=>""),
        "address"=>array("required"=>""),
        "phone"=>array("required"=>"","minlength"=>10,"maxlength"=>10),
        "email"=>array("required"=>"","email"=>"")
        );
$labels=array("customer_name"=>"CUSTOMER NAME","address"=>"ADDRESS","phone"=>"PHONE","email"=>"EMAIL");
$validator=new FormValidator($rules,$labels);
if (isset($_POST["update"]))
{
	if($validator->validate($_POST))
	{
		$data = array("cust_name"=>$_POST["customer_name"],"cust_address"=>$_POST["address"],"cust_phone"=>$_POST["phone"]);
		if($dao->update($data,"tbl_custreg","cust_id=$cust_id"))
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
$res=$dao->getData("*","tbl_custreg","cust_id=$cust_id");
$details=$res[0];
$fields=array("customer_name"=>$details["cust_name"],"address"=>$details["cust_address"],"phone"=>$details["cust_phone"],"email"=>$details["cust_email"]);
$form=new FormAssist($fields,$_POST);
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
      <h1>Update Profile</h1>
      <form role="form" class="form-horizontal row" action="" method="post" class="decor" enctype="multipart/form-data">
                <div class="txt_field">
                            <?php echo $form->textBox("customer_name",array("placeholder"=>"Customer Name","class"=>"form-control")); ?>
                            <?php echo $validator->error("customer_name"); ?>
                            <span></span>
                            <label>Name</label>
                        </div>
                        <div class="txt_field">
                            <?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email","class"=>"form-control")); ?>
                            <?php echo $validator->error("email"); ?>
                            <span></span>
                            <label>Email</label>
                        </div>            
                        <div class="txt_field">      
                            <?php echo $form->textBox("address",array("placeholder"=>"Address","class"=>"form-control")); ?>
                            <?php echo $validator->error("address"); ?>
                            <span></span>
                            <label>Address</label>
                        </div>            
                        <div class="txt_field">
                            <?php echo $form->textBox("phone",array("placeholder"=>"Phone Number","class"=>"form-control")); ?>
                            <?php echo $validator->error("phone"); ?>
                            <span></span>
                            <label>Phone</label>
                        </div>            
                    <input class="col-sm-6 control-label" type="submit" value="update" name="update" />
                        <h4><?php echo isset($msg)?$msg:"";?></h4>
                        <br>
                        <br>
            </form>              
    </div>
</body>

</html>