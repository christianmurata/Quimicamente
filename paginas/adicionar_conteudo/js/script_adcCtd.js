var marcado = 0;
var selecionado = 0;
var nvlUsuario = -1;

var slides = new Array();
var questoes = new Array();

var numSlide = 0;
var numQuestao = 0;

var idQuestao = 1;
var idSlide = 1;

var modo = 0;       //modo: 0 = selecao, 1 = edicao
var diff = false; //testa se o conteúdo não foi salvo

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
        if(marcado != id){
            sel = document.getElementById("selModulo_"+marcado);
            sel.style.background= "white";
        }

        else    return;
    }
    sel = document.getElementById("selModulo_"+id);
    sel.style.background = '#4FFFBC';
    marcado = id;
    document.getElementById("avanca1").disabled = false;
}

//SELECIONAR MÓDULO NA LISTA

function selecModuloForce(id){
    "use strict";
    var sel = null;
    if(marcado != 0){
        sel = document.getElementById("selModulo_"+marcado);
        sel.style.background= "white";
    }
    sel = document.getElementById("selModulo_"+id);
    sel.style.background = '#4FFFBC';
    marcado = id;
    document.getElementById("avanca1").disabled = false;
    carregarSlides(marcado);
    var parent_fieldset = $('fieldset');

    parent_fieldset.fadeOut(400, function() {
        $(this).next().fadeIn();
    });
}

//EXCLUIR SLIDE

function excluirSlide(id){
    //salvaTXT(selecionado);
    var aux = new Array();
    for(var j = 0;j < slides.length; j=j+2){
        if(slides[j] != id){
            aux.push(slides[j],slides[j+1]);
        }
    }
    slides.length = 0;
    slides = aux;
    numSlide--;
    
    $('.novo-slide'+id).remove();
    $('.exclui-slide'+id).remove();
    
    $('.move-slide-dn-'+id).remove();
    $('.move-slide-up-'+id).remove();
    
    if(numSlide == 0){
        $('#summernote').summernote('code','');
        $('.note-editable').attr('contenteditable','false');
        $('.note-editor').css('display','none');

        $('#msgEditor').css('display', 'block');
        document.getElementById("msgEditor").style.marginTop = "30px";

        $('.btn-salva-conteudo').attr('disabled', 'disabled');
        selecionado = 0;
    }
    
    else{  
        if(selecionado == id){
            seleciona(slides[0]);
        }
    }
    
    console.log(slides);
    diff = true;
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
    diff = true;
}

function processar(id) {
    if(selecionado == id)   return;
    if(selecionado > 0)
        if(salvaTXT(-1))
            seleciona(id);
}

function novoSlide(){
    $('.box-slides').append("<div class='novo-slide" + idSlide + "' onclick='processar("+idSlide+")'>Slide " + idSlide + "</div><div class='exclui-slide" + idSlide + "' onclick='excluirSlide(" + idSlide + ")'>Excluir</div><div class='move-slide-up-" + idSlide + "' onclick='moveUP(" + idSlide + ")'>&#9650;</div><div class='move-slide-dn-" + idSlide + "' onclick='moveDN(" + idSlide + ")'>&#9660;</div>");

    slides.push(idSlide);
    slides.push("");

    seleciona(idSlide);

    idSlide++;
    numSlide++;

    $('.note-editable').attr('contenteditable', 'true');
    $('.note-editor').css('display','block');

    $('#msgEditor').css('display', 'none');
    document.getElementById("msgEditor").style.marginTop = "30px";
    if (questoes.length > 0)
        $('.btn-salva-conteudo').removeAttr('disabled');

    $('#summernote').summernote('code', '');
    console.log(slides);
}

//PEGA O TEXTO DO EDITOR E SALVA NO ÍNDICE DO SLIDE SELECIONADO

function salvaTXT(id) {
    //if(id == selecionado)   return;
    if(id == -1) id = selecionado;

    var valido = true;
    diff = true;
    if($('#summernote').summernote('code').replace(/&nbsp;/gi,'').replace(/<\/?[^>]+(>|$)/g, "").trim().length < 10){
        swal({
            title: "Oops...",
            text: "Insira pelo menos 10 caracteres ou exclua o slide!",
            type: "error"
        });
        valido = false;
    }
    if(valido == false){
        return false;
    }
   else {
        slides[slides.indexOf(id) + 1] = $('#summernote').summernote('code');
        return true;
    }
}

function salvaTXTnoMSG(id) {
    if(id == -1) id = selecionado;
    slides[slides.indexOf(id)+1] = $('#summernote').summernote('code');
    diff = true;
    return;
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

    $('#summernote').summernote('code', slides[slides.indexOf(id)+1]);

    $('.novo-slide' + selecionado).css('background-color', "#BABABA");
    $('.novo-slide' + idAnt).css('background-color', "#DADADA");
    $('#summernote').summernote('focus');
}

