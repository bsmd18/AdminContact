<?php

$config = new myConfig();
$config->setPath('C:/xampp/htdocs/Admincontact/');

$config->setDrive('mysql');
$config->setHost('localhost');
$config->setPort(3306);
$config->setUser('root');
$config->setPassword('');
$config->setDbname('contact');

$config->setHash('md5');
$config->setUrl('http://localhost/Admincontact/www/');