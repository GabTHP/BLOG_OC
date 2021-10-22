<?php

$host = $_ENV["BDD_HOST"];
$db = 'blog_oc';
$user = $_ENV["BDD_USER"];
$psw =  $_ENV["BDD_PSW"];
$port =  $_ENV["BDD_PORT"];
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
