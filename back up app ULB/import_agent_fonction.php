<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");


if (isset($_POST["Agent_Fonction"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
$colonne[21] = mysqli_real_escape_string($mysql, $colonne[21]);
$colonne[22] = mysqli_real_escape_string($mysql, $colonne[22]);

if($colonne[21] ==" " AND $colonne[22]==" ")
{}
else{

     $insertionAgentFonction = "INSERT INTO Agent_Fonction (
     ZZGRADE, ZZGRADE_TXT)  

     values (
     '" . $colonne[21] . "',
     '" . $colonne[22] . "'
  )";
     $resultatAgentFonction = mysqli_query($mysql, $insertionAgentFonction );
}
            /* if (!empty($resultat)) {
        echo "import OK";
        }
         else {
        echo "probleme d'import";
        }
        */}
      }
    }
  }
  exit(header('Location: index-inv.php'));
  ?>