<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Biblioteca | Página Inicial</title>
        
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,100,300,300italic,700' rel='stylesheet' type='text/css'>
        
        <!-- Materialize -->
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
                            <li><a href="listar-livros.php">Listar Livros</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <h2>O que deseja fazer?</h2>
            
            <div class="container brown lighten-4">
                
                <!-- Row -->
                <div class="row principal">
               
                  <div class="col s3 m3">
                    <a href="cadastrar-livro.php">
                    <div class="card-panel waves-effect waves-light teal lighten-1 hoverable">
                      <span class="white-text">Cadastrar Livro
                      </span>
                    </div></a>
                  </div>
                  
                   <div class="col s3 m3">
                    <a href="cadastrar-leitor.php">
                    <div class="card-panel waves-effect waves-light teal lighten-1 hoverable">
                      <span class="white-text">Cadastrar Leitor
                      </span>
                    </div></a>
                  </div>  
                  
                    <div class="col s3 m3">
                    <a href="consulta.php">
                    <div class="card-panel waves-effect waves-light teal lighten-1 hoverable">
                      <span class="white-text">Realizar Consulta
                      </span>
                    </div></a>
                  </div> 
                
               
                </div>
            </div>
            
            
        </main>
        
        <!-- jQuery and Materialize -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
       
    </body>
</html>
