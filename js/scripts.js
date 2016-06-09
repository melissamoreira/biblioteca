//================================= Cadastrar Livro =================================

function cadastrarLivro(){
    
    //Ajuste Disponibilidade
    var disp;
    if($("#disponibilidade").val() == 'on'){ 
        disp = 'S';
    } else {
        disp = 'N';
    }
    
    //Ajuste Categorias
    var cat = $('#categorias').val();
    cat = cat.reduce(function(x,y){
        return String(x)+" "+y;
    },"");
    
    //Requisição
    $.ajax({
        contentType: "application/json",
        url: "https://web-service-melissamoreira.c9users.io/livro",
        type: "POST",
        data: JSON.stringify({"codigo":0,
                              "titulo":$("#titulo").val(),
                              "autor":$("#autor").val(),
                              "editora":$("#editora").val(),
                              "edicao":$("#edicao").val(),
                              "quantidade":$("#quantidade").val(),
                              "categoria":cat,
                              "disponibilidade":disp}),
        success: function(){
            alert('Livro cadastrado com sucesso!');
            $('input').val("");
            $('input[type="checkbox"]').removeAttr('checked').removeClass('active');
            $('.dropdown-content li span input').removeAttr('selected');
        },
        error: function(){ alert('ERRO!'); }
    });
}


function deletarLivro(id){
    $.ajax({
        contentType: "application/json",
        url: "https://web-service-melissamoreira.c9users.io/livro/"+id,
        type: "DELETE",
        success: function(){
            alert('Registro excluído!');
        },
        error: function(){ alert('Falha ao tentar excluir registro'); }
    });
}


function getLivro(id){
    $.ajax({
        contentType: "application/json",
        url: "https://web-service-melissamoreira.c9users.io/livro/"+id,
        type: "GET",
        success: function(){
            alert("OKA!");
            //window.location.assign("https://web-service-melissamoreira.c9users.io/pages/home.php");
        },
        error: function(){ alert('ERRO!'); }
    });
}


function listarLivros(){
    	var livros = "";
   			$.ajax({
				contentType: "application/json",
                url:  "https://web-service-melissamoreira.c9users.io/lista",
                type: "GET",
                error: function(){ alert('Deu erro!');},
                success: function(e){
            		for(var i = 0; i<e.length; i++){
            		    livros += "<tr><td class='titulo'>"+e[i].titulo+"</td>";
            		    livros += "<td class='autor'>"+e[i].autor+"</td>";
            		    livros += "<td class='editora'>"+e[i].editora+"</td>";
            		    livros += "<td class='quantidade'>"+e[i].quantidade+"</td>";
            		    livros += "<td class='disponibilidade'>"+e[i].disponibilidade+"</td>";
            		    livros += "<td><button class='waves-effect waves-light btn teal darken-1' onclick='editarLivro("+e[i].codigo+")'>Editar</button></td>";
            		    livros += "<td><button class='waves-effect waves-light btn red darken-4' onclick='deletarLivro("+e[i].codigo+")'>Excluir</button></td></tr>";
                	}
                	$("tbody").append(livros);
                }
    		});
	    }
