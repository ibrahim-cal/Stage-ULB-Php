<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");


if (isset($_POST["Agent_Cpi"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
$colonne[40] = mysqli_real_escape_string($mysql, $colonne[40]);
$colonne[41] = mysqli_real_escape_string($mysql, $colonne[41]);
$colonne[42] = mysqli_real_escape_string($mysql, $colonne[42]);

       
      if ($colonne[40]  == "" AND $colonne[41] == ""  AND $colonne[42] == "")
{} // condition if pour éviter d'insérer une ligne vide

else
{
     $insertionAgent_Cpi = "INSERT INTO Agent_Cpi (
     CPI_SERV, CPI_SERV_LIBEL, CPI_SERV_CAMPUS)  

     values (
     '" . $colonne[40] . "',
     '" . $colonne[41] . "',
     '" . $colonne[42] . "'
  )";
     $resultatAgent_Cpi = mysqli_query($mysql, $insertionAgent_Cpi);
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