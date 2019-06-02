<?php

function edit($id, $sql, $parameter)
{
    try {
        require "config.php";
        $connection = new PDO($dsn, $username, $password, $options);

        $statement = $connection->prepare($sql);
        $statement->bindParam(':parameter', $parameter, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}