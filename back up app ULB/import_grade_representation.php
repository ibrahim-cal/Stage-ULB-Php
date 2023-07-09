<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Grade_representation"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

      //on va utiliser la fonction real_escape qui permet
      // de conserver les apostrophes des champs
      $colonne[23] = mysqli_real_escape_string($mysql, $colonne[23]);
      $colonne[24] = mysqli_real_escape_string($mysql, $colonne[24]);


      $insertionGrade_representation = "INSERT INTO Grade_representation (
      ZZREPGRADE, ZZREPGRADE_TXT)  

      values (
      '" . $colonne[23] . "',
      '" . $colonne[24] . "'
    )";
    $resultatGrade_representation = mysqli_query($mysql, $insertionGrade_representation);

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