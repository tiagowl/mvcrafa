<?php

class PostController{

    public function index($params){
        //echo "Home";

        try {

            $Postagem = Postagem::selecionaPorId($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parametros = array();
            $parametros["titulo"] = $Postagem->titulo;
            $parametros["conteudo"] = $Postagem->conteudo;
            $parametros["comentarios"] = $Postagem->comentarios;

            $conteudo = $template->render($parametros);
            echo $conteudo;

            
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        
    }
}

?>