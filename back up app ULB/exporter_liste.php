<!DOCTYPE html>
<!-- *** SAHTAN IBRAHIM ***-->
<html>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">



<head>
  <title> Exporter tables en fichier Excel </title>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>


  <style>
body {font-family:  Helvetica, sans-serif;
font-size: 10pt;
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



<h5>Vous pouvez t&eacute;l&eacute;charger un fichier Excel contenant les donn&eacute;es des tables</h5>
</br>


Vous pouvez t&eacute;l&eacute;charger le dictionnaire de donn&eacute;es des tables : 

   <form action="export_PDF.php" class="PDF_DD" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm"  name='PDF_DD' value='PDF Dict. donn&eacute;es '>
          </form>
</br>








 <table class="table table-hover">
  <tr>
   <th> Tables </th>
    <th> Exporter les donn&eacute;es en fichier Excel </th>
   

    <tr>
     <td>    Academique  </td>   
     <td> 

      <form action="export_Academique.php" class="exportAcad" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm"  name='ExportAcad' value='Exporter'>
          </form>


      </td> 
	</tr>


    <tr> <td>  Agent_Cpi    </td>  
     <td> 


        <form action="export_Agent_Cpi.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm"  name='ExportCpi' value='Exporter'>
          </form>

      </td> 
	</tr>


    <tr> <td>  Agent_Fonction    </td>  
     <td> 
          <form action="export_Agent_Fonction.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm"  name='ExportFonction' value='Exporter'>
          </form>
      </td> 
	</tr>


    <tr> <td>   Agent_Service   </td>  
     <td> 
         <form action="export_Agent_Service.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm"  name='ExportService' value='Exporter'>
          </form>
      </td> 
	</tr>




    <tr> <td>   Base_Agent_Adresse  </td>  
     <td> 
              <form action="export_Base_Agent_Adresse.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportBaseAgent' value='Exporter'>
          </form>
      </td> 
	</tr>




    <tr> <td>   BTRTL   </td>  
     <td> 
    <form action="export_BTRTL.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportBTRTL' value='Exporter'>
          </form>
      </td> 
	</tr>


    <tr> <td>    Categories  </td>  
     <td> 
          <form action="export_Categories.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportCategories' value='Exporter'>
          </form>
      </td> 
	</tr>


    <tr> <td>    Grade_representation  </td>  
     <td> 
          <form action="export_Grade_representation.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportGrade_representation' value='Exporter'>
          </form>
      </td> 
	</tr>



    <tr> <td>    Localite </td>  
     <td> 
            <form action="export_Localite.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportLocalite' value='Exporter'>
          </form>
      </td> 
  </tr>


    


   <tr> <td>   Mandats  </td>  
     <td> 


         <form action="export_Mandats.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportMandats' value='Exporter'>
          </form>
      </td> 
	</tr>





    <tr> <td>  PATGS    </td>  
     <td> 

            <form action="export_PATGS.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportPATGS' value='Exporter'>
          </form>

      </td> 
	</tr>


    <tr> <td>  Types_mandats     </td>  
     <td> 
          <form action="export_Types_mandats.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportTypes_mandats' value='Exporter'>
          </form>
      </td> 
	</tr>


    <tr> <td>  Unit     </td>  
     <td> 
          <form action="export_Unit.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportUnit' value='Exporter'>
          </form>
      </td> 
	</tr>


      <tr> <td>  WERKS     </td>  
       <td> 
           <form action="export_WERKS.php" method="post">
         <input type='submit' class="btn btn-outline-secondary btn-sm" name='ExportWERKS' value='Exporter'>
          </form>
        </td> 
	</tr>



</table>



</div>


</body>
</html>