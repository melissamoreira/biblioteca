<?php

//=============================
//     Classe Livro DAO
//=============================

class LivroDAO{
    
    // Inserir
    public function insert(Livro $livro){
        
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        
        $stmt = $mysqli->prepare("INSERT INTO Livro VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('isssissi',
                                $livro->codigo,
                                $livro->titulo,
                                $livro->autor,
                                $livro->editora,
                                $livro->edicao,
                                $livro->categoria,
                                $livro->disponibilidade,
                                $livro->quantidade);
        
        if (!$stmt->execute()) {
        
            echo "ERRO: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    // Consulta por Código
    public function consultaCodigo($codigo){
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        $stmt = $mysqli->prepare("SELECT * FROM Livro WHERE codigo=?");
        $stmt->bind_param("i",$codigo);
        $stmt->execute();
        $stmt->bind_result( $codigo, $titulo, $autor, $editora, $edicao, $categoria, 
                            $disponibilidade, $quantidade );
        $stmt->fetch();
        $livro = new Livro( $codigo, $titulo, $autor, $editora, $edicao, $categoria, 
                            $disponibilidade, $quantidade );
        return $livro;
    }
    
    //Fazer as consultas por título, autor e editora. (Retornam listas!) 
    
}