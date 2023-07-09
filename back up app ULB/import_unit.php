<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Unit"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
      $colonne[29] = mysqli_real_escape_string($mysql, $colonne[29]);
      $colonne[30] = mysqli_real_escape_string($mysql, $colonne[30]);


      
      if ($colonne[29]  == "" AND $colonne[30] == "")
      {}
    else
    {

     $insertionUnit = "INSERT INTO Unit (
     IDUNIT, IDUNIT_TXT)  

     values (
     '" . $colonne[29] . "',
     '" . $colonne[30] . "'
   )";
   $resultatUnit = mysqli_query($mysql, $insertionUnit);
 }

            /* if (!empty($resultat)) {
        echo "import OK";
        }
         else {
        echo "probleme d'import";
        }
        */
      }
    }
  }
  }
  exit(header('Location: index-inv.php'));
  ?>