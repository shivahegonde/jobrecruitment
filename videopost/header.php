<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .video-container {
    overflow: hidden;
    position: relative;
    width:100%;
}

.video-container::after {
    padding-top: 56.25%;
    display: block;
    content: '';
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
    </style>
    <script>
        window.onload = function() {
            setTimeout(function() {
                if (typeof(window.google_jobrunner) === "undefined") {
                    console.log("ad blocker installed");
                    var modal = document.getElementById("myModal");
                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    modal.style.display = "block";
                    span.onclick = function() {
                        location.reload();
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                location.reload();
            }
        }
                } else {
                    console.log("no ad blocking found.");
                    
                }
            }, 2000);

        };
        
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JobRecruitment.Tech | Video Blog</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
           
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

</head>
<div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p><h4 style="text-align: center; color:tomato">Please Disable Adblocker</h4></p>
            <img class="img-responsive" width="460" height="345" src="./images/Adblocker.jpg"/>

        </div>

    </div>
<body>
    
    <!-- HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container" id="id01">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class=" col-md-offset-4 col-md-4">
                    <?php

                    include "config.php";

                    $sql = "SELECT * FROM settings ";
                    $result = mysqli_query($con, $sql) or die("Query Faild.");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['logo'] == "") {
                                echo '<a href="index.php"><h1>' . $row['websitename'] . '</h1></a>';
                            } else {
                                echo '<a href="index.php" id="logo"><img src="admin/images/' . $row['logo'] . '"></a>';
                            }
                        }
                    }
                    ?>
                </div>
                <!-- /LOGO -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="menu-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php

                    include "config.php";

                    if (isset($_GET['cid'])) {
                        $cat_id = $_GET['cid'];
                    }

                    $sql = "SELECT * FROM category WHERE post > 0 ";
                    $result = mysqli_query($con, $sql) or die("Query Faild. : Category");
                    if (mysqli_num_rows($result) > 0) {
                        $active = "";
                    ?>

                        <ul class='menu'>
                            <li><a href='http://www.jobrecruitment.tech/'>JobRecruitment.Tech Jobs</a></li>
                            <li><a href='http://www.jobrecruitment.tech/udemypost'>Udemy Courses</a></li>
                            <li><a href='<?php echo $hostname; ?>'>Home</a></li>
                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                if (isset($_GET['cid'])) {
                                    if ($row['category_id'] == $cat_id) {
                                        $active = "active";
                                    } else {
                                        $active = "";
                                    }
                                }

                                echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                            } ?>
                            <li><a href='./aboutus.php'>About Us</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->