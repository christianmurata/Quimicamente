var marcado = 0;
var selecionado = 0;
var nvlUsuario = -1;

var slides = new Array();
var questoes = new Array();

var numSlide = 0;
var numQuestao = 0;

var idQuestao = 1;
var idSlide = 1;

function checkLogin(){
    $.ajax({
        url: '../models/checkLogin.php',
        async: false,
        success: function(resposta){
            nvlUsuario = JSON.parse(resposta);
        }
    });
}

//SELECIONAR MÓDULO NA LISTA

function selecModulo(id){
    "use strict";
    var sel = null;
    if(marcado != 0){
        sel = document.getElementById("selModulo_"+marcado);
        sel.style.background= "white";
        if(marcado == id){
            marcado = 0;
            document.getElementById("avanca1").disabled = true;
            return;
        }
    }
    sel = document.getElementById("selModulo_"+id);
    sel.style.background = '#4FFFBC';
    marcado = id;
    document.getElementById("avanca1").disabled = false;      
}

//EXCLUIR SLIDE

function excluirSlide(id){
    salvaTXT(selecionado);
    var aux = new Array();
    for(var j = 0;j < slides.length; j=j+2){
        if(slides[j] != id){
            aux.push(slides[j],slides[j+1]);
        }
    }
    slides.length = 0;
    slides = aux;
    numSlide--;
    
    $('.slide-restante').text(7-numSlide);
    if(numSlide < 4){
        $('.slide-restante').css('color','black');
    }
    if(numSlide < 7){
        $('.btn-new-slide').removeAttr('disabled');
    }
    
    $('.novo-slide'+id).remove();
    $('.exclui-slide'+id).remove();
    
    $('.move-slide-dn-'+id).remove();
    $('.move-slide-up-'+id).remove();
    
    if(numSlide == 0){
        $('#summernote').summernote('code','');
        $('.note-editable').attr('contenteditable','false');
        $('.btn-salva-conteudo').attr('disabled', 'disabled');
    }
    
    else{  
        if(selecionado == id){
            seleciona(slides[0]);
        }
    }
    
    console.log(slides);
}

function excluirQuestao(id){
    var aux = new Array();
    for(var h = 0; h < questoes.length; h=h+7){
        if(questoes[h] != id){
            aux.push(questoes[h],questoes[h+1],questoes[h+2],questoes[h+3],questoes[h+4],questoes[h+5],questoes[h+6]);
        }
    }
    numQuestao--;
    if(numQuestao <1 )$('.btn-salva-conteudo').attr('disabled','disabled');
    questoes.length = 0;
    questoes = aux;
    console.log(questoes);
    console.log(aux);
    $('.nova-questao'+id).remove();
    $('.exclui-questao'+id).remove();
}

function novoSlide(){
    $('.box-slides').append("<div class='novo-slide"+idSlide+"' onclick='console.log(seleciona("+idSlide+"))'>Slide "+idSlide+"</div><div class='exclui-slide"+idSlide+"' onclick='excluirSlide("+idSlide+")'>Excluir</div><div class='move-slide-up-"+idSlide+"' onclick='moveUP("+idSlide+")'>&#9650;</div><div class='move-slide-dn-"+idSlide+"' onclick='moveDN("+idSlide+")'>&#9660;</div>");
        
        salvaTXT(idSlide);
        console.log(seleciona(idSlide));
        $('.note-editable').attr('contenteditable','true');
        
        if(questoes.length > 0)
            $('.btn-salva-conteudo').removeAttr('disabled');
        
        idSlide++;
        numSlide++;
        
        $('.slide-restante').text(7-numSlide);
        if(numSlide > 3){
            $('.slide-restante').css('color','red');
        }
        if(numSlide > 6){
            $('.btn-new-slide').attr('disabled','disabled');
        }
        $('#summernote').summernote('code', '');
        console.log(slides);
}

//PEGA O TEXTO DO EDITOR E SALVA NO ÍNDICE DO SLIDE SELECIONADO

