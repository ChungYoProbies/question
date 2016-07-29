<?php
require_once '../classes/Database.php';

$db = new Database();
initDatabaseIfNeeded($db);

$sql = "INSERT INTO `Bar` (`id`, `note`) VALUES (NULL, 'insert')";
$db->insert($sql);

$sql = "SELECT * FROM `Bar`";
var_dump($db->select($sql));

$sql = "UPDATE `Bar` SET `note` = 'ph23' WHERE `id` = '1'";
var_dump($db->update($sql));

$sql = "INSERT INTO `Bar` (`id`, `note`) VALUES (NULL, 'insert')";
$db->insert($sql);
$id = $db->lastInsertId();
var_dump($id);

$sql = "DELETE FROM `Bar` WHERE `id` = '$id'";
var_dump($db->delete($sql));


function initDatabaseIfNeeded($db)
{
    $sql = "
        CREATE TABLE `Bar` ( 
            `id` INT NOT NULL AUTO_INCREMENT 
            , `note` VARCHAR(255) NOT NULL 
            , PRIMARY KEY (`id`) 
        ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
";
    $db->exec($sql);
}