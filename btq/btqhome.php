
<?php
session_start();
$btq_id=$_SESSION["btq_id"];

if(!isset($_SESSION['btq_name']))
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
    <style type="text/css">
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
        <section class="section-1">
            <p style="color: black; font-family:satisfy;">REQUESTS</p>
            <form action="responded.php" method="post" class="decor">
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">
        <table>
            <tr>
                <th>customer name</th>
                <th>customer email</th>
                <th>customer phone</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Material</th>
                <th>Measurements</th>
                <th>Suggestion</th>
                <th>Proceed</th>
            </tr>
            <?php
            include("../dbconn.php");
            $query="SELECT tbl_custreg.cust_name,tbl_customiseform.custform_mail,tbl_customiseform.cust_id,tbl_customiseform.custform_phn,tbl_category.cat_name,tbl_subcategory.subcat_name,tbl_material.mat_name,tbl_customiseform.custform_measure,tbl_customiseform.custform_sug,tbl_customiseform.custform_id FROM tbl_customiseform INNER JOIN tbl_category ON tbl_category.cat_id=tbl_customiseform.custform_cat INNER JOIN tbl_subcategory ON tbl_subcategory.subcat_id=tbl_customiseform.custform_subcat INNER JOIN tbl_custreg ON tbl_custreg.cust_id=tbl_customiseform.cust_id INNER JOIN tbl_material ON tbl_material.mat_id=tbl_customiseform.custform_mat WHERE custform_btq = '$btq_id' AND custform_status = 0";

            $res=mysqli_query($conn,$query);
            
            while($rows=mysqli_fetch_array($res))
            {
            ?>
            <tr>
                <td><?php echo $rows['cust_name'];?></td>
                <td><?php echo $rows['custform_mail'];?></td>
                <td><?php echo $rows['custform_phn'];?></td>
                <td><?php echo $rows['cat_name'];?></td>
                <td><?php echo $rows['subcat_name'];?></td>
                <td><?php echo $rows['mat_name'];?></td>
                <td><?php echo $rows['custform_measure'];?></td>
                <td><?php echo $rows['custform_sug'];?></td>
                <td><a href="respond.php?respond=<?php echo $rows['custform_id']; ?>">respond</td>
            </tr>
            <?php
            }

            $query="SELECT tbl_custreg.cust_name,tbl_customiseform1.form_email,tbl_customiseform1.cust_id,tbl_customiseform1.form_phone,tbl_category.cat_name,tbl_subcategory.subcat_name,tbl_material.mat_name,tbl_customiseform1.form_measure,tbl_customiseform1.form_sug,tbl_customiseform1.form_id FROM tbl_customiseform1 INNER JOIN tbl_category ON tbl_category.cat_id=tbl_customiseform1.form_cat INNER JOIN tbl_subcategory ON tbl_subcategory.subcat_id=tbl_customiseform1.form_subcat INNER JOIN tbl_custreg ON tbl_custreg.cust_id=tbl_customiseform1.cust_id INNER JOIN tbl_material ON tbl_material.mat_id=tbl_customiseform1.form_mat";

            $res=mysqli_query($conn,$query);
            
            while($rows=mysqli_fetch_array($res))
            {
            ?>
            <tr>
                <td><?php echo $rows['cust_name'];?></td>
                <td><?php echo $rows['form_email'];?></td>
                <td><?php echo $rows['form_phone'];?></td>
                <td><?php echo $rows['cat_name'];?></td>
                <td><?php echo $rows['subcat_name'];?></td>
                <td><?php echo $rows['mat_name'];?></td>
                <td><?php echo $rows['form_measure'];?></td>
                <td><?php echo $rows['form_sug'];?></td>
                <td><a href="respond.php?respond=<?php echo $rows['form_id']; ?>">respond</td>
            </tr>
            <?php
            }
        ?>
        </table>
        <?php mysqli_close($conn);
        ?>
    </form>
    </section>

    </div>

</body>

</html>