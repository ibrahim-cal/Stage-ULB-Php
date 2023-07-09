<!DOCTYPE html>
<!-- *** SAHTAN IBRAHIM ***-->
<html>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">



<head>
  <title> Import donn&eacute;es via fichiers Csv </title>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>


  <style>
body {font-family:  Helvetica, sans-serif;
font-size: 10pt;
}


.bouttonRechercher
{
 background-color: #054886;
color: white;
font-family: Helvetica;
border: 1px solid #040404;
margin : 1px;
}

.bouttonUniteFiltre
{
   background-color: #054886;
color: white;
font-family: Helvetica;
border: 1px solid #040404;
margin : 1px;
}



 button {
  padding: 5px 10px;
  border: 1px solid #cccc;
  cursor: pointer;
}



.matricule_motCle
{
  display: inline-block;
  width: 100px;


}

.LabelsMatriculeMotCle
{

display: inline-block;
float : left;
}


form {
 display: inline-block;
 padding : 3px;
 margin : 2px;
}


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





</style>



<div class="sidenav">
  <a href="index-inv.php"> Accueil </a>
  <a href="/chercheur"> A FAIRE </a>
  <a href="/mandats/form"> A FAIRE </a>
  <a href="/patgsListe"> A FAIRE </a>
  <a href="exporter_liste.php"> Exporter </a>
</div>



<div class="main">



<!-- FORMULAIRE RECHHERCHE PAR MATRICULE ********************* -->

<form matricule_motCle  target="_blank" action="Chercheur_infos.php" method="post">
<label class=LabelsMatriculeMotCle> Veuillez entrer le num&eacute;ro de matricule : </label>
<input type="number" class="matricule_motCle" name="recherche" >
  <button type="submit"  class="fa fa-search" value="Rechercher"></button> 
</form>





</br>


<!-- FORMULAIRE RECHHERCHE PAR MOT CLE ********************* -->

<form target="_blank" action="Moteur_Recherche.php" method="post">
  <label class=LabelsMatriculeMotCle> Veuillez saisir un mot-cl&eacute; :  </label>

<input type="text"     class="matricule_motCle" name="recherche" >
<button type="submit" name="submit" class="fa fa-search" value="Rechercher"></button> 
</form>



</br>






<!-- LISTE DEROULANTE -   TROUVER CHERCHEURS PAR UNITE    ********************* -->

<?php 
include("connection-bdd-inv.php");


  // ************ ON RECUPERE TOUS LES UNITES
     $selectUnit = 'SELECT * FROM  Unit ';

     $resultatUnit= $mysql->query($selectUnit);

     ?>
  <form target="_blank" method="POST" action="Filtres_RechercheChercheur.php">
       <libellé> Chercheurs par unit&eacute; : </libellé>
     <select name="listeUnit" id="listeUnit">
     <option value="" selected></option>  
      <?php

// ON CREER LA LISTE DEROULANTE QUI VA CONTENIR CHAQUE Unit
while (NULL !== ($row = $resultatUnit->fetch_array())) {

?>
     <option value="<?php  echo $row['IDUNIT'];?>">   <?php  echo $row['IDUNIT_TXT']; ?>     </option>
<?php
}
?>
<input type="submit" value="Rechercher"  class=bouttonUniteFiltre />
</select>
</form>




</br>



      <!--  *****************************     LISTE DEROULANTE DE 3 LISTE 
       DOMAINE     -      CATEGORIES -          TYPES MANDAT ****     -->

<?php 
include("connection-bdd-inv.php");

  // ************ ON RECUPERE TOUS LES WERKS
     $selectWERKS = 'SELECT * FROM  WERKS ';

     $resultatWERKS = $mysql->query($selectWERKS);

     ?>

  <form target="_blank" method="POST" action="Filtres_RechercheMandat.php">
        Rechercher un mandat sur base d'un ou plusieurs crit&egrave;res :
   </br>
     <libellé> Domaine </libellé>
  
     <select name="listeWERKS" id="listeWERKS">
</choix>
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

   <libellé> Cat&eacute;gorie </libellé> 
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
   
   <libellé> Types </libellé> 

     <select name="listeTypes_mandats" id="listeTypes_mandats">  
       <libellé> Types  </libellé>  
      <option value="" selected></option>
      <?php

// ON CREER LA LISTE DEROULANTE QUI VA CONTENIR CHAQUE type mandat
while (NULL !== ($row = $resultatTypes_mandats->fetch_array())) {

?>
     <option value="<?php  echo $row['ANSVH'];?>">   <?php  echo $row['ansvh_lib']; ?>     </option>
<?php
}
?>
<input class=bouttonUniteFiltre type="submit" value="Rechercher" />
</select>
</form>









<hr>

