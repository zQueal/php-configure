<?php

require 'vendor/Config.php';

Config::init([
	'username' => 'user',
	'password' => 'password',
	'hostname' => 'localhost',
	'dbname'   => 'test',
	'database' => [
    'hostname' => 'localhost',
    'username' => 'username',
    'password' => 'test',
    'port' => 3306
  ]
]);

print Config::$instance->database{'password'}; // returns 'password'
Config::get('username'); // contains 'user'