//TESTAR TEXTO DAS QUESTÕES

function testa_questao(modo){
    if(modo == 1)   t = "editar-";
    else t = "";
    var preenchido = true;
    
    if(!$.trim($('.'+t+'form-alt-enunciado').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.'+t+'form-alt-1').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.'+t+'form-alt-2').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.'+t+'form-alt-3').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.'+t+'form-alt-4').val())){
        preenchido = false;
    }
    
    if(!$.trim($('.'+t+'form-alt-5').val())){
        preenchido = false;
    }
    
    if(preenchido == true){
        $('.btn-'+t+'nova-questao').removeAttr('disabled');
        return true;
    }
    
    else{
        $('.btn-'+t+'nova-questao').attr('disabled', 'disabled');
        return false;
    }
}

function limpa_alt(){
    $('.form-alt-enunciado').val("");
    $('.form-alt-1')        .val("");
    $('.form-alt-2')        .val("");
    $('.form-alt-3')        .val("");
    $('.form-alt-4')        .val("");
    $('.form-alt-5')        .val("");
}

function insere_questao(push){
    questoes.push(idQuestao);
    if(push)
        questoes.push($('.form-alt-enunciado').val(), $('.form-alt-1').val(), $('.form-alt-2').val(), $('.form-alt-3').val(), $('.form-alt-4').val(), $('.form-alt-5').val());
    
    $('.box-questoes').append("<div class='nova-questao"+idQuestao+"' data-toggle='modal' data-target='#modalEditaQuestao' onclick='editaQuestao("+idQuestao+")'>Questão "+idQuestao+"</div><div class='exclui-questao"+idQuestao+"' onclick='excluirQuestao("+idQuestao+")'>Excluir</div>");
    
    if(slides.length > 0)   $('.btn-salva-conteudo').removeAttr('disabled');
    numQuestao++;
    idQuestao++;
    diff = true;
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
            modo = 1;
            $("#modalNovoModulo").modal("hide");
            carregarConteudos();
            selecModuloForce(JSON.parse(resposta));
            $("#modalCapa").modal("show");
        }
    });
}

function excluir_modulo(id){

    swal({
        title: 'Deseja mesmo excluir esse conteúdo?',
        text: 'Essa ação não pode ser desfeita!',
        showCancelButton: true,
        type: 'warning',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Excluir',
        cancelButtonColor: '#cacaca',
        confirmButtonColor: '#d33',
        showLoaderOnConfirm: true,
        preConfirm: function () {
            return new Promise(function (resolve, reject) {
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
                        resolve();
                    }
                });
            })
        },
        allowOutsideClick: false
    }).then(function () {
        swal({
            type: 'success',
            title: 'Conteúdo excluído.'
        })
    }, function (dismiss) {

    })
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
                if(nvlUsuario == 1) linha["conteudos_comunidade_nome"] = "<b>[Prof. "+linha["usuarios_nome"]+"] </b>" + linha["conteudos_comunidade_nome"];
                col.innerHTML = linha["conteudos_comunidade_nome"];
                
                
                col.id = "selModulo_com-"+linha["conteudos_comunidade_id"];
                col.setAttribute('ondblclick',"selecModuloForce('com-"+linha["conteudos_comunidade_id"]+"')");
                col.setAttribute("onclick","selecModulo('com-"+linha["conteudos_comunidade_id"]+"')");
                var col3 = row.insertCell(1);
                col3.style.width = "10%";
                col3.innerHTML = "<button type='button' class='btn btn-qmt btn-sm'>Excluir</button>";
                col3.setAttribute("onclick","excluir_modulo('com-"+linha['conteudos_comunidade_id']+"')");
                
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
                col.setAttribute('ondblclick',"selecModuloForce('ofc-"+linha["conteudos_id"]+"')")
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
    modo = 1;
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

            
            if(marcado.split("-")[0] == 'com'){ var tipo_ = "_comunidade";}

            else {var tipo_ = "";}
                if(slides_.length > 0){
                    for(i = 0, j = 1; i < slides_.length; i++, j=j+2){
                        var linha = slides_[i];
                        novoSlide();
                        slides[j] = linha["slides"+tipo_+"_conteudo"];
                    }
                    seleciona(1);
                    questoes = [];
                    for(i = 0; i < questoes_.length; i++){
                        var linha = questoes_[i];
                        insere_questao(false);
                        questoes.push(linha[0]["perguntas"+tipo_+"_descricao"]);
                        for(j = 0;j < 5;j++){
                            questoes.push(linha[j]["respostas"+tipo_+"_desc"]);
                        }
                    }
                    diff = false;
                }
                else{
                    swal({
                        title: "Oops...",
                        html: "Erro ao trazer os slides!<br> Tente novamente mais tarde ou contacte o suporte!",
                        type: "error",
                        allowOutsideClick: false
                    }).then(function() {
                        location.reload();
                    });
                }
        }
    });
}


