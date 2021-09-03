<?php

require dirname(__DIR__) . '../../vendor/autoload.php';

$faker = Faker\Factory::create();

require 'connDb.php';


$posts = [];
$categories= [];
$comments = [];
$users = [];
$tags = [];

// Clean db

$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("TRUNCATE TABLE posts_categories"); 
$pdo->exec("TRUNCATE TABLE posts_comments");
$pdo->exec("TRUNCATE TABLE users_posts");
$pdo->exec("TRUNCATE TABLE posts_tags");
$pdo->exec("TRUNCATE TABLE users");
$pdo->exec("TRUNCATE TABLE comments");
$pdo->exec("TRUNCATE TABLE posts");
$pdo->exec("TRUNCATE TABLE tags");       
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
	$hashPassword = password_hash('admin', PASSWORD_BCRYPT);
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

// Create Comments
for ($i = 0; $i < 140; $i++) {
	$pdo->exec("INSERT INTO comments 
		    SET pseudo='{$faker->userName}',
		    	title='{$faker->sentence(2)}',
		    	content='{$faker->paragraphs(rand(3,15), true)}',
		    	created_at='{$faker->date} {$faker->time}',
		    	is_valid = True
		    	");
	$comments[] = $pdo->lastInsertId();
}

echo 'categories succesfully faked!';

// Create Categories
for ($i = 0; $i < 10; $i++) {
	$pdo->exec("INSERT INTO categories 
		    SET title='{$faker->sentence(1)}',
		    	slug='{$faker->slug}',
		    	featured_image='{$faker->numberBetween($min = 1, $max = 5)}.jpg'
		    	");
	$categories[] = $pdo->lastInsertId();
}

// Create Tags
for ($i = 0; $i < 20; $i++) {
	$pdo->exec("INSERT INTO tags 
		    SET title='{$faker->sentence(2)}'
		    	");
	$tags[] = $pdo->lastInsertId();
}

echo 'tags succesfully faked!';


//link posts with categories

foreach($posts as $post) {
	$randomCategories = $faker->randomElements($categories, rand(1,1));
	foreach ($randomCategories as $category) {
		$pdo->exec("INSERT INTO posts_categories SET post_id=$post, category_id=$category");
	}
}

echo 'cat and posts linked !';

//link posts with comments

foreach($posts as $post) {
	$randomComments = $faker->randomElements($comments, rand(2,2));
	foreach ($randomComments as $comment) {
		$pdo->exec("INSERT INTO posts_comments SET post_id=$post, comment_id=$comment");
	}
}

echo 'comments and posts linked !';

//link posts with tags

foreach($posts as $post) {
	$randomTags = $faker->randomElements($tags, rand(3,3));
	foreach ($randomTags as $tag) {
		$pdo->exec("INSERT INTO posts_tags SET post_id=$post, tag_id=$tag");
	}
}

echo 'posts with admin linked !';

//link posts with tags

foreach($posts as $post) {
		$pdo->exec("INSERT INTO users_posts SET user_id='11', post_id=$post");
}

echo 'tags and posts linked !';

echo 'everything fine so far';


