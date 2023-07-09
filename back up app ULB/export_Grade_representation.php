<?php  
    // **********************************   EXPORT TABLE Grade_representation ************************
       if (isset($_POST["ExportGrade_representation"])) {
  include("connection-bdd-inv.php");

$Grade_representation = "SELECT * FROM Grade_representation";

  $Grade_representationRes = mysqli_query($mysql, $Grade_representation);

$columnHeader = '';  
 $columnHeader = "ZZREPGRADE". "\t". "ZZREPGRADE_TXT" . "\t" . "sorti" . "\t";
$setData = '';  
  while ($row = mysqli_fetch_row($Grade_representationRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Grade_representation.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 