<?php

$config = require 'config.php';

$db = new Database($config['database']);

$query = "SELECT * FROM groceries ORDER BY name";

$groceries = $db -> query($query) -> fetchAll();

$totalPrice = array_reduce($groceries, function($carry, $item){
        $carry += $item["price"] * $item["number"];
        return $carry;
    }
);

require "controllers/views/index.view.php";
?>