<?php


function get_all_categories() {
    require '../app/db/connDb.php';
    $all_categories = $pdo->query('SELECT * FROM categories');
    return ($all_categories->fetchAll());
}