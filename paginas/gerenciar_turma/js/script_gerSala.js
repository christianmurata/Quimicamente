var idUsuarios = new Array();
var idModulos = new Array();
var idQuestoes = new Array();
var $_GET = {};
var mpMarcado = 0;
var usuariosMarcados = 0;

var turma;
var alunos;
var provas;
var respostas_prova;

function selecQuestao(id){
    "use strict";
    var sel = document.getElementById("questao"+id);
        for(var j = 0;j <= idQuestoes.length; j++){
            if(idQuestoes[j] == id){
                idQuestoes[j] = 0;
                sel.style.background= "white";
                console.log(idQuestoes);
                return;
            }
        }
    
        for(var i = 0; i <= idQuestoes.length; i++){
            if(idQuestoes[i] == undefined || idQuestoes[i] == 0){
                idQuestoes[i] = id;
                sel.style.background = '#4FFFBC';
                console.log(idQuestoes);
                break;
            }     
        }
}

function expandeModulo(id){
    var mod = document.getElementById("questaoModulo"+id);
    if(mod.style.display == "none"){
        mod.style.display = "block";
    }
    
    else{
        mod.style.display = "none";
    }
}

function limpaModulo(){
    var col;
    if(idModulos.length > 0){
        for(var i = 0; i < idModulos.length; i++){
            col = document.getElementById("selModulo"+idModulos[i]);
            if(col != null){
                col.style.background = "#FFF";
            }
            idModulos[i] = 0;
        }
    }
}

function expandeProva(id){
    var mod = document.getElementById("prova-"+id);
    if(mod.style.display == "none"){
        mod.style.display = "block";
    }
    
    else{
        mod.style.display = "none";
    }
}

function limpaModulo(){
    var col;
    if(idModulos.length > 0){
        for(var i = 0; i < idModulos.length; i++){
            col = document.getElementById("selModulo"+idModulos[i]);
            if(col != null){
                col.style.background = "#FFF";
            }
            idModulos[i] = 0;
        }
    }
}

function limpaQuestao(){
    var col;
    if(idQuestoes.length > 0){
        for(var i = 0; i < idQuestoes.length; i++){
            col = document.getElementById("questao"+idQuestoes[i]);
            if(col != null){
                col.style.background = "#FFF";
            }
            idQuestoes[i] = 0;
        }
    }
}

function selecModulo(id){
    "use strict";
    var sel = document.getElementById("selModulo"+id);
        for(var j = 0;j <= idModulos.length; j++){
            if(idModulos[j] == id){
                idModulos[j] = 0;
                sel.style.background= "white";
                mpMarcado--;
                console.log(idModulos);
                return;
            }
        }
    
        for(var i = 0; i <= idModulos.length; i++){
            if(idModulos[i] == undefined || idModulos[i] == 0){
                idModulos[i] = id;
                sel.style.background = '#4FFFBC';
                mpMarcado++;
                console.log(idModulos);
                break;
            }     
        }
}

function excluiLista(id) {
    "use strict";
    if(document.getElementById("aluno" + id).checked == true) {
        usuariosMarcados++;
        for(var i = 0; i <= usuariosMarcados; i++) {
            if(idUsuarios[i] == null || idUsuarios[i] == 0){
                idUsuarios[i] = id;
                break;
            }
        }
    }
    else {
        if(usuariosMarcados > 0){
            for(var i = 0; i <= usuariosMarcados; i++) {
                if(idUsuarios[i] == id) {
                    idUsuarios[i] = 0;
                }
            }
        usuariosMarcados--;
        }
    }
    if(usuariosMarcados < 1) {
        document.getElementById("btnRemove").disabled = true;
    }
    
    else {
        document.getElementById("btnRemove").disabled = false;
    }
    console.log(idUsuarios);
}

function carregarDetalhesAluno(id){
    tabela = document.getElementById("table-detalhes-aluno");
    
    for(i = 0; i < provas.length; i++){
        linhaProva = provas[i];
        repostas = respostas_prova[i];
        
        row = tabela.insertRow(i+1);
        col = row.insertCell(0);
        col.innerHTML = linhaProva["provas_id"]+"_"+formatar_data(linhaProva["provas_data"]);
        
        col2 = row.insertCell(1);
        col2.innerHTML = "--";
        
        col3 = row.insertCell(2);
        
        for(j = 0;j < repostas.length; j++){
            if(repostas[i]["alunos_id"] == id){
                col3.innerHTML = repostas[i]["respostas_prova_media"];
                return;
            }
            col3.innerHTML = "NF";
        }
        
    }
}

