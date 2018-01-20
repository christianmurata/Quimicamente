var idUsuarios = new Array();
var idModulos = new Array();
var idQuestoes = new Array();
var $_GET = {};
var mpMarcado = 0;
var usuariosMarcados = 0;
var rendMed = 0;

var tipo = "";

var turma;
var alunos;
var provas;
var respostas_prova;

function selecQuestao(id){
    "use strict";
    var sel = document.getElementById("questao"+id);
 /*   for(var j = 0;j <= idQuestoes.length; j++){
        if(idQuestoes[j] == id){
            idQuestoes[j] = 0;
            sel.style.background= "white";
            //console.log(idQuestoes);
            return;
        }
    }

    for(var i = 0; i <= idQuestoes.length; i++){
        if(idQuestoes[i] == undefined || idQuestoes[i] == 0){
            idQuestoes[i] = id;
            sel.style.background = '#4FFFBC';
            //console.log(idQuestoes);
            break;
        }
    }
*/
    if (idQuestoes.indexOf(id) == -1) {
        idQuestoes.push(id);
        sel.style.background = '#4FFFBC';
        console.log(idQuestoes);
    }

    else {
        var aux = new Array();
        for (var j = 0; j < idQuestoes.length; j++) {
            if (idQuestoes[j] != id) {
                aux.push(idQuestoes[j]);
            }
            else{
                sel.style.background = "white";
            }
        }

        idQuestoes = aux;
        console.log(idQuestoes);
    }
    if(idQuestoes < 1){
        $("#btn-montar-prova").attr("disabled","disabled");
    }
    else{
        $("#btn-montar-prova").removeAttr("disabled");
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
    carregarQuestoesElaborarProva();
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

    if (idModulos.indexOf(id) == -1) {
        if(tipo == ""){
            if(mpMarcado < 3){
                idModulos.push(id);
                sel.style.background = '#4FFFBC';
                mpMarcado++;
                console.log(idModulos);
            }
        }else{
            idModulos.push(id);
            sel.style.background = '#4FFFBC';
            mpMarcado++;
            console.log(idModulos);
        }
    }

    else {
        var aux = new Array();
        for (var j = 0; j < idModulos.length; j++) {
            if (idModulos[j] != id) {
                aux.push(idModulos[j]);
            }
            else{
                sel.style.background = "white";
                mpMarcado--;
            }
        }

        idModulos = aux;
        console.log(idModulos);
    }/*
    if(mpMarcado < 1){
        $("#btn-cfm-modulo").attr("disabled","disabled");
    }
    else{
        $("#btn-cfm-modulo").removeAttr("disabled");
    }*/
}

function excluiLista(id) {
    "use strict";
    if(document.getElementById("aluno-" + id).checked == true) {
        usuariosMarcados++;
        idUsuarios.push(id);
    }
    else {
        if(usuariosMarcados > 0){
            var aux = [];
            for(var i = 0; i <= idUsuarios.length; i++) {
                if(idUsuarios[i] != id) {
                    aux.push(idUsuarios[i]);
                }
            }
            idUsuarios = aux;
            usuariosMarcados--;
        }
    }
    if(usuariosMarcados < 1) {
        document.getElementById("btnRemove").disabled = true;
    }

    else {
        document.getElementById("btnRemove").disabled = false;
    }
    console.log(usuariosMarcados);
}

function carregarDetalhesAluno(id){
    tabela = document.getElementById("table-detalhes-aluno");

    alunos.map(function (aluno) {
        if(aluno["alunos_id"] == id){
            $("#txt-modal-nome").text(aluno["usuarios_nome"]);
        }
    });

    for(var l = tabela.rows.length-1; l > 0; l--){
        tabela.deleteRow(l);
    }

    for(var i = 0; i < respostas_prova.length; i++){
        respostas = respostas_prova[i];

        encontrado = -1;

        var numRow = 1;

        for(j = 0;j < respostas.length; j++){
            if(respostas[j]["alunos_id"] == id){
                encontrado = j;
                break;
            }
        }

        if(encontrado > -1){
            row = tabela.insertRow(numRow);
            numRow++;
            col = row.insertCell(0);
            col.innerHTML = respostas[encontrado]["provas_desc"];


            col3 = row.insertCell(1);

            col3.innerHTML = respostas[encontrado]["respostas_prova_media"];
        }
    }

    $("#num-provas-realizadas").text(tabela.rows.length-1+"/"+provas.length);
}

function carregarQuestoesElaborarProva(){
    $.ajax({
        url: "../controllers/control_gerSala.php?action=carregarQuestoesElaborarProva",
        type: "POST",
        data: {turma: $_GET["id"]},

        success: function(resposta){
            var modulos = JSON.parse(resposta);


            tabela = document.getElementById("table-elaborar-prova");

            for(var i = tabela.rows.length-1; i > 0; i--){
                tabela.deleteRow(i);
            }

            for(i = 0, k = 1;i < modulos.length;i++, k+=2){
                linha = modulos[i];

                row = tabela.insertRow(k);
                col = row.insertCell(0)
                //= '<td onclick="expandeModulo('+linha[i][0]["conteudos_comunidade_id"]+');" id="modulo"><b>'+linha[i][0]["conteudos_comunidade_nome"]+'</b> <span style="float: right" class="glyphicon glyphicon-collapse-down"></span></td>'

                col.setAttribute('onclick','expandeModulo('+linha[0]["conteudos_comunidade_id"]+')');
                col.setAttribute('id','modulo-'+linha[0]["conteudos_comunidade_id"]);
                col.innerHTML = '<b>'+linha[0]["conteudos_comunidade_nome"]+'</b> <span style="float: right" class="glyphicon glyphicon-collapse-down"></span>';

                row2 = tabela.insertRow(k+1);
                //  row2.attr('id','rowModulo'+linha[0]["conteudos_comunidade_id"]);

                tmpDiv = document.createElement("div");

                div_tbl = row2.appendChild(tmpDiv);

                div_tbl.setAttribute('class', 'table-responsive');
                div_tbl.setAttribute('id', 'questaoModulo'+linha[0]["conteudos_comunidade_id"]);
                div_tbl.setAttribute('style','display: none;');

                tbl = div_tbl.innerHTML =
                    '<table id="tableModulo'+linha[0]["conteudos_comunidade_id"]+'" class="table table-hover"><thead></thead></table>';

                for(j = 0; j < linha.length; j++){
                    linha2 = linha[j];
                    tabela_conteudo = document.getElementById("tableModulo"+linha[0]["conteudos_comunidade_id"]);
                    row_sub = tabela_conteudo.insertRow(j);
                    row_sub.innerHTML = '<td id="questao'+linha2["perguntas_comunidade_id"]+'" onclick="selecQuestao('+linha2["perguntas_comunidade_id"]+');">'+linha2["perguntas_comunidade_descricao"]+'</td>';

                }
            }
        }
    });
}

function carregarAlunos(){
    rendMed = 0;
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
        if(provas.length < 1){
            col3.innerHTML = "Sem provas!";
            rendMed+= aluno["media_geral"];
        }else{
            col3.innerHTML = (aluno["media_geral1"]/aluno["media_geral2"]).toFixed(2);
            rendMed+= aluno["media_geral1"]/aluno["media_geral2"];
        }

        col4 = row.insertCell(3);
        col4.innerHTML = '<button class="btn btn-sm btn-qmt btn-right btn-painel" data-toggle="modal" data-target="#modalAluno" onclick="carregarDetalhesAluno('+aluno["alunos_id"]+')">Detalhes</button>';
    }



    if(provas.length > 0){
        rendMed = rendMed/alunos.length;
        $("#lbl-rendimento-turma").text(rendMed.toFixed(2));
    }else{
        $("#lbl-rendimento-turma").html("<b>Sem provas!</b>");
    }
}

