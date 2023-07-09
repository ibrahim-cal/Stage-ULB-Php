<?php  
    // **********************************   EXPORT TABLE  AGENT CPI ************************
       if (isset($_POST["ExportFonction"])) {
  include("connection-bdd-inv.php");

$Agent_Fonction = "SELECT * FROM Agent_Fonction";

  $Agent_FonctionRes = mysqli_query($mysql, $Agent_Fonction);

$columnHeader = '';  
 $columnHeader = "ZZGRADE". "\t". "ZZGRADE_TXT" . "\t";  
$setData = '';  
  while ($row = mysqli_fetch_row($Agent_FonctionRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Agent_Fonction.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
 ?> 