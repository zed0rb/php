<?php
if (isset($_GET['offset']) && is_numeric($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}
if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = 10;
}
if(isset($_GET['search'])) {
    if(isset($_GET['name']) && !empty($_GET['name'])) {
        $searchParameters['name'] = $_GET['name'];
    }
    if(isset($_GET['last_name']) && !empty($_GET['last_name'])) {
        $searchParameters['last_name'] = $_GET['last_name'];
    }
    if(isset($_GET['number']) && !empty($_GET['number'])) {
        $searchParameters['number'] = $_GET['number'];
    }

}