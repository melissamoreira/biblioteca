<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Biblioteca | Realizar Consulta</title>
        
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
                            <li><a href="#!">Realizar Consulta</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <h2>Realizar Consulta</h2>
            <div class="container brown lighten-4">
                
                <!-- Row -->
                <div class="row center-align col l9 offset-l2 m9 offset-m2">
                
                
                <ul class="collapsible col l6 m6 offset-l3 offset-m3" data-collapsible="accordion">
                    <li>
                      <div class="collapsible-header"><h3>Pesquisar Livro</h3></div>
                      <div class="collapsible-body">
                            
                         <div class="campo-pesquisa input-field col s12 m12">     
                         <div class="row">
                            <input class="col s6 m6 l6" type="text" id="pesquisa-titulo" name="pesquisa-titulo" placeholder="Digite o título do livro"> 
                            <button class="waves-effect waves-light btn teal lighten-3">Pesquisar por Título</button>
                            </div>
                            <div class="row">
                            <input class="col s6 m6 l6" type="number" id="pesquisa-cod-livro" name="pesquisa-cod-livro" placeholder="Digite o código do livro"> 
                            <button class="waves-effect waves-light btn teal lighten-3">Pesquisar por Código</button>
                          </div>
                          </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header"><h3>Pesquisar Leitor</h3></div>
                      <div class="collapsible-body">
                              
                          <div class="campo-pesquisa input-field col s12 m12">             
                          <div class="row">
                            <input class="col s6 m6 l6" type="text" id="pesquisa-nome" name="pesquisa-nome" placeholder="Digite o nome do leitor"> 
                            <button class="waves-effect waves-light btn teal lighten-3">Pesquisar por Nome</button>
                            </div>
                            <div class="row">
                            <input class="col s6 m6 l6" type="number" id="pesquisa-cod-leitor" name="pesquisa-cod-leitor" placeholder="Digite o código do leitor"> 
                            <button class="waves-effect waves-light btn teal lighten-3">Pesquisar por Código</button>
                            </div>
                            </div>
                        
                      
                      </div>
                    </li>
                   
                  </ul>
                </div>
            </div>
            
            <div id="resultado"></div>
        </main>
        
        <!-- jQuery and Materialize -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
        
    </body>
</html>
