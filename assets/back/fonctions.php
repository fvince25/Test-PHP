<?php

function GetContacts($fileName)
{
    $file_Read = fopen($fileName, "r");

    if ($file_Read) {
        $list = [];
        while (($ligne = fgets($file_Read, 4096)) !== false) {
            $fields_list = explode('|', $ligne);
            array_push($list, $fields_list);
        }
        if (!feof($file_Read)) {
            echo "Erreur: fgets() a échoué\n";
        }

        fclose($file_Read);

        return $list;
    }
}