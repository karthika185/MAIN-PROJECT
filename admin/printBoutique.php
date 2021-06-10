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
    </style>
</head>

<body>
    <section class="section-1">
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
                        $data["o_status"]="A";
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
        <table>
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
            <?php 
                        }
                        ?>
        </table>
        <?php
                    }
                    ?>
        <button class="btn btn-success" id="print">Print</button>
        <script>
        document.getElementById("print").onclick = function() {
            window.print();
        };
        </script>
    </section>
</body>

</html>