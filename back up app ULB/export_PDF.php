<?php
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 

   if (isset($_POST["PDF_DD"])) {

// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 

 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();



// Load content from html file 
$html = file_get_contents("dictionnaireDonnees.html"); 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 ob_end_clean();
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("dictionnaire_Donnees", array("Attachment" => 1));
}
?>