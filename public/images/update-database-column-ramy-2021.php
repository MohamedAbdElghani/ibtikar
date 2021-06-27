<?php


//Connect to our MySQL database using PHP's PDO extension. 
$pdo = new PDO('mysql:host=db;dbname=ibtikar_squad', 'ibtikar_web', 'enEXPC7JZR3u');
// $pdo = new PDO('mysql:host=db;dbname=test_ibtikar_db', 'root', '');

//The name of the table we want to alter.
$tableName = 'users';

//The name of the column that we want to create.

//Our SQL query that will alter the table and add the new column.
// $sql = "ALTER TABLE  `$tableName` ADD  `$columnName` varchar(255) NOT NULL";
// $sql = "ALTER TABLE users ADD describe_yourself VARCHAR(191) AFTER birthdate";



////////////////////////    UPDATE COLUM TYPE   /////////////////////
// $sql = "ALTER TABLE users MODIFY COLUMN describe_yourself TEXT";



//Execute the query.
$pdo->query($sql);

if($sql !== FALSE)
    {
      echo("The column has been added.");
    }else{
      echo("The column has not been added.");
    } 