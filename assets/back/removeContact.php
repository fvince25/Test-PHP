<?php
/**
 * Created by PhpStorm.
 * User: vfrit
 * Date: 14/01/2019
 * Time: 21:15
 */

$id    = intval($_POST["id"]);

require_once('fonctions.php');

$result = (object) [
    'error' => false,
    'return_Array' => []
];


try {

    $fileName = "../../Donnees/data.txt";
    $fileName_tmp = "../../Donnees/data_tmp.txt";

    if ($id) {

        $reading = fopen($fileName, 'r');
        $writing = fopen($fileName_tmp, 'w');

        $ind = 1;

        while (!feof($reading)) {
            $line = fgets($reading);
            if ($id !== $ind) {
                fputs($writing, $line);
            }
            $ind++;
        }

        fclose($reading);
        fclose($writing);

        rename($fileName_tmp, $fileName);
        $result->return_Array = GetContacts($fileName);

        echo json_encode($result);

    }

} catch (Exception $e) {

    $result->error = $e;
    echo json_encode($result);
}
