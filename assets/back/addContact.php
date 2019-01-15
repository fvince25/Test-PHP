<?php
/**
 * Created by PhpStorm.
 * User: vfrit
 * Date: 14/01/2019
 * Time: 21:15
 */

$ligne = $_POST["chaine"];
$id    = intval($_POST["id"]);

require_once('fonctions.php');


$result = (object) [
    'error' => false,
    'return_Array' => []
];


try {

    $fileName = "../../Donnees/data.txt";
    $fileName_tmp = "../../Donnees/data_tmp.txt";


//    Cas d'une édition
// -------------------------------------------------------------------------

    if ($id) {

        $reading = fopen($fileName, 'r');
        $writing = fopen($fileName_tmp, 'w');

        $ind = 1;

        while (!feof($reading)) {
            $line = fgets($reading);
            if ($id === $ind) {
                $line = $ligne."\n";
            }
            fputs($writing, $line);
            $ind++;
        }
        fclose($reading); fclose($writing);
        rename($fileName_tmp, $fileName);
        $result->return_Array = GetContacts($fileName);

        echo json_encode($result);

    }
    else
    {
//        Cas d'une création'
// -------------------------------------------------------------------------

        if ($file_W = fopen($fileName, "a")) {

            fputs($file_W, $ligne . "\n");

            if (fclose($file_W)) {

                $result->return_Array = GetContacts($fileName);
                echo json_encode($result);

            } else {

                throw new Exception('File_close_error.');

            }

        } else {

            throw new Exception('File_open_error.');

        }
    }



} catch (Exception $e) {

    $result->error = $e;
    echo json_encode($result);
}
