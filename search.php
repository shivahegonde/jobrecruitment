<?php

session_start();

require_once("db.php");

$limit = 4;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page-1) * $limit;


if(isset($_GET['filter']) && $_GET['filter']=='city') {

  $sql = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE job_post.joblocation='$_GET[search]'";
  $sql2 = "SELECT * FROM company INNER JOIN job_post ON company.id_company=job_post.id_company WHERE job_post.joblocation='$_GET[search]'";

  $result = $conn->query($sql2);
  if($result->num_rows > 0) {
    while($row1 = $result->fetch_assoc()) {
      
               ?>

         <div class="attachment-block clearfix">
                <img class="attachment-img" src="uploads/logo/<?php echo $row1['logo']; ?>" alt="Attachment Image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row1['id_jobpost']; ?>"><?php echo $row1['jobtitle']; ?></a> <span class="attachment-heading pull-right"><?php if($row1['minimumsalary']=="Best in Industry"||$row1['minimumsalary']=="best in industry"||$row1['minimumsalary']=="Best in industry") echo $row1['minimumsalary']; else {echo "₹",$row1['minimumsalary']; echo "-₹",$row1['maximumsalary']; echo "/Annum" ;}?></span></h4>
                  <div class="attachment-text">
                      <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['joblocation']; ?> | Experience <?php echo $row1['experience']; ?> Years</strong></div>
                  </div>
                </div>
              </div>

      <?php
        
    }
  }


} else {

  if(isset($_GET['filter']) && $_GET['filter']=='searchBar') {

    $search = $_GET['search'];
    $sql = "SELECT * FROM job_post WHERE jobtitle LIKE '%$search%' LIMIT $start_from, $limit";
    

  } else if(isset($_GET['filter']) && $_GET['filter']=='experience') {

    $sql = "SELECT * FROM job_post WHERE experience>='$_GET[search]' LIMIT $start_from, $limit";

  }

  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
                $result1 = $conn->query($sql1);
                if($result1->num_rows > 0) {
                  while($row1 = $result1->fetch_assoc()) 
                  {
               ?>

         <div class="attachment-block clearfix">
                <img class="attachment-img" src="uploads/logo/<?php echo $row1['logo']; ?>" alt="Attachment Image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right"><?php if($row['minimumsalary']=="Best in Industry"||$row['minimumsalary']=="best in industry"||$row['minimumsalary']=="Best in industry") echo $row['minimumsalary']; else {echo "₹",$row['minimumsalary']; echo "-₹",$row['maximumsalary']; echo "/Annum" ;}?></span></h4>
                  <div class="attachment-text">
                      <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row['joblocation']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
                  </div>
                </div>
              </div>

      <?php
        }
      }
    }
  }

}




$conn->close();
