<?php

$host = "localhost";
$db = 'blog_oc';
$user = "root";
$psw =  "pass1234";
$port =  "3306";
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
$options = [
	\PDO::ATTR_ERRMODE 			=> \PDO::ERRMODE_EXCEPTION,
	\PDO::ATTR_DEFAULT_FETCH_MODE 	=> \PDO::FETCH_ASSOC,
	\PDO::ATTR_EMULATE_PREPARES 		=> false,
];


try {
	$pdo = new \PDO($dsn, $user, $psw, $options);
} catch (\PDOException $e) {
	throw new \PDOexception($e->getMessage(), $e->getCode());
}
