<?php

require "Validator.php";

$config = require 'config.php';

$db = new Database($config['database']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $validator = new Validator();

    if (! Validator::string($_POST["name"],$minstr = 1,$maxstr = 100)) {
        $errors["name"] = "Een productnaam is vereist (maximaal $maxstr characters)";
    }

    if (! Validator::integer($_POST["number"],$minint = 1 ,$maxint = 100)) {
        $errors["number"] = "Een hoeveelheid van meer dan $minint en minder dan $maxint is vereist";
    }

    if (! Validator::decimal($_POST["price"],$mindec = 0 ,$maxdec = 2)) {
        $errors["price"] = "Een prijs met maximaal $maxdec decimalen is vereist";
    }

    if (empty($errors)) {
        $query = "INSERT INTO groceries VALUES(:name, :number, :price)";
        $db -> query($query,[
            "name" => $_POST["name"],
            "number" => $_POST["number"],
            "price" => $_POST["price"],
        ]);
        header("Location: /");
    }
    
}

require "controllers/views/create.view.php";
?>