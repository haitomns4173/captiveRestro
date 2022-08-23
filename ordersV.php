<?php
include_once('Crud.php');
$crud = new Crud();

if (isset($_GET["action"])) {
    if ($_GET["action"]=="order" && isset($_GET["id"])) {
        $crud->actionAddOrder($_GET["id"]);
    }
}

?>