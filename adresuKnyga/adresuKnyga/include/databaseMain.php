<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['dataEntry'])) {
        if(!isset($_SESSION['post_id']) || ($_SESSION['post_id'] != $_POST['post_id']) ){
            $_SESSION['post_id'] = $_POST['post_id'];
            if(nameCheck($_POST["name"])[0]) {
                $nameErr = nameCheck($_POST["name"])[1];
            } else {
                $nameErr = '';
            }
            if(last_nameCheck($_POST["last_name"])[0]) {
                $last_nameErr = last_nameCheck($_POST["last_name"])[1];
            } else {
                $last_nameErr = '';
            }
            if(numberCheck($_POST["number"])[0]) {
                $numberErr = numberCheck($_POST["number"])[1];
            } else {
                $numberErr = '';
            }
         

            $name = $_POST["name"];
            $last_name = $_POST["last_name"];
            $number = $_POST["number"];
            
            $id = $_POST['id'];
            if ($id == NULL && $nameErr == '' && $last_nameErr == '' && $numberErr == '') {
                $message = insertData($name, $last_name, $number,  connection());
            } else if ($id != NULL && $nameErr == '' && $last_nameErr == '' && $numberErr == '') {
                $message = updateData($id, $name, $last_name, $number, connection());
            }
        }
        $modalWindow = 'main';
    } else if (isset($_POST['edit'])) {
        $result = selectDataRow(connection(), $_POST['edit'])->fetch_assoc();
        $id = $result['id'];
        $name = $result['name'];
        $last_name = $result['last_name'];
        $number = $result['number'];
        $modalWindow = 'main';
    } else if (isset($_POST['add'])) {
        $nameErr=$last_nameErr=$numberErr;
        $name=$last_name=$number;
        $id = null;
        $modalWindow = 'main';
    } else if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $modalWindow = 'delete';
    } else if (isset($_POST['deleteEntry'])) {
        if(!isset($_SESSION['post_id']) || ($_SESSION['post_id'] != $_POST['post_id']) ){
            $_SESSION['post_id'] = $_POST['post_id'];
            $message = deleteData($_POST['id'], connection());
            $modalWindow = 'delete';
        }
    }
}