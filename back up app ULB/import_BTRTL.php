<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["BTRTL"])) {

  $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){

  $nomFichier = $_FILES["file"]["tmp_name"][$i];

  if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

       if ($colonne[1]  == "" )
       {}
     else
     {
      
       $insertionBTRTL = "INSERT INTO BTRTL (
       BTRTL, Fk_WERKS)  

       values (
       '" . $colonne[1] . "',
          '".$colonne[0]."'
     )";
     $resultatBTRTL = mysqli_query($mysql, $insertionBTRTL);
   }

}
      }
    }
  }
  exit(header('Location: index-inv.php'));
  ?>