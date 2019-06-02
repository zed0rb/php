<?php

// draw all data in database
function selectAll(){
    try {
        require "config.php";
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM companies ORDER BY id";

        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

    if ($result && $statement->rowCount() > 0) {
        echo "\n****** Companies registered ******\n";
        echo "| Id |***";
        echo "***| Company Name |***";
        echo "***| Registration Code |***";
        echo "***| Email |***";
        echo "***| Phone |***";
        echo "***| Comment |***";
        echo "***| Date |\n";

        foreach ($result as $row) {
            echo "| ", $row["id"], " |***";
            echo "***| ", $row["company_name"], " |***";
            echo "***| ", $row["registration_code"], " |***";
            echo "***| ", $row["email"], " |***";
            echo "***| ", $row["phone"], " |***";
            echo "***| ", $row["comment"], " |***";
            echo "***| ", $row["date"], " |";
            echo "\n";
        }
    } else {
        echo "No results found \n\n";
    }
    echo "\n";
}