function salvaTXT(id){
    for(var i = 0; i <= slides.length; i=i+2){
        if(slides[i] == id){
                slides[i+1] = $('#summernote').summernote('code');
                return;
            }
        }

    for(var l = 0; l <=slides.length; l=l+2){
        if(slides[l] == undefined){
            slides[l] = id;
            slides[l+1] = "";
            return;
        }
    }
}

//MOVE SLIDE PRA BAIXO

function moveDN(id){
    salvaTXT(selecionado);
    var id_;
    var cont_;
    var txt_;
    var txt__;
    
    var enun;
    var res1;
    var res2;
    var res3;
    var res4;
    var res5;
    
    for(var i = 0; i <= slides.length; i=i+2){
        if(slides[i] == id){
            if(i == slides.length-2)  return;
            
            txt_ = $('.novo-slide'+slides[i]).text();
            txt__ = $('.novo-slide'+slides[i+2]).text();
            
            var idAtual = slides[i];
            var idTroca = slides[i+2];
            
            //TROCAR ATRIBUTOS
            
            //labels
            
            $('.novo-slide'+slides[i]).text(txt__);
            $('.novo-slide'+slides[i+2]).text(txt_);
            
                        
            //------------------------------- botao excluir - onclick
            $('.exclui-slide'+idAtual).attr('onclick','excluirSlide('+idTroca+')');
            $('.exclui-slide'+idTroca).attr('onclick','excluirSlide('+idAtual+')');
            
            //------------------------------- BOTAO EXCLUIR - NOME DA CLASSE
            $('.exclui-slide'+idAtual).addClass('temp-exclui-slide'+idAtual);
            $('.temp-exclui-slide'+idAtual).removeClass('exclui-slide'+idAtual);
            
            $('.exclui-slide'+idTroca).addClass('exclui-slide'+idAtual);
            $('.exclui-slide'+idTroca).removeClass('exclui-slide'+idTroca);
            
            $('.temp-exclui-slide'+idAtual).addClass('exclui-slide'+idTroca);
            $('.temp-exclui-slide'+idAtual).removeClass('temp-exclui-slide'+idAtual);
            
            //------------------------------- BOTAO BAIXO - onclick
            $('.move-slide-dn-'+idAtual).attr('onclick','moveDN('+idTroca+')');
            $('.move-slide-dn-'+idTroca).attr('onclick','moveDN('+idAtual+')');
            
                        
            //------------------------------- BOTAO BAIXO - nome da classe
            $('.move-slide-dn-'+idAtual).addClass('temp-move-slide-dn-'+idAtual);
            $('.temp-move-slide-dn-'+idAtual).removeClass('move-slide-dn-'+idAtual);
            
            $('.move-slide-dn-'+idTroca).addClass('move-slide-dn-'+idAtual);
            $('.move-slide-dn-'+idTroca).removeClass('move-slide-dn-'+idTroca);
            
            $('.temp-move-slide-dn-'+idAtual).addClass('move-slide-dn-'+idTroca);
            $('.temp-move-slide-dn-'+idAtual).removeClass('temp-move-slide-dn-'+idAtual);
            
            //------------------------------- BOTAO CIMA - onclick
            $('.move-slide-up-'+idAtual).attr('onclick','moveUP('+idTroca+')');
            $('.move-slide-up-'+idTroca).attr('onclick','moveUP('+idAtual+')');
            
                        
            //------------------------------- BOTAO CIMA - nome da classe
            $('.move-slide-up-'+idAtual).addClass('temp-move-slide-up-'+idAtual);
            $('.temp-move-slide-up-'+idAtual).removeClass('move-slide-up-'+idAtual);
            
            $('.move-slide-up-'+idTroca).addClass('move-slide-up-'+idAtual);
            $('.move-slide-up-'+idTroca).removeClass('move-slide-up-'+idTroca);
            
            $('.temp-move-slide-up-'+idAtual).addClass('move-slide-up-'+idTroca);
            $('.temp-move-slide-up-'+idAtual).removeClass('temp-move-slide-up-'+idAtual);
                        
            //------------------------------- SLIDE - onclick
            $('.novo-slide'+idAtual).attr('onclick','seleciona('+idTroca+')');
            $('.novo-slide'+idTroca).attr('onclick','seleciona('+idAtual+')');
            
            //------------------------------- SLIDE - nome da classe
            $('.novo-slide'+idAtual).addClass('temp-novo-slide'+idAtual);
            $('.temp-novo-slide'+idAtual).removeClass('novo-slide'+idAtual);
            
            $('.novo-slide'+idTroca).addClass('novo-slide'+idAtual);
            $('.novo-slide'+idTroca).removeClass('novo-slide'+idTroca);
            
            $('.temp-novo-slide'+idAtual).addClass('novo-slide'+idTroca);
            $('.temp-novo-slide'+idAtual).removeClass('temp-novo-slide'+idAtual);
            
            
            cont_ = slides[i+1];
             
            slides[i] = idTroca;
            slides[i+1] = slides[i+3];
            
            slides[i+2] = idAtual;
            slides[i+3] = cont_;
            
            console.log(slides);
            return;
        }
    }
}

