<?php  
    // **********************************   EXPORT TABLE  AGENT SERVICE************************
       if (isset($_POST["ExportService"])) {
  include("connection-bdd-inv.php");

$Agent_Service = "SELECT * FROM Agent_Service";

  $Agent_ServiceRes = mysqli_query($mysql, $Agent_Service);

$columnHeader = '';  
 $columnHeader = "SHORT_SERV". "\t". "LONG_SERV" . "\t" . "LIBEL_SERV" . "\t";
$setData = '';  
  while ($row = mysqli_fetch_row($Agent_ServiceRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Agent_Service.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 