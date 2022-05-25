<?php
require __DIR__ . '/vendor/autoload.php';

$mpdf = new Mpdf();

$data = "";

$data .= "<h1>hello world</h1>";

$mpdf -> WriteHTML($data);

$mpdf -> Output("myfile.pdf", "D");
?>