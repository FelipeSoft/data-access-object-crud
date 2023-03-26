<?php

$DB_NAME = 'login';
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = 'root';

$pdo = new PDO("mysql:dbname=$DB_NAME;host=$DB_HOST", $DB_USER, $DB_PASSWORD);
