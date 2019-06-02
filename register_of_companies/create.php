<?php

function add() {

    require "config.php";

    echo "Enter company name:";
    $companyName = trim(fgets(STDIN, 1024));
    echo "Enter company registration code:";
    $registrationCode = trim(fgets(STDIN, 1024));
    echo "Enter company email:";
    $email = trim(fgets(STDIN, 1024));
    echo "Enter company phone:";
    $phone = trim(fgets(STDIN, 1024));
    echo "Enter company comment:";
    $comment = trim(fgets(STDIN, 1024));

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $newCompany = array(
            "company_name" => $companyName,
            "registration_code"  => $registrationCode,
            "email"     => $email,
            "phone"       => $phone,
            "comment"  => $comment
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "companies",
            implode(", ", array_keys($newCompany)),
            ":" . implode(", :", array_keys($newCompany))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($newCompany);

        echo "\nCompany added\n\n";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}