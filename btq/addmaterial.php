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
$fields=array("name"=>"","pic"=>"","price"=>"");
$rules=array("name"=>array("required"=>"","alphaspaceonly"=>""),"price"=>array("required"=>"","regexp"=>'/^[0-9]+$/'));
$labels=array("name"=>"NAME");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["add"]))
{
	if($validator->validate($_POST))
	{
		if(isset($_FILES["pic"]))
		{
			require_once("../classes/FileUpload.class.php");
			$upload= new FileUpload();
			$types=["image/jpg","image/png","image/jpeg"];
			if($file_name=$upload->doUpload($_FILES["pic"],$types,1000,10,"../pics/materialpics"))
			{
				$data=array("mat_name"=>$_POST["name"],"mat_pic"=>$file_name,"mat_price"=>$_POST["price"],"mat_status"=>"A","btq_id"=>$btq_id);
				if($dao->insert($data,"tbl_material")) 
				{
					
                              $msg="Success";
				}
				else
				{
					var_dump($dao->lastQuery());
                              $msg="Insertion failed1".var_dump($dao->lastQuery());
				} 
			}
			else
			{
				$msg_file=$upload->errors();
				
			}
		}
	}
      else
      {
      $msg="Validation Error";
      }
	
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>e-Tailoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
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
                    <p style="color: black;font-family:satisfy">ADD MATERIAL</p>
                </center>
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">
                    <label>MATERIAL NAME</label>
                    <?php echo $form->textBox("name",array("placeholder"=>"Material Name")); ?>
                    <?php echo $validator->error("name"); ?>
                    <br>
                    <label>Upload Picture</label>
                    <?php echo $form->fileField("pic",array("placeholder"=>"Upload Picture")); ?>
                    <?php echo isset($msg_file)?$msg_file:""; ?><br>
                    <label>Price per Metre</label>
                    <?php echo $form->textBox("price",array("placeholder"=>"Price")); ?>
                    <?php echo $validator->error("price"); ?>

                    <input type="submit" name="add" />
                    <h4><?php echo isset($msg)?$msg:"";?></h4>

                </div>

            </form>
        </section>
    </div>

</body>

</html>