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
if(isset($_POST["listeUnit"]))
{


  // ON RECUPERE LES TROIS SELECTIONS DES LISTES
$unite= $_POST['listeUnit'];
    

    // REQUETE POUR RECUPERER lES CHERCHEURS SUR BASE DE LA SELECTION
 $selectChercheur = "SELECT * FROM Base_Agent_Adresse  WHERE
 Fk_Unit='" .$unite ."'
 
  ";
 
  $resultatChercheur = $mysql->query($selectChercheur);


  $row_cnt = mysqli_num_rows($resultatChercheur);


 if($row_cnt==0){
  echo '<strong>'.' </br>'. "Aucun chercheur correspondants &agrave; l'unit&eacute; : ".
  $unite 
  .'</strong>'.  ' </br>';
  echo '</br>';

 }
    else{

  echo '<strong>'.' </br>'. "Chercheurs correspondants  &agrave; l'unit&eacute; : ".
  $unite 
  .'</strong>'.  ' </br>';
  echo '</br>';

echo "Nombre de chercheurs correspondant : " .$row_cnt.  ' </br>';
 echo '</br>';
    }
  if($row_cnt==0){}
    else{

   ?>
 <table class="table table-hover">
  <tr>
   <th> Num matricule  </th>
   <th> Nom  </th>
   <th> Pr&eacute;nom </th>
  </tr>
  <?php
       while (NULL !== ($row = $resultatChercheur->fetch_array())) {
?>
            <tr>
            <td>   <?php  echo $row['PERSONID_EXT']; ?>  </td>
            
            <td>   <?php  echo $row['Nom']; ?>  </td>
            <td>   <?php  echo $row['Prenom']; ?>  </td>
          </tr>
<?php 
}
}
  }
  ?>
</table>


</div>
</body>
</html>