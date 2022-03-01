<?php
$dbms = 'mysql';
$dbhost = 'localhost';
$dbname = 'account';
$dbuser = 'root';
$dbpwd = 'password';
$dsn = "$dbms:host=$dbhost;dbname=$dbname";
$db = new PDO($dsn, $dbuser, $dbpwd);