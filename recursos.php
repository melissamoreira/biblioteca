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
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/tabelas.php";
            require_once "model/livroDAO.php";
            $livro = new Livro(0, $array["titulo"], $array["autor"], $array["editora"], $array["edicao"], $array["categoria"], $array["disponibilidade"], $array["quantidade"]); 
            $lv = new LivroDAO();
            $lv->insert($livro);
            echo json_encode(array("response"=>"Livro cadastrado com sucesso!"));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos!"));
            http_response_code(500);   
        }
    }
}

