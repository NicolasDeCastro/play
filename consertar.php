<?php

$dir=__DIR__."/banco.sqlite";
$pdo=new PDO("sqlite:$dir");
$pdo->exec("CREATE TABLE tbvideos (id INTEGER PRIMARY KEY, url TEXT, title TEXT);");





