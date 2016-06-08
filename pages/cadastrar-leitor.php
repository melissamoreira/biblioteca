<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Biblioteca | Cadastrar Leitor</title>
        
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
                            <li><a href="#!">Cadastrar Leitor</a></li>
                            <li><a href="consulta.php">Realizar Consulta</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <h2>Cadastrar Leitor</h2>
            <div class="container brown lighten-4">
                
                <!-- Row -->
                <div class="row col l9 offset-l2 m9 offset-m2">
                
                 <form>
                    <div class="input-field col s10 m6">  
                      <label for="nome">Nome: </label>
                      <input type="text"   name="nome"    id="nome"  title="Digite o nome" required/>
                    </div>  
                    
                    <div class="input-field col s10 m6">  
                        <label for="telefone">Telefone</label>
                        <input type="tel" name="telefone" id="telefone" title="Digite o telefone com DDD" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
                    </div>
                    
                    <div class="input-field col s12 m12">    
                      <label for="endereço">Endereço: </label>
                      <input type="text"   name="endereço"   id="endereço" title="Digite o endereço" required/>
                    </div>  

                    <div class="input-field col s12 m12 l12">
                        <button class="btn waves-effect waves-light btn-large" type="submit" class>Enviar <i class="material-icons right">send</i></button>
                    </div>
                            
                </form>
                <br><br>
                
               
                </div>
            </div>
            
            
        </main>
        
        <!-- jQuery and Materialize -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
        
        <!-- jQuery Telefone Mask -->
        <script type="text/javascript" src="../js/jquery.mask.min.js"/></script>
        <script type="text/javascript">
            $("#telefone").mask("(00) 0000-00009");
        </script>

    </body>
</html>
