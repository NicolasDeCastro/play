<?php
use Nicolas\Site\entity\Video;
use Nicolas\Site\repository\VideoRepository;
$dir=__DIR__."/banco.sqlite";
$pdo=new PDO("sqlite:$dir");

$url=filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);

$title=filter_input(INPUT_POST,'titulo');
//$pdo->exec("CREATE TABLE tbvideos (id INTEGER, url TEXT, title TEXT);");

$repository= new VideoRepository($pdo);

if($repository->addvideo(new Video($url,$title))===false){
    header('Location:/?sucess=0');
}
    header('Location:/?sucess=1');