//MOVE SLIDE PRA CIMA

function moveUP(id){
    salvaTXT(selecionado);
    var id_;
    var cont_;
    var txt_;
    var txt__;
    
    var enun;
    var res1;
    var res2;
    var res3;
    var res4;
    var res5;
    
    for(var i = 0; i <= slides.length; i=i+2){
        if(slides[i] == id){
            if(i == 0)  return;
            
            txt_ = $('.novo-slide'+slides[i]).text();
            txt__ = $('.novo-slide'+slides[i-2]).text();
            
            var idAtual = slides[i];
            var idTroca = slides[i-2];
            
            //TROCAR ATRIBUTOS
            
            //labels
            
            $('.novo-slide'+slides[i]).text(txt__);
            $('.novo-slide'+slides[i-2]).text(txt_);
            
                        
            //------------------------------- botao excluir - onclick
            $('.exclui-slide'+idAtual).attr('onclick','excluirSlide('+idTroca+')');
            $('.exclui-slide'+idTroca).attr('onclick','excluirSlide('+idAtual+')');
            
            //------------------------------- BOTAO EXCLUIR - NOME DA CLASSE
            $('.exclui-slide'+idAtual).addClass('temp-exclui-slide'+idAtual);
            $('.temp-exclui-slide'+idAtual).removeClass('exclui-slide'+idAtual);
            
            $('.exclui-slide'+idTroca).addClass('exclui-slide'+idAtual);
            $('.exclui-slide'+idTroca).removeClass('exclui-slide'+idTroca);
            
            $('.temp-exclui-slide'+idAtual).addClass('exclui-slide'+idTroca);
            $('.temp-exclui-slide'+idAtual).removeClass('temp-exclui-slide'+idAtual);
            
            //------------------------------- BOTAO BAIXO - onclick
            $('.move-slide-dn-'+idAtual).attr('onclick','moveDN('+idTroca+')');
            $('.move-slide-dn-'+idTroca).attr('onclick','moveDN('+idAtual+')');
            
                        
            //------------------------------- BOTAO BAIXO - nome da classe
            $('.move-slide-dn-'+idAtual).addClass('temp-move-slide-dn-'+idAtual);
            $('.temp-move-slide-dn-'+idAtual).removeClass('move-slide-dn-'+idAtual);
            
            $('.move-slide-dn-'+idTroca).addClass('move-slide-dn-'+idAtual);
            $('.move-slide-dn-'+idTroca).removeClass('move-slide-dn-'+idTroca);
            
            $('.temp-move-slide-dn-'+idAtual).addClass('move-slide-dn-'+idTroca);
            $('.temp-move-slide-dn-'+idAtual).removeClass('temp-move-slide-dn-'+idAtual);
            
            //------------------------------- BOTAO CIMA - onclick
            $('.move-slide-up-'+idAtual).attr('onclick','moveUP('+idTroca+')');
            $('.move-slide-up-'+idTroca).attr('onclick','moveUP('+idAtual+')');
            
                        
            //------------------------------- BOTAO CIMA - nome da classe
            $('.move-slide-up-'+idAtual).addClass('temp-move-slide-up-'+idAtual);
            $('.temp-move-slide-up-'+idAtual).removeClass('move-slide-up-'+idAtual);
            
            $('.move-slide-up-'+idTroca).addClass('move-slide-up-'+idAtual);
            $('.move-slide-up-'+idTroca).removeClass('move-slide-up-'+idTroca);
            
            $('.temp-move-slide-up-'+idAtual).addClass('move-slide-up-'+idTroca);
            $('.temp-move-slide-up-'+idAtual).removeClass('temp-move-slide-up-'+idAtual);
                        
            //------------------------------- SLIDE - onclick
            $('.novo-slide'+idAtual).attr('onclick','seleciona('+idTroca+')');
            $('.novo-slide'+idTroca).attr('onclick','seleciona('+idAtual+')');
            
            //------------------------------- SLIDE - nome da classe
            $('.novo-slide'+idAtual).addClass('temp-novo-slide'+idAtual);
            $('.temp-novo-slide'+idAtual).removeClass('novo-slide'+idAtual);
            
            $('.novo-slide'+idTroca).addClass('novo-slide'+idAtual);
            $('.novo-slide'+idTroca).removeClass('novo-slide'+idTroca);
            
            $('.temp-novo-slide'+idAtual).addClass('novo-slide'+idTroca);
            $('.temp-novo-slide'+idAtual).removeClass('temp-novo-slide'+idAtual);
            
            
            cont_ = slides[i+1];
             
            slides[i] = idTroca;
            slides[i+1] = slides[i-1];
            
            slides[i-2] = idAtual;
            slides[i-1] = cont_;
            
            console.log(slides);
            return;
        }
    }
}

