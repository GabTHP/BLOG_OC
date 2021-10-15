<?php

require dirname(__DIR__) . '../../vendor/autoload.php';

$faker = Faker\Factory::create();

require 'connDb.php';


$posts = [];
$comments = [];
$users = [];


// Clean db

$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");

$pdo->exec("TRUNCATE TABLE users");
$pdo->exec("TRUNCATE TABLE comments");
$pdo->exec("TRUNCATE TABLE posts");      
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

echo 'Database tables cleaned successfuly!';

// Create fake users
$hashPassword = null;
for ($i = 0; $i < 10; $i++) {
	$hashPassword = password_hash($faker->password, PASSWORD_BCRYPT);
	$pdo->exec("INSERT INTO users 
		    SET username='{$faker->userName}',
		    	password='{$hashPassword}',
		    	slug='{$faker->slug}',
		    	email='{$faker->email}',
		    	role = 'Subscriber',
		    	created_at='{$faker->date} {$faker->time}',
		    	is_valid = True
		    	");
	$users[] = $pdo->lastInsertId();
}

echo 'users table successfuly faked!';

// Create Admin

for ($i = 0; $i < 10; $i++) {
	$hashPassword = password_hash('azerty', PASSWORD_BCRYPT);
	$pdo->exec("INSERT INTO users 
		    SET username='Gabriel',
		    	password='{$hashPassword}',
		    	slug='Gab',
		    	email='gabriel.bouakira@hotmail.fr',
		    	role = 'Admin',
		    	created_at='{$faker->date} {$faker->time}',
		    	is_valid = True
		    	");
	$users[] = $pdo->lastInsertId();
}

echo 'admin gabriel created!';

// Create Posts
for ($i = 0; $i < 70; $i++) {
	$pdo->exec("INSERT INTO posts 
		    SET user_id='11',
		    	slug='{$faker->slug}',
		    	title='{$faker->sentence(3)}',
		    	content='{$faker->paragraphs(rand(3,15), true)}',
		    	featured_image='{$faker->numberBetween($min = 1, $max = 5)}.jpg',
		    	created_at='{$faker->date} {$faker->time}',
		    	is_valid = True
		    	");
	$posts[] = $pdo->lastInsertId();
}

echo 'Posts succesfully faked';

echo 'everything fine so far';


