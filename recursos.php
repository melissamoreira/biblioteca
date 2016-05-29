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
    
    
    public function hello(){
        header('content-type: application/json');
        header('lol: ololl');
        echo json_encode(array("resp"=>"ola"));
        http_response_code(200);
    }
    
}

class GeneralResourceOPTIONS extends GeneralResource{
    
    public function hello(){
        header('allow: GET, OPTIONS');
        http_response_code(200); 
    }
    
    public function test(){
        header('allow: GET, OPTIONS');
        echo ("Teste");
        http_response_code(200);
    }
    
    // É preciso mandar um JSON 
    // (no formato correto {"nome":"Caneta", "valor":1.50})
    // para realizar o post do produto
    public function produto(){
        header('allow: POST, OPTIONS');
        http_response_code(200); 
    }
    
}

class GeneralResourcePOST extends GeneralResource{
    
    public function produto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){ //Aceita recebimento de conteúdo no formato JSON
            $json = file_get_contents('php://input'); //file_get_contents <--- Função Global do PHP
            $array = json_decode($json,true); //$json Objeto JSON que será decodificado e transformado a um array associativo
            //CUIDADO
            require_once "../model/produto.php"; //Importando as classes do model
            require_once "../model/produtoDAO.php";
            $produto = new Produto(0,$array["nome"],$array["valor"]); //Criação do produto: Como o ID é um campo auto increment, o primeiro valor é 0
            $pd = new ProdutoDAO(); //Cria um novo produtoDAO
            $pd->insert($produto); //Insere o produto criado no produtoDAO
            echo json_encode(array("response"=>"Criado"));
            http_response_code(200);   
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }

}

/*
Testando via Browser: 
=====================
Precisa do formulário no front

Testando via Curl:
==================
curl https://aulas-melissamoreira.c9users.io/produto \ -v \ -X POST \ -H "content-type: application/json" \

Sendo que:
curl https://aulas-melissamoreira.c9users.io/produto \ 
-v ---> Mostra o Header
-X ---> É o método http
-H ---> Seta o header

curl https://aulaphp2-romefeller.c9users.io/produto \
-v \
-X POST \
-H 'content-type: application/json' \
-d '{"nome":"Melissa", "valor" : 1.5}'


curl https://aulas-melissamoreira.c9users.io/produto \
-v \
-X POST \
-H 'content-type: application/json' \
-d '{"nome":"Caderno","valor":5.50}'