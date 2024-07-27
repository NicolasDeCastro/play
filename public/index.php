<?php
declare(strict_types=1);
require __DIR__."/../vendor/autoload.php";
use Nicolas\Site\Controller\VideoListController;
use Nicolas\Site\repository\VideoRepository;

$dir=__DIR__."/../banco.sqlite";
$pdo=new PDO("sqlite:$dir");
$videoRepository=new VideoRepository($pdo);


if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    $controller= new VideoListController($videoRepository);
    $controller->processaRequisicao();
    // require_once __DIR__.'/../listagem-videos.php';
} elseif ($_SERVER['PATH_INFO'] === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__.'/../formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__.'/../novo-video.php';
    }
} elseif ($_SERVER['PATH_INFO'] === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__.'/../formulario.php';
    }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once __DIR__.'/../editar-video.php';
    }
}elseif ($_SERVER['PATH_INFO'] === '/deletar-video') {
    require_once __DIR__.'/../deletar-video.php';
}elseif($_SERVER['PATH_INFO']==='/login'){
require_once __DIR__.'/../login.php';

}