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

$sql = "SELECT * FROM udemy_post WHERE active=0 LIMIT $start_from, $limit";
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

$conn->close();
