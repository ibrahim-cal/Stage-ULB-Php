<?php
//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Localite"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    $x=0;
    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {
      
if($x==0) // Condition IF pour sauter la première ligne, qui reprend nom colonnes
{}        
else
{
//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
//$colonne[0] = mysqli_real_escape_string($mysql, $colonne[0]);
  $colonne[1] = mysqli_real_escape_string($mysql, $colonne[1]);
  $colonne[2] = mysqli_real_escape_string($mysql, $colonne[2]);
  $colonne[3] = mysqli_real_escape_string($mysql, $colonne[3]);
  $colonne[4] = mysqli_real_escape_string($mysql, $colonne[4]);

  $insertionLocalite = "INSERT INTO Localite (

  CodePostal, Localite,  SousCommune, 
  CommunePrincipale,  Province)  

  values (
  
  '". $colonne[0]. "',
  '" . $colonne[1] . "',
  '" . $colonne[2] . "',
  '" . $colonne[3] . "',
  '" . $colonne[4] . "'
)";
$resultatLocalite = mysqli_query($mysql, $insertionLocalite);
}
$x++;
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