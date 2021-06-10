
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>e-tailoring system</title>
	<meta content="" name="description">
    <meta content="" name="keywords">
	<link href="index/img/favicon.png" rel="icon">
	<link href="index/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href="index/animate.css/animate.min.css" rel="stylesheet">
	<link href="index/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="index/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="index/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="index/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="index/swiper/swiper-bundle.min.css" rel="stylesheet">
    <style type="text/css">
    	.button{
    		background: #ffb03b;
    		border: 0;
    		padding: 10px 24px;
    		transition: 0.4s;
    		border-radius: 50px;
    	}
    </style>
    
</head>
<body>
	 <header id="header" class="fixed-top d-flex align-items-center header-transparent">
	 	<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
	 		<div class="logo me-auto">
	 			<h1><a href="#">e-Tailoring</a></h1>
	 		</div>
	 		<nav id="navbar" class="navbar order-last order-lg-0">
	 			<ul>
	 				
	 			
	 		<li class="dropdown"><a href="#"><span><h4  class="signup-signin-btn scrollto">Register/Login here</h4></span> </a>
	 			<ul>
                  <li><a href="btqreg.php">Sign up as Boutique</a></li>
                  <li><a href="custreg.php">Sign up as Customer</a></li>
                  <li><a href="login.php">Login</a></li>
                </ul>
                </ul>
 					<i class="bi bi-list mobile-nav-toggle"></i>
	 		</nav>



	 		<!--<a href="login.php" class="signup-signin-btn scrollto">Signup/Signin</a>-->
	 	</div>
	 </header>
	 <section id="hero">
	 	<div class="hero-container">
	 		<div class="carousel-inner" role="listbox">
	 			<div class="carousel-item active" style="background: url('index/img/slide-1.jpg');">
	 				<div class="carousel-container">
	 					<div class="carousel-content">
	 						<h2 class="animate__animated animate__fadeInDown"><span>e-Tailoring</span></h2>
	 						<p class="animate__animated animate__fadeInUp">The secret of great style is to feel good in what you wear</p>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </section>
	 <main id="main">
	 	<section id="contact-us" class="contact-us">
	 		<div class="container">
	 			<div class="section-title">
	 				<h2>Contact <span>Us</span></h2>
          			
	 			</div>
	 			<form method="post">
	 				<?php
	 				include("dbconn.php");
	 				if (isset($_POST['submit'])) {
	 				$email=$_POST["email"];
	 				$sub=$_POST["sub"];
	 				$msg=$_POST["msg"];
	 				$sql="INSERT INTO tbl_guest(guest_email,guest_subject,guest_message,guest_status) VALUES('$email','$sub','$msg','A')";
	 				if(mysqli_query($conn,$sql)){
	 					echo "successfull !";
	 				}
	 				else
	 				{
	 					echo "Error: " . $sql . " " . mysqli_error($conn);;
	 				}
	 				 mysqli_close($conn);
	 			}
	 				?>
	 				<div class="row">
	 					<div class="col-lg-4 col-md-6 form-group">
	 						<input type="text" name="email" id="email" class="form-control" placeholder="Your email"></div>
	 					<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
	 						<input type="text" name="sub" id="sub" placeholder="Your Subject" class="form-control">
	 					</div>
	 					<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
	 						<input type="text" name="msg" id="msg" placeholder="Your Message" class="form-control">
	 					</div>
	 					<div class="text-center">
	 						<br>
	 					<input type="submit" name="submit" id="submit" value="submit" class="button">
	 					</div>
	 				</div>
	 			</form>
	 		</div>
	 	</section>
	 	
	 </main>
	  <footer id="footer">
	  	<div class="container">
	  		<h3>e-Tailoring</h3>
	  		<p>Style your own clothes</p>
      		<div class="copyright">
      			 &copy; Copyright <strong><span>e-Tailor</span></strong>. All Rights Reserved
      		</div>
	  	</div>
	  </footer>
	  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	  <script src="index/main.js"></script>
</body>
</html>