<?php
  session_start();
  $cust_id=$_SESSION["cust_id"];
  $cust_email=$_SESSION["cust_email"];
  $cust_phone=$_SESSION["cust_phone"];
  if(!isset($_SESSION['cust_name']))
{
    header('location:../login.php');
}
  $conn=mysqli_connect('localhost', 'root', '','etailor');
  if (isset($_POST['submit']))
  {
    $email=$_POST['cust_email'];
    $phn=$_POST['cust_phone'];
    $cat=$_POST['category'];
    $subcat=$_POST['sub-category'];
    $mat=$_POST['material'];
    $measure=$_POST['measurements'];
    $sug=$_POST['suggestion'];
    $date=$_POST['date'];
    $sql = "INSERT INTO tbl_customiseform1 (cust_id,form_email,form_phone,form_cat,form_subcat,form_mat,form_measure,form_sug,form_date)
   VALUES ('$cust_id','$email','$phn','$cat','$subcat','$mat','$measure','$sug','$date')";
  if (mysqli_query($conn,$sql))
   {
     echo "Your request was sent successfully !";
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
  <link rel="stylesheet" href="custom.css">
  <script type="text/javascript">
    
  </script>
</head>
<body class="overflow-auto">
<?php
  include("custnav.html");
  ?>
  <center><a href="measurement.html" target="_blank">Click here to know details about measurements</a></center>
  <div class="center" style = "position:absolute;  top:550px;">

    
      <h1>Global Request</h1>
  <form action="customiseform1.php" method="post" class="decor" enctype="multipart/form-data">
    <div class="txt_field">
      <?php
  $conn=mysqli_connect('localhost', 'root', '','etailor');
  $result ="SELECT * from tbl_custreg where cust_email = '{$_SESSION["cust_email"]}'";
  $res=mysqli_query($conn,$result);
  while($row = mysqli_fetch_array($res))
  {
    echo"<tr>";
    echo"<td><input type=\"text\" name=\"cust_email\" id=\"cust_email\" value=\"".$row['cust_email']."\"></td>";
    echo"</tr>";
  }
  echo"</table>";
  ?>
  <span></span>
  <label>Email</label>
    </div>
    <div class="txt_field">
      <?php
  $phn = mysqli_query($conn,"SELECT * from tbl_custreg where cust_phone = '{$_SESSION['cust_phone']}'");
  while($row=mysqli_fetch_array($phn))
  {
    echo"<tr>";
    echo"<td><input type=\"text\" name=\"cust_phone\" id=\"cust_phone\" value=\"".$row['cust_phone']."\"></td>";
    echo"</tr>";
  }
  echo"</table>";
  ?>
  <span></span>
  <label>Phone Number</label>
    </div>
   <div class="drop">
    <label>Category</label>
     <select id="category" name="category" required>
    <option value="">Select Category</option>
    <?php
    require "config.php";
    $sql="SELECT  * from tbl_category ";
    foreach ($dbo->query($sql) as $row)
    {
      echo "<option value=$row[cat_id]>$row[cat_name]</option>";
    }
    ?>
  </select>
  <span></span>
   </div>
   <div class="drop">
    <label>Subcategory</label>
     <select name=sub-category id=sub-category required>
    <option value="">Select Subcategory</option>
  </select>
  <span></span>
   </div><br>
  <div class="txt_field">
    <input type="text" name="material" required>
    <span></span>
    <label>Do you have any fabric suggestion?</label>
  </div>
  <div class="txt_field">
    <input type="text" name="measurements" required>
    <span></span>
    <label>Measurements</label>
  </div>
  <div class="txt_field">
    <input type="text" name="suggestion" required>
    <span></span>
    <label>Suggestion</label>
  </div>
  <div class="txt_field">
    <input type="date" name="date" value="" required>
    <span></span>
    <label>Date</label>
  </div>
  <input type="submit" name="submit"></input>
  <br>
  <br>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function()
    {
      $('#category').change(function()
      {
        var cat_id=$('#category').val();
        $('#sub-category').empty();
        $.get('get_subcat.php',{'cat_id':cat_id},function(return_data)
        {
          $.each(return_data.data, function(key,value)
          {
            $("#sub-category").append("<option value=" + value.subcat_id +">"+value.subcat_name+"</option>");
          });
        },"json");
      });
    });
  </script>
</body>
</html>