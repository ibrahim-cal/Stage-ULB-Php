<?php  
    // **********************************   EXPORT TABLE  PATGS************************
       if (isset($_POST["ExportPATGS"])) {
  include("connection-bdd-inv.php");

$PATGS = "SELECT * FROM PATGS";

  $PATGSRes = mysqli_query($mysql, $PATGS);

$columnHeader = '';  
 $columnHeader = "PERSK". "\t". "PERSKLIB" .  "\t";
$setData = '';  
  while ($row = mysqli_fetch_row($PATGSRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=PATGS.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 