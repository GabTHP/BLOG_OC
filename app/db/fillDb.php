<?php

require '../../vendor/autoload.php';

$faker = faker\Factory::create('fr_FR');

require 'connDb.php';


$posts = [];
$categories= [];
$comments = [];
$users = [];
$tags = [];

// Clean db

$pde->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("TRUNCATE TABLE posts_categories"); 
$pdo->exec("TRUNCATE TABLE posts_comments");
$pdo->exec("TRUNCATE TABLE users_posts");
$pdo->exec("TRUNCATE TABLE posts_tags");
$pdo->exec("TRUNCATE TABLE users");
$pdo->exec("TRUNCATE TABLE comments");
$pdo->exec("TRUNCATE TABLE posts");
$pdo->exec("TRUNCATE TABLE tags");       
$pde->exec("SET FOREIGN_KEY_CHECKS = 1");

echo 'Database tables cleaned successfuly!';

// Create fake users
$hashPassword = null;
for ($i = 0; $i < 10; $i++) {
	$hashPassword = password_hash($faker->password, PASSWORD_BCRYPT);
}


