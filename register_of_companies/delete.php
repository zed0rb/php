<?php

function delete($id)
{

    require "config.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "DELETE FROM companies WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();


}