function carregarProvas(){
    tabela = document.getElementById("table-notas");

    for(var i = tabela.rows.length-1; i > 0; i--){
        tabela.deleteRow(i);
    }

    for(i = 0, k = 1;i < respostas_prova.length; i++, k+=2){
        linha2 = respostas_prova[i];
        row = tabela.insertRow(k);

        row.innerHTML = '<td onclick="expandeProva('+linha2[0]["provas_id"]+');" id="headProva-'+linha2[0]["provas_id"]+'"><b>'+linha2[0] ["provas_desc"]+' (expira em '+formatar_data(linha2[0]["provas_data"])+')</b> <span style="float: right" class="glyphicon glyphicon-collapse-down"></span></td>';

        //     $('headProva-'+linha["provas_id"]).attr("onclick","expandeProva("+linha["provas_id"]+");");

        row = tabela.insertRow(k+1);
        col = row.insertCell(0);

        col.innerHTML = '<div class="table-responsive" id="prova-'+linha2[0]["provas_id"]+'" style="display: none;"><table class="table table-hover" id="prova'+linha2[0]["provas_id"]+'"><thead><tr><th>Aluno</th><th>Nota</th></tr></thead><tbody></tbody></table></div>';

        subTabela = document.getElementById("prova"+linha2[0]["provas_id"]);

        for(j = 0;j < linha2.length;j++){
            linhaResp = linha2[j];

            subRow = subTabela.insertRow(j+1);

            subCol = subRow.insertCell(0);
            subCol.append(linhaResp["usuarios_nome"]);

            subCol2 = subRow.insertCell(1);

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
            console.log(resp);
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
    var dt = data.split("-");
    return dt[2]+"/"+dt[1]+"/"+dt[0];
}

window.onload = function () {
    var url = window.location.href;
    var bars = url.split("/");

    if(bars.length > 7){
        window.location.href = "http://200.145.153.172/quarkz/Quimicamente";
    }
}

function carregarModulosLiberacao(tipo_cont){
    if(tipo_cont == 0) {  //OFICIAIS
        url = "../controllers/control_gerSala.php?action=carregarModulosOficiais";
        tipo = "";
    }

    else{
        url = "../controllers/control_gerSala.php?action=carregarModulosComunidade";
        tipo = "_comunidade";
    }

    $.ajax({
        url: url,
        type: "POST",
        data:{turmas: $_GET["id"]},
        async: false,

        success: function (resposta) {
            resp = JSON.parse(resposta);

            conts = resp[0];
            libs = resp[1];

            tabela = document.getElementById("table-liberar-modulos");

            for(var l = tabela.rows.length-1; l > 0; l--){
                tabela.deleteRow(l);
            }

            idModulos.length = 0;

            for(var i = 0;i < conts.length; i++){
                linha = conts[i];
                row = tabela.insertRow(i+1);

                //  col = row.insertCell(0);

                row.innerHTML = " <td id='selModulo"+linha["conteudos"+tipo+"_id"]+"' onclick='selecModulo("+linha["conteudos"+tipo+"_id"]+")'> "+ linha["conteudos"+tipo+"_nome"] +" </td>";
            }

            $("#modalModulo").modal("show");

            for(var k = 0; k < libs.length; k++){
                selecModulo(libs[k]["conteudos"+tipo+"_id"]);
            }

        }
    });
}

function delProva(id) {
    swal({
        type: "question",
        title: "Excluir prova?",
        text: "Essa ação não poderá ser desfeita!",
        showLoaderOnConfirm: true,
        showConfirmButton: true,
        showCancelButton: true,
        allowOutsideClick: false,

        preConfirm: function () {
                $.ajax({
                    url: "../controllers/control_gerSala.php?action=delProva",
                    type: "POST",
                    data: {turmas: $_GET["id"], provas_id: id},

                    success: function(resposta){
                        swal.close();
                        gerenciarProvas();
                        try{
                            resp = JSON.parse(resposta);
                        }catch(e){
                            swal({
                                type: "error",
                                title:"Erro!",
                                text: "Não conseguimos ler a resposta do servidor, tente novamente mais tarde!",
                                showConfirmButton: false,
                                timer: 2000

                            });
                            return;
                        }

                        if(resp[0] == "error"){
                            swal({
                                type: "error",
                                title:"Erro!",
                                text: "Tente novamente mais tarde!",
                                showConfirmButton: false,
                                timer: 2000

                            });
                        }

                        else{
                            carregarPagina();
                            gerenciarProvas();
                            swal({
                                type: "success",
                                title: "Prova excluída com sucesso!",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }


                });
        }
    })
}

function gerenciarProvas() {
    $.ajax({
        url: "../controllers/control_gerSala.php?action=gerenciarProvas",
        type: "POST",
        data: {turmas: $_GET["id"]},
        async:false,

        success: function (resposta) {
            try{
                resp = JSON.parse(resposta);
            }catch(e){
                swal({
                    type: "error",
                    title:"Ocorreu um erro, tente novamente mais tarde!",
                    showConfirmButton: false,
                    timer: 2000
                });
                $("modalGerProvas").modal("hide");
                return;
            }

            tabela = document.getElementById("table-ger-prova");

            for(var l = tabela.rows.length-1; l > 0; l--){
                tabela.deleteRow(l);
            }

            for(i = 0; i < resp.length; i++){
                row = tabela.insertRow(i+1);
                col = row.insertCell(0);

                col.innerHTML = resp[i]["provas_desc"] + " (expira em "+ formatar_data(resp[i]["provas_data"]) +")";

                col2 = row.insertCell(1);
                col2.innerHTML = "<button type='button' class='btn btn-qmt' id='btn-del-prova'"+resp[i]["provas_id"]+" onclick='delProva("+resp[i]["provas_id"]+")'>Excluir</button>";
            }

        }
    });
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

    $("#btn-remover-alunos").on('click', function () {
        $.ajax({
            url: "../controllers/control_gerSala.php?action=removerAlunos",
            type: "POST",
            async: "false",
            data: {idUsuarios: idUsuarios, turma: $_GET["id"]},

            success: function (resposta) {
                carregarPagina();
            }
        });
    });

    $("#btn-montar-prova").on('click',function () {
        var aux = new Array();
        for(i = 0; i< idQuestoes.length;i++){
            if(idQuestoes[i] != 0)
                aux.push(idQuestoes[i]);
        }

        swal({
            title: 'Digite uma breve descrição para a prova:',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'Montar Prova!',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,

            preConfirm: function (texto) {
                return new Promise(function (resolve, reject) {
                    if(texto.trim().length < 3){
                        reject('Digite pelo menos 3 caracteres!');
                    }

                    else if(texto.trim().length > 40){
                        reject('Digite no máximo 40 caracteres!');
                    }
                    else{
                        $.ajax({
                            url: "../controllers/control_gerSala.php?action=novaProva",
                            data:{turma: $_GET["id"], questoes: idQuestoes, descricao: texto},
                            type: "POST",
                            async: false,

                            success: function (resposta) {
                                $("#modalProva").modal("hide");
                                try {
                                    resp = JSON.parse(resposta);
                                }catch(e){
                                    console.log(e.message);
                                    reject("Ocorreu um erro, tente novamente mais tarde!");
                                }
                                if(resp[0] == "error"){
                                    console.log(resp[1]);
                                    reject("Ocorreu um erro, tente novamente mais tarde!");
                                }

                                else{
                                    resolve();
                                }
                            }
                        });
                    }
                });
            }
        }).then(function () {
            carregarPagina();
            swal({
                type: 'success',
                title: 'Prova enviada aos alunos com sucesso!'
            })
        });
    });

    $("#btn-liberar-modulo").on('click', function () {
        mpMarcado = 0;
        idModulos = new Array();
       // $("#btn-cfm-modulo").attr("disabled","disabled");
        swal({
            title: 'Qual tipo de conteúdo debloquear?',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: 'blue',
            cancelButtonColor: 'green',
            confirmButtonText: 'Conteúdos Oficiais',
            cancelButtonText: 'Meus Conteúdos',
        }).then(function () {
            swal.close();
            carregarModulosLiberacao(0);
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal.close();
                carregarModulosLiberacao(1);
            }
        });
    });

    $("#btn-cfm-modulo").on('click', function () {
      if(tipo.length > 0){
          url = "../controllers/control_gerSala.php?action=liberarComunidade";
      }
      else{
          url = "../controllers/control_gerSala.php?action=liberarOficiais";
      }

      $.ajax({
         url: url,
         type: "POST",
         data:{turmas: $_GET["id"], conteudos: idModulos},
         async: false,

          success: function (resposta) {
              try{
                  resp = JSON.parse(resposta)
              }
              catch(e){
                  swal({
                      type: "error",
                      title:"Erro!",
                      text: "Não conseguimos ler a resposta do servidor, tente novamente mais tarde!",
                      showConfirmButton: false,
                      timer: 2000

                  });
                  return;
              }

              if(resposta[0] == "error"){
                  swal({
                      type: "error",
                      title:"Erro!",
                      text: "Tente novamente mais tarde!",
                      showConfirmButton: false,
                      timer: 2000

                  });
              }

              else{
                  swal({
                      type: "success",
                      title:"Conteúdo(s) enviado(s) a turma com sucesso!",
                      showConfirmButton: false,
                      timer: 2000
                  });
              }
          }
      });
    });

    $("#btn-montar-prova").on('click',function () {
        var aux = new Array();
        for(i = 0; i< idQuestoes.length;i++){
            if(idQuestoes[i] != 0)
                aux.push(idQuestoes[i]);
        }

        swal.setDefaults({
            showCancelButton: true,
            progressSteps: ['1', '2'],
            allowOutsideClick: false,
        });

        var steps = [
            {
                title: 'Digite uma breve descrição para a prova:',
                input: 'text',
                preConfirm: function (texto) {
                    return new Promise(function (resolve, reject) {
                        if(texto.trim().length < 3){
                            reject('Digite pelo menos 3 caracteres!');
                        }

                        else if(texto.trim().length > 40){
                            reject('Digite no máximo 40 caracteres!');
                        }

                        else{
                            resolve();

                        }
                    })
                }
            },
            {
                title: "Insira a data limite da prova: ",
                html: "<input id='flatpickr-calendar'></script>",
                customClass: "swal2-overflow",
                onOpen: function () {
                    flatpickr('#flatpickr-calendar',{
                        locale: "pt",
                        minDate: "today",
                        altInput: true
                    });

                },
                preConfirm: function (data) {
                    return new Promise(function (resolve, reject) {
                        if($("#flatpickr-calendar").val().trim().length > 9){
                            resolve();
                        }
                        else{
                            reject("Digite uma data no futuro!");
                        }
                    })
                }
            },
        ]

        swal.queue(steps).then(function (result) {
            swal.resetDefaults()


            $.ajax({
                url: "../controllers/control_gerSala.php?action=novaProva",
                data:{turma: $_GET["id"], questoes: idQuestoes, descricao: result[0], data: result[1]},
                type: "POST",
                async: false,

                success: function (resposta) {
                    $("#modalProva").modal("hide");
                    try {
                        resp = JSON.parse(resposta);
                    }catch(e){
                        console.log(e.message);
                        swal({
                            type: "error",
                            title:"Ocorreu um erro, tente novamente mais tarde!",
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                    if(resp[0] == "error"){
                        console.log(resp[1]);
                        swal({
                            type: "error",
                            title:"Ocorreu um erro, tente novamente mais tarde!",
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }

                    else{
                        carregarPagina();
                        swal({
                            type: "success",
                            title: "Prova enviada aos alunos com sucesso!",
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }
            });

        }, function () {
            swal.resetDefaults()
        })

        /* swal({
             title: 'Digite uma breve descrição para a prova:',
             input: 'text',
             showCancelButton: true,
             confirmButtonText: 'Montar Prova!',
             showLoaderOnConfirm: true,
             allowOutsideClick: false,

             preConfirm: function (texto) {
                 return new Promise(function (resolve, reject) {
                     if(texto.trim().length < 3){
                         reject('Digite pelo menos 3 caracteres!');
                     }

                     else if(texto.trim().length > 40){
                         reject('Digite no máximo 40 caracteres!');
                     }
                     else{
                         $.ajax({
                             url: "../controllers/control_gerSala.php?action=novaProva",
                             data:{turma: $_GET["id"], questoes: idQuestoes, descricao: texto},
                             type: "POST",
                             async: false,

                             success: function (resposta) {
                                 $("#modalProva").modal("hide");
                                 try {
                                     resp = JSON.parse(resposta);
                                 }catch(e){
                                     console.log(e.message);
                                     reject("Ocorreu um erro, tente novamente mais tarde!");
                                 }
                                 if(resp[0] == "error"){
                                     console.log(resp[1]);
                                     reject("Ocorreu um erro, tente novamente mais tarde!");
                                 }

                                 else{
                                     resolve();
                                 }
                             }
                         });
                     }
                 });
             }
         }).then(function () {
             swal({
                 type: 'success',
                 title: 'Prova enviada aos alunos com sucesso!'
             })
         });*/



    });
    $("#btnGerProva").on('click',gerenciarProvas);


});
