<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<?php include 'header.php'; 

?>
<!DOCTYPE html>
<html>
<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JobRecruitment.Tech Freshers Job </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="description" content="JobRecruitment.Tech Fresher Jobs Updates | Free Udemy Courses | Experience Jobs | IT Jobs">
  <meta name="keywords" content="Software,Job,Fresher,Interview,Udemy,IT Jobs,MNC">
  <meta name="author" content="Shivkumar Hegonde">

  <!-- Bootstrap 3.3.7 -->


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
  <link rel="icon" href="http://s/icon.png">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
.back-to-top {
    position: fixed;
    bottom: 25px;
    right: 25px;
    display: none;
}

.fa {
  padding: 20px;
  font-size: 30px;
  width: 70px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}
.fa-instagram {
  background: #AB2083;
  color: white;
}
.fa-github {
  background: #02011F;
  color: white;
}
#google-search{
      width:360px;
  }

        </style>        
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>JobRecruitment</b>.Tech</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
	<li>
          <script async src='https://cse.google.com/cse.js?cx=014119ed5067f2518'></script><div id="google-search" class="gcse-searchbox-only"></div>
          </li>     
	
	<li>
              <a href="/udemypost/"> Free Courses</a>
            </li>
	  <li>
            <a href="jobs.php">Jobs</a>
          </li>
          <li>
            <a href="/videopost/">Video Posts</a>
          </li>
          <li>
            <a href="#about">About Us</a>
          </li>
          <li>
            <a href="#contact">Contact Us</a>
          </li>
          
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login.php">Login</a>
          </li>
          <li>
            <a href="sign-up.php">Sign Up</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header bg-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center index-head">
            <h1>All <strong>JOBS</strong> In One Place</h1>
            <p>Making Self-reliant India</p>
           <p><a class="btn btn-success btn-lg" href="https://chat.whatsapp.com/DO86ZOps8wMCSVsqCfAG28" target="_blank" role="button">Join Our WhatApp Group</a></p> 
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
      <div class="container">

<!-- ad here -->
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h1 class="text-center">Latest Jobs</h1>            
            <?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
          $sql = "SELECT * FROM job_post Order By createdat DESC Limit 8";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
                  $logo=$row1['logo'];
              
             ?>
            <div class="attachment-block clearfix">
           
              <img class="attachment-img" src="uploads/logo/<?php echo $logo; ?>" alt="Attachment Image">
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right"><?php if($row['minimumsalary']=="Best in Industry"||$row['minimumsalary']=="best in industry"||$row['minimumsalary']=="Best in industry") echo $row['minimumsalary']; else {echo "₹",$row['minimumsalary']; echo "-₹",$row['maximumsalary']; echo "/Annum" ;}?></span></h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row['joblocation']; ?> | <?php echo $row['qualification']; ?>  | Experience <?php echo $row['experience']; ?> Years</strong></div>
                </div>
              </div>
            </div>
          <?php
              }
            }
            }
          }
          ?>

          </div>
        </div>
      </div>
    </section>
    <section id="candidates" class="content-header">
      <div class="container">

<!-- ad here -->

        </div>

    

    <section id="statistics" class="content-header">
      <div class="container">
 <!-- ad here -->

    	</div>
    </section>

    <section id="about" class="content-header">

      <div class="container">
	<div class="row">
<!-- ad here -->
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>About US</h1>                      
          </div>
        </div>
        <div class="row">
	    <div class="col-md-12 text-center latest-job margin-bottom-20" style="background-color:#11519F;">
	   <img src="img/jobrecruitment.png" style="border-radius: 50%; float: left;" class="img-responsive">
		<h3 style="color:whitesmoke;">JobRecruitment.Tech is place where you will find all information which is needed for a job, career, and for future. We are here to provide most useful content to visitors for their knowledge upgradation. You will find Free Udemy Courses, Free Motivational/Inspirational Videos, Technical Blogs, Interview Tips, Interview Questions, Competitions, Hackathons and So on...  </h3>

 
      	 <h3 style="color:black"><b>You can follow him from below social links</b></h3>     
       
            <p>&nbsp</p>
          
          
            
           
            <a href="https://www.facebook.com/shivahegonde" class="fa fa-facebook" target="_blank"></a>
             
          <a href="https://twitter.com/shiva_hegonde" class="fa fa-twitter" target="_blank"></a>

          <a href="https://www.linkedin.com/in/shivahegonde/" class="fa fa-linkedin" target="_blank"> </a>
          <a href="https://www.instagram.com/shivahegonde/" class="fa fa-instagram" target="_blank"> </a>
          <a href="https://github.com/shivahegonde/" class="fa fa-github" target="_blank"> </a>
          
          </a>
          </div>
          
      
            
          
        </div>
      </div>
    </section>
    <section id="contact" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Contact Us</h1>                      
          </div>
        </div>
        <div class="row">
              <form method="post" action="sendmessage.php">
                <div class="col-md-12 latest-job ">
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="name" name="name" placeholder="Enter Name" required="">
                  </div>
              
                  <div class="form-group">
                <input type="number" class="form-control  input-lg" id="mobile" name="mobile" placeholder="Enter Mobile Number" minlength="10" maxlength="10"  pattern="[1-9]{1}[0-9]{9}" required="">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control  input-lg" id="email" name="email" placeholder="Enter Email ID" required="">
                  </div>
                  <div class="form-group">
                  <textarea class="form-control  input-lg" id="message" name="message" placeholder="Enter Your Message" required=""></textarea>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-flat btn-success">Send your Message</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </section>
    <section>
      <div>
             &nbsp      </div>
    </section>

  </div>
  <section>
      <div>
             &nbsp      </div>
    </section>
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="glyphicon glyphicon-chevron-up"></i></a>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2019-2020 <a href="http://www.JobRecruitment.tech/">JobRecruitment.Tech</a>.</strong> All rights
    reserved.
    </div>
    <!-- Start of WebFreeCounter Code -->
<a href="http://www.JobRecruitment.tech">
<img src="https://hitwebcounter.com/counter/counter.php?page=7683363&style=0001&nbdigits=6&type=page&initCount=900" title="JobRecruitment.Tech" Alt="Web Hits"   border="0" /></a>  
<!-- End of WebFreeCounter Code -->
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
});

</script>

<script type="text/javascript">
var infolinks_pid = 3287889;
var infolinks_wsid = 0;
</script>
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script type="text/javascript" id="cookieinfo"
	src="//cookieinfoscript.com/js/cookieinfo.min.js">
</script>

</body>
</html>
