<?php

include_once "ContactModel.php";

$controller = new ContactModel($conn);


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


            $name = htmlspecialchars($_POST["name"]);
            $last_name = htmlspecialchars($_POST["last_name"]);
            $number = htmlspecialchars($_POST["number"]);

            $id = $_POST['id'];
            if ($id == NULL && $nameErr == '' && $last_nameErr == '' && $numberErr == '') {
                $message = $controller->insertData($name, $last_name, $number);
            } else if ($id != NULL && $nameErr == '' && $last_nameErr == '' && $numberErr == '') {
                $message = $controller->updateData($id, $name, $last_name, $number);
            }
        }
        $modalWindow = 'main';
    } else if (isset($_POST['edit'])) {
        $result = $controller->selectDataRow( $_POST['edit'])->fetch_assoc();
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
            $message = $controller->deleteData($_POST['id']);
            $modalWindow = 'delete';
        }
    }
}