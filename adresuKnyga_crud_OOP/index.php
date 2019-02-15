<?php

session_start();

$nameErr=$last_nameErr=$numberErr='';
$name=$last_name=$number="";
$id = null;
$modalWindow = '';
$message = '';
$searchParameters[] = null;

include_once "includes/Dbh.php";
include_once "includes/ContactModel.php";
$view = new ContactModel($conn);
require_once "includes/get.php";
require_once "includes/functions.php";
$offsetLink = offsetLink ();
require_once "includes/dataCheckFunctions.php";
require_once "includes/html.php";


head();
scripts();
frontPanel($limit);
require_once "includes/dbMain.php";
require_once "includes/modalWindows.php";
displayModal($modalWindow);
selection();
pagesList($view->selectSQL($offset, $limit, $searchParameters), $limit, $offset, $offsetLink, $view->totalRows(), $conn);
table($view->selectSQL( $offset, $limit, $searchParameters),$offset, $limit);
pagesList($view->selectSQL($offset, $limit, $searchParameters), $limit, $offset, $offsetLink, $view->totalRows(), $conn);
foot();