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
        padding: 20px;
        background: #fff;
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
        background: #fff;
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
    </style>
</head>

<body>
    <section class="section-1">
        <center>
            <p style="color: black;font-family:satisfy">CUSTOMER DETAILS</p>
        </center><br><br>
        <form action="" method="post" class="decor" enctype="multipart/form-data">
            <div class="form-left-decoration"></div>
            <div class="form-right-decoration"></div>
            <div class="circle"></div>
            <div class="form-inner">
                <?php 
            require_once("../classes/DataAccess.class.php");
            $dao = new DataAccess();
            $fields=array("cust_name","cust_phone","cust_email","cust_address");
            if($customer = $dao->getData($fields,"tbl_custreg"))
            {
                //var_dump(students);
                ?>
                <table>
                    <tr>

                        <th>Customer Name</th>
                        <th>Phone Number</th>

                        <th>Email</th>
                        <th>Address</th>

                    </tr>
                    <?php
                        foreach($customer as $cust)
                        {
                            ?>
                    <tr>

                        <td><?php echo $cust["cust_name"]; ?></td>
                        <td><?php echo $cust["cust_phone"]; ?></td>
                        <td><?php echo $cust["cust_email"]; ?></td>


                        <td><?php echo $cust["cust_address"]; ?></td>

                    </tr>

                    <?php
                        }

                        ?>

                </table>


                <?php
            }
            else
            {
                echo "<h3>No customers found ".$dao->getErrors()."</h3>";
            }


        ?>


                <br><br>
                <center><button class="btn btn-success" id="print">Print</button></center>
                <script>
                document.getElementById("print").onclick = function() {
                    window.print();
                };
                </script>
        </form>
    </section>
</body>

</html>