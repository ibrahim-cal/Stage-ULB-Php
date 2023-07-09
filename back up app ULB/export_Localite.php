<?php  
    // **********************************   EXPORT TABLE Localite ************************
       if (isset($_POST["ExportLocalite"])) {
  include("connection-bdd-inv.php");

$Localite = "SELECT * FROM Localite";

  $LocaliteRes = mysqli_query($mysql, $Localite);

$columnHeader = '';  
 $columnHeader = "Id_Localite". "\t". "CodePostal" . "\t" . "Localite" . "\t".
                  "SousCommune" . "\t" . "CommunePrincipale" . "\t".
                 "Province" . "\t";
                 
$setData = '';  
  while ($row = mysqli_fetch_row($LocaliteRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Localite.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 