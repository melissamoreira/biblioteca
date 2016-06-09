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
        $id = $_GET['arg1'];
        if(0<$id){
            require_once "model/tabelas.php";
            require_once "model/livroDAO.php";
            $lv = new LivroDAO();
            $livro = $lv->consultaCodigo($id);
            
            if( $livro->codigo!= null && $livro->titulo != null && $livro->autor != null && $livro->editora != null && 
                $livro->edicao != null && $livro->disponibilidade != null && $livro->quantidade != null ){
                if($livro->categoria != null){
                    $cat = $livro->categoria;
                }  else {
                    $cat = "Nenhuma";
                }  
                echo json_encode(array("codigo"=>$livro->codigo, "titulo"=>$livro->titulo, "autor"=>$livro->autor, "editora"=>$livro->editora, 
                "edicao"=>$livro->edicao, "categoria"=>$cat, "disponibilidade"=>$livro->disponibilidade, "quantidade"=>$livro->quantidade));
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
    
    public function lista(){
        require_once "model/tabelas.php";
        require_once "model/livroDAO.php";
        $lv = new LivroDAO();
        $resultado = $lv->listar();
        foreach ($resultado as $resultado) {
           $list[] = array( "titulo"=>$resultado->titulo, 
                            "autor"=>$resultado->autor, 
                            "editora"=>$resultado->editora, 
                            "edicao"=>$resultado->edicao, 
                            "categoria"=>$resultado->categoria, 
                            "disponibilidade"=>$resultado->disponibilidade,
                            "quantidade"=>$resultado->quantidade );
        }
        echo json_encode($list);
        http_response_code(200);
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
            $lv->insert($livro);      //Inserir Livro
            //$lv->insertAutor($livro); //Inserir Autor
            echo json_encode(array("response"=>"Livro cadastrado com sucesso!"));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos!"));
            http_response_code(500);   
        }
    }
}

class GeneralResourceDELETE extends GeneralResource{
    
    public function livro(){
        $id = $_GET['arg1'];
        require_once "model/livroDAO.php";
        $lv = new LivroDAO();
        $lv->delete($id);
        echo json_encode(array("response"=>"Livro excluido com sucesso!"));
        http_response_code(200);
    }
}

class GeneralResourcePUT extends GeneralResource{
    
    public function livro(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/tabelas.php";
            require_once "model/livroDAO.php";
            $livro = new Livro(0, $array["titulo"], $array["autor"], $array["editora"], $array["edicao"], $array["categoria"], $array["disponibilidade"], $array["quantidade"]); 
            $lv = new LivroDAO();
            $lv->update($livro);
            echo json_encode(array("response"=>"Livro editado com sucesso!"));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos!"));
            http_response_code(500);   
        }
    }
}