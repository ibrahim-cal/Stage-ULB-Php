<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Base_Agent_Adresse"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {
      ini_set('max_execution_time', 5); 


//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
$colonne[3] = mysqli_real_escape_string($mysql, $colonne[3]);
$colonne[4] = mysqli_real_escape_string($mysql, $colonne[4]);
$colonne[5] = mysqli_real_escape_string($mysql, $colonne[5]);
$colonne[6] = mysqli_real_escape_string($mysql, $colonne[6]);
$colonne[7] = mysqli_real_escape_string($mysql, $colonne[7]);
$colonne[8] = mysqli_real_escape_string($mysql, $colonne[8]);
$colonne[9] = mysqli_real_escape_string($mysql, $colonne[9]);
$colonne[21] = mysqli_real_escape_string($mysql, $colonne[21]);
$colonne[29] = mysqli_real_escape_string($mysql, $colonne[29]);
$colonne[37] = mysqli_real_escape_string($mysql, $colonne[37]);
$colonne[40] = mysqli_real_escape_string($mysql, $colonne[40]);

if($colonne[4]==0) // si la colonne de ZRSZRR est à zéro dans le fichier Excel
{
  $colonne[4]="NULL"; // on va lui assigner valleur NULL. Autrement le programme saute la ligne 
                      // si ZRSZRR est à zéro
}
else{}

$sqlInsertBaseAgent = "INSERT INTO Base_Agent_Adresse
     (PERSONID_EXT,
     Fk_Agent_Fonction,
     Fk_Unit,
     Fk_Agent_Service,
     Fk_Agent_Cpi,
     ZRSZRR,
     Prenom,
     Prenom_pref,     
     Nom,
     Nom_pref,
     Doc
      )   values 

(
     '" . $colonne[3] . "',

 '".$colonne[21]."',

'".$colonne[29]."',

'".$colonne[37]."',

 '".$colonne[40]."',

     $colonne[4],

     '" . $colonne[5] . "',
     '" . $colonne[6] . "',
     '" . $colonne[7] . "',
     '" . $colonne[8] . "',
     '" . $colonne[9] . "'
)";



    $resultat = $mysql->query($sqlInsertBaseAgent);

      }
      }
    }
  }
  exit(header('Location: index-inv.php'));
  ?>