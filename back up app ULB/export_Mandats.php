<?php  
    // **********************************   EXPORT TABLE  AGENT SERVICE************************
       if (isset($_POST["ExportMandats"])) {
  include("connection-bdd-inv.php");

$Mandats = "SELECT * FROM Mandats";

  $MandatsRes = mysqli_query($mysql, $Mandats);

$columnHeader = '';  
 $columnHeader =        " PERNR" . "\t"
 .   " Fk_PERSONID_EXT" . "\t"
 .   " Fk_WERKS" . "\t"
 .   " Fk_PERSG" . "\t"
 .   " Fk_PERSK" . "\t"
 .   " Fk_ANSVH" . "\t"
 .   " Fk_ZZREPGRADE" . "\t"
 .   " Fk_ZZACAD_ECRAN" . "\t"
 .   " BEGDA" . "\t"
 .   " ENDDA" . "\t"
 .   " TERMN" . "\t"
 .   " PA0016_BEGDA" . "\t"
 .   " PA0016_CTEDT" . "\t"
 .   " ZZCHARGE_H_ADM" . "\t"
 .   " ZZCHARGE_H_OCC" . "\t"
 .   " ID_S" . "\t"
 .   " ID_O" . "\t"
 .   " ETP_ADMIN_POSTE" . "\t"
 .   " ETP_OCC_POSTE" . "\t"
 .   " AFFECT_ETP_SERV" . "\t"
 .   " relation" . "\t"
 .   " AEDTM" . "\t";

        
$setData = '';  
  while ($row = mysqli_fetch_row($MandatsRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Mandats.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 