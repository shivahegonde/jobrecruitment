<?php 
// Include the database config file 
require_once '../db.php'; 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members_export_data-" . date('Ymd') . ".xlsx"; 

// Column names 
$fields = array('SR.N.', 'NAME', 'EMAIL', 'GENDER', 'Password', 'city'); 
 
// Display column names as first row 
// $excelData = implode("\t", array_values($fields)) . "\n"; 
$fp = fopen('users.csv', 'w');
// Get records from the database 
$query = $conn->query("SELECT * FROM userdata"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    $i=0; 
    while($row = $query->fetch_assoc()){ $i++; 
        fputcsv($fp, $row);
    } 
}else{ 
    // $excelData .= 'No records found...'. "\n"; 
     
} 
 
// // Headers for download 
// header("Content-Disposition: attachment; filename=\"$fileName\""); 
// header("Content-Type: application/vnd.ms-excel"); 
 
// Render excel data 
echo $fp;
 
exit;
