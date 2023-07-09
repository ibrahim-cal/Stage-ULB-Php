<?php  
    // **********************************   EXPORT TABLE  AGENT CPI ************************
       if (isset($_POST["ExportCpi"])) {
  include("connection-bdd-inv.php");

$Agent_Cpi = "SELECT * FROM Agent_Cpi";

  $Agent_CpiRes = mysqli_query($mysql, $Agent_Cpi);

$columnHeader = '';  
 $columnHeader = "CPI_SERV". "\t". "CPI_SERV_LIBEL" . "\t". "CPI_SERV_CAMPUS" . "\t";  
$setData = '';  
  while ($row = mysqli_fetch_row($Agent_CpiRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Agent_Cpi.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
 ?> 