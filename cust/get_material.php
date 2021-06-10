<?Php
@$btq_id=$_GET['btq_id'];
//$cat_id=2;
/// Preventing injection attack //// 
if(!is_numeric($btq_id)){
echo "Data Error";
exit;
 }
/// end of checking injection attack ////
require "config.php"; // Database connection string 

$sql="SELECT tbl_material.mat_name,tbl_material.mat_id,tbl_material.btq_id,tbl_material.mat_price,tbl_btqreg.btq_id FROM tbl_material INNER JOIN tbl_btqreg ON tbl_material.btq_id=tbl_btqreg.btq_id WHERE tbl_material.btq_id= :btq_id";

$row=$dbo->prepare($sql);
$row->bindParam(':btq_id',$btq_id,PDO::PARAM_INT,5);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
?>
