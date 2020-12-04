<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>

@-webkit-keyframes fadeIn{to{opacity:1}}
@keyframes fadeIn{to{opacity:1}}
.fade-in{-webkit-animation:fadeIn .5s ease-out 1 forwards;animation:fadeIn .5s ease-in 1 forwards;opacity:0}
  </style>

<script>
     function myFunc() {
       var linAs = document.getElementById("button");
       var linkEd = document.getElementById("apply");
       var timing = 6;
       var text_timing = document.createElement("span");
       linkEd.parentNode.replaceChild(text_timing, linkEd);
       var id;
       id = setInterval(function() {
         timing--;
         if (timing < 0) {
           clearInterval(id);
  $(linkEd, text_timing).fadeIn("slow");
 text_timing.parentNode.replaceChild(linkEd, text_timing);
           linAs.style.display = "none";
         } else {
       text_timing.innerHTML = "<div id='timming' class='text-danger fade-in'>Link is generating in <strong>" + timing.toString() + " Second</strong></div>";
           linkEd.style.display = "inline";
           linAs.style.display = "none";
         }
           if (timing < 5) {
  $("#timming").removeClass("fade-in");
         }
       }, 1000);
     }
  </script>


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
            <a href="login.php">Login</a>
          </li>
          <li>
            <a href="sign-up.php">Sign Up</a>
          </li>          
        </ul>
      </div>
    </nav>
  </header>



  <div class="content-wrapper" style="margin-left: 0px;">

  <?php
  
    $sql = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) 
    {
      while($row = $result->fetch_assoc()) 
      {
  ?>

<title><?php echo $row['companyname'];?> : <?php echo $row['jobtitle']; ?></title>
<meta name="description" content="<?php $row['description']; ?>">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">          
          <div class="col-md-9 bg-white padding-2">
            <div class="pull-left">
              <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
            </div>
            <div class="pull-right">
              <a href="jobs.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div>
              <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i> <?php echo $row['joblocation']; ?></span> <i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>              
	    </div>
	    <div>

   	   <!-- ad here -->


	    </div>

            <div>
              <?php echo stripcslashes($row['description']); ?>
            </div>
	    <div>

<!-- ad here -->

            <br>
            <h4>Salary: ₹ <?php echo $row['minimumsalary']; ?></h4>
            </div>
	    
		<div style="text-align: center;">
 <button class='btn btn-danger btn-lg' onclick='myFunc()' id='button'>Click To get Link</button>
              <a href="<?php echo $row['joblink']; ?>" target="_blank" id="apply" style="display: none;" class="btn btn-success btn-flat margin-top-50">Apply</a>
            </div>
            
        <!-- ad here -->

          </div>
          <div class="col-md-3">
            <div class="thumbnail">
              <img src="uploads/logo/<?php echo $row['logo']; ?>" alt="companylogo">
              <div class="caption text-center">
                <h3><?php echo $row['companyname']; ?></h3>
                <p><a href="http://<?php echo $row['website']; ?>" target='_blank' class="btn btn-primary btn-flat" role="button">More Info</a>
                <hr>
                <div class="row">
                  
                </div>
              </div>
	    </div>
	    
            <!-- ad here -->

         </div>   
          </div>
        </div>
      </div>
    </section>

    <?php 
      }
    }
    ?>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2019-2020 <a href="http://www.jobrecruitment.tech/">JobRecruitment.Tech</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>



</body>
</html>
