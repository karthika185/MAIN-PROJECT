<?php
session_start();
$admin_id=$_SESSION["admin_id"];
if(!isset($_SESSION['admin_name']))
{
header('location:../login.php');
}
$conn=mysqli_connect('localhost', 'root', '','etailor');
require_once("../classes/FormAssist.class.php");
require_once("../classes/DataAccess.class.php");
require_once("../classes/FormValidator.class.php");
$fields=array("category_name"=>"");
$rules=array("category_name"=>array("required"=>"","alphaspaceonly"=>"","unique"=>array("field"=>"cat_name","table"=>"tbl_category")));
$labels=array("category_name"=>"CATEGORY NAME");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{
		$data=array("cat_name"=>$_POST["category_name"],"cat_status"=>"A");
		if ($dao->insert($data,"tbl_category")) 
		{
			

         $msg="Success"."<br>"."Category Name : ".$_POST["category_name"];
     
		}
		else
		{
			$msg="Insertion failed";
		}
	}

else
{
	$msg="Insertion failed!! Category name should be unique and it must contain only character";
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>e-Tailoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
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
        background: #d0dfe8;
    }

    #cattable
    {
        width: 50%;
        border: 1px solid black;

    }

    #cattable tr td
    {
        line-height: 28px;

    }

    @media (min-width: 568px) {
        form {
            width: 60%;
        }
    }

    #myInput {
    width: 180px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    }

    /* When the input field gets focus, change its width to 100% */
    #myInput:focus {
    width: 50%;
    }

    #myInput
    {
    -moz-border-radius: 15px;
    border-radius: 15px;
        border:solid 1px black;
        padding:5px;
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
                <img src="img/user.jpg">
                <h4><?php echo $_SESSION["admin_name"];?></h4>
            </div>
            <ul>
                <li>
                    <a href="adminhome.php">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <span>Boutique Requests</span>
                    </a>
                </li>
                <li>
                    <a href="guestenq.php">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>Guest Enquiry</span>
                    </a>
                </li>
                <li>
                    <a href="custenq.php">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>Customer Enquiry</span>
                    </a>
                </li>
                <li>
                    <a href="btqenq.php">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>Boutique Enquiry</span>
                    </a>
                </li>
                <li>
                    <a href="addcat.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <span>Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="addsubcat.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <span>Add Subcategory</span>
                    </a>
                </li>
                <li>
                    <a href="viewcust.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="viewbtq.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Boutiques</span>
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

            <?php
            include("../dbconn.php");
            if(isset($_SESSION['msg']))
            {
            ?>
            <div >
            <?php echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
            </div>
            <?php
            }

            ?>

            <center>
                <p style="color: black;font-family:satisfy;border-radius: 15px;padding:10px;">CATEGORY</p>
            </center><br>

            <form action="" method="post" class="decor">
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">
      
                    <?php echo $form->textBox("category_name",array("class"=>"field","placeholder"=>"CATEGORY NAME")); ?>


                    <input type="submit" name="submit" class="button"/>
                    
                </div>
                <center><h5><font color="red"><?php echo isset($msg)?$msg:"";?></font></h5></center>
             
            </form>
             <?php
            $result=mysqli_query($conn,"SELECT * FROM tbl_category");
            ?>
            <br><br>
             <input class="form-control mr-sm-2" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for category..">
            <br><br><table id='cattable'>
                <tr><th>CATEGORIES ADDED</th></tr>
                    <?php
                        if (mysqli_num_rows($result)>0) {
                            while($row=mysqli_fetch_array($result))
                            {
                               ?>
                               <tr>

                               <td><?php echo $row['cat_name'];?></td> 
                               <td> <a href="deletecat.php?catid=<?php echo $row['cat_id'];  ?> "><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                                </tr>

                               <?php
                            }
                        }
                   ?>
            </table>
            <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("cattable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

        </section>

      
    </div>
    <!-- Vendor JS Files -->
  <script src="location : ../cust/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="location : ../cust/asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="location : ../cust/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="location : ../cust/asset/vendor/php-email-form/validate.js"></script>
  <script src="location : ../cust/asset/vendor/purecounter/purecounter.js"></script>
  <script src="location : ../cust/asset/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="location : ../cust/asset/vendor/waypoints/noframework.waypoints.js"></script>

</body>

</html>