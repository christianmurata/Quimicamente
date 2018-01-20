var max = 10;
var usuarios = Array();

function lista_usuarios() {
    tabela = document.getElementById("table-users");

    for(var l = tabela.rows.length-1; l > 0; l--){
        tabela.deleteRow(l);
    }

    if(max > 10)    min = max - 10;
    else            min = 0;

    if(max >= usuarios.length){
        qtde = max - (max - usuarios.length);
        $("#btn-pg-prox").attr("disabled", "disabled");
    }
    else                            qtde = max;

    for(min, k=1; min < qtde; min++, k++){
        row = tabela.insertRow(k);

        col1 = row.insertCell(0);
        col1.innerHTML = usuarios[min]["usuarios_nome"];

        col2 = row.insertCell(1);

        if(usuarios[min]["usuarios_del"] === 'N'){
            col2.innerHTML = "<button type='button' class='btn special btn-qmt' onclick='desativa_user("+usuarios[min]["usuarios_id"]+")'>ATIVADA</button>";
        }

        else{
            col2.innerHTML = "<button type='button' class='btn special btn-danger' onclick='ativa_user("+usuarios[min]["usuarios_id"]+")'>DESATIVADA</button>";
        }
    }
}

function desativa_user(id){
    swal({
        title: 'Confirma desativação?',
        text: 'Dados de turma NÃO PODERÃO SER RESTAURADOS!',
        showCancelButton: true,
        type: 'question',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Excluir',
        cancelButtonColor: '#cacaca',
        confirmButtonColor: '#d33',
        showLoaderOnConfirm: true,
        preConfirm: function () {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: "../controllers/control_controle_usuario?action=desativa_user",
                    type:'POST',
                    data: {
                        usuarios_id: id
                    },
                    async: false,
                    success: function(resposta){
                        try {
                            resp = JSON.parse(resposta);
                            if(resp[0] == 'error')  throw "error";
                            else if(resp[0] == 'success') resolve();
                        }catch(e){
                            reject("Ocorreu um erro, tente novamente mais tarde!");
                        }
                    }
                });
            })
        },
        allowOutsideClick: false
    }).then(function () {
        swal({
            type: 'success',
            title: 'Usuário desativado.',
            showConfirmButton: false,
            timer: 1200
        })
        busca_usuarios();
    }, function (dismiss) {

    })
}

function ativa_user(id){
    swal({
        title: 'Confirma ativação?',
        text: 'Dados de turma NÃO PODERÃO SER RESTAURADOS!',
        showCancelButton: true,
        type: 'question',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Restaurar',
        cancelButtonColor: '#cacaca',
        confirmButtonColor: 'green',
        showLoaderOnConfirm: true,
        preConfirm: function () {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: "../controllers/control_controle_usuario?action=ativa_user",
                    type:'POST',
                    data: {
                        usuarios_id: id
                    },
                    async: false,
                    success: function(resposta){
                        try {
                            resp = JSON.parse(resposta);
                            if(resp[0] == 'error')  throw "error";
                            else if(resp[0] == 'success') resolve();
                        }catch(e){
                            reject("Ocorreu um erro, tente novamente mais tarde!");
                        }
                    }
                });
            })
        },
        allowOutsideClick: false
    }).then(function () {
        swal({
            type: 'success',
            title: 'Usuário reativado.',
            showConfirmButton: false,
            timer: 1200
        })
        busca_usuarios();
    }, function (dismiss) {

    })
}

function busca_usuarios() {
    $.ajax({
       url: '../controllers/control_controle_usuario.php?action=buscar_usuarios',
       async: 'false',
    success: function (resposta) {
        try{
            usuarios = JSON.parse(resposta);
            if(usuarios[0] != "error"){
                lista_usuarios();
                return;
            }
            else{
                throw "error";
            }
        }
        catch(e){
            console.log(e);
            swal({
               type: 'error',
               text: 'Ocorreu um erro, tente novamente mais tarde!',
               showConfirmButton: false,
                allowOutsideClick: false,
               timer: 2000,
                onopen: function () {
                    setTimeout(function () {
                        location.href = 'index.php'
                    }, 2000);
                }
            });
        }
    }
    });
}

jQuery(document).ready(function () {
    busca_usuarios();

    $("#btn-pg-ant").on('click', function () {
        max -= 10;
        lista_usuarios();
        $("#btn-pg-prox").removeAttr("disabled");
        if(max < 11){
            $("#btn-pg-ant").attr("disabled", "disabled");
        }
    });

    $("#btn-pg-prox").on('click', function () {
        max += 10;
        $("#btn-pg-ant").removeAttr("disabled");
        lista_usuarios();
    });
});