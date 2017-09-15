var $_GET = {};
jQuery(document).ready(function(){

    var parts = window.location.search.substr(1).split("&");
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }

    $.ajax({
        url: '../controllers/control_conviteTurma.php?action=verificar',
        type: 'POST',
        data:{
            turmas_id: $_GET["id"]
        },

        success: function (resp) {
            resposta = JSON.parse(resp);
            if(resposta['error'] == 'alreadyInClass'){
                swal({
                    title: "Erro",
                    type: "error",
                    text: "Você já está em uma turma!",
                    timer: 2900,
                    showConfirmButton: false
                });
                setTimeout(function(){location.href = "aluno.php";},3000);
            }

            if(resposta['error'] == 'notFound'){
                swal({
                title: "Erro",
                type: "error",
                text: "Turma não encontrada!",
                timer: 2900,
                showConfirmButton: false
            });
                setTimeout(function(){location.href = "aluno.php";},3000);
            }

            if(resposta['error'] == 'none'){
                document.getElementById("nome_sala").innerHTML = resposta['turmas_nome'];
                $("#modalConfirmaConvite").modal("show");
            }
        }
    });

    $(".btn-confirmar").on('click', function () {
      $.ajax({
          url: '../controllers/control_conviteTurma.php?action=confirma',
          type: 'POST',
          async: 'false',
          data:{
              turmas_id: $_GET["id"]
          },

          success: function(resposta){
              resp = JSON.parse(resposta);
              if(resp == 'success'){
                  swal({
                      title: "Sucesso!",
                      type: "success",
                      text: "Você foi adicionado a turma!",
                      timer: 2900,
                      showConfirmButton: false
                  });
                  setTimeout(function(){location.href = "aluno.php";},3000);
              }
              else{
                  swal({
                  title: "Erro",
                  type: "error",
                  text: "Erro interno, por favor tente novamente mais tarde.",
                  timer: 2900,
                  showConfirmButton: false
              });
               //   setTimeout(function(){location.href = "aluno.php";},3000);
              }
          }
      });
    });
});