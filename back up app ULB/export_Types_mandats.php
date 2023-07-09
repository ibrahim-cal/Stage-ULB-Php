<?php  
    // **********************************   EXPORT TABLE  Types_mandats************************
       if (isset($_POST["ExportTypes_mandats"])) {
  include("connection-bdd-inv.php");

$Types_mandats = "SELECT * FROM Types_mandats";

  $Types_mandatsRes = mysqli_query($mysql, $Types_mandats);

$columnHeader = '';  
 $columnHeader = "ANSVH". "\t". "ansvh_lib" .  "\t";
$setData = '';  
  while ($row = mysqli_fetch_row($Types_mandatsRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Types_mandats.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 