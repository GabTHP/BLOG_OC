<?php

// Db connection

require 'connDb.php' ;

// Create users table

$pdo->exec("CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	slug VARCHAR(255) NOT NULL,
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
	slug VARCHAR(255) NOT NULL,
	content text NOT NULL,
	featured_image VARCHAR(255) NOT NULL,
	is_valid TINYINT NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'POSTS, ';

// Create comments table

$pdo->exec("CREATE TABLE comments (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	pseudo VARCHAR(255) NOT NULL, 
	title VARCHAR(255) NOT NULL,
	content text NOT NULL,
	is_valid TINYINT NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : Comments, ';

// Create categories table

$pdo->exec("CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	title VARCHAR(255) NOT NULL,
	slug VARCHAR(255) NOT NULL,
	ft_image VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : Categories, ';

// Create tags table

$pdo->exec("CREATE TABLE tags (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	title VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : Categories, ';

// Create posts_comments table

$pdo->exec("CREATE TABLE posts_comments (
	post_id INT   NOT NULL,
	comment_id INT  NOT NULL,
	PRIMARY KEY (post_id, comment_id),
	CONSTRAINT fk_post_comment
		FOREIGN KEY (post_id)
		REFERENCES posts (id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT fk_comment
		FOREIGN KEY (comment_id)
		REFERENCES comments (id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)");

// Create users_posts table

$pdo->exec("CREATE TABLE users_posts (
	user_id INT  NOT NULL,
	post_id INT  NOT NULL,
	PRIMARY KEY (user_id, post_id),
	CONSTRAINT fk_user
		FOREIGN KEY (user_id)
		REFERENCES users (id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT fk_post_user
		FOREIGN KEY (post_id)
		REFERENCES posts (id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
) DEFAULT CHARSET=utf8mb4");

echo 'USERS_POSTS,';

// Create posts_categories table

$pdo->exec("CREATE TABLE posts_categories (
	post_id INT  NOT NULL,
	category_id INT  NOT NULL,
	PRIMARY KEY (post_id, category_id),
	CONSTRAINT fk_post_cat
		FOREIGN KEY (post_id)
		REFERENCES posts (id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT fk_category
		FOREIGN KEY (category_id)
		REFERENCES categories (id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
) DEFAULT CHARSET=utf8mb4");

echo 'POSTS_CATEGORIES,';

// Create posts_tags table

$pdo->exec("CREATE TABLE posts_tags (
	post_id INT  NOT NULL,
	tag_id INT  NOT NULL,
	PRIMARY KEY (post_id, tag_id),
	CONSTRAINT fk_post_tag
		FOREIGN KEY (post_id)
		REFERENCES posts (id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT fk_tag
		FOREIGN KEY (tag_id)
		REFERENCES tags (id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
) DEFAULT CHARSET=utf8mb4");

echo 'POSTS_TAGS were created successfuly!';





