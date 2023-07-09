<?php  
    // **********************************   EXPORT TABLE  AGENT SERVICE************************
       if (isset($_POST["ExportBTRTL"])) {
  include("connection-bdd-inv.php");

$BTRTL = "SELECT * FROM BTRTL";

  $BTRTLRes = mysqli_query($mysql, $BTRTL);

$columnHeader = '';  
 $columnHeader = "BTRTL". "\t". "Fk_WERKS" . "\t" . "nomSousDomaine" . "\t";
$setData = '';  
  while ($row = mysqli_fetch_row($BTRTLRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=BTRTL.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 