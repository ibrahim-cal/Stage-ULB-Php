<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["WERKS"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");

    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {

//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
      $colonne[0] = mysqli_real_escape_string($mysql, $colonne[0]);


 //$WERKS_Actuel = $colonne[0]; // on récupère les champs WERK et BTRTL de la ligne
 //$BTRTL_Actuel = $colonne[1]; // actuelle. Afin de faire une comparaison après

      // FILTRE qui va servir à vérifier si il y a déja
     // un champ existant avec la même ligne (combinaison) WERK + BTRTL. 
    // Si inexistant, on va insérer la ligne. Sinon, on le saute
      /*$ChampExistant= "SELECT WERKS, BTRTL FROM WERKS_BTRTL
     WHERE WERKS_BTRTL.WERKS='$WERKS_Actuel'
     AND WERKS_BTRTL.BTRTL='$BTRTL_Actuel' ";
      $resultatChampExistant = mysqli_query($mysql, $ChampExistant);
       
      if (mysqli_num_rows($resultatChampExistant) == 0)
      {
*/
       $insertionWERKS = "INSERT INTO WERKS (
       WERKS)  

       values (
       '" . $colonne[0] . "'
     )";
     $resultatWERKS = mysqli_query($mysql, $insertionWERKS);

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