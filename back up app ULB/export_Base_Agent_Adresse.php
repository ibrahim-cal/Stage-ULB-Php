<?php  
    // **********************************   EXPORT TABLE  AGENT SERVICE************************
       if (isset($_POST["ExportBaseAgent"])) {
  include("connection-bdd-inv.php");

$Base_Agent_Adresse = "SELECT * FROM Base_Agent_Adresse";

  $Base_Agent_AdresseRes = mysqli_query($mysql, $Base_Agent_Adresse);

$columnHeader = '';  
 $columnHeader = "PERSONID_EXT". "\t". "Fk_Agent_Fonction" . "\t" . "Fk_Unit" . "\t"
                  . "Fk_Localite" . "\t". "Fk_Agent_Service" . "\t"  .  "Fk_Agent_Cpi"
                  . "\t" . "ZRSZRR" . "\t" .  "Prenom" . "\t" . "Prenom_pref"  
                  . "\t". "Nom" . "\t" . "Nom_pref" 
                  . "\t". "Doc" . "\t" ;

        
$setData = '';  
  while ($row = mysqli_fetch_row($Base_Agent_AdresseRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Base_Agent_Adresse.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 