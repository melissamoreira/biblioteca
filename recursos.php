<?php

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
        if($_SERVER["CONTENT_TYPE"] === "application/json"){ //Aceita recebimento de conteúdo no formato JSON
            $json = file_get_contents('php://input'); //file_get_contents <--- Função Global do PHP
            $array = json_decode($json,true); //$json Objeto JSON que será decodificado e transformado a um array associativo
            require_once "/model/tabelas.php"; //Importando as classes do model
            require_once "/model/livroDAO.php";
            $livro = new Livro(0, $array["titulo"], $array["autor"], $array["editora"], $array["edicao"], $array["categoria"], $array["disponibilidade"], $array["quantidade"]); 
            //Criação do livro: Como o ID é um campo auto increment, o primeiro valor é 0
            $lv = new LivroDAO();
            $lv->insert($livro); //Insere o livro criado no livroDAO
            echo json_encode(array("response"=>"Livro cadastrado com sucesso!"));
            http_response_code(200);   
        }else{
            echo json_encode(array("response"=>"Dados inválidos!"));
            http_response_code(500);   
        }
    }

}