function carregarQuestoesElaborarProva(){
    $.ajax({
        url: "../controllers/control_gerSala.php?action=carregarQuestoesElaborarProva",
        type: "POST",
        
        success: function(resposta){
            qst = JSON.parse(resposta);
            
            modulos = qst[0];
            questoes = qst[1];
            
            tabela = document.getElementById("table-liberar-modulos");
            
            for(i = 0;i < modulos.length;i++){
                linha = modulos[i];
                row = tabela.insertRow(i+1);
                
                row.innerHTML = '<td onclick="expandeModulo('+linha["modulos_id"]+');" id="modulo"><b>'+linha["modulos_nome"]+'</b> <span style="float: right" class="glyphicon glyphicon-collapse-down"></span></td>';
            }
        }
    });
}

function carregarAlunos(){
            document.getElementById("lbl-num-alunos").innerHTML = alunos.length;
            
            tabela = document.getElementById("table-alunos");

            for(var i = tabela.rows.length-1; i > 0; i--){
                tabela.deleteRow(i);
            }
            
            for(i = 0; i < alunos.length; i++){
                aluno = alunos[i];
                row = tabela.insertRow(i+1);
                
                col = row.insertCell(0);
                col.innerHTML = "<input type='checkbox' id='aluno-"+aluno["alunos_id"]+"' onchange='excluiLista("+aluno["alunos_id"]+");'>";
                
                col2 = row.insertCell(1);
                col2.innerHTML = aluno["usuarios_nome"];
                
                col3 = row.insertCell(2);
                col3.innerHTML = "--";
                
                col4 = row.insertCell(3);
                col4.innerHTML = '<button class="btn btn-sm btn-qmt btn-right btn-painel" data-toggle="modal" data-target="#modalAluno" onclick="carregarDetalhesAluno('+aluno["alunos_id"]+')">Detalhes</button>';
            }
}

function carregarProvas(){
    tabela = document.getElementById("table-notas");
    
    for(var i = tabela.rows.length-1; i > 0; i--){
        tabela.deleteRow(i);
    }
    
    for(i = 0;i < provas.length; i=i+2){
        linha = provas[i];
        linha2 = respostas_prova[i];
        row = tabela.insertRow(i+1);
        
        row.innerHTML = '<td onclick="expandeProva('+linha["provas_id"]+');" id="headProva-'+linha["provas_id"]+'"><b>#'+linha["provas_id"]+'_'+formatar_data(linha["provas_data"])+'</b> <span style="float: right" class="glyphicon glyphicon-collapse-down"></span></td>';
        
   //     $('headProva-'+linha["provas_id"]).attr("onclick","expandeProva("+linha["provas_id"]+");");
        
        row = tabela.insertRow(i+2);
        col = row.insertCell(0);
    
        col.innerHTML = '<div class="table-responsive" id="prova-'+linha["provas_id"]+'" style="display: none;"><table class="table table-hover" id="prova'+linha["provas_id"]+'"><thead><tr><th>Aluno</th><th>Acertos</th><th>Nota</th></tr></thead><tbody></tbody></table></div>';
        
        subTabela = document.getElementById("prova"+linha["provas_id"]);
        
        for(j = 0;j < linha2.length;j++){
            linhaResp = linha2[j];
            
            subRow = subTabela.insertRow(j+1);
            
            subCol = subRow.insertCell(0);
            subCol.append(alunos[j]["usuarios_nome"]);
            
            subCol2 = subRow.insertCell(1);
            subCol2.append("--");
            
            subCol2 = subRow.insertCell(2);
            subCol2.append(linhaResp["respostas_prova_media"]);
            
        }
    }
}

function carregarPagina(){
        $.ajax({
        url: '../controllers/control_gerSala.php?action=validarSala',
        type: 'POST',
        async: 'false',
        data: {turmas_id: $_GET["id"]},
        success: function(resposta){
            var resp = JSON.parse(resposta);
            turma = resp[1];
            alunos = resp[2];
            provas = resp[3];
            respostas_prova = resp[4];

            $('.input-convite-link').val(resp[0]);
            document.getElementById("nome-turma").innerHTML = turma["turmas_nome"];
            
            carregarAlunos();
            carregarProvas();
        }
    });
}

function formatar_data(data){
    dt = data.split("-");
    return dt[2]+"/"+dt[1]+"/"+dt[0];
}

jQuery(document).ready(function(){
    var parts = window.location.search.substr(1).split("&");
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    
    carregarPagina();
    
    $('.btn-copiar-link').on('click', function(){
        var copyTextarea = $('.input-convite-link');
        copyTextarea.select();
        document.execCommand('copy');
    });
});