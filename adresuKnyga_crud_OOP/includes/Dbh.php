<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 2/14/2019
 * Time: 1:24 AM
 */

//class Dbh
//{
//    private $host;
//    private $dbname;
//    private $user;
//    private $password;
//
//    protected function connection()
//    {
//        $this->host = 'localhost';
//        $this->user = 'root';
//        $this->password  ='';
//        $this->dbname = 'adresu_knyga';
//
//        $conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
//        if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        }
//        return $conn;
//    }
//}

$servername = "localhost";
$username = "root";
$password =  '';
$dbname = "adresu_knyga";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
include_once "ContactModel.php";

$CRUD = new ContactModel($conn);