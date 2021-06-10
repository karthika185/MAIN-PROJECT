<?php
session_start();
$admin_id=$_SESSION["admin_id"];
if(!isset($_SESSION['admin_name']))
{
header('location:../login.php');
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
        background: #ffb03b;
    }

    .form-inner textarea {
        resize: none;
    }

    .button {
        width: 50%;
        padding: 2px;
        margin-top: 20px;
        border-radius: 20px;
        border: none;
        border-bottom: 4px solid #ffb03b;
        background: #fff;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
    }

    .button:hover {
        background: #d0dfe8;
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
                require_once("../classes/FormAssist.class.php");
                require_once("../classes/DataAccess.class.php");
                require_once("../classes/FormValidator.class.php");

                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;
                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';
                $dao=new DataAccess();

                if(isset($_POST["id"]))
                {
                  
                  $id=$_POST["id"];
                    $otp=rand(100000,999999);  

                  $data2= $dao->getData("btq_email","tbl_btqreg","btq_id='$id'");
                  $email = $data2[0]["btq_email"];

                  $data1["password"] = $otp;

                  if(isset($_POST["accept"]))
                  {
                    $data["btq_status"]="A";

                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->Mailer = "smtp";
                    $mail->SMTPDebug  = 0;  
                    $mail->SMTPAuth   = TRUE;
                    $mail->SMTPSecure = "tls";
                    $mail->Port       = 587;
                    $mail->Host       = "smtp.gmail.com";
                    $mail->Username   = "etailorsite@gmail.com";
                    $mail->Password   = "etailor@123";

                    $mail->IsHTML(true);
                    $mail->AddAddress($email, "smk");
                    $mail->SetFrom("etailorsite@gmail.com", "eTailor");
                    $mail->AddReplyTo("etailorsite@gmail.com", "eTailor");
                    $mail->Subject = "You have been accepted to the system.";
                    $content = "<b>Use the OTP and mail id to login.</b>".$otp;

                    $mail->MsgHTML($content);
                    if(!$mail->Send())
                    {
                      echo "Error while sending Email.";
                      //var_dump($mail);
                    }
                    else
                    {
                      echo "Email sent successfully";
                    }

                  }
                  else if(isset($_POST["reject"]))
                  {
                    $data["mgr_status"]="r";
                   
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->Mailer = "smtp";
                    $mail->SMTPDebug  = 0;  
                    $mail->SMTPAuth   = TRUE;
                    $mail->SMTPSecure = "tls";
                    $mail->Port       = 587;
                    $mail->Host       = "smtp.gmail.com";
                    $mail->Username   = "etailorsite@gmail.com";
                    $mail->Password   = "etailor@123";

                    $mail->IsHTML(true);
                    $mail->AddAddress($email, "smk");
                    $mail->SetFrom("etailorsite@gmail.com", "your name");
                    $mail->AddReplyTo("etailorsite@gmail.com", "Your name");
                //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
                    $mail->Subject = "Request Rejected.";
                    $content = "<b>Your request to access the system hass been rejected!</b>";

                    $mail->MsgHTML($content);
                    header("adminhome.php");
                    if(!$mail->Send())
                    {
                      echo "Error while sending Email.";
                      //var_dump($mail);
                    }
                    else
                    {
                      echo "Email sent successfully";
                      
                    }
                  }
                  else
                  {
                    //
                  }
                  if($dao->update($data,"tbl_btqreg","btq_id=$id"))
                  {
                    if($dao->update($data1,"tbl_login","username='$email'"))
                    {
                      //var_dump($dao->getErrors());
                    }
                    else
                    {
                      //var_dump($dao->getErrors());
                    }

                  }

                }
                $fields=array("btq_id"=>"","btq_name"=>"","btq_owner"=>"","btq_email"=>"","btq_phone"=>"","btq_lic"=>"");
                $c="P";
                $labels=array();
                $form=new FormAssist($fields,$_POST);
                if($data= $dao->getData("*","tbl_btqreg","btq_status='$c'"))
                {
                ?>
            <center>
                <p style="color: black;font-family:satisfy">Boutique Requests</p>
            </center>
            <form method="post" class="decor">
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">


                    <table>
                        <tr>
                            <th>Boutique name</th>
                            <th>Owner name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>License</th>
                            <th>Accept/Reject</th>
                        </tr>
                        <?php
                            foreach ($data as $rqst)
                            {
                                ?>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $rqst["btq_id"]; ?>"></input>
                            <td><?php echo $rqst["btq_name"]; ?></td>
                            <td><?php echo $rqst["btq_owner"]; ?></td>
                            <td><?php echo $rqst["btq_email"]; ?></td>
                            <td><?php echo $rqst["btq_phone"]; ?></td>
                            <td><?php echo $rqst["btq_lic"]; ?></td>
                            <td><input type="submit" name="accept" value="accept" class="button" />
                                <input type="submit" name="reject" value="reject" class="button" />
                            </td>
                        </tr>
                        <?php
                            }
                            ?>
                    </table>

                    <?php
                }
                else
                {
                    echo "<h3>No Requests Found</h3>";
                }
                ?>

                </div>
            </form>
        </section>
</body>

</html>