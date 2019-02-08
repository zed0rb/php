<?php


function selectSQL($conn, $offset, $limit, $searchParameters) {
    $limit++;
    $sql = "SELECT * FROM adresu_knyga.kontaktai";

    if(!empty($searchParameters)) {
        $sql .= " WHERE ";
        if (!empty($searchParameters)) {
            $sql .= searchParam($searchParameters);

        }
        $sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return [];
        }
    }
    else {
        $sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;}
    }
}

function searchParam($searchParameters) {
    $sql = '';
    $count = count($searchParameters);
    foreach($searchParameters as $key => $value) {
        $sql .= "$key LIKE '%$value%' ";
        $count--;
        if ($count != 0) {
            $sql .= " AND ";
        }
    }
    return $sql;
}
function totalRows($conn, $searchParameters = null) {
    $sql = "SELECT count(*) as total FROM adresu_knyga.kontaktai";
    if(!empty($searchParameters)) {
        $sql .= " WHERE ";
        if (!empty($searchParameters)) {
            $sql .= searchParam($searchParameters);
        }

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
function selectDataRow($conn, $id) {
    $sql = "SELECT * FROM adresu_knyga.kontaktai WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return [];
    }
}
function insertData($name, $last_name, $number,  $conn){
    $insert = "INSERT INTO adresu_knyga.kontaktai(name, last_name, number) VALUES (?, ?, ?)";
    if (!($stmt = $conn->prepare($insert))) {
        die("Error: " . $conn->error);
    }
    if (!$stmt->bind_param("sss", $name, $last_name, $number)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        return "Įrašas įvestas sėkmingai.";
    }
}
function updateData($id, $name, $last_name, $number,  $conn){
    $update = "UPDATE adresu_knyga.kontaktai SET name=?, last_name=?, number=? WHERE id=?";
    if (!($stmt = $conn->prepare($update))) {
        die("Error: " . $conn->error);
    }
    if (!$stmt->bind_param("sssi",  $name, $last_name, $number, $id)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        return "Įrašas pakoreguotas sėkmingai.";
    }
}
function deleteData($id, $conn) {
    $delete = "DELETE FROM adresu_knyga.kontaktai WHERE id=?";
    if (!($stmt = $conn->prepare($delete))) {
        die("Error: " . $conn->error);
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
