<!DOCTYPE html>
<!-- *** SAHTAN IBRAHIM ***-->
<html>
<head>
  <title> Moteur de recherche </title>
</head>
<body>

<?php
       include("connection-bdd-inv.php");
?>

</body>
</html>

<div class="main">

<?php
include("connection-bdd-inv.php");
include "layout.html";

if (isset($_POST['submit'])) {

    $motRecherche = $_POST['recherche'];




    	// ******** AFFICHAGE DES DOMAINES (WERKS)

        $sqlWERKS = "SELECT * FROM WERKS WHERE WERKS LIKE '%$motRecherche%' OR WERKS ='.$motRecherche.' ";

        $resultatRecherche = $mysql->query($sqlWERKS);

            if($resultatRecherche->num_rows === 0)
{}
else{
?>
 <table class="table table-hover">
  <tr>
   <th>  Nom de domaine    </th>
    
  </tr>
  <?php
       while (NULL !== ($row = $resultatRecherche->fetch_array())) {
       {	
?>
            <tr>
            <td>   <?php  echo $row['WERKS']; ?>  </td>
            </tr>
<?php
       }
     }
  }
  ?>
</table>
<?php








  		// ******     AFFICHAGE DES UNITES


 $sqlUnit = "SELECT * FROM Unit WHERE IDUNIT LIKE '%$motRecherche%' OR IDUNIT ='.$motRecherche.'
 OR IDUNIT_TXT LIKE '%$motRecherche%' OR IDUNIT_TXT='.$motRecherche.'";

        $resultatUnit = $mysql->query($sqlUnit);


  if($resultatUnit->num_rows === 0)   
{}
else{

  ?>
 <table class="table table-hover">
  <tr>
   <th> Unite  </th>
    
  </tr>
  <?php
       while (NULL !== ($row = $resultatUnit->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['IDUNIT']; ?>  </td>
            
            <td>   <?php  echo $row['IDUNIT_TXT']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php







  		// ******     AFFICHAGE DES Types_mandats


 $sqlTypesMandats = "SELECT * FROM Types_mandats WHERE ansvh_lib LIKE '%$motRecherche%' OR ansvh_lib ='.$motRecherche.'  ";

        $resultatTypes_mandats= $mysql->query($sqlTypesMandats);


  if($resultatTypes_mandats->num_rows === 0)
{}
else{
  ?>
 <table class="table table-hover">
  <tr>
   <th> Types mandats </th>
    
  </tr>
  <?php
       while (NULL !== ($row = $resultatTypes_mandats->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['ANSVH']; ?>  </td>
            
            <td>   <?php  echo $row['ansvh_lib']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php






  		// ******     AFFICHAGE DES PATGS


 $sqlPATGS = "SELECT * FROM PATGS WHERE PERSK LIKE '%$motRecherche%' OR PERSK ='.$motRecherche.'
 OR PERSKLIB LIKE '%$motRecherche%' OR PERSKLIB ='.$motRecherche.'   ";

        $resultatPATGS= $mysql->query($sqlPATGS);
  if($resultatPATGS->num_rows === 0)

{}
else{
  ?>
 <table class="table table-hover">
  <tr>
   <th> Statut </th>
    
  </tr>
  <?php
       while (NULL !== ($row = $resultatPATGS->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['PERSK']; ?>  </td>
            
            <td>   <?php  echo $row['PERSKLIB']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php



       



	  


  		// ******     AFFICHAGE DES Grade_representation


 $sqlGrade_representation = "SELECT * FROM Grade_representation WHERE ZZREPGRADE LIKE '%$motRecherche%' OR ZZREPGRADE ='.$motRecherche.'
 OR ZZREPGRADE_TXT LIKE '%$motRecherche%' OR ZZREPGRADE_TXT ='.$motRecherche.'   ";

        $resultatGrade_representation= $mysql->query($sqlGrade_representation);
  if($resultatGrade_representation->num_rows === 0)

{}
else{
   ?>
 <table class="table table-hover">
  <tr>
   <th> Grade </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatGrade_representation->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['ZZREPGRADE']; ?>  </td>
            
            <td>   <?php  echo $row['ZZREPGRADE_TXT']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php






  		// ******     AFFICHAGE DES BTRTL


 $sqlBTRTL = "SELECT * FROM BTRTL WHERE BTRTL LIKE '%$motRecherche%' OR BTRTL ='.$motRecherche.'
 OR nomSousDomaine LIKE '%$motRecherche%' OR nomSousDomaine ='.$motRecherche.'   ";

        $resultatBTRTL= $mysql->query($sqlBTRTL);
  if($resultatBTRTL->num_rows === 0)

{}
else{
   ?>
 <table class="table table-hover">
  <tr>
   <th> Sous-domaine </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatBTRTL->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['BTRTL']; ?>  </td>
            
            <td>   <?php  echo $row['nomSousDomaine']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php




 		// ******     AFFICHAGE DE Agent_Service


 $sqlAgent_Service = "SELECT * FROM Agent_Service WHERE 
 SHORT_SERV LIKE '%$motRecherche%' OR SHORT_SERV ='.$motRecherche.'
 OR LONG_SERV LIKE '%$motRecherche%' OR LONG_SERV ='.$motRecherche.'  
 OR LIBEL_SERV LIKE '%$motRecherche%' OR LIBEL_SERV ='.$motRecherche.'  ";

        $resultatAgent_Service= $mysql->query($sqlAgent_Service);
  if($resultatAgent_Service->num_rows === 0)

{}
else{
   ?>
 <table class="table table-hover">
  <tr>
   <th> Service administratif </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatAgent_Service->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['SHORT_SERV']; ?>  </td>
            
            <td>   <?php  echo $row['LONG_SERV']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php





  		// ******     AFFICHAGE DES FONCTIONS


 $sqlAgent_Fonction = "SELECT * FROM Agent_Fonction WHERE ZZGRADE LIKE '%$motRecherche%' OR ZZGRADE ='.$motRecherche.'
 OR ZZGRADE_TXT	 LIKE '%$motRecherche%' OR ZZGRADE_TXT	 ='.$motRecherche.'   ";

        $resultatAgent_Fonction= $mysql->query($sqlAgent_Fonction);
  if($resultatAgent_Fonction->num_rows === 0)

{}
else{

   ?>
 <table class="table table-hover">
  <tr>
   <th> Fonction </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatAgent_Fonction->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['ZZGRADE']; ?>  </td>
            
            <td>   <?php  echo $row['ZZGRADE_TXT']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php





 		// ******     AFFICHAGE DE Agent_Cpi


 $sqlAgent_Cpi = "SELECT * FROM Agent_Cpi WHERE 
 CPI_SERV LIKE '%$motRecherche%' OR CPI_SERV ='.$motRecherche.'
 OR CPI_SERV_LIBEL LIKE '%$motRecherche%' OR CPI_SERV_LIBEL ='.$motRecherche.'  ";

        $resultatAgent_Cpi= $mysql->query($sqlAgent_Cpi);

   
    if($resultatAgent_Cpi->num_rows === 0)

{}
else{

   ?>
 <table class="table table-hover">
  <tr>
   <th> Code postal interne </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatAgent_Cpi->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['CPI_SERV']; ?>  </td>
            
            <td>   <?php  echo $row['CPI_SERV_LIBEL']; ?>  </td>
            <td>   <?php  echo $row['CPI_SERV_CAMPUS']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php




  		// ******     AFFICHAGE ACADEMIQUE


 $sqlAcademique = "SELECT * FROM Academique WHERE
  ZZACAD_ECRAN LIKE '%$motRecherche%' OR ZZACAD_ECRAN ='.$motRecherche.'
 OR ZZACAD_TXT_AUTO	 LIKE '%$motRecherche%' OR ZZACAD_TXT_AUTO='.$motRecherche.'   ";

        $resultatAcademique= $mysql->query($sqlAcademique);
    if($resultatAcademique->num_rows === 0)

{}
else{
   ?>
 <table class="table table-hover">
  <tr>
   <th> statut (personnel acad&eacute;mique de l'ULB) </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatAcademique->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['ZZACAD_ECRAN']; ?>  </td>
            
            <td>   <?php  echo $row['ZZACAD_TXT_AUTO']; ?>  </td>
          </tr>
<?php 
}
  }
  ?>
</table>
<?php



}

if (
  ($resultatAcademique->num_rows === 0) AND
      ($resultatAgent_Cpi->num_rows === 0) AND
      ($resultatAgent_Fonction->num_rows === 0) AND
    ($resultatAgent_Service->num_rows === 0) AND
    ($resultatBTRTL->num_rows === 0) AND
    ($resultatGrade_representation->num_rows === 0) AND
    ($resultatPATGS->num_rows === 0) AND
    ($resultatTypes_mandats->num_rows === 0)AND
    ($resultatUnit->num_rows === 0)  AND
    ($resultatRecherche->num_rows === 0)
  )
{
  Echo "Aucun r&eacute;sultat trouv&eacute;";
}
else{}


?> 
</div>
</body>
</html>


