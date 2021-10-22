<?php

// Db connection

require 'connDb.php';

// Create users table

$pdo->exec("CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	role ENUM('Admin','Subscriber') DEFAULT 'Subscriber',
	is_valid TINYINT NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : USERS, ';

// Create posts table

$pdo->exec("CREATE TABLE posts (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	user_id INT,
	title VARCHAR(255) NOT NULL,
	content text NOT NULL,
	featured_image VARCHAR(255) NOT NULL,
	is_valid TINYINT NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	updated_at TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");


// Create comments table

$pdo->exec("CREATE TABLE comments (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	user_id INT,
	post_id INT,
	pseudo VARCHAR(255) NOT NULL, 
	title VARCHAR(255) NOT NULL,
	content text NOT NULL,
	is_valid TINYINT NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Succes - all table created';
