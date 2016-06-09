<?php

//=============================
//     Classe Livro DAO
//=============================

class LivroDAO{
    
    // Inserir
    public function insert(Livro $livro){
        
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        if ($mysqli->connect_errno) { echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; }
        
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
        
        if (!$stmt->execute()) { echo "ERRO: (" . $stmt->errno . ") " . $stmt->error . "<br>"; }
        $stmt->close();
    }
    
    
    // Inserir
    public function update(Livro $livro){
        
        $id=$_GET['arg1'];
        
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        if ($mysqli->connect_errno) { echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; }
        
        $stmt = $mysqli->prepare("UPDATE Livro SET titulo=(?), autor=(?), editora=(?), edicao=(?), categoria=(?),
                                  disponibilidade=(?),quantidade=(?) WHERE codigo=?");
        $stmt->bind_param('sssissii',
                                $livro->titulo,
                                $livro->autor,
                                $livro->editora,
                                $livro->edicao,
                                $livro->categoria,
                                $livro->disponibilidade,
                                $livro->quantidade,
                                $id);
        
        if (!$stmt->execute()) { echo "ERRO: (" . $stmt->errno . ") " . $stmt->error . "<br>"; }
        $stmt->close();
    }
    
    
    // Inserir Autor
    public function insertAutor(Livro $livro){
        
        
    
        //IF NOT EXISTS ( SELECT 1 FROM Autor WHERE nome = '')
        //BEGIN 
        //    INSERT INTO Autor (nome) VALUES (?)
        //END;    
        //("INSERT INTO Autor (nome) VALUES (?) WHERE NOT EXISTS (SELECT 1 FROM Autor WHERE nome='nome')");
        //$SQL = "INSERT INTO Autor (nome) VALUES (?) WHERE NOT EXISTS (SELECT * FROM Autor WHERE nome=?)";
        //$stmt = $mysqli->prepare("IF NOT EXISTS ( SELECT * FROM Autor WHERE nome=?) INSERT INTO Autor (nome) VALUES (?)");
        
        $stmt = $mysqli->prepare("INSERT INTO Autor (nome) VALUES (?) WHERE NOT EXISTS (SELECT * FROM Autor WHERE nome=?)");
        $stmt->bind_param('s', $livro->autor);
        if (!$stmt->execute()) { echo "ERRO: (" . $stmt->errno . ") " . $stmt->error . "<br>"; }
        
        //VAR_DUMP($stmt);
        //exit();
        $stmt->close();
    }
    
    
    // Deletar Livro
    public function delete($id){
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        if ($mysqli->connect_errno) { echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; }
        $stmt = $mysqli->prepare("DELETE FROM Livro WHERE codigo=?");
        $stmt->bind_param("i",$id);
        if (!$stmt->execute()) { echo "ERRO: (" . $stmt->errno . ") " . $stmt->error . "<br>"; }
        $stmt->close();
    }
    
    
    
    // Consulta por Código
    public function consultaCodigo($codigo){
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        if ($mysqli->connect_errno) { echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; }
        
        $stmt = $mysqli->prepare("SELECT * FROM Livro WHERE codigo=?");
        $stmt->bind_param("i", $codigo);
        $stmt->execute();
        $stmt->bind_result( $codigo, $titulo, $autor, $editora, $edicao, $categoria, 
                            $disponibilidade, $quantidade );
        $stmt->fetch();
        $livro = new Livro( $codigo, $titulo, $autor, $editora, $edicao, $categoria, 
                            $disponibilidade, $quantidade );
        return $livro;
    }
    
    // Listar Livros
    public function listar(){
    
        $mysqli = new mysqli("127.0.0.1", "melissamoreira", "", "biblioteca");
        if ($mysqli->connect_errno) { echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; }
        
        $stmt = $mysqli->prepare("SELECT * FROM Livro");
        //$stmt->bind_param("i", $codigo);
        
        $stmt->execute();
        $stmt->bind_result( $codigo, $titulo, $autor, $editora, $edicao, $categoria, 
                            $disponibilidade, $quantidade );
                            
        $resultado = $stmt->fetch_all();
        $resultado = count($resultado);
        $livros = [];
        
        for($i=0; $i<$resultado; $i++){
            $livros[$i] = new Livro( $resultado[$i]['codigo'], $resultado[$i]['titulo'], $resultado[$i]['autor'], $resultado[$i]['editora'], 
                                     $resultado[$i]['edicao'], $resultado[$i]['categoria'], $resultado[$i]['disponibilidade'], $resultado[$i]['quantidade'] );
        }
        return $livros;
    }

}