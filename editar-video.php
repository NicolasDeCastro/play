<?php
use Nicolas\Site\entity\Video;
use Nicolas\Site\repository\VideoRepository;
$dir=__DIR__."/banco.sqlite";
$pdo=new PDO("sqlite:$dir");

//$id=$_GET['id'];
$id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
if($id===false&& $id === null){
    header('Location:/?sucesso=0');
    exit();
}
$title= filter_input(INPUT_POST,'titulo');
$url=filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
if($url===false) {
    header('Location:/?sucesso=0');
    exit();
}

// $sql='UPDATE tbvideos SET url=:url, title=:title WHERE id= :id;';

// $statements=$pdo->prepare($sql);
// $statements->bindValue(':url',$url);
// $statements->bindValue(':title',$title);
// $statements->bindValue(':id',$id,PDO::PARAM_INT);


$video= new Video($url,$title);
$video->setId($id);

$repository=NEW VideoRepository($pdo);

$repository->update($video);



header('Location:/?sucesso=1');
exit();

