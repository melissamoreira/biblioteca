//================================= Cadastrar Livro =================================

function cadastrarLivro(){
    var disp;
    if($("#disponibilidade").val() == 'on'){
        disp = 'S';
    } else {
        disp = 'N';
    }
    var categoria="";
    var cat = $('#categorias').val();
    for(var i=0; i<cat.length; i++){
        categoria += String(cat[i])+" "; 
    }
    cat = cat.reduce(function(x,y){
        return String(x)+" "+y;
    },"");
    
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
            alert("Categorias:" + cat);
            alert('Livro cadastrado com sucesso!');
            $('input').val("");
            $('input[type="checkbox"]').removeAttr('checked');
            $('.dropdown-content li span input').removeAttr('selected');
        },
        error: function(){ alert('ERRO!'); }
    });
}