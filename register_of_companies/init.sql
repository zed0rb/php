CREATE DATABASE test;

  use test;

  CREATE TABLE companies (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(30) NOT NULL,
    registration_code VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    comment VARCHAR(100) NOT NULL,
    date TIMESTAMP,
    UNIQUE KEY unique_email (email),
    UNIQUE KEY unique_registration_code (registration_code)
  );