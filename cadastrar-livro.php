<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Biblioteca | Cadastrar Livro</title>
        
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,100,300,300italic,700' rel='stylesheet' type='text/css'>
        
        <!-- Materialize -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        
        <link type="text/css" rel="stylesheet" href="style/style.css">

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
                            <li><a href="#!">Cadastrar Livro</a></li>
                            <li><a href="cadastrar-leitor.php">Cadastrar Leitor</a></li>
                            <li><a href="consulta.php">Realizar Consulta</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <h2>Cadastrar Livro</h2>
            <div class="container brown lighten-4">
                
                <!-- Row -->
                <div class="row col l9 offset-l2 m9 offset-m2">
                
                 <form>
                    <div class="input-field col s10 m6">  
                      <label for="titulo">Título: </label>
                      <input type="text"   name="titulo"   title="Digite o título do livro"  id="titulo" required/>
                    </div>  
                            
                    <div class="input-field col s10 m6">  
                      <label for="autor">Autor: </label>
                      <input type="text"   name="autor"     title="Digite o nome do autor do livro" id="autor" required/>
                    </div>
                    <div class="input-field col s10 m6">    
                      <label for="editora">Editora: </label>
                      <input type="text"   name="editora"   id="editora" title="Digite o nome da editora do livro"  required/>
                    </div>  
                    <div class="input-field col s5 m3">    
                      <label for="edicao">Edição: </label>
                      <input type="number" name="edicao"    id="edicao" title="Digite o número da edição" required/>
                    </div>
                              
                    <div class="input-field col s5 m3">    
                      <label for="quantidade">Quantidade: </label>
                      <input type="number" name="quantidade" id="quantidade" title="Digite a quantidade de exemplares disponíveis" required/>
                    </div> 
                    
                    <div class="select-dropdown col s10 m6">        
                        <label for="categoria">Categorias: </label>
                        <select name="categorias" name="categorias[]" id="categorias" class="multiple-select-dropdown" multiple> 
                          <option value="" disabled selected>Selecione a(s) categoria(s)</option>
                          <option value="1">Literatura Nacional</option>
                          <option value="2">Literatura Estrangeira</option>
                          <option value="3">Literatura Juvenil</option>
                          <option value="4">Programação</option>
                          <option value="5">Artes</option>
                        </select>
                    </div>
                        
                    <div class="input-field col s10 m6">
                        <div class="switch">
                          <label for="disponibilidade">Exemplares disponíveis? <br>
                              Não
                             <input type="checkbox" name="disponibilidade" id="disponibilidade">
                             <span class="lever"></span> Sim </label>
                        </div>
                    </div>  
                </form>
                <div class="input-field col s12 m12 l12">
                    <button class="btn waves-effect waves-light btn-large" onclick="cadastrarLivro()">Enviar <i class="material-icons right">send</i></button>
                </div>
                <br><br>
                
               
                </div>
            </div>
            
            
        </main>
        
        <!-- jQuery and Materialize -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
        
        <!-- Ajax Requests  -->
        <script type="text/javascript" src="js/scripts.js"></script>
        <script>
        
              $(document).ready(function(){
                
                //Select do Materialize  
                $('select').material_select();
               
                //POST: Cadastrando livro no banco
                $(".submit").click(function(){
                    
                    var sucesso = function(result){
                        
                        alert("SUCESSO!");
                        window.location="home.php";
                        //$("#resultado").html(result.response);
                        //'resp' vêm do resultado em json, do Response Body
                    };
                    
                    var erro = function(result){
                        
                        alert("DEU RUIM!" + result.response);
                        $("#resultado").html(result.response);
                    };
                    
                        
                    //Usando o AJAX via jQuery: Envia um objeto JSON(JavaScript Object Notation)
                    var obj = { url: "https://web-service-melissamoreira.c9users.io/livro", //A URL chama o método GET do GeneralResourceGET
                                method: "POST",
                                //type:"POST", 
                                success: sucesso,
                                error: erro
                    };
                        
                    $.ajax(obj);
                });
           });
              
            
            
            
            
            
            
            function confirmar(){
			
            $.ajax({
                 contentType: "application/json",
                 url: "@{EventoR}",
                 type: "POST",
                 data: JSON.stringify({"descricao":$("#descricao").val(), 
                                       "percentualDesconto":parseInt($("#desconto").val()),
                                       "contratoid":parseInt($("#contratoid").val()) }),
                 success: function(){
                	
					limpaCampos();	
					listar();
                 },
                 error: function(){
                 	alert("ERRO!");
                 }
            });
        	ajuste();
        	$('tbody tr').css('background-color','#fff');   
		}

		function confedit(){
    		modeledt.descricao = $("#descricao").val();
    		modeledt.percentualDesconto = parseInt($("#desconto").val());
    		modeledt.contratoid = parseInt($("#contratoid").val());
        		$.ajax({
            		type: "PUT",
            		dataType: "json",
            		cache: false,
		            contentType:"application/json",    
        		    url: 'https://estacionamento-bruno-alcamin.c9users.io/alteraevento/'+modeledt.id,
            		data: JSON.stringify(modeledt),  
        		}).done(function(e){
           			limpaCampos();	
       				$("#tb").html("");
       				listar();
        		});
        		ajusteEdit();
		}
            
            
            
              
              
              
        </script>
        
    </body>
</html>
