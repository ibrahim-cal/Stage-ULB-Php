<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Categories"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
      $colonne[10] = mysqli_real_escape_string($mysql, $colonne[10]);
      $colonne[11] = mysqli_real_escape_string($mysql, $colonne[11]);


      $insertionCategories = "INSERT INTO Categories (
      PERSG, PERSGLIB, sorti)  

      values (
      '" . $colonne[10] . "',
      '" . $colonne[11] . "',
      '" . $colonne[44] . "'
    )";
    $resultatCategories = mysqli_query($mysql, $insertionCategories);

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