//SELECIONA O SLIDE E JOGA O CONTEÚDO DELE PRO EDITOR

function seleciona(id){
    var idAnt = selecionado;
    selecionado = id;
    for(var j = 0;j <= slides.length; j=j+2){
        if(slides[j] == id){
            $('#summernote').summernote('code',slides[j+1]);
            $('#sumenote').summernote('focus');
            
            $('.novo-slide'+selecionado).css('background-color',"#BABABA");
            $('.novo-slide'+idAnt).css('background-color',"#DADADA");
            return "selecionado "+slides[j]+"\n"+slides[j+1];
        }
    }
    return "nao selecionou";
}

//TESTAR TEXTO DAS QUESTÕES

function testa_questao(){
    var preenchido = true;
    
    if(!$.trim($('.form-alt-enunciado').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.form-alt-1').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.form-alt-2').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.form-alt-3').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.form-alt-4').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.form-alt-5').val())){
        preenchido = false;
    }
    
    if(preenchido == true){
        $('.btn-nova-questao').removeAttr('disabled');
        return true;
    }
    
    else{
        $('.btn-nova-questao').attr('disabled', 'disabled');
        return false;
    }
}

function limpa_alt(){
    $('.form-alt-enunciado').val("");
    $('.form-alt-1').val("");
    $('.form-alt-2').val("");
    $('.form-alt-3').val("");
    $('.form-alt-4').val("");
    $('.form-alt-5').val("");
}

