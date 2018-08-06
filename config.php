<?php
require 'environment.php';

global $db;
global $config;

$config = [];

if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/Projects/PHPZP/_Projetos/SystemERP");
	$config['dbname'] = 'system_erp';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
  	define("BASE_URL", "http://reinaldo-net.stackstaging.com/Estrutura_MVC/");
	$config['dbname'] = 'reinaldo-teste1-33376b6e';
	$config['host'] = 'shareddb-i.hosting.stackcp.net';
	$config['dbuser'] = 'reinaldo-teste1-33376b6e';
	$config['dbpass'] = 'brooke26';
}

try {
$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOExeption $e) {
	echo "ERRO: ".$e.getMessage();
}

