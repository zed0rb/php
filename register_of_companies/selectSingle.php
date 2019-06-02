<?php


//draw single data by id
function selectById($id)
{
    try {
        require "config.php";


        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM companies WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();


    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

    if ($result && $statement->rowCount() > 0) {

        foreach ($result as $row) {

            echo "\n1. ", $row["company_name"], "\n";
            echo "2. ", $row["registration_code"], "\n";
            echo "3. ", $row["email"], "\n";
            echo "4. ", $row["phone"], "\n";
            echo "5.  ", $row["comment"], "\n";
            echo "created/edited date ", $row["date"];
            echo "\n";

        }

    } else {
        echo "\nNo results found \n";
    }
}