<?php
session_start();
$btq_id=$_SESSION["btq_id"];
include('../dbconn.php');
if(!isset($_SESSION['btq_name']))
{
header('location:../login.php');

}
if (isset($_POST['submit']))
  {
    $mail=$_POST['mail'];
    $dress=$_POST['dress'];
    $mat=$_POST['mat'];
    $price=$_POST['price'];
    $mtr=$_POST['mtr'];
    $tot=$_POST['tot'];
    $date=$_POST['date'];
    $sql = "INSERT INTO tbl_respond (respond_btqid,respond_custmail,respond_dress,respond_mat,respond_price,respond_mtr,respond_cost,respond_date)
   VALUES ('$btq_id','$mail','$dress','$mat','$price','$mtr','$tot','$date')";
   if (mysqli_query($conn,$sql))
   {
     echo "New record created successfully !";
     $query="UPDATE tbl_customiseform set custform_status='1' WHERE
      custform_id='" . $_GET["respond"] . "'";
mysqli_query($conn,$query);

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        function metre()
              {
              var n=document.getElementById("mtr");
              var e=/^[0-9]+$/;;
              if(n.value == "")
              {
                document.getElementById("span1").innerHTML = "<span class='error'>Please Total Metre</span>";
                    return false;
              }
              else if(!n.value.match(e))
              {
                document.getElementById("span1").innerHTML = "<span class='error'>Enter only numbers</span>";
                    return false;
              }
               else if(n4.value.match(p))
            {
              document.getElementById("span1").innerHTML = "<span class='error'></span>";
                  return true;
            }
              
              }
              function cost()
              {
              var n=document.getElementById("tot");
              var e=/^[0-9]+$/;;
              if(n.value == "")
              {
                document.getElementById("span2").innerHTML = "<span class='error'>Please enter total cost</span>";
                    return false;
              }
              else if(!n.value.match(e))
              {
                document.getElementById("span2").innerHTML = "<span class='error'>Enter valid cost</span>";
                    return false;
              }
              else if(n4.value.match(p))
            {
              document.getElementById("span1").innerHTML = "<span class='error'></span>";
                  return true;
            }
              
              
              
              }
              
    </script>
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
        <?php
            include("../dbconn.php");
            $custform_id = $_GET["respond"];
            $sql="SELECT tbl_customiseform.custform_mail,tbl_customiseform.custform_phn,tbl_subcategory.subcat_name,tbl_customiseform.custform_subcat,tbl_material.mat_name,tbl_material.mat_price FROM tbl_customiseform INNER JOIN tbl_material ON tbl_material.mat_id=tbl_customiseform.custform_mat INNER JOIN tbl_subcategory ON tbl_subcategory.subcat_id=tbl_customiseform.custform_subcat WHERE custform_id = '$custform_id'";
            $result=mysqli_query($conn,$sql) or die(mysql_error());
            while($row=mysqli_fetch_array($result))
            {
                 $mail = $row['custform_mail'];
                 $phn = $row['custform_phn'];
                 $dress = $row['subcat_name'];
                 $material = $row['mat_name'];
                 $cost=$row['mat_price'];
            

        ?>
        <section class="section-1">
        <form action="
        " method="POST" class="decor" enctype="multipart/form-data">

            <center><p style="color: black;font-family:satisfy">RESPOND FORM</p></center>
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">
                        <table>
                        <tr>
                            <td><label>EMAIL</label></td>
                               <td> <input type="text" name= "mail" value= "<?php echo $mail; ?>" ></span></td>
                            </td>
                        </tr>
                        <tr>
                            <td><label>PHONE</label></td>
                               <td>  <input type="text" name= "phn" value= "<?php echo $phn; ?>
                                    " ></span></td>
                            </td>
                        </tr>
                         <tr>
                            <td><label>DRESS</label></td>
                               <td> <input type="text" name= "dress" value= "<?php echo $dress; ?>
            " ></span></td>
                            </td>
                        </tr>
                        <tr>
                            <td><label>MATERIAL</label></td>
                               <td><input type="text" name= "mat" value= "<?php echo $material; ?>
            " ></span></td>
                            </td>
                        </tr>
                        <tr>
                            <td><label>PRICE PER METRE</label></td>
                               <td><input type="text" name= "price" id="price" value= "<?php echo $cost; ?>
            " >
                            </td>
                        </tr>
                        <tr>
                            <td><label>TOTAL METRE</label></td>
                               <td><input type="text" name= "mtr" id="mtr" value= "" onblur="metre()" required><span id="span1"></span></td>
                            </td>
                        </tr>
                        <tr>
                            <td><label>TOTAL COST</label></td>
                               <td><input type="text" name= "tot" id="tot" value="" onblur="cost()" required><span id="span2"></span></td>
                            </td>
                        </tr>
                        <tr>
                            <td><label>DATE</label></td>
                               <td><input type="date" name= "date" id="theDate" value=""  required></span></td>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Send Form" name="submit">

        
           
             
        </form>
       <?php
    }
    ?>
 
    </div>

</body>

</html>
