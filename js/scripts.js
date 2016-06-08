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