function salvarSlides(){
    if(salvaTXT(selecionado)) {
        diff = true;
        swal({
            showConfirmButton: false,
            title: "Salvando...",
            text: "Aguarde um instante ;)",
            allowOutsideClick: false,
            onOpen: function () {
                swal.showLoading();
                $.ajax({
                    url: '../controllers/control_adcCtd.php?action=salvarSlides',
                    async: false,
                    type: 'POST',
                    data: {
                        conteudos_id: marcado,
                        slides: slides,
                        perguntas: questoes
                    },
                    success: function () {
                        diff = false;
                        swal.close();
                        swal({
                            type: "success",
                            title: "Salvo!",
                            text: "Salvo com sucesso!",
                            timer: 2000,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    }
                });

            }
        });
    }
}

function getCoords(){
    var api;
    $('#toCrop').Jcrop({
        minSize: [160,160],
        aspectRatio: 1,
        bgOpacity: 0.4,
        addClass: 'jcrop-light',
        onSelect: updateCoords,
        onChange: updateCoords,
        setSelect: [0,0,160,160]
    });
}

function updateCoords(c){
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
};

function _(element){
    if(document.getElementById(element))
        return document.getElementById(element);
    else
        return false;
}

function limpaImg() {
    $('#x').val(0);
    $('#y').val(0);
    $('#w').val(0);
    $('#h').val(0);

    document.getElementById("resultCrop").innerHTML = "";
}

function capaPadrao() {
    swal({
        showConfirmButton: false,
        title: "Definindo capa padrão...",
        text: "Aguarde um instante ;)",
        allowOutsideClick: false,
        onOpen: function () {
            swal.showLoading();
            $.ajax({
                url: '../controllers/control_adcCtd.php?action=capaPadrao',
                async: false,
                type: 'POST',
                success: function () {
                    swal.close();
                    swal({
                        type: "success",
                        title: "Salvo!",
                        text: "Capa padrão definida com sucesso!",
                        timer: 2000,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            });

        }
    });
}

function removeCapaPadrao() {
    document.getElementById('btn-box-capa').innerHTML = ' <button type="button" class="btn btn-qmt" id="btnSalvaCapa" onclick="enviarImagem()">Salvar</button><button type="button" class="btn" data-dismiss="modal" onclick="limpaImg();">Cancelar</button>';
}

function enviarImagem(){
    if(_('arquivo').files[0]){//Se houver um arquivo, faremos alguns testes no mesmo
        var arquivo = _('arquivo').files[0];
         console.log(arquivo.type);
        if(arquivo.type != 'image/png' && arquivo.type != 'image/jpeg')
            swal({
               title: "Erro!",
               text: "Selecione uma imagem JPEG ou PNG!",
               type: "error"
            });
        else if(arquivo.size > 1024 * 2048)//2MB
            swal({
                title: "Erro!",
                text: "Selecione uma imagem com no máximo 2MB!",
                type: "error"
            });
        else{
            var x = _('x').value;
            var y = _('y').value;
            var w = _('w').value;
            var h = _('h').value;
            var formData = new FormData();
            formData.append('arquivo', arquivo);
            formData.append('x', x);
            formData.append('y', y);
            formData.append('w', w);
            formData.append('h', h);
            formData.append('id_conteudo', marcado);

            if(_('imgType')){
                var imgType = _('imgType').value;
                formData.append('imgType', imgType);
            }
            if(_('imgName')){
                var imgName = _('imgName').value;
                formData.append('imgName', imgName);
            }

            if(_('toCrop')) {
                var includeFile = '../controllers/control_adcCtd.php?action=salvarCapa';
            }
            else {
                var includeFile = '../controllers/control_adcCtd.php?action=cortarCapa';
            }
            swal({
                title: "Enviando...",
                text: "Aguarde um instante!",
                allowOutsideClick: false,
                showConfirmButton: false,
                onOpen: function () {
                    swal.showLoading();
                    $.ajax({
                        url: includeFile,
                        type: 'POST',
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        async: false,
                        data: formData,

                        success: function (resposta) {
                            swal.close();
                            if(!_('toCrop')){
                                var resp = JSON.parse(resposta);
                                if(resp[0] === "success") {
                                    $("#modalCapa").modal("hide");
                                    document.getElementById("resultCrop").innerHTML = resp[1];
                                    $("#modalCapa2").modal("show");
                                }
                                else{
                                    swal({
                                        title: "Erro!",
                                        text: resp[1],
                                        type: "error"
                                    });
                                    return;
                                }
                            }

                            else{
                                var resp = JSON.parse(resposta);
                                if(resp[0] === "success"){
                                    document.getElementById('btn-box-capa').innerHTML = '<button type="button" class="btn" id="btnSalvaCapa" onclick="novoCorte(); enviarImagem()">Cortar novamente</button><button type="button" class="btn btn-qmt" data-dismiss="modal" onclick="limpaImg();">Salvar</button>';
                                    document.getElementById("resultCrop").innerHTML = resp[1];
                                    swal({
                                        title: "Sucesso!",
                                        text: "Upload realizado com sucesso!",
                                        type: "success"
                                    });
                                }
                            }
                        }
                    });
                }
            });

        }
    }
    else{
        swal({
            title: "Erro!",
            text: "Selecione uma imagem!",
            type: "error"
        });
    }
}

function novoCorte() {
    document.getElementById('btn-box-capa').innerHTML = ' <button type="button" class="btn btn-qmt" id="btnSalvaCapa" onclick="enviarImagem()">Salvar</button><button type="button" class="btn" data-dismiss="modal" onclick="limpaImg(); capaPadrao();">Cancelar</button>';
}

$(window).bind('beforeunload', function(e){
    if(modo == 1 && diff == true){
        confirmationMessage = "Quer mesmo sair da página? O módulo NÃO será salvo.";


        e.returnValue = confirmationMessage;     // Gecko and Trident
        return confirmationMessage;              // Gecko and WebKit;
    }

    if(numSlide < 1 || numQuestao < 1){
        confirmationMessage = "Quer mesmo sair da página? O módulo NÃO será salvo.";


        e.returnValue = confirmationMessage;     // Gecko and Trident
        return confirmationMessage;              // Gecko and WebKit;
    }
});

$(window).bind('unload', function(e){
    //LogTime();

    if(numSlide < 1 || numQuestao < 1){
        $.ajax({
            url: '../controllers/control_adcCtd.php?action=excluiModuloVazio',
            data: {id:marcado},
            type: 'post',
            async: 'false',
        });
    }

  //  e.returnValue = confirmationMessage;     // Gecko and Trident
  //  return confirmationMessage;              // Gecko and WebKit;
});

function editaQuestao(id) {
    var i = questoes.indexOf(id);
    $(".editar-form-alt-enunciado").val(questoes[i+1]);
    $(".editar-form-alt-1").val(questoes[i+2]);
    $(".editar-form-alt-2").val(questoes[i+3]);
    $(".editar-form-alt-3").val(questoes[i+4]);
    $(".editar-form-alt-4").val(questoes[i+5]);
    $(".editar-form-alt-5").val(questoes[i+6]);

    testa_questao(1);

    $(".btn-editar-nova-questao").attr("onclick", "salva_edita_questao("+id+")");
}

function salva_edita_questao(id) {
    var i = questoes.indexOf(id);

    questoes[i+1] = $(".editar-form-alt-enunciado").val();
    questoes[i+2] = $(".editar-form-alt-1").val();
    questoes[i+3] = $(".editar-form-alt-2").val();
    questoes[i+4] = $(".editar-form-alt-3").val();
    questoes[i+5] = $(".editar-form-alt-4").val();
    questoes[i+6] = $(".editar-form-alt-5").val();
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
        lang: 'pt-BR'
    });
    $('#summernote').summernote('code', '');
    
    //INICIA O FORM
    $('.cadModulo-form fieldset:first-child').fadeIn('slow');
    
    //DESABILITA A EDIÇÃO, HABILITA QUANDO CRIAR O SLIDE
    $('.note-editable').attr('contenteditable','false');
    $('.note-editor').css('margin-top', '30px');
    $('.note-editor').css('display','none');

    $('#msgEditor').css('display', 'block');
    document.getElementById("msgEditor").style.marginTop = "30px";

    //TODA VEZ QUE PRESSIONAR UMA TECLA NO EDITOR, SALVA O TEXTO
    
    $('.panel-body').on('keyup', function(){
        salvaTXTnoMSG(selecionado);
        console.log(slides);
    })

    carregarConteudos();
    
    $('.btn-new-slide').on('click', function () {
        if(selecionado > 0){
            if(salvaTXT(-1))
                novoSlide();
        }

        else{
            novoSlide();
        }
    });

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