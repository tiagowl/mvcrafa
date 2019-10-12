<?php

class AdminController{

    public function index(){
        //echo "Home";


            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('admin.html');

            $objPostagens = Postagem::selecionarTodos();

            $parametros = array();
            $parametros["postagens"] = $objPostagens;
            
            $conteudo = $template->render($parametros);
            echo $conteudo;

    }

    public function create(){

        $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('create.html');

            
            $parametros = array();
            $parametros['postagens'] = $objPostagens;
            
            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function insert(){

        try{
            Postagem::insert($_POST);
        }catch(Exception $e){
            echo "<script> alert('Falha ao capturar os dados'); <script>";
        }

        header("Location: ?pagina=home");

    }

    public function change($paramId){
        $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('update.html');

            $post = Postagem::selecionaPorId($paramId);

            $parametros = array();
            $parametros['id'] = $post->id;
            $parametros['titulo'] = $post->titulo;
            $parametros['conteudo'] = $post->conteudo;
            
            $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function update(){

        try {
            Postagem::update($_POST);
        } catch (Exception $e) {
            echo "<script> alert('Falha ao capturar os dados'); <script>";
        }

        header("Location: ?pagina=admin&metodo=index");
    }
}

?>