<?php
namespace Nicolas\Site\Controller;
use Nicolas\Site\repository\VideoRepository;
use PDO;

class VideoListController{


    function __construct(private VideoRepository $videoRepository){
    }

    public function processaRequisicao():void 
    {

        $videolist=$this->videoRepository->all();
        
        
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="./css/reset.css">
            <link rel="stylesheet" href="./css/estilos.css">
            <link rel="stylesheet" href="./css/flexbox.css">
            <title>AluraPlay</title>
            <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
        </head>
        
        <body>
        
            <header>
        
                <nav class="cabecalho">
                    <a class="logo" href="./"></a>
        
                    <div class="cabecalho__icones">
                        <a href="/novo-video" class="cabecalho__videos"></a>
                        <a href="/login" class="cabecalho__sair">Sair</a>
                    </div>
                </nav>
        
            </header>
        
            <ul class="videos__container" alt="videos alura">
                <?php foreach($videolist as $video) { ?>
                <li class="videos__item">
                    <iframe width="100%" height="72%" src="<?php echo $video->url;?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <div class="descricao-video">
                        <img src="./img/logo.png" alt="logo canal alura">
                        <h3><?php echo $video->title;?></h3>
                        <div class="acoes-video">
                            <a href="/editar-video?id=<?= $video->id;?>">Editar</a>
                            <a href="/deletar-video?id=<?php echo $video->id;?>">Excluir</a>
                        </div>
                    </div>
                </li>
               <?php } ?>
            </ul>
        </body>
        
        </html>
        <?php
    }



}
?>