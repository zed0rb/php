<?php

require "config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("init.sql");
    $connection->exec($sql);

    echo "Database and table companies created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}