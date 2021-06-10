<?php
require_once   '../vendor/autoload.php';
include("../dbconn.php");
$respond_id = $_GET["view"];
            $sql="SELECT tbl_respond.respond_dress,tbl_respond.respond_mat,tbl_respond.respond_price,tbl_respond.respond_mtr,tbl_respond.respond_cost,tbl_respond.respond_date,tbl_btqreg.btq_name,tbl_btqreg.btq_email,tbl_btqreg.btq_phone FROM tbl_respond INNER JOIN tbl_btqreg ON tbl_btqreg.btq_id=tbl_respond.respond_btqid WHERE respond_id = '$respond_id'";

            $result=mysqli_query($conn,$sql) or die(mysql_error());
            while($row=mysqli_fetch_array($result))
            {
                 $dress = $row['respond_dress'];
                 $mat = $row['respond_mat'];
                 $price = $row['respond_price'];
                 $mtr = $row['respond_mtr'];
                 $cost=$row['respond_cost'];
                 $date=$row['respond_date'];
                 $btqemail=$row['btq_email'];
                 $btqphn=$row['btq_phone'];

            }

        
            $mpdf = new \Mpdf\Mpdf();
            $data='';
            $data.='<h1>Details</h1>';
            $data.='<strong>Dress :'.$dress.'<br/>';
            $data.='<strong>Material :'.$mat.'<br/>';
            $data.='<strong>Price :'.$price.'<br/>';
            $data.='<strong>Metre :'.$mtr.'<br/>';
            $data.='<strong>Cost :'.$cost.'<br/>';
            $data.='<strong>Date :'.$date.'<br/>';
            `
            $mpdf->WriteHTML($data);
            $mpdf->Output('myfile.pdf','D');
?>