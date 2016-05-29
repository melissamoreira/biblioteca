<?php

//=============================
//     Classe Livro
//=============================

class Livro{

    
    public  
            $codigo,
            $titulo, 
            $autor, 
            $editora, 
            $edicao, 
            $categoria, 
            $disponibilidade, 
            $quantidade; 
    
    //Construtor
    public function __construct( $codigo, $titulo, $autor, $editora, $edicao, $categoria, 
            $disponibilidade, $quantidade){
        
        $this->codigo           = $codigo;
        $this->titulo           = $titulo;
        $this->autor            = $autor;
        $this->editora          = $editora;
        $this->edicao           = $edicao;
        $this->categoria        = $categoria;
        $this->disponibilidade  = $disponibilidade;
        $this->quantidade       = $quantidade;
        
    }
    
}


//=============================
//     Classe Autor
//=============================

class Autor{
    
    public  $codigo, $nome; 
    
    //Construtor
    public function __construct( $codigo, $nome ){
        
        $this->codigo = $codigo;
        $this->nome   = $nome;
    }
    
}


//=============================
//     Classe Editora
//=============================

class Editora{
    
    public  $codigo, $nome; 
    
    //Construtor
    public function __construct( $codigo, $nome ){
        
        $this->codigo = $codigo;
        $this->nome   = $nome;
    }
    
}


//=============================
//     Classe Leitor
//=============================

class Leitor{
    
    public  $codigo, $nome, $telefone, $endereco; 
    
    //Construtor
    public function __construct( $codigo, $nome, $telefone, $endereco ){
        
        $this->codigo     = $codigo;
        $this->nome       = $nome;
        $this->telefone   = $telefone;
        $this->endereco   = $endereco;    
    }
    
}

//=============================
//     AutorLivro
//=============================

class AutorLivro{
    
    public $cd_autor, $cd_livro;
    
    //Construtor
    public function __construct(Autor $autor, Livro $livro){
        
        $this->cd_autor  = $autor->codigo;
        $this->cd_livro  = $livro->codigo;
        
    }
}

//=============================
//     LeitorLivro
//=============================

class LeitorLivro{
    
    public $cd_livro, $cd_leitor, $dt_emprestimo, $dt_devolucao;
    
    //Construtor
    public function __construct( Livro $livro, Leitor $leitor, $dt_emprestimo, $dt_devolucao){
        
        $this->cd_livro       = $livro->codigo;
        $this->cd_leitor      = $leitor->codigo;
        $this->dt_emprestimo  = $dt_emprestimo;
        $this->dt_devolucao   = $dt_devolucao;
        
    }
}

//=============================
//     Classe Categoria
//=============================

class Categoria{
    
    public  $codigo, $categoria; 
    
    //Construtor
    public function __construct( $codigo, $categoria ){
        
        $this->codigo     = $codigo;
        $this->categoria  = $categoria;
    }
    
}

//=============================
//     CategoriaLivro
//=============================

class CategoriaLivro{
    
    public $cd_categoria, $cd_livro;
    
    //Construtor
    public function __construct(Categoria $categoria, Livro $livro){
        
        $this->cd_categoria = $categoria->codigo;
        $this->cd_livro     = $livro->codigo;
        
    }
}
