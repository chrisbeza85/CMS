<?php
require 'vendor/autoload.php';

use Milon\Barcode\DNS1D;

$barcodeGenerator = new DNS1D();

try {
    $barcode = $barcodeGenerator->getBarcodePNG('1234567890', 'C128');
    header('Content-Type: image/png');
    echo $barcode;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}