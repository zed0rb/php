<?php

function writeToFile()
{
    try {
        require "config.php";
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM companies ORDER BY id";

        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

    $columnNames = array();

    if (!empty($result)) {
        $firstRow = $result[0];
        foreach ($firstRow as $colName => $val) {
            $columnNames[] = $colName;
        }
    }

    $fileName = 'mysql-export.csv';


    $fp = fopen($fileName, 'w');

    fputcsv($fp, $columnNames);


    foreach ($result as $row) {
        fputcsv($fp, $row);
    }


    fclose($fp);
}