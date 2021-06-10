
<?php
session_start();
$admin_id=$_SESSION["admin_id"];
if(!isset($_SESSION['admin_name']))
{
header('location:../login.php');
}
require_once("../classes/FormAssist.class.php");
require_once("../classes/DataAccess.class.php");
require_once("../classes/FormValidator.class.php");
$dao=new DataAccess();
if(isset($_POST["btq_id"]))
{
  $id=$_POST["btq_id"];
  $data2= $dao->getData("btq_status","tbl_btqreg","btq_id='$id'");
  $stat = $data2[0]["btq_status"];

  if(isset($_POST["block"]))
  {
    $data["btq_status"]="B";
  }
  else if(isset($_POST["unblock"]))
  {
    $data["btq_status"]="A";
  }
  else
  {
    var_dump($dao->getErrors());
    $msg="Error";
  }
  if($dao->update($data,"tbl_btqreg","btq_id=$id"))
  {
   
    //
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
        background-color: #f2f2f2
    }

    th {
        background-color: #ffb03b;
        color: white;
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
        text-decoration: none;
    }

    #myInput {
    width: 200px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    }

    /* When the input field gets focus, change its width to 100% */
    #myInput:focus {
    width: 80%;
    }

    #myInput
    {
        -moz-border-radius: 15px;
        border-radius: 15px;
        border:solid 1px black;
        padding:5px;
        display: block;
        margin-right: auto;
        margin-left: auto;
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
            <center>
                <p style="color: black;font-family:satisfy;border-radius: 15px;padding:10px;">BOUTIQUE DETAILS</p>
            </center><br><br>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."><br><br>
            <?php
            require_once("../classes/DataAccess.class.php");
            $dao = new DataAccess();
            if (isset($_POST["id"]))
                {
                    $id=$_POST["id"];
                    if (isset($_POST["block"])) 
                    {
                        $data["btq_status"]="B";
                    }
                    elseif (isset($_POST["unblock"])) 
                    {
                        $data["btq_status"]="A";
                    }
                    else
                    {
                        //
                        
                    }
                    if($dao->update($data,"tbl_btqreg","btq_id=$id"))
                    {
                        $msg="success!";
                    }
                }
                if($boutiques = $dao->getData("*","tbl_btqreg"))
                {
                    ?>

            <table id="myTable">
                <tr>
                    <th>Boutique Name</th>
                    <th>Owner Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>License</th>
                    <th>Status</th>
                </tr>
                <?php
                        foreach($boutiques as $btq)
                        {
                        ?>
                <form method="post">
                    <tr>
                        <input type="hidden" name="id" value="<?php echo $btq["btq_id"];?>">
                        <td><?php echo $btq["btq_name"]; ?></td>
                        <td><?php echo $btq["btq_owner"]; ?></td>
                        <td><?php echo $btq["btq_address"]; ?></td>
                        <td><?php echo $btq["btq_email"]; ?></td>
                        <td><?php echo $btq["btq_phone"]; ?></td>
                        <td><?php echo $btq["btq_lic"]; ?></td>
                        <td>
                            <?php
                                    if($btq["btq_status"]=="A")
                                    {
                                        ?>
                            <input type="submit" name="block" value="block" />
                            <?php
                                    }
                                    if($btq["btq_status"]=="B")
                                    {
                                        ?>
                            <input type="submit" name="unblock" value="unblock" />
                        </td>
                        <?php
                                    }
                                    ?>
                    </tr>
                </form>
                <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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
                <?php 
                        }
                        ?>
            </table>
            <?php
                }
                else
                {
                    echo "<h3>No boutiques found ".$dao->getErrors()."</h3>";
                }
                ?>
            <br><br><br><br><a href="printBoutique.php" class="btn">PRINT</a>
        </section>
    </div>
</body>

</html>