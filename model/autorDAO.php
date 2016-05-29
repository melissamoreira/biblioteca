<?php

//=============================
//     Classe Autor DAO
//=============================

class AutorDAO{
    
    // Inserir
    public function insert(Autor $autor){
        
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        
        $stmt = $mysqli->prepare("INSERT INTO Autor(nome) VALUES (?)");
        
        $stmt->bind_param("s", $autor->nome);
        
        if (!$stmt->execute()) {
        
            echo "ERRO: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        
        $stmt->close();
    }
    
    // Consulta por Código
    public function consultaCodigo($codigo){
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        $stmt = $mysqli->prepare("SELECT * FROM Autor WHERE codigo=?");
        $stmt->bind_param("i",$codigo); //'i' se refere ao tipo int, do $id
        $stmt->execute();
        $stmt->bind_result( $codigo, $nome );
        $stmt->fetch();
        $autor = new Autor( $codigo, $nome );
        return $autor;
    }
    
    //Fazer as consulta por nome. (Pode retornar lista!) 
    
    
}