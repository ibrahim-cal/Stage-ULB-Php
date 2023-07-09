<!DOCTYPE html>
<!-- *** SAHTAN IBRAHIM ***-->
<html>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">



<head>
  <title> Informations chercheur et ses mandats </title>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>


  <style>

.sidenav {
  height: 100%;
  width: 150px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #14396E;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main{
  margin-left: 155px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


  .panel {
  margin : 10px;
  padding : 10px;
  float : left;
  width : 40%;
}


.panel2
{
  margin-left : 10px;
  padding-top : 10px;
  width : 40%
}

</style>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<div class="sidenav">
  <a href="index-inv.php"> Accueil </a>
  <a href="/chercheur"> A FAIRE </a>
  <a href="/mandats/form"> A FAIRE </a>
  <a href="/patgsListe"> A FAIRE </a>
  <a href="exporter_liste.php"> Exporter </a>
</div>


<div class="main">






<?php
//*** SAHTAN IBRAHIM ***-->
include("connection-bdd-inv.php");

if (isset($_POST["recherche"])) {

	$matricule = ($_POST["recherche"]);


     $selectChercheur = 'SELECT * FROM  Base_Agent_Adresse  WHERE PERSONID_EXT=' .$matricule. ' ';

     $resultatChercheur = $mysql->query($selectChercheur);



           $selectMandat = 'SELECT * FROM Mandats
      WHERE Fk_PERSONID_EXT=
     (SELECT Base_Agent_Adresse.PERSONID_EXT
     FROM Base_Agent_Adresse
     WHERE PERSONID_EXT=' .$matricule. ')  ';

      $resultatMandat = $mysql->query($selectMandat);
    

    $NombreMandats = $resultatMandat->num_rows;

  



     $selectFonction = 'SELECT * FROM Agent_Fonction
     WHERE ZZGRADE=
     (SELECT Base_Agent_Adresse.Fk_Agent_Fonction
     FROM Base_Agent_Adresse
     WHERE PERSONID_EXT=' .$matricule. ')  ';


      $selectUnite = 'SELECT * FROM Unit
     WHERE IDUNIT=
     (SELECT Base_Agent_Adresse.Fk_Unit
     FROM Base_Agent_Adresse
     WHERE PERSONID_EXT=' .$matricule. ')  ';


       $selectService = 'SELECT * FROM Agent_Service
     WHERE SHORT_SERV=
     (SELECT Base_Agent_Adresse.Fk_Agent_Service
     FROM Base_Agent_Adresse
     WHERE PERSONID_EXT=' .$matricule. ')  ';


      $selectCpi = 'SELECT * FROM Agent_Cpi
     WHERE CPI_SERV=
     (SELECT Base_Agent_Adresse.Fk_Agent_Cpi
     FROM Base_Agent_Adresse
     WHERE PERSONID_EXT=' .$matricule. ')  ';
     
	

	$resultatFonction = $mysql->query($selectFonction);
 	$fonction = $resultatFonction->fetch_array();

 	$resultatUnite = $mysql->query($selectUnite);
 	$unite = $resultatUnite->fetch_array();

 	$resultatService = $mysql->query($selectService);
 	$service = $resultatService->fetch_array();

 	$resultatCpi = $mysql->query($selectCpi);
 	$cpi = $resultatCpi->fetch_array();



    // *** REQUETE POUR LES TABLES DE L INVENTAIRE ****

      $selectZChercheur = 'SELECT Idche FROM  ZChercheur  WHERE
       Matricule=' .$matricule. '  ';

     $resultatZChercheur = $mysql->query($selectZChercheur);

    // $Idchercheur = $resultatZChercheur->fetch_array();
    // $Idch = $Idchercheur['Idche'];


     // ************* INFOS SUR LES TABLES Z de l'inventaire****
     ?>
 <div class="panel panel-info">

    <div class="panel-heading">Matricule : <?php echo $matricule ?> </div>

     <div class="panel-body">  </div>



<?php
while (NULL !== ($row = $resultatZChercheur->fetch_array())) {

           $Idche = $row['Idche'];
           if($Idche =="")
{}
else
{
               echo '<strong>' ." - Informations issues de l'inventaire -".
            '<br />';
          
             echo '<br />'.'<strong>' . "Identifiant chercheur de l'inventaire : " . $Idche .
              '</strong>' . '<br />'. '<br />';

             //** REPERER UNITE DANS LE OU LESQUELS IL TRAVAILLE
    $selectZUCompos = 'SELECT * FROM  ZUCompos  WHERE
       Refche=' .$Idche. '  ';

     $resultatZUCompos = $mysql->query($selectZUCompos);


 $x=0;

    // *** AFFICHAGE DANS QUELLE UNITE DE L INVENTAIRE IL TRAVAILLE ***
while (NULL !== ($row = $resultatZUCompos->fetch_array())) {
                      $Refunite = $row['Refunite'];
           $EstResponsable = $row['Responsable'];
            if($x==0)
            {
             echo '<br />'.'<strong>' . "Unit&eacute; de travail : " .
              $Refunite . '</strong>';
              $x++;
          }
          else{
                 echo '<strong>' . " - " .
              $Refunite . '</strong>';
          }

                
                if($EstResponsable =="Oui"){
                    echo " - est aussi responsable ". '<br />';
                }else{}
                  }




                 // $Idchercheur = $resultatZChercheur->fetch_array();
                 //  $Idch = $Idchercheur['Idche'];

  // *** RECUPERER LES PROJETS DANS LE OU LESQUEL IL TRAVAILLE

      $selectPresponsable = 'SELECT * FROM  ZPresponsable  WHERE
       RefResp=' .$Idche. '  ';

     $resultatProjet = $mysql->query($selectPresponsable);

     // ***** AFFICHAGE DES PROJETS *****//
while (NULL !== ($row = $resultatProjet->fetch_array())) {

           $RefProj = $row['RefProj'];

             echo '<br />'.'<strong>' . "Projet : " . $RefProj . '</strong>' . '<br />'. '<br />';
                  }


}
  }   





// ************************    INFOS SUR LE CHERCHEUR ********************************
 echo '<br />';
 echo '<br />';
while (NULL !== ($row = $resultatChercheur->fetch_array())) {

    $Prenom = $row['Prenom'];
    $Nom = $row['Nom'];
    $Matricule = $row['PERSONID_EXT'];

    echo '<br />'.'<strong>' . " - Informations &agrave; propos de BDD_Perso_A - " . '</strong>' . '<br />';
    echo '<br />';

    echo '<br />'.'<strong>' . "Matricule : " . $Matricule . '</strong>' . '<br />';
    echo '<br />'.'<strong>' . "Nom : " . $Nom . '</strong>' . '<br />';
    echo '<br />'.'<strong>' . "Pr&eacute;nom : " . $Prenom . '</strong>' . '<br />';








    if($fonction ==0)
    {

    }
    else{
    echo '<br />'.'<strong>' . "Fonction : " . $fonction['ZZGRADE_TXT'] . '</strong>' . '<br />';
    }







    if($unite ==0)
    {

    }
    else
    {
    echo '<br />'.'<strong>' . "Unit&eacute; : " . $unite['IDUNIT_TXT'] . '</strong>' . '<br />';
    }
    






    if($service ==0)
    {

    }
    else
    {
    echo '<br />'.'<strong>' . "Service : " . $service['LONG_SERV'] . " (" . $service['LIBEL_SERV']. ")". '</strong>' . '<br />';
    }
	






	 if($cpi ==0)
    {

    }
    else
    {

    echo '<br />'.'<strong>' . "CPI : " . $cpi['CPI_SERV'] . " (" . $cpi['CPI_SERV_LIBEL'].  ")" .'<strong>' ;
   
    if($cpi['CPI_SERV_CAMPUS'] == "")
    	{
    	}
    else{
    	echo '</strong>' . " - Campus : " .  $cpi['CPI_SERV_CAMPUS']  .'</strong>' . '<br />';
   		 }
        }

echo '<br />';


?>

</div>



  <div class="panel2 panel-info">
      <div class="panel-heading"> Mandats : <?php echo $NombreMandats; ?></div>
      <div class="panel-body"> </div>




<div class="container">
<?php


        //************** INFORMATIONS SUR LES MANDATS ****************************************


$x= 1;
for($i=0;$i<$NombreMandats;$i++)

{
   $row = $resultatMandat->fetch_array();

    

        echo '<br />';
?>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">  
<?php

     echo '<a href="Mandat_infos.php?numeroMandat=' .$row['PERNR'].'
         &numeroMatricule='.$row['Fk_PERSONID_EXT']  .'
          " "  target="_blank" >'.
          'Voir mandat num&eacute;ro '.  $x . '</a>' . '<br />';
          $x++;

?>
          </button>
          <br>

<?php
   
}
   
       /* Détermine le nombre de Mandats de la personne*/
    $NombreMandats = $resultatMandat->num_rows;
}

  }
 // exit(header('Location: Chercheur.php'));
?>


</div>

</div>
    </div>
</div>
</body>

</html>