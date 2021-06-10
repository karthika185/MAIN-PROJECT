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
    
    $boutique=$_POST['boutique'];
    $email=$_POST['cust_email'];
    $phn=$_POST['cust_phone'];
    $cat=$_POST['category'];
    $subcat=$_POST['sub-category'];
    $mat=$_POST['material'];
    $measure=$_POST['measurements'];
    $sug=$_POST['suggestion'];
    $date=$_POST['date'];
    $sql = "INSERT INTO tbl_customiseform (cust_id,custform_btq,custform_mail,custform_phn,custform_cat,custform_subcat,custform_mat,custform_measure,custform_sug,custform_date,custform_status)
   VALUES ('$cust_id','$boutique','$cust_email','$phn','$cat','$subcat','$mat','$measure','$sug','$date','0')";
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
<html lang="en" dir="ltr">
<head>
  <title>e-Tailoring</title>
  <link rel="stylesheet" href="custom.css">
  <style type="text/css">
    .content .data{
      padding: 25px;
      background-color: #fff;
      border: 2px solid #8bc34a;
      border-radius: 8px;
    }
    .content p{
      margin-bottom: 15px;
      padding-bottom: 15px;
      border-bottom: 1px solid gainsboro;
    }
    .content p:last-child{
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }
    .content p span{
      float: right;
      font-weight: normal;
    }
    .data{
      display: none;
    }
  </style>
</head>

<body class="overflow-auto">
  <?php
  include("custnav.html");
  ?>
  <center><a href="measurement.html" target="_blank"
    >Click here to know details about measurements</a></center>
  <div class="center" style = "position:absolute;  top:550px;">

    <br>
      <h1>Choose Boutique</h1>
  <form action="customiseform.php" method="post" class="decor" enctype="multipart/form-data">
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
    <select id="category" name="category">
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
    <select name=sub-category id=sub-category>
    <option value="">Select Subcategory</option>
  </select>
  <span></span>
  </div>
  
  <div class="drop">
  <label>Boutique</label>
  <select id="boutique" name="boutique">
    <option value="">Select Boutique</option>
    <?php
    require "config.php";
    $sql="SELECT  * from tbl_btqreg WHERE btq_status='A'";
    foreach ($dbo->query($sql) as $row)
    {
      echo "<option value=$row[btq_id]>$row[btq_name]</option>";
    }
    ?>
  </select>
  <span></span>
  </div>
  
  <div class="drop">
     <label>Material</label>
    <select name=material id=material>
    <option value=""> Select Material</option>
  </select><br><br>
    <?php
    include("../dbconn.php");
    $sql="SELECT * FROM tbl_material WHERE mat_id=3";
    $res=mysqli_query($conn,$sql);
    while($rows=mysqli_fetch_array($res))
            {
    ?>
    <div class="content">
   <div id="<?php echo $rows["mat_id"];?>" class="data">
    <p><b>Material Name</b><span><?php echo $rows["mat_name"]?></span></p>
    <p><b>Material Price per metre</b><span><?php echo $rows["mat_price"]?></span></p>
    <?php
  }
  ?>
  </div>
</div>
  <span></span>
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
     <input type="date" name="date" required></input>
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
    $(document).ready(function()
    {
      $('#boutique').change(function()
      {
        var btq_id=$('#boutique').val();
        $('#material').empty();
        $.get('get_material.php',{'btq_id':btq_id},function(return_data)
        {
          $.each(return_data.data, function(key,value)
          {
            $("#material").append("<option value=" + value.mat_id +">"+value.mat_name+"</option>");
          });
        },"json");
      });
    });
    
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#material").on('change',function(){
    $(".data").hide();
    $("#"+$(this).val()).fadeIn(700);
  }).change();
});
</script>
</form>
</div>

</body>
</html>