<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "videopost");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution


$sql1 = "CREATE TABLE `category` (
    `category_id` int(11) NOT NULL,
    `category_name` varchar(100) NOT NULL,
    `post` int(11) NOT NULL DEFAULT 0
  )";
$sql2 = "INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Mentoring', 0),
(2, 'Training', 0),
(3, 'Experts', 0),
(4, 'Software', 0),
(34, 'Blogging', 0);";

$sql3 = "CREATE TABLE `post` (
    `post_id` int(11) NOT NULL,
    `title` varchar(100) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `post_date` varchar(50) NOT NULL,
    `author` int(11) NOT NULL,
    `post_img` varchar(100) NOT NULL,
    `link` varchar(600) NOT NULL
  )";

$sql4 = "CREATE TABLE `settings` (
    `websitename` varchar(100) NOT NULL,
    `logo` varchar(100) NOT NULL,
    `footerdesc` text NOT NULL
  )";
  $sql5 = "INSERT INTO `settings` (`websitename`, `logo`, `footerdesc`) VALUES
  ('JobRecruitment.Tech', 'output-onlinepngtools (4).png', 'ï¿½ Copyright 2019 JobRecruitment.Tech | Powered by Shiv')";

  $sql6 = "CREATE TABLE `user` (
    `user_id` int(10) UNSIGNED NOT NULL,
    `first_name` varchar(30) NOT NULL,
    `last_name` varchar(30) NOT NULL,
    `username` varchar(30) DEFAULT NULL,
    `password` varchar(40) DEFAULT NULL,
    `role` int(11) NOT NULL
  ) ";
  $sql7 = "INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
  (1, 'shiv', 'kumar', 'admin', '104807bf35ccc10f69497ee944fa8eed', 1)";

$sql8 = "ALTER TABLE `category`
ADD PRIMARY KEY (`category_id`)";
 $sql9 = "ALTER TABLE `post`
 ADD PRIMARY KEY (`post_id`),
 ADD UNIQUE KEY `post_id` (`post_id`)";
 $sql10 = "ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`)";

$sql11 = "ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1";
$sql12 = "ALTER TABLE `post`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1";
$sql13 = "ALTER TABLE `user`
MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1";

if(mysqli_query($link, $sql1)){
    echo "Table created successfully. 1";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql2)){
    echo "Table created successfully. 2";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql3)){
    echo "Table created successfully. 3";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql4)){
    echo "Table created successfully. 4";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql5)){
    echo "Table created successfully. 5";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql6)){
    echo "Table created successfully. 6";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql7)){
    echo "Table created successfully. 7";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql8)){
    echo "Table created successfully. 8";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql9)){
    echo "Table created successfully. 9";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql10)){
    echo "Table created successfully. 10";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql11)){
    echo "Table created successfully.11";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql12)){
    echo "Table created successfully. 12";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql13)){
    echo "Table created successfully. 13";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



 
// Close connection
mysqli_close($link);
?>
