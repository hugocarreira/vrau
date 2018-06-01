<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$url = urldecode("https://transactionv2.mundipaggone.com/Boleto/ViewBoleto.aspx?76d89acb-5e43-4fcb-8ca4-182f9832a23b");

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$html = curl_exec($ch);
curl_close($ch);

$mpdf->WriteHTML($html);
$mpdf->Output();
ob_clean();