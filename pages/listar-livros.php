<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Biblioteca | Livros</title>
        
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,100,300,300italic,700' rel='stylesheet' type='text/css'>
        
        <!-- Materialize -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
        
        <link type="text/css" rel="stylesheet" href="../style/style.css">

    </head>
    <body>
        
        <header>
             <div class="header row teal lighten-1">
                    <div class="col l6 offset-l1 m6 offset-m1 s10">
                        <a href="home.php"><h1>BEM VINDO À 
                        <br><span>BIBLIOTECA</span></h1></a></div>
                        
                    <div class="col l3 offset-l2 m3 offset-m2 s2 ">
                        <!-- Dropdown Trigger -->
                        <a class='dropdown-button btn opcoes' data-beloworigin="true" data-hover="true" href='#' data-activates='dropdown1'>OPÇÕES</a>
                        
                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content opcoes'>
                            <li><a href="cadastrar-livro.php">Cadastrar Livro</a></li>
                            <li><a href="cadastrar-leitor.php">Cadastrar Leitor</a></li>
                            <li><a href="consulta.php">Realizar Consulta</a></li>
                            <li><a href="#!">Listar Livros</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <h2>Lista de Livros</h2>
            <div class="container brown lighten-4">
                
                <!-- Row -->
                <div class="row col l9 offset-l2 m9 offset-m2">
                
                <table class="bordered responsive-table">
                    <thead>
                      <tr>
                          <th data-field="titulo">Título</th>
                          <th data-field="autor">Autor</th>
                          <th data-field="editora">Editora</th>
                          <th data-field="edicao">Edição</th>
                          <th data-field="quantidade">Quantidade</th>
                          <th data-field="disponibilidade">Disponibilidade</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- Aqui vai a listagem de Livros -->    

                </div>
            </div>
            
            
        </main>
        
        <!-- jQuery and Materialize -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
        
        <!-- Ajax Requests  -->
        <script type="text/javascript" src="../js/scripts.js"></script>
        <script>
        
              $(document).ready(function(){
                listarLivros();
              });
              
        </script>
        
    </body>
</html>
