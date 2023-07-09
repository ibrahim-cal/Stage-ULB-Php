<!DOCTYPE html>
<!-- *** SAHTAN IBRAHIM ***-->
<html>
<head>
  <title> Recherche sur base de filtres </title>
</head>
<body>

<div class="main">







<?php
include "layout.html";
include("connection-bdd-inv.php");


// SI LES TROIS SELECTIONS SONT ACTIVEES
if (   !empty($_POST["listeWERKS"])
    AND      !empty($_POST["listeCategories"])
        AND      !empty($_POST["listeTypes_mandats"])
){ 


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

  echo '<strong>'.' </br>'. "mandats correspondants aux crit&egrave;res : ".
  $werks . " - " .$categories .  " - " .$typesMandats 
  .'</strong>'.  ' </br>';
  echo '</br>';


if($row_cnt ==0 )
{
 echo "Aucun mandat correspondant ". ' </br>';
 echo '</br>';
}
else{
  echo "Nombre de mandats correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';

?>
 <table class="table table-hover">
  <tr>
   <th>  Matricule   </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatMandat->fetch_array())) 
       {  
?>
            <tr>
            <td>   <?php  echo $row['PERNR']; ?>  </td>
            </tr>
<?php
       }
  ?>
</table>
<?php
     }
   }








// SI DOMAINE ET CATEGORIE SONT SELECTIONEES 
 
else if (   !empty($_POST["listeWERKS"])
    AND     !empty($_POST["listeCategories"])
      AND     empty($_POST["listeTypes_mandats"])

){ 


  // ON RECUPERE LES TROIS SELECTIONS DES LISTES
$werks= $_POST['listeWERKS'];
$categories= $_POST['listeCategories'];

    
    // REQUETE POUR RECUPERER LES MANDATS SELON LES CRITERES CHOISIS EN LISTES
 $selectMandat = "SELECT * FROM Mandats  WHERE
 Fk_PERSG='" .$categories ."' 
    AND Fk_WERKS='" .$werks ."' 
  ";
 
  $resultatMandat = $mysql->query($selectMandat);

  $row_cnt = mysqli_num_rows($resultatMandat);

  echo '<strong>'.' </br>'. "mandats correspondants aux crit&egrave;res : ".
  $werks . " - " .$categories .  '</strong>'.  ' </br>';
  echo '</br>';

if($row_cnt ==0 )
{
 echo "Aucun mandat correspondant ". ' </br>';
 echo '</br>';
}
else{
  echo "Nombre de mandats correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';

?>
 <table class="table table-hover">
  <tr>
   <th>  Matricule   </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatMandat->fetch_array())) 
       {  
?>
            <tr>
            <td>   <?php  echo $row['PERNR']; ?>  </td>
            </tr>
<?php
       }
  ?>
</table>
<?php
     }
   }
 






// SI DOMAINE ET TYPE SONT SELECTIONEES 
 
else if (   !empty($_POST["listeWERKS"])
    AND     empty($_POST["listeCategories"])
      AND     !empty($_POST["listeTypes_mandats"])

){ 


  // ON RECUPERE LES TROIS SELECTIONS DES LISTES
$werks= $_POST['listeWERKS'];
$typesMandats= $_POST['listeTypes_mandats'];
    
    // REQUETE POUR RECUPERER LES MANDATS SELON LES CRITERES CHOISIS EN LISTES
 $selectMandat = "SELECT * FROM Mandats  WHERE
 Fk_ANSVH='" .$typesMandats ."'
    AND Fk_WERKS='" .$werks ."' 
  ";
 
  $resultatMandat = $mysql->query($selectMandat);

  $row_cnt = mysqli_num_rows($resultatMandat);

  echo '<strong>'.' </br>'. "mandats correspondants aux crit&egrave;res : ".
  $werks .  " - " .$typesMandats 
  .'</strong>'.  ' </br>';
  echo '</br>';

if($row_cnt ==0 )
{
 echo "Aucun mandat correspondant ". ' </br>';
 echo '</br>';
}
else{
  echo "Nombre de mandats correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';

?>
 <table class="table table-hover">
  <tr>
   <th>  Matricule   </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatMandat->fetch_array())) 
       {  
?>
            <tr>
            <td>   <?php  echo $row['PERNR']; ?>  </td>
            </tr>
<?php
       }
  ?>
</table>
<?php
     }
   }








