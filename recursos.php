<?php

class Recursos{
    //$arg1 e $arg2 vêm da URL via GET
    private $met, $arg1, $arg2;
    
    //Os argumentos são predefinidos como 0 no construtor para o caso de não ser passado via get!
    public function __construct($met, $arg1=0,$arg2=0){
        $this->met  = $met;
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
    }
    
    public function __call($m,$e){
        //Determina um erro 400 a ser passado no response
        http_response_code(400);
        echo "Erro: chamada invalida<br>";
    }
    
    public function handler(){
        
        $recurso = 'GeneralResource'.$_SERVER['REQUEST_METHOD'];
        $recurso = new $recurso();
        $recurso->met();
    }
}

class View{
    
    public function home(){
        require_once('home.php');
    }
}

abstract class GeneralResource{
    
    public function __call($m,$e){
        header('content-type: application/json');
        echo json_encode(array("response"=>"Recurso inexistente: $m"));
        http_response_code(404);   
    }
    
}

class GeneralResourceGET extends GeneralResource{
    
    public function livro(){
        $arg1 = $_GET["arg1"];
        if($arg1 > 0){
            require_once "../model/tabelas.php";
            require_once "../model/livroDAO.php";
            $lv = new LivroDAO();
            $livro = $lv->consultaCodigo($arg1);
            
            if( $livro->codigo != null &&  $livro->titulo != null && $livro->autor != null &&
                $livro->editora != null && $livro->edicao != null && $livro->categoria != null &&  
                $livro->disponibilidade != null && $livro->quantidade != null ){
                    
                echo json_encode(array("codigo"=>$livro->codigo, "titulo"=>$livro->titulo, "autor"=>$livro->autor,
                "editora"=>$livro->editora, "edicao"=>$livro->edicao, "categoria"=>$livro->categoria,
                "disponibilidade"=>$livro->disponibilidade, "quantidade"=>$livro->quantidade));
                http_response_code(200);
            }else{
                echo json_encode(array("response"=>"Livro não encontrado!"));
                http_response_code(404);
            }
        }else{
            echo json_encode(array("response"=>"Dados inválidos!"));
            http_response_code(500); 
        }
    }  
}

class GeneralResourcePOST extends GeneralResource{
    
    public function livro(){
        echo $_SERVER["CONTENT_TYPE"];
        if($_SERVER["CONTENT_TYPE"] === "application/json"){ //Aceita recebimento de conteúdo no formato JSON
            $json = file_get_contents('php://input'); //file_get_contents <--- Função Global do PHP
            $array = json_decode($json,true); //$json Objeto JSON que será decodificado e transformado a um array associativo
            require_once "model/tabelas.php"; //Importando as classes do model
            require_once "model/livroDAO.php";
            $livro = new Livro(0, $array["titulo"], $array["autor"], $array["editora"], $array["edicao"], $array["categoria"], $array["disponibilidade"], $array["quantidade"]); 
            //Criação do livro: Como o ID é um campo auto increment, o primeiro valor é 0
            $lv = new LivroDAO();
            $lv->insert($livro); //Insere o livro criado com o método 'inserir()' de livroDAO
            echo json_encode(array("response"=>"Livro cadastrado com sucesso!"));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos!"));
            http_response_code(500);   
        }
    }

}

/*
$met  = $_GET["metodo"];
$arg1 = $_GET["arg1"];
$arg2 = $_GET["arg2"];


if(isset($met) && isset($arg1) && isset($arg2)){
    $r = new Recursos($arg1,$arg2);
    
}elseif (isset($met) && isset($arg1)){
    $r = new Recursos($arg1);
    
}elseif (isset($met)) {
    $r = new Recursos();
}

$r->handler();
*/

//https://ide.c9.io/romefeller/aulaphp2

