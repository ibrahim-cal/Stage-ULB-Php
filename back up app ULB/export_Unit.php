<?php  
    // **********************************   EXPORT TABLE  Unit************************
       if (isset($_POST["ExportUnit"])) {
  include("connection-bdd-inv.php");

$Unit = "SELECT * FROM Unit";

  $UnitRes = mysqli_query($mysql, $Unit);

$columnHeader = '';  
 $columnHeader = "IDUNIT". "\t". "IDUNIT_TXT" .  "\t";
$setData = '';  
  while ($row = mysqli_fetch_row($UnitRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Unit.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 