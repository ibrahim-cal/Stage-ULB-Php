<?php  
    // **********************************   EXPORT TABLE CATEGORIES ************************
       if (isset($_POST["ExportCategories"])) {
  include("connection-bdd-inv.php");

$Categories = "SELECT * FROM Categories";

  $CategoriesRes = mysqli_query($mysql, $Categories);

$columnHeader = '';  
 $columnHeader = "PERSG". "\t". "PERSGLIB" . "\t" . "sorti" . "\t";
$setData = '';  
  while ($row = mysqli_fetch_row($CategoriesRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Categories.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 