<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
        <div>
        
<!-- ad here -->

        </div>
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                    <?php

                            include "config.php";

                            $post_id = $_GET['id'];


                            $sql = "SELECT post.post_id, post.title, post.description, post.post_date,post.link,
                            category.category_name, user.username,post.category,post.post_img FROM post 
                            LEFT JOIN category ON post.category = category.category_id
                            LEFT JOIN user ON post.author = user.user_id
                            WHERE post.post_id = {$post_id}";

                            $result = mysqli_query($con, $sql) or die ("Query Faild.");
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'><?php echo $row['username']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                            </div>
                            
                            
                            <img class="single-feature-image" style="max-height: 180px; max-width: 180px;" src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
                            <div class="video-container">
                            <iframe src="<?php echo $row['link']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <br>
                            
                            <h4 class="description" style="color:dimgray;"><?php echo $row['description']; ?></h4>
                          
                            <div style="text-align: center;"><b><a href="<?php echo $row['link']; ?>" target="#"><h2>Open Video</h2></a>
                            
<!-- ad here -->
                        </div>
                        </div>
                        <?php
                                }
                            }else{
                                echo "<h2>No Record Found.</h2>";
                            }

                        ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