<h3> Veuillez cliquer sur "s&eacute;lectionner fichiers" (format CSV) pour importer dans la table 
correspondante </h3>






  <form enctype="multipart/form-data" action="import_academique.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Academique</strong> </label>
                 <br/>
         <?php
         include("connection-bdd-inv.php");

       $Academique = "SELECT * FROM Academique";
       $AcademiqueRes = mysqli_query($mysql, $Academique);
        $NombreAcademique = $AcademiqueRes->num_rows;

         echo '<strong>' . $NombreAcademique    .  " / 2"  . '</strong>' . '<br />';
          ?>
            <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>

                <input type='submit' class=bouttonRechercher   name='Academique' value='Remplir '>
               <br />
           </div>
            </form>







       <form enctype="multipart/form-data" action="import_Agent_Cpi.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Agent_Cpi</strong> </label>
                 <br/>
                    <?php
         include("connection-bdd-inv.php");

       $Agent_Cpi = "SELECT * FROM Agent_Cpi";
       $Agent_CpiRes = mysqli_query($mysql, $Agent_Cpi);
        $NombreAgent_Cpi = $Agent_CpiRes->num_rows;
         echo '<strong>' . $NombreAgent_Cpi     .  " / 293"  . '</strong>' . '<br />';
          ?>
    
             <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>
                  <input type='submit'  class=bouttonRechercher  name='Agent_Cpi' value='Remplir '>
               <br/>
           </div>
         </form>




     <form enctype="multipart/form-data" action="import_agent_fonction.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Agent_Fonction</strong> </label>
                 <br/>

             
         <?php
         include("connection-bdd-inv.php");

       $Agent_Fonction = "SELECT * FROM Agent_Fonction";
       $Agent_FonctionRes = mysqli_query($mysql, $Agent_Fonction);
        $NombreAgent_Fonction = $Agent_FonctionRes->num_rows;
         echo '<strong>' . $NombreAgent_Fonction    .  " / 359"  . '</strong>' . '<br />';
          ?>
                      <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>
                  <input type='submit' class=bouttonRechercher   name='Agent_Fonction' value='Remplir '>
               <br/>
           </div>
       </form>









       <form enctype="multipart/form-data" action="import_Agent_Service.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Agent_Service</strong> </label>
                 <br/>
                <?php
         include("connection-bdd-inv.php");

       $Agent_Service = "SELECT * FROM Agent_Service";
       $Agent_ServiceRes = mysqli_query($mysql, $Agent_Service);
        $NombreAgent_Service = $Agent_ServiceRes->num_rows;
         echo '<strong>' . $NombreAgent_Service    .  " / 726"  . '</strong>' . '<br />';
          ?>
              <input type="file"   name="file[]" id="file" accept=".csv" multiple>
               <br/>
                  <input type='submit' class=bouttonRechercher   name='Agent_Service' value='Remplir '>
               <br/>
           </div>
       </form>

   






       <form enctype="multipart/form-data" action="import_Base_Agent_Adresse.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Base_Agent_Adresse </strong> </label>
                 <br/>
         <?php
         include("connection-bdd-inv.php");

       $Base_Agent_Adresse = "SELECT * FROM Base_Agent_Adresse";
       $Base_Agent_Adresseres = mysqli_query($mysql, $Base_Agent_Adresse);
        $NombreBase_Agent_Adresse = $Base_Agent_Adresseres->num_rows;
         $nombre_format_Base_Agent = number_format($NombreBase_Agent_Adresse, 0, ' ', ' ');
         echo '<strong>' . $nombre_format_Base_Agent    .  " / 30 836"  . '</strong>' . '<br />';
          ?>

              <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>

                <input type='submit' class=bouttonRechercher name='Base_Agent_Adresse' value='Remplir '>
               <br/>
           </div>
       </form>

    







       <form enctype="multipart/form-data" action="import_BTRTL.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> BTRTL  </strong> </label>
                 <br/>

               
                         <?php
         include("connection-bdd-inv.php");

       $BTRTL = "SELECT * FROM BTRTL";
       $BTRTLres = mysqli_query($mysql, $BTRTL);
        $NombreBTRTL = $BTRTLres->num_rows;
         echo '<strong>' . $NombreBTRTL    .  " / 26"  . '</strong>' . '<br />';
          ?>
    
              <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>
                <input type='submit' class=bouttonRechercher   name='BTRTL' value='Remplir '>
               <br/>
           </div>
       </form>

     




       <form enctype="multipart/form-data" action="import_categories.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Categories</strong> </label>
                 <br/>

                                                                 <?php
         include("connection-bdd-inv.php");

       $Categories = "SELECT * FROM Categories";
       $CategoriesRes = mysqli_query($mysql, $Categories);
        $NombreCategories = $CategoriesRes->num_rows;
         echo '<strong>' . $NombreCategories    .  " / 9"  . '</strong>' . '<br />';
          ?>

                   <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>         
        
                  <input type='submit' class=bouttonRechercher  name='Categories' value='Remplir '>
               <br />
           </div>
       </form>

  







       <form enctype="multipart/form-data" action="import_grade_representation.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Grade_representation</strong> </label>
                 <br/>

                 <?php
         include("connection-bdd-inv.php");
          $Grade_representation = "SELECT * FROM Grade_representation";
       $Grade_representationres = mysqli_query($mysql, $Grade_representation);
        $NombreGrade_representation = $Grade_representationres->num_rows;
         echo '<strong>' . $NombreGrade_representation     .  " / 78"    . '</strong>' . '<br />';
        
          ?>
                    <input type="file" name="file[]" id="file" accept=".csv" multiple>
                 <br/>
        
                  <input type='submit'  class=bouttonRechercher   name='Grade_representation' value='Remplir '>
               <br/>
           </div>
       </form>

   







       <form enctype="multipart/form-data" action="import_localite.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br /> <br /> 
                <strong>Localite</strong> </label>
                 <br/>
                                            <?php
         include("connection-bdd-inv.php");

       $Localite = "SELECT * FROM Localite";
       $LocaliteRes = mysqli_query($mysql, $Localite);
        $NombreLocalite = $LocaliteRes->num_rows;
        $nombre_format_Localite = number_format($NombreLocalite, 0, ' ', ' ');
         echo '<strong>' . $nombre_format_Localite    .  " / 2 825"  . '</strong>' . '<br />';
          ?>
                 <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>
          
                <input type='submit' class=bouttonRechercher   name='Localite' value='Remplir '>
               <br />
           </div>
       </form>






     <form enctype="multipart/form-data" action="import_Mandats.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Mandats</strong> </label>
                 <br/>
            
             <?php
       include("connection-bdd-inv.php");
       $Mandats = "SELECT * FROM Mandats";
       $MandatsRes = mysqli_query($mysql, $Mandats);
        $NombreMandats = $MandatsRes->num_rows;
         $nombre_format_Mandats = number_format($NombreMandats, 0, ' ', ' ');
         echo '<strong>' . $nombre_format_Mandats    .  " / 75 116"   . '</strong>' . '<br />';
         ?>

              <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>       

                <input type='submit' class=bouttonRechercher  name='Mandats' value='Remplir '>

               <br/>
           </div>
       </form>








       <form enctype="multipart/form-data" action="import_PATGS.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> PATGS</strong> </label>
                 <br/>


                  <?php
          include("connection-bdd-inv.php");
          $PATGS = "SELECT * FROM PATGS";
       $PATGSres = mysqli_query($mysql, $PATGS);
        $NombrePATGS = $PATGSres->num_rows;
         echo '<strong>' . $NombrePATGS     .  " / 60"    . '</strong>' . '<br />';
         ?>

                     <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>
                
                  <input type='submit' class=bouttonRechercher   name='PATGS' value='Remplir '>
               <br />
           </div>
       </form>






            <form enctype="multipart/form-data" action="import_Types_mandats.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> Types_mandats </strong> </label>
                 <br/>

                    <?php
 
       include("connection-bdd-inv.php");
       $typesMandats = "SELECT * FROM Types_mandats";
       $resultat = mysqli_query($mysql, $typesMandats);
        $NombreMandats = $resultat->num_rows;
         echo '<strong>' . $NombreMandats    .  " / 14"   . '</strong>' . '<br />';
         ?>
               <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>
        

                <input type='submit' class=bouttonRechercher  name='Types_mandats' value='Remplir '>

               <br/>
           </div>
       </form>








       <form enctype="multipart/form-data" action="import_unit.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
               <strong> Unit</strong> </label>
                <br/>
                          <?php
 
       include("connection-bdd-inv.php");
       $Unit = "SELECT * FROM Unit";
       $UnitRes = mysqli_query($mysql, $Unit);
        $NombreUnit = $UnitRes->num_rows;
         echo '<strong>' . $NombreUnit    .  " / 32"   . '</strong>' . '<br />';
         ?>

               <input type="file" name="file[]" id="file" accept=".csv" multiple>
               <br/>
          
                  <input type='submit' class=bouttonRechercher   name='Unit' value='Remplir '>
               <br/>
           </div>
       </form>








       <form enctype="multipart/form-data" action="import_WERKS.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label"><br/> <br/> 
                <strong> WERKS</strong> </label>
                 <br/>

             
                <?php
         include("connection-bdd-inv.php");

       $WERKS = "SELECT * FROM WERKS";
       $WERKSRes = mysqli_query($mysql, $WERKS);
        $NombreWERKS = $WERKSRes->num_rows;
         echo '<strong>' . $NombreWERKS    .  " / 8"  . '</strong>' . '<br />';
          ?>
             <input type="file" name="file[]" id="file" accept=".csv" multiple>
             
              <br/>
        
                  <input type='submit'  class=bouttonRechercher   name='WERKS' value='Remplir '>
               <br/>
           </div>
       </form>

  




</div>

</body>
</html>