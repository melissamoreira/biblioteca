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
                url:  "https://web-service-melissamoreira.c9users.io/lista/",
                type: "GET",
                error: function(){ alert('Deu erro!');}
    		}).done(function(e){
            		for(var i = 0; i<e.data.length; i++){
            		    
            		    livros += "<tr><td class='titulo'>"+e.data[i].titulo+"</td>";
            		    livros += "<tr><td class='autor'>"+e.data[i].autor+"</td>";
            		    livros += "<tr><td class='editora'>"+e.data[i].editora+"</td>";
            		    livros += "<tr><td class='quantidade'>"+e.data[i].quantidade+"</td>";
            		    livros += "<tr><td class='disponibilidade'>"+e.data[i].disponibilidade+"</td>";
            		    livros += "<tr><td><button class='waves-effect waves-light btn teal darken-1' onclick='editarLivro("+e.data[i].codigo+")'>Editar</button></td>";
            		    livros += "<tr><td><button class='waves-effect waves-light btn red darken-4' onclick='deletarLivro("+e.data[i].codigo+")'>Excluir</button></td></tr>";
                	}
                	livros += "</tbody></table>";
                	$("tbody").html(livros);
			    //$("#t1 tbody").html(itens);
    		});
	    }
