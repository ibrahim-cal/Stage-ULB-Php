<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Agent_Service"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
$colonne[37] = mysqli_real_escape_string($mysql, $colonne[37]);
$colonne[38] = mysqli_real_escape_string($mysql, $colonne[38]);
$colonne[39] = mysqli_real_escape_string($mysql, $colonne[39]);

       
      if ($colonne[37]  == "" AND $colonne[38] == ""  AND $colonne[39] == "")
{} // condition if pour éviter d'insérer une ligne vide

else
{
     $insertionAgent_Service = "INSERT INTO Agent_Service (
     SHORT_SERV, LONG_SERV, LIBEL_SERV)  

     values (
     '" . $colonne[37] . "',
     '" . $colonne[38] . "',
     '" . $colonne[39] . "'
  )";
     $resultatAgent_Service = mysqli_query($mysql, $insertionAgent_Service);
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