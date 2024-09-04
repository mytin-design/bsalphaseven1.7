<?php

require_once('./dompdf/autoload.inc.php');

use Dompdf\Dompdf; 
$dompdf = new Dompdf();


include 'gradeninem.php';

$html;
$htmlRow;
$htmlMeanRow;
$htmlFooter;


$dompdf->loadHtml($html);
$dompdf->loadHtml($htmlRow);
$dompdf->loadHtml($htmlMeanRow);
$dompdf->loadHtml($htmlFooter);


$dompdf->setPaper('A4', 'potrait');

$dompdf->render();

$dompdf->stream('Grade Nine Marks Report.pdf', ['Attachment' => false]);

?>