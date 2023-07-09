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
     <option value="" selected></option>  
     	<?php

// ON CREER LA LISTE DEROULANTE QUI VA CONTENIR CHAQUE WERK
while (NULL !== ($row = $resultatWERKS->fetch_array())) {

?>
     <option value="<?php  echo $row['WERKS'];?>">   <?php  echo $row['WERKS']; ?>     </option>
<?php
}
?>

</select>





<?php
  // ************ ON RECUPERE TOUtes LES Categories
     $selectCategories = 'SELECT * FROM  Categories ';

     $resultatCategories = $mysql->query($selectCategories);

     ?>

     <select name="listeCategories" id="listeCategories">  
      <option value="" selected></option>
     	<?php

// ON CREER LA LISTE DEROULANTE QUI VA CONTENIR CHAQUE categorie
while (NULL !== ($row = $resultatCategories->fetch_array())) {

?>
     <option value="<?php  echo $row['PERSG'];?>">   <?php  echo $row['PERSGLIB']; ?>     </option>
<?php
}
?>

</select>








<?php
  // ************ ON RECUPERE TOUt LES Types mandats
     $selectTypes_mandats = 'SELECT * FROM  Types_mandats ';

     $resultatTypes_mandats = $mysql->query($selectTypes_mandats);

     ?>

     <select name="listeTypes_mandats" id="listeTypes_mandats">  
      <option value="" selected></option>
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


// SI LES TROIS SELECTIONS SONT ACTIVEES
if(isset($_POST["listeWERKS"]) AND isset($_POST["listeCategories"]) 
  AND isset($_POST["listeTypes_mandats"]))
{


  // ON RECUPERE LES TROIS SELECTIONS DES LISTES
$werks= $_POST['listeWERKS'];
$categories= $_POST['listeCategories'];
$typesMandats= $_POST['listeTypes_mandats'];
    
    // REQUETE POUR RECUPERER LES MANDATS SELON LES CRITERES CHOISIS EN LISTES
 $selectMandat = "SELECT * FROM Mandats  WHERE
 Fk_ANSVH='" .$typesMandats ."'
    AND  Fk_PERSG='" .$categories ."' 
    AND Fk_WERKS='" .$werks ."' 
  ";
 
  $resultatMandat = $mysql->query($selectMandat);


  $row_cnt = mysqli_num_rows($resultatMandat);



  echo '<strong>'.' </br>'. "Numeros de mandats correspondants aux crit&egrave;res : ".
  $werks . " - " .$categories .  " - " .$typesMandats 
  .'</strong>'.  ' </br>';
  echo '</br>';

echo "Nombre de mandats correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';
    


     while (NULL !== ($row = $resultatMandat->fetch_array())) {


     echo $row['PERNR']. '<br/>'; 

     }
     
 }

















?>







</body>
</html>