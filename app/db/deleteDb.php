<?php

//Db conn

require 'connDb.php';

$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("DROP TABLE users");
$pdo->exec("DROP TABLE posts");
$pdo->exec("DROP TABLE comments");
$pdo->exec("DROP TABLE categories");
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");


echo 'Database TABLES deleted successfuly';
