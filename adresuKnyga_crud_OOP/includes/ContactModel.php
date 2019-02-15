<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 2/14/2019
 * Time: 1:29 AM
 */

class ContactModel
{

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function selectSQL($offset, $limit, $searchParameters)
    {
        $limit++;
        $sql = "SELECT * FROM kontaktai";

        if (!empty($searchParameters)) {
            $sql .= " WHERE ";
            if (!empty($searchParameters)) {
                $sql .= $this->searchParam($searchParameters);

            }
            $sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return [];
            }
        } else {
            $sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        }
    }

    public function searchParam($searchParameters)
    {
        $sql = '';
        $count = count($searchParameters);
        foreach ($searchParameters as $key => $value) {
            $sql .= "$key LIKE '%$value%' ";
            $count--;
            if ($count != 0) {
                $sql .= " AND ";
            }
        }
        return $sql;
    }

    public function totalRows($searchParameters = null)
    {
        $sql = "SELECT count(*) as total FROM kontaktai";
        if (!empty($searchParameters)) {
            $sql .= " WHERE ";
            if (!empty($searchParameters)) {
                $sql .= searchParam($searchParameters);
            }

            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row['total'];
        }
    }

    public function selectDataRow($id)
    {
        $sql = "SELECT * FROM kontaktai WHERE id=$id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return [];
        }
    }

    public function insertData($name, $last_name, $number)
    {

        $insert = "INSERT INTO kontaktai(name, last_name, number) VALUES (?, ?, ?)";
        if (!($stmt = $this->conn->prepare($insert))) {
            die("Error: " . $this->conn->error);
        }
        if (!$stmt->bind_param("sss", $name, $last_name, $number)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            $message = "Toks numeris jau registruotas";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            return "Įrašas įvestas sėkmingai.";
        }

    }

    public function updateData($id, $name, $last_name, $number)
    {

        $update = "UPDATE kontaktai SET name=?, last_name=?, number=? WHERE id=?";
        if (!($stmt = $this->conn->prepare($update))) {
            die("Error: " . $this->conn->error);
        }
        if (!$stmt->bind_param("ssdi",$name, $last_name, $number, $id)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            $message = "Toks numeris jau registruotas";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            return "Įrašas pakoreguotas sėkmingai.";
        }

    }

    public function deleteData($id)
    {

        $delete = "DELETE FROM kontaktai WHERE id=?";
        if (!($stmt = $this->conn->prepare($delete))) {
            die("Error: " . $this->conn->error);
        }
        if (!$stmt->bind_param("i", $id)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            return "Įrašas ištrintas.";
        }
    }

}