// CATEGORIE ET TYPE 
if (   empty($_POST["listeWERKS"])
    AND      !empty($_POST["listeCategories"])
        AND      !empty($_POST["listeTypes_mandats"])
){ 


  // ON RECUPERE LES DEUX SELECTIONS DES LISTES

$categories= $_POST['listeCategories'];
$typesMandats= $_POST['listeTypes_mandats'];
    
    // REQUETE POUR RECUPERER LES MANDATS SELON LES CRITERES CHOISIS EN LISTES
 $selectMandat = "SELECT * FROM Mandats  WHERE
 Fk_ANSVH='" .$typesMandats ."'
    AND  Fk_PERSG='" .$categories ."' 
  ";
 
  $resultatMandat = $mysql->query($selectMandat);

  $row_cnt = mysqli_num_rows($resultatMandat);

  echo '<strong>'.' </br>'. "mandats correspondants aux crit&egrave;res : "
  .$categories .  " - " .$typesMandats 
  .'</strong>'.  ' </br>';
  echo '</br>';

if($row_cnt ==0 )
{
 echo "Aucun mandat correspondant ". ' </br>';
 echo '</br>';
}
else{
  echo "Nombre de mandats correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';

?>
 <table class="table table-hover">
  <tr>
   <th>  Matricule   </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatMandat->fetch_array())) 
       {  
?>
            <tr>
            <td>   <?php  echo $row['PERNR']; ?>  </td>
            </tr>
<?php
       }
  ?>
</table>
<?php
     }
}








// JUSTE TYPE MANDAT ACTIVE
if (   empty($_POST["listeWERKS"])
    AND      empty($_POST["listeCategories"])
        AND      !empty($_POST["listeTypes_mandats"])
){ 


  // ON RECUPERE LA SELECTION TYPE MANDAT

$typesMandats= $_POST['listeTypes_mandats'];
    
    // REQUETE POUR RECUPERER LES MANDATS SELON LE TYPE CHOISIS EN LISTES
 $selectMandat = "SELECT * FROM Mandats  WHERE
 Fk_ANSVH='" .$typesMandats ."'
  ";
 
  $resultatMandat = $mysql->query($selectMandat);

  $row_cnt = mysqli_num_rows($resultatMandat);

  echo '<strong>'.' </br>'. "mandats correspondants au crit&egrave;re : "
   .$typesMandats 
  .'</strong>'.  ' </br>';
  echo '</br>';

if($row_cnt ==0 )
{
 echo "Aucun mandat correspondant ". ' </br>';
 echo '</br>';
}
else{
  echo "Nombre de mandats correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';
?>
 <table class="table table-hover">
  <tr>
   <th>  Matricule   </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatMandat->fetch_array())) 
       {  
?>
            <tr>
            <td>   <?php  echo $row['PERNR']; ?>  </td>
            </tr>
<?php
       }
  ?>
</table>
<?php
     }
   }







// SI CATEGORIE EST SELECTIONNE TOUT SEUL
if (   empty($_POST["listeWERKS"])
    AND      !empty($_POST["listeCategories"])
        AND      empty($_POST["listeTypes_mandats"])
){ 


  // ON RECUPERE LA CATEGORIE SELECTIONNE
$categorie= $_POST['listeCategories'];

    
    // REQUETE POUR RECUPERER LES MANDATS SELON LA CATEGORIE
 $selectMandat = "SELECT * FROM Mandats  WHERE
 Fk_PERSG='" .$categorie ."' 
  ";
 
  $resultatMandat = $mysql->query($selectMandat);

  $row_cnt = mysqli_num_rows($resultatMandat);

  echo '<strong>'.' </br>'. "mandats correspondants au crit&egrave;re : ".
  $categorie . '</strong>'.  ' </br>';
  echo '</br>';

if($row_cnt ==0 )
{
 echo "Aucun mandat correspondant ". ' </br>';
 echo '</br>';
}
else{
  echo "Nombre de mandats correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';
?>
 <table class="table table-hover">
  <tr>
   <th>  Matricule   </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatMandat->fetch_array())) 
       {  
?>
            <tr>
            <td>   <?php  echo $row['PERNR']; ?>  </td>
            </tr>
<?php
       }
  ?>
</table>
<?php
     }
   }









// SI WERKS EST SELECTIONNE TOUT SEUL
if (   !empty($_POST["listeWERKS"])
    AND      empty($_POST["listeCategories"])
        AND      empty($_POST["listeTypes_mandats"])
){ 


  // ON RECUPERE LE DOMAINE SELECTIONNE
$werks= $_POST['listeWERKS'];

    
    // REQUETE POUR RECUPERER LES MANDATS SELON LE DOMAINE
 $selectMandat = "SELECT * FROM Mandats  WHERE
 Fk_WERKS='" .$werks ."' 
  ";
 
  $resultatMandat = $mysql->query($selectMandat);

  $row_cnt = mysqli_num_rows($resultatMandat);

  echo '<strong>'.' </br>'. "mandats correspondants au crit&egrave;re : ".
  $werks . '</strong>'.  ' </br>';
  echo '</br>';

if($row_cnt ==0 )
{
 echo "Aucun mandat correspondant ". ' </br>';
 echo '</br>';
}
else{
  echo "Nombre de mandats correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';
?>
 <table class="table table-hover">
  <tr>
   <th>  Matricule   </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatMandat->fetch_array())) 
       {  
?>
            <tr>
            <td>   <?php  echo $row['PERNR']; ?>  </td>
            </tr>
<?php
       }
  ?>
</table>
<?php
     }
}
?>





</div>

</body>
</html>