<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 5/31/2019
 * Time: 11:55 PM
 */

$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "test";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);