function insere_questao(push){
    questoes.push(idQuestao);
    if(push)
        questoes.push($('.form-alt-enunciado').val(), $('.form-alt-1').val(), $('.form-alt-2').val(), $('.form-alt-3').val(), $('.form-alt-4').val(), $('.form-alt-5').val());
    
    $('.box-questoes').append("<div class='nova-questao"+idQuestao+"' onclick='console.log(\"carregar questao\")'>Questão "+idQuestao+"</div><div class='exclui-questao"+idQuestao+"' onclick='excluirQuestao("+idQuestao+")'>Excluir</div>");
    
    if(slides.length > 0)   $('.btn-salva-conteudo').removeAttr('disabled');
    numQuestao++;
    idQuestao++;
}

function testa_novo_modulo(){
    var preenchido = true;
    
    if(!$.trim($('#form-nome-modulo').val())){
        preenchido = false;
    }
    if(!$.trim($('#form-desc-modulo').val())){
        preenchido = false;
    }
    
    if(preenchido == true){
        $('.btn-novo-modulo').removeAttr('disabled');
        return true;
    }
    
    else{
        $('.btn-novo-modulo').attr('disabled', 'disabled');
        return false;
    }
}

function limpa_novo_modulo(){
    $('#form-nome-modulo').val("");
    $('#form-desc-modulo').val("");
    $('.btn-novo-modulo').attr('disabled','disabled');
    $('.form-posicao-modulo option:last').removeAttr("selected");
    $('.form-posicao-modulo option:last').attr({selected:"selected"});
}

function insere_modulo(){
    $.ajax({
       url: "../controllers/control_adcCtd.php?action=novoModulo",
        type:'POST',
        data: {
            conteudos_nome:     $('#form-nome-modulo').val(),
            conteudos_desc:     $('#form-desc-modulo').val(),
            conteudos_ordem:    $('.form-posicao-modulo option:selected').val()
        },
        async: false,
        success: function(resposta){
            carregarConteudos();
            //selecModulo(reposta);
        }
    });
}

function excluir_modulo(id){
    console.log("hey");
    $.ajax({
       url: "../controllers/control_adcCtd.php?action=excluiModulo",
        type:'POST',
        data: {
            conteudos_id: id
        },
        async: false,
        success: function(resposta){
            marcado = 0;
            carregarConteudos();
        }
    });
}

function carregarConteudos(){
        $.ajax({
        url: '../controllers/control_adcCtd.php?action=carregarConteudo',
        async: false,
        type: 'POST',
        //dataType: 'JSON',
        success: function(resposta){
            resposta = JSON.parse(resposta);
            console.log(resposta);
            var conts = resposta[0];
            var conts_com = resposta[1];
            
            $('#form-posicao-modulo').empty().append("<option value = 'nan-0'>Nenhum</option>");
            tabela = document.getElementById("table-modulo");
            for(var i = tabela.rows.length-1; i > 0; i--){
                tabela.deleteRow(i);
            }
            
            for(var i = 0;i < conts_com.length; i++){
                var linha = conts_com[i];
                
                var row = tabela.insertRow(i+1);
                var col = row.insertCell(0);
                
                col.style.height = "50px";
                if(nvlUsuario == 1) linha["conteudos_comunidade_nome"] = "<b>[COMUNIDADE] </b>" + linha["conteudos_comunidade_nome"];
                col.innerHTML = linha["conteudos_comunidade_nome"];
                
                
                col.id = "selModulo_com-"+linha["conteudos_comunidade_id"];
                col.setAttribute("onclick","selecModulo('com-"+linha["conteudos_comunidade_id"]+"')");
                
                var col2 = row.insertCell(1);
                col2.style.width = "10%";
                col2.innerHTML = "<button type='button' class='btn btn-qmt btn-sm'>Excluir</button>";
                col2.setAttribute("onclick","excluir_modulo('com-"+linha['conteudos_comunidade_id']+"')");
                
                if(nvlUsuario == 2){
                    var opt = new Option(linha["conteudos_comunidade_nome"],'com-'+linha["conteudos_comunidade_ordem"]);
                document.getElementById("form-posicao-modulo").add(opt);
                }
           }
            if(nvlUsuario == 1)
            for(var i = 0;i < conts.length; i++){
                var linha = conts[i];
                
                var row = tabela.insertRow(i+1);
                var col = row.insertCell(0);
                
                col.style.height = "50px";
                col.innerHTML = linha["conteudos_nome"];
                
                col.id = "selModulo_ofc-"+linha["conteudos_id"];
                col.setAttribute("onclick","selecModulo('ofc-"+linha["conteudos_id"]+"')");
                
                var col2 = row.insertCell(1);
                col2.style.width = "10%";
                col2.innerHTML = "<button type='button' class='btn btn-qmt btn-sm'>Excluir</button>";
                col2.setAttribute("onclick","excluir_modulo('ofc-"+linha['conteudos_id']+"')");
                
                var opt = new Option(linha["conteudos_nome"],'ofc-'+linha["conteudos_ordem"]);
                document.getElementById("form-posicao-modulo").add(opt);
           }            
            
            $('.form-posicao-modulo option:last').attr({selected:"selected"});
        }
       
    });
}

