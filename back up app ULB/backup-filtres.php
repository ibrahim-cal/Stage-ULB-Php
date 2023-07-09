<!DOCTYPE html>
<!-- *** SAHTAN IBRAHIM ***-->
<html>
<head>
  <title> Recherche sur base de filtres </title>
</head>
<body>
	  <p>
  <a href="index-inv.php"> Revenir &agrave;  la page d'accueil</a>
  </p>

<?php 
include("connection-bdd-inv.php");



  // ************ ON RECUPERE TOUS LES WERKS
     $selectWERKS = 'SELECT * FROM  WERKS ';

     $resultatWERKS = $mysql->query($selectWERKS);

     ?>
 	<form method="POST" action="">
     <select name="listeWERKS" id="listeWERKS">  
     	<?php

// ON CREER LA LISTE DEROULANTE QUI VA CONTENIR CHAQUE WERK
while (NULL !== ($row = $resultatWERKS->fetch_array())) {

?>
     <option value="<?php  echo $row['WERKS'];?>">   <?php  echo $row['WERKS']; ?>     </option>
<?php
}
?>
<input type="submit" value="Rechercher" />
</select>
</form>




<?php
  // ************ ON RECUPERE TOUtes LES Categories
     $selectCategories = 'SELECT * FROM  Categories ';

     $resultatCategories = $mysql->query($selectCategories);

     ?>
 	<form method="POST" action="">
     <select name="listeCategories" id="listeCategories">  
     	<?php

// ON CREER LA LISTE DEROULANTE QUI VA CONTENIR CHAQUE categorie
while (NULL !== ($row = $resultatCategories->fetch_array())) {

?>
     <option value="<?php  echo $row['PERSG'];?>">   <?php  echo $row['PERSGLIB']; ?>     </option>
<?php
}
?>
<input type="submit" value="Rechercher" />
</select>
</form>







<?php
  // ************ ON RECUPERE TOUt LES Types mandats
     $selectTypes_mandats = 'SELECT * FROM  Types_mandats ';

     $resultatTypes_mandats = $mysql->query($selectTypes_mandats);

     ?>
 	<form method="POST" action="">
     <select name="listeTypes_mandats" id="listeTypes_mandats">  
     	<?php

// ON CREER LA LISTE DEROULANTE QUI VA CONTENIR CHAQUE type mandat
while (NULL !== ($row = $resultatTypes_mandats->fetch_array())) {

?>
     <option value="<?php  echo $row['ANSVH'];?>">   <?php  echo $row['ansvh_lib']; ?>     </option>
<?php
}
?>
<input type="submit" value="Rechercher" />
</select>
</form>






<?php
include("connection-bdd-inv.php");


if(isset($_POST["listeWERKS"]))
{

$var= $_POST['listeWERKS'];
 $selectMandat = "SELECT * FROM Mandats WHERE Fk_WERKS='" .$var ."' ";

  $resultatMandat = $mysql->query($selectMandat);
  echo '<strong>'.' </br>'. "Numeros de mandats correspondants aux crit&egrave;res :".'</strong>'.  ' </br>';
  echo '</br>';

     while (NULL !== ($row = $resultatMandat->fetch_array())) {


     echo $row['PERNR']. '<br/>'; 

     }
     
 }

?>



</body>
</html>