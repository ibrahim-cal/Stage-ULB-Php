<!DOCTYPE html>
<!-- *** SAHTAN IBRAHIM ***-->
<html>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">



<head>
  <title> Informations mandats </title>

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
  margin-left: 160px;
  margin-top : 10px; /* Same as the width of the sidenav */
}



  .panel {
  margin : 10px;
  padding : 10px;
  float : left;
  width : 60%;
}




@media screen and (max-height: 450px)
 {
  .sidenav {padding-top: 15px;
  }

  .sidenav a {font-size: 18px;}



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



$idMandat = $_GET['numeroMandat'];

$idMatricule = $_GET['numeroMatricule'];

?>



 <div class="panel panel-info">



    <div class="panel-heading">
      Matricule :  <?php echo $idMandat .'</br>'.
    "Num. mandat : ".  $idMatricule ?>
  </div>

     <div class="panel-body">  </div>

<?php

      $selectMandat = 'SELECT * FROM Mandats
      WHERE Fk_PERSONID_EXT=
     (SELECT Base_Agent_Adresse.PERSONID_EXT
     FROM Base_Agent_Adresse
     WHERE PERSONID_EXT=' .$idMatricule. ')  ';

      $resultatMandat = $mysql->query($selectMandat);
   	  $mandat = $resultatMandat->fetch_array();

          

 $selectWERKS = 'SELECT * FROM WERKS
     WHERE WERKS=
     (SELECT Mandats.Fk_WERKS
     FROM Mandats
     WHERE PERNR=' .$idMandat. ' )  ';

     $resultatWERKS = $mysql->query($selectWERKS);
     $WERKS = $resultatWERKS->fetch_array();




     $selectBTRTL = 'SELECT * FROM BTRTL
     WHERE Fk_WERKS=
     (SELECT Mandats.Fk_WERKS
     FROM Mandats
     WHERE PERNR=' .$idMandat. ' )  ';

     $resultatBTRTL = $mysql->query($selectBTRTL);
     $BTRTL = $resultatBTRTL->fetch_array();


     $selectCategories = 'SELECT * FROM Categories
     WHERE PERSG=
     (SELECT Mandats.Fk_PERSG
     FROM Mandats
     WHERE PERNR=' .$idMandat. ' )  ';

     $resultatCategories = $mysql->query($selectCategories);
     $Categories = $resultatCategories->fetch_array();



     $selectPATGS = 'SELECT * FROM PATGS
     WHERE PERSK=
     (SELECT Mandats.Fk_PERSK
     FROM Mandats
     WHERE PERNR=' .$idMandat. ' )  ';

     $resultatPATGS = $mysql->query($selectPATGS);
     $PATGS = $resultatPATGS->fetch_array();



     $selectTypesMandats = 'SELECT * FROM Types_Mandats
     WHERE ANSVH=
     (SELECT Mandats.Fk_ANSVH
     FROM Mandats
     WHERE PERNR=' .$idMandat. ' )  ';

     $resultatTypesMandats  = $mysql->query($selectTypesMandats );
     $TypesMandats  = $resultatTypesMandats ->fetch_array();
  


      $selectGrade_representation = 'SELECT * FROM Grade_representation
     WHERE ZZREPGRADE=
     (SELECT Mandats.Fk_ZZREPGRADE
     FROM Mandats
     WHERE PERNR=' .$idMandat. ' )  ';

     $resultatGrade_representation  = 
     $mysql->query($selectGrade_representation);
     $Grade_representation  = $resultatGrade_representation ->fetch_array();




        $selectAcademique = 'SELECT * FROM Academique
     WHERE ZZACAD_ECRAN=
     (SELECT Mandats.Fk_ZZACAD_ECRAN
     FROM Mandats
     WHERE PERNR=' .$idMandat. ' )  ';

     $resultatAcademique  = 
     $mysql->query($selectAcademique);
     $Academique  = $resultatAcademique ->fetch_array();


$NombreMandats = $resultatMandat->num_rows;



 //************** INFORMATIONS SUR LES MANDATS ****************************************

$x= 1;

for($i=0;$i<$NombreMandats;$i++)

{
   $row = $resultatMandat->fetch_array();

         //echo '<a href="Mandat_infos.php?numeroMandat=' .$row['PERNR']. '" " target="_blank">'.
         // 'Infos  mandat '.  $x . '</a>' . '<br />';
         // $x++;
}
       /* Détermine le nombre de Mandats de la personne*/
    $NombreMandats = $resultatMandat->num_rows;


         //************** PARTIE SUR LES CLES ETRANGERES *********************************************
         
  //************** PARTIE SUR LES CLES ETRANGERES *********************************************
         

          echo '<strong>' . "Type de contrat : "
         . $TypesMandats['ansvh_lib']  . " (". $TypesMandats['ANSVH'] 
         .  ")". '<strong>' . '<br />' ;



         echo '<br />'.'<strong>' . "Domaine : "
         . $WERKS['WERKS']  .'<strong>' . '<br />' ;



         echo '<br />'.'<strong>' . "Sous-domaine : "
         . $BTRTL['BTRTL']  .'<strong>' . '<br />' ;
    


          echo '<br />'.'<strong>' . "Categorie : "
         . $Categories['PERSGLIB']  . " (". $Categories['PERSG'] 
         .  ")". '<strong>' . '<br />' ;




          echo '<br />'.'<strong>' . "PATGS : "
         . $PATGS['PERSKLIB']  . " (". $PATGS['PERSK'] 
         .  ")". '<strong>' . '<br />' ;



         if($Grade_representation['ZZREPGRADE'] ==0)
         {}
         else{
         echo '<br />'.'<strong>' . "Grade : "
         . $Grade_representation['ZZREPGRADE_TXT']  . " (".
          $Grade_representation['ZZREPGRADE'] 
         .  ")". '<strong>' . '<br />' ;
            }



            if($Academique['ZZACAD_ECRAN'] ==0)
         {}
         else{
         echo '<br />'.'<strong>' . "Statut acad&eacute;mique : "
         . $Academique['ZZACAD_TXT_AUTO']  . " (".
          $Academique['ZZACAD_ECRAN'] 
         .  ")". '<strong>' . '<br />' ;
    	 }


            


        //*************** DONNEES FIXES MANDAT ****************************************************


          $date_originale_debut_aff = $mandat['BEGDA'];
          $dateStr = strtotime($date_originale_debut_aff);
          $begda = date("d-m-Y", $dateStr);
         echo '<br />'.'<strong>' . "Date de d&eacute;but d'affectation : "
         . $begda  .'<strong>'. '<br />' ;


         $date_originale_fin_aff = $mandat['ENDDA'];
          $dateStr2 = strtotime($date_originale_fin_aff);
          $endda = date("d-m-Y", $dateStr2);
         echo '<br />'.'<strong>' . "Date de fin d'affectation : "
         . $endda  .'<strong>' . '<br />';



         if($mandat['TERMN']==0)
         {}
         else{
          $date_fin_pension = $mandat['TERMN'];
          $dateStr3 = strtotime($date_fin_pension);
          $termn = date("d-m-Y", $dateStr3);
         echo '<br />'.'<strong>' . 'Date d\'&eacute;ch&eacute;ance pension : '
         . $termn .'<strong>' . '<br />';
            }



          $date_debut_contrat = $mandat['PA0016_BEGDA'];
          $dateStr4 = strtotime($date_debut_contrat);
          $PA0016_BEGDA = date("d-m-Y", $dateStr4);
         echo '<br />'.'<strong>' . "Date de d&eacute;but de contrat : "
         . $PA0016_BEGDA  .'<strong>' . '<br />';
     		





         $date_fin_contrat = $mandat['PA0016_CTEDT'];
          $dateStr5 = strtotime($date_fin_contrat);
          $PA0016_BEGDA = date("d-m-Y", $dateStr5);
          if($mandat['PA0016_CTEDT']==0)
          {}
          else{
         echo '<br />'.'<strong>' . "Date de fin de contrat : "
         . $PA0016_BEGDA .'<strong>' . '<br />';
            }





         if($mandat['ZZCHARGE_H_ADM'] == 0)
         { }
    	 else{
          echo '<br />'.'<strong>' . " Charge horaire de cours administr&eacute;  : "
         . $mandat['ZZCHARGE_H_ADM']  .'<strong>' . '<br />';
            }




                 if($mandat['ZZCHARGE_H_OCC'] == 0)
         { }
    	 else{
         echo '<br />'.'<strong>' . " Charge horaire de cours administr&eacute; (comptabilisant en plus les travaux de recherche ou pr&eacute;paration ) : "
         . $mandat['ZZCHARGE_H_OCC']  .'<strong>' . '<br />';
    	 }




        if($mandat['ID_S'])
        {}
        else{
           echo '<br />'.'<strong>' . " Identifiant du poste  : "
         . $mandat['ID_S']  .'<strong>' . '<br />';
    	 }




         if($mandat['ID_O']==0)
         {}
     else{
          echo '<br />'.'<strong>' . ' Identifiant de l\'entit&eacute; (service) : '
         . $mandat['ID_O']  .'<strong>' . '<br />';
    	 }





        if($mandat['ETP_ADMIN_POSTE'] ==0)
        {}
        else{
          echo '<br />'.'<strong>' . ' L\'&eacute;quivalent temps plein administratif du poste  : '
         . $mandat['ETP_ADMIN_POSTE']  .'<strong>' . '<br />';
        }





        if($mandat['ETP_OCC_POSTE']==0)
        { }
        else{
         echo '<br />'.'<strong>' . '  L\'occupation du poste (le % temps financ&eacute; pour la fonction en question) : '
         . $mandat['ETP_OCC_POSTE']  .'<strong>' . '<br />';
         }





         if($mandat['AFFECT_ETP_SERV']==0)
         { }
        else{
          echo '<br />'.'<strong>' . '  Fraction d\'&eacute;quivalent temps plein administratif affect&eacute;e &agrave; un service via une relation : '
         . $mandat['AFFECT_ETP_SERV']  .'<strong>' . '<br />';
    	 }





        if ($mandat['relation'] ==0) { }
        else{
          echo '<br />'.'<strong>' . ' Relation d\'affectation dans le service  : '
         . $mandat['relation']  .'<strong>' . '<br />';
    	 }





         $date_maj = $mandat['AEDTM'];
          $dateStr6 = strtotime($date_maj);
          $aedtm = date("d-m-Y", $dateStr6);

          if($mandat['AEDTM']==0)
          {}
          else{
          echo '<br />'.'<strong>' . " Indique la date de mise &agrave; jour ou la date d'introduction de la ligne dans Excel  : "
         . $aedtm . '<strong>' . '<br />';
            }
    

 // exit(header('Location: Chercheur.php'));
?>
</div>
</div>
</body>
</html>

