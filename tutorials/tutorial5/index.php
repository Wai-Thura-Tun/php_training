<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpWord\IOFactory as PHPWordIOFact ;

/**
 * Summary of readFiles
 * @param mixed $type
 * @param mixed $fileName
 * @return bool|null|string
 */
function readFiles($type = "txt", $fileName)
{
    $fileExten = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if ($fileExten == "txt") {
        $fileResource = fopen($fileName, "r");
        $fileContent = fread($fileResource, filesize($fileName));
        fclose($fileResource);
        return $fileContent ?? null;
    } else if ($fileExten == "doc") {
        $phpWord = PHPWordIOFact::load($fileName, 'MsDoc');
        $word = PHPWordIOFact::createWriter($phpWord, "HTML")->save("php://output");
    } else {
        $reader = IOFactory::createReader(ucfirst(strtolower($type)));
        $spreadSheet = $reader->load($fileName);
        $write = IOFactory::createWriter($spreadSheet, 'Html');
        $message = $write->save("php://output");
    }
}
echo "<h1>CSV File Content is </h1><br>";
echo readFiles("CSV", "files/test4.csv");
echo "<h1>Excel File Content is </h1><br>";
echo readFiles("XLS", "files/test1.xls");
echo "<h1>Text File Content is</h1>" . readFiles("TXT", "files/test2.txt") . "<br>";
echo "<h1>Doc File Content is </h1><br>";
echo readFiles("TXT", "files/test3.doc");
