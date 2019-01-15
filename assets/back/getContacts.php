<?php
/**
 * Created by PhpStorm.
 * User: vfrit
 * Date: 14/01/2019
 * Time: 21:15
 */
require_once('fonctions.php');

$result = (object) [
    'error' => false,
    'return_Array' => []
];


try {

    $fileName = "../../Donnees/data.txt";
    $result->return_Array = GetContacts($fileName);
    echo json_encode($result);

} catch (Exception $e) {

    $result->error = $e;
    echo json_encode($result);
}
