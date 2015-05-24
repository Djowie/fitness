<?php
/**
 * Creates and returns PDO object
 *
 * @return PDO
 */
function createPDO() {
    // MySQL connection
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'fitness';

    try {
        $db = new PDO("mysql:dbname=$dbName;charset=utf8", $dbUser, $dbPass, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (PDOException $e) {
        errorHandler(0, $e->getMessage(), $e->getFile(), $e->getLine(), print_r($e, true), 'sql');
        die('SQL Error, terminating script.');
    }

    return $db;
}                            
?>                     