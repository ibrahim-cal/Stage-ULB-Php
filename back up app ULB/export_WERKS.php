<?php  
    // **********************************   EXPORT TABLE  WERKS************************
       if (isset($_POST["ExportWERKS"])) {
  include("connection-bdd-inv.php");

$WERKS = "SELECT * FROM WERKS";

  $WERKSRes = mysqli_query($mysql, $WERKS);

$columnHeader = '';  
 $columnHeader = "WERKS". "\t". "NomDomaine" .  "\t";
$setData = '';  
  while ($row = mysqli_fetch_row($WERKSRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=WERKS.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 