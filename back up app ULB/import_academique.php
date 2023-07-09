<?php
//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Academique"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
$colonne[25] = mysqli_real_escape_string($mysql, $colonne[25]);
$colonne[26] = mysqli_real_escape_string($mysql, $colonne[26]);


     $insertionAcademique = "INSERT INTO Academique (
     ZZACAD_ECRAN, ZZACAD_TXT_AUTO)  

     values (
  
     '" . $colonne[25] . "',
     '" . $colonne[26] . "'

  )";
     $resultatAcademique = mysqli_query($mysql, $insertionAcademique);
      }
    }
    }
  }
  exit(header('Location: index-inv.php'));
  ?>