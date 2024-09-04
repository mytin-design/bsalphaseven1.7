<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;


// $html = "<h1 style='color: blue;'>My PDF</h1>";
// $html .= "<p> This is a PDF.</p>";
// $html .= "<img width='50' src='./images/cpslogomain.png'>";

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);


$dompdf = new Dompdf($options);

$dompdf->setPaper("A4", "Landscape");
$html = file_get_contents("grade_one_marks.html");
$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("examresults.html");


//to generate pdf

$dompdf->render();

$dompdf->addInfo("Title", "Results PDF");
$dompdf->addInfo("Author", "CPS-Nyeri");


//to send to browser

$dompdf->stream("results.pdf", ["Attachment" => 0]);

?> 



