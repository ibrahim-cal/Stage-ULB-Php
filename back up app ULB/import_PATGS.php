<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["PATGS"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");
    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
      $colonne[12] = mysqli_real_escape_string($mysql, $colonne[12]);
      $colonne[13] = mysqli_real_escape_string($mysql, $colonne[13]);

      $insertionPATGS = "INSERT INTO PATGS (
      PERSK, PERSKLIB)  

      values (
      '" . $colonne[12] . "',
      '" . $colonne[13] . "'
    )";
    $resultatPATGS = mysqli_query($mysql, $insertionPATGS);
  }
}
}
}
exit(header('Location: index-inv.php'));
?>