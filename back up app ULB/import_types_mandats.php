<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Types_mandats"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");      // IL OUVRE JUSTE LE PREMIER ou     X fois le premier

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {    // OK

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
      $colonne[19] = mysqli_real_escape_string($mysql, $colonne[19]);
      $colonne[20] = mysqli_real_escape_string($mysql, $colonne[20]);

      $insertionTypes_mandats = "INSERT INTO Types_mandats (
      ANSVH, ansvh_lib)  

      values (
      '" . $colonne[19] . "',
      '" .  $colonne[20]. "'
    )";
    $resultatTypes_mandats = mysqli_query($mysql, $insertionTypes_mandats);
                         

                           }
                         }
  }// fin de for
  }// fin de
  exit(header('Location: index-inv.php'));
  ?>