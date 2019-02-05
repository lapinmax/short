<?php

require('MainWriter.php');

use PDO\Database;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include('Database.php');

try {
    $db = new Database();
    $db->connect();

    $product_ids = [151515, 151617, 151514];
    $start_date  = 1459468800;
    $end_date    = 1461974400;
    $clients     = $db->getClients($product_ids, $start_date, $end_date);
    require_once('clients_table.php');
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$mainWriter = new MainWriter();
$mainWriter->saveToFile("TEST DATA");