function carregarSlides(){
    $.ajax({
        url: '../controllers/control_adcCtd.php?action=carregarSlides',
        async: false,
        type: 'POST',
        data:{
            conteudos_id: marcado
        },
        success: function(resposta){
            if(resposta.length < 10)    return;
            var content_ = JSON.parse(resposta);
            
            var slides_ = content_[0];
            var questoes_ = content_[1];
            var respostas_ = content_[2];
            
            if(marcado.split("-")[0] == 'com'){ var tipo_ = "_comunidade";}
            else {var tipo_ = "";}
                if(slides_.length > 0){
                    for(i = 0, j = 1; i < slides_.length; i++, j=j+2){
                        var linha = slides_[i];
                        novoSlide(); 
                        slides[j] = linha["slides"+tipo_+"_conteudo"];
                    }
                    seleciona(selecionado);
                    for(i = 0, j = 1, k = 0; i < questoes_.length; i++,j=j+7, k=k+5){
                        var linha = questoes_[i];
                        insere_questao(false);
                        questoes[j] = linha["perguntas"+tipo_+"_descricao"];
                        for(l = k; l < k+5; l++){
                            var linha2 = respostas_[l];
                            questoes.push(linha2["respostas"+tipo_+"_desc"]);
                        }
                    }
                }
        }
    });
}

function salvarSlides(){
    
    $.ajax({
        url: '../controllers/control_adcCtd.php?action=salvarSlides',
        async: false,
        type: 'POST',
        data:{
            conteudos_id: marcado,
            slides: slides,
            perguntas: questoes
        }
    });
}

//JQUERY EXECUTADO NO CARREGAMENTO
jQuery(document).ready(function() {
    checkLogin();
    if(nvlUsuario < 1 && nvlUsuario > 2){
        location.href('home.php');
    }
    
    //RENDERIZA O SUMMERNOTE
    $('#summernote').summernote({
        placeholder: 'Insira o conteúdo do slide...',
        height: 300,
        minHeight: 300,
    });
    $('#summernote').summernote('code', '');
    
    //INICIA O FORM
    $('.cadModulo-form fieldset:first-child').fadeIn('slow');
    
    //DESABILITA A EDIÇÃO, HABILITA QUANDO CRIAR O SLIDE
    $('.note-editable').attr('contenteditable','false');
    
    //TODA VEZ QUE PRESSIONAR UMA TECLA NO EDITOR, SALVA O TEXTO
    
    $('.panel-body').on('keyup', function(){
        salvaTXT(selecionado);
        console.log(slides);
    })

    carregarConteudos();
    
    // next step
    $('.cadModulo-form .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');

    		parent_fieldset.fadeOut(400, function() {
	    		$(this).next().fadeIn();
	    	});	
    });
    
    // previous step
    $('.cadModulo-form .btn-previous').on('click', function() {
    	$(this).parents('fieldset').fadeOut(400, function() {
    		$(this).prev().fadeIn();
    	});
    }); 
});
