<?php
use Nicolas\Site\repository\VideoRepository;
$dir=__DIR__."/banco.sqlite";
$pdo=new PDO("sqlite:$dir");


$id=$_GET['id'];

$sql='DELETE FROM tbvideos WHERE id= ?';

// $statements=$pdo->prepare($sql);
// $statements->bindValue(1,$id);
$repository=new VideoRepository($pdo);
$repository->removeVideo($id);
header('Location:/?sucesso=1');
// if($statements->execute()){
// header('Location:/?sucesso=1');
// }else{
//     header('Location:/?sucesso=0');
// }
