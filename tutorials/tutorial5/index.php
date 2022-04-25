<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($fileName, 'MsDoc');
        $word = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "HTML")->save("php://output");
    } else {
        $reader = IOFactory::createReader(ucfirst(strtolower($type)));
        $spreadSheet = $reader->load($fileName);
        $write = IOFactory::createWriter($spreadSheet, 'Html');
        $message = $write->save("php://output");
    }
}
echo readFiles("CSV", "files/test4.csv");
echo readFiles("XLS", "files/test1.xls");
echo "<h1>Text File Content is</h1>" . readFiles("TXT", "files/test2.txt") . "<br>";
echo "<br>";
echo readFiles("TXT", "files/test3.doc");
