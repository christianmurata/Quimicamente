$("#avancar").on('click',function(){
    $.ajax({
            'url' : 'avancarpagina.php',
            'type' : 'GET',
            'data' :{
                        'parametro1' : 1
                    },
            'success' : function(retorno){               
                            if (retorno != null) {
                                document.getElementById('conteudo').innerHTML = retorno;
                            }else{
                                alert('não deu certo');
                            }
                        }
        });        
});

$("#voltar").on('click',function(){
    $.ajax({
            'url' : 'avancarpagina.php',
            'type' : 'GET',
            'data' :{
                        'parametro1' : 2
                    },
            'success' : function(retorno){               
                            if (retorno != null) {
                                document.getElementById('conteudo').innerHTML = retorno;
                            }else{
                                alert('não deu certo');
                            }
                        }
        });        
});