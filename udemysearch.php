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


if(isset($_GET['filter']) && $_GET['filter']=='type') {

 $sql = "SELECT * FROM udemy_post WHERE udemy_post.coursetype='$_GET[search]' AND udemy_post.active=0"; 

  $result = $conn->query($sql);
  $rowcount=mysqli_num_rows($result);
  if($result->num_rows > 0) {
    while($row1 = $result->fetch_assoc()) {
      
               ?>

         <div class="attachment-block clearfix">
                <img class="attachment-img" src="uploads/logo/udemy.png" alt="Attachment Image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="view-udemy-post.php?id=<?php echo $row1['id_udemypost']; ?>"><?php echo $row1['title']; ?></a> </h4>
                  <div class="attachment-text">
                      <div><strong>Udemy | <?php echo $row1['createdat']; ?></strong></div>
                  </div>
                </div>
              </div>

      <?php
        
    }
  }else{ ?>
<div style="text-align: center; color:LIGHTCORAL">
    <h2><?php echo $rowcount; ?> Courses</h2>
</div>
    <?php }


} else {

  if(isset($_GET['filter']) && $_GET['filter']=='searchBar') {

    $search = $_GET['search'];
    $sql = "SELECT * FROM udemy_post WHERE title LIKE '%$search%' LIMIT $start_from, $limit";
    

  } else if(isset($_GET['filter']) && $_GET['filter']=='experience') {

    $sql = "SELECT * FROM job_post WHERE experience>='$_GET[search]' LIMIT $start_from, $limit";

  }

  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      
               ?>

         <div class="attachment-block clearfix">
                <img class="attachment-img" src="uploads/logo/udemy.png" alt="Attachment Image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="view-udemy-post.php?id=<?php echo $row['id_udemypost']; ?>"><?php echo $row['title']; ?></a> </h4>
                  <div class="attachment-text">
                      <div><strong>Udemy | <?php echo $row['createdat']; ?> </strong></div>
                  </div>
                </div>
              </div>

      <?php
        }
      }

}




$conn->close();

