<?php
require "vendor/autoload.php";
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh as Error;
use Endroid\QrCode\Writer\PngWriter as Write;
if (isset($_GET['text'])) {
  $data = $_GET['text'];
  $result = Builder::create()
    ->writer(new Write())
    ->writerOptions([])
    ->data($data)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new Error())
    ->build();
    echo $result->getString();
}
