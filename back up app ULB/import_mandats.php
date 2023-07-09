<?php

//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["Mandats"])) {  // OK

   $countfiles = count($_FILES['file']['name']);

  for($i=0;$i<$countfiles;$i++){


$nomFichier = $_FILES["file"]["tmp_name"][$i];

 if ($_FILES["file"]["size"][$i] > 0) {

    $fichier = fopen($nomFichier, "r");
    $x=0;
    $y=1;
    // tant qu'on n'est pas à la fin du fichier
    while (($colonne = fgetcsv($fichier, 10000, ";")) !== FALSE) {
      ini_set('max_execution_time', 5); 
//on va utiliser la fonction real_escape qui permet
// de conserver les apostrophes des champs
        $colonne[0] = mysqli_real_escape_string($mysql, $colonne[0]);
  
        $colonne[18] = mysqli_real_escape_string($mysql, $colonne[18]);
        $colonne[33] = mysqli_real_escape_string($mysql, $colonne[33]);
        $colonne[34] = mysqli_real_escape_string($mysql, $colonne[34]);
        $colonne[35] = mysqli_real_escape_string($mysql, $colonne[35]);
        $colonne[36] = mysqli_real_escape_string($mysql, $colonne[36]);
        $colonne[43] = mysqli_real_escape_string($mysql, $colonne[43]);
        $colonne[44] = mysqli_real_escape_string($mysql, $colonne[44]);


// on test si y a deja un numero de mandat identique en BDD
$test = "SELECT PERNR FROM Mandats WHERE PERNR = '".$colonne[2]."' ";
        $resultat = $mysql->query($test);


// requete pour tester si il y a déja des numéro mandat
// similaire dans la BDD (doublon, triple, etc)
        $testDoublon = "SELECT PERNR FROM Mandats WHERE PERNR LIKE 
        '$colonne[2]%'  ";
        $resultatDoublon = $mysql->query($testDoublon);



        if (mysqli_num_rows($resultat)>0)
        {
            $colonne[2] .= $x;
            $x++;
        }
        // Si on a déjà trouvé un doublon et qu'on arrive au 3ème,
        // 4ème, etc num mandat
        // on va ajouter 2, 3, ... en fin de num mandadat
        else if (mysqli_num_rows($resultatDoublon)>0)
        {
            $colonne[2] .= $y;
        }



$insertionMandats = "INSERT INTO Mandats (
PERNR, 
Fk_PERSONID_EXT, Fk_WERKS, Fk_PERSG,
Fk_PERSK, Fk_ANSVH, Fk_ZZREPGRADE, Fk_ZZACAD_ECRAN,
BEGDA, ENDDA, TERMN, PA0016_BEGDA
, PA0016_CTEDT, ZZCHARGE_H_ADM, ZZCHARGE_H_OCC, ID_S, ID_O, ETP_ADMIN_POSTE,
ETP_OCC_POSTE, AFFECT_ETP_SERV,
relation, AEDTM)  
values (

'" . $colonne[2] . "',
'".$colonne[3]."',

'".$colonne[0]."',

'".$colonne[10]."',

'".$colonne[12]."',

'".$colonne[19]."',

'".$colonne[23]."',

'".$colonne[25]."',

'" . $colonne[14] . "',
'" . $colonne[15] . "',
'" . $colonne[16] . "',
'" . $colonne[17] . "',
'" . $colonne[18] . "',
'" . $colonne[27] . "',
'" . $colonne [28] . "',
'" . $colonne [31] . "',
'" . $colonne [32] . "',
'" . $colonne [33] . "',
'" . $colonne [34] . "',
'" . $colonne [35] . "',
'" . $colonne [36] . "',
'" . $colonne [43] . "'
)";


  $resultatMandats = mysqli_query($mysql, $insertionMandats);
      }
    }
}
}
exit(header('Location: index-inv.php'));
?>