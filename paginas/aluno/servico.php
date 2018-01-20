<?php
 //   namespace Quimicamente\Model{
    require_once "suporte.php";
    include_once("entidades.php");


    $Servico = new Servico();
    class Servico{
// ------------------------------ Objetos ----------------------------------
        
        static function objUsuarios($usr){
            $usuario = new Usuarios();
            $usuario->setUsuarios_id($usr["usuarios_id"]);
            $usuario->setUsuarios_nome($usr["usuarios_nome"]);
            $usuario->setUsuarios_email($usr["usuarios_email"]);
            $usuario->setUsuarios_senha($usr["usuarios_senha"]);
            $usuario->setUsuarios_foto($usr["usuarios_foto"]);
            $usuario->setUsuarios_nivel($usr["usuarios_nivel"]);
            $usuario->setUsuarios_datanasc($usr["usuarios_datanasc"]);
            $usuario->setUsuarios_del($usr["usuarios_del"]);

            if($usr["usuarios_id"] != 0){

                if($usuario->getUsuarios_nivel() == 2){     //PROFESSOR
                    $sql = "SELECT * FROM professores WHERE usuarios_id = ?";
                    $param = array($usr["usuarios_id"]);
                    $n = Database::selecionarParam($sql, $param);

                    $usuario->setProfessores(Servico::objProfessores($n[0]));                 
                }

                if($usuario->getUsuarios_nivel() == 3){     //ALUNO
                    $sql = "SELECT * FROM alunos WHERE usuarios_id = ?";
                    $param = array($usr["usuarios_id"]);
                    $n = Database::selecionarParam($sql, $param);
                    $usuario->setAlunos(Servico::objAlunos($n[0])); 
                    //print_r($usuario->getAlunos()->getAlunos_id());
                }
            }
            return $usuario;
        }
    


        static function objTurmas($tur){
            $turma = new Turmas();
            $turma->setTurmas_id($tur["turmas_id"]);
            $turma->setTurmas_nome($tur["turmas_nome"]);
            $turma->setTurmas_del($tur["turmas_del"]);
            
            $sql = "SELECT * FROM professores WHERE professores_id = ?";
            $param = $tur["professores_id"];
            
            $query = Database::selecionaObjeto($sql, $param);
            $turma->setProfessores(Servico::objProfessores($query[0]));
            
            return $turma;
        }       
        static function objProfessores($prof){
            $professor = new Professores();
            $professor->setProfessores_id($prof["professores_id"]);
            $professor->setUsuarios_id($prof["usuarios_id"]);
            $professor->setProfessores_cpf($prof["professores_cpf"]);
            $professor->setProfessores_del($prof["professores_del"]);
        
            return $professor;
        }
        
        static function objAlunos($al){
            $aluno = new Alunos();
            $aluno->setAlunos_id($al["alunos_id"]);
            $aluno->setUsuarios_id($al["usuarios_id"]);
            $aluno->setTurmas_id($al["turmas_id"]);
            $aluno->setConteudos_id($al["conteudos_id"]);
            $aluno->setAlunos_del($al["alunos_del"]);
            
            return $aluno;
        }
        static function objConteudos($cont){
            $conteudo = new Conteudos();
            $conteudo->setConteudos_id($cont["conteudos_id"]);
            $conteudo->setConteudos_nome($cont["conteudos_nome"]);
            $conteudo->setConteudos_descricao($cont["conteudos_descricao"]);
            $conteudo->setConteudos_ordem($cont["conteudos_ordem"]);
            $conteudo->setConteudos_del($cont["conteudos_del"]);
            
            return $conteudo;
        }
        
        static function objConteudos_comunidade($cont){
            $conteudo = new Conteudos_comunidade();
            $conteudo->setConteudos_comunidade_id($cont["conteudos_comunidade_id"]);
            $conteudo->setProfessores_id($cont["professores_id"]);
            $conteudo->setConteudos_comunidade_nome($cont["conteudos_comunidade_nome"]);
            $conteudo->setConteudos_comunidade_descricao($cont["conteudos_comunidade_descricao"]);
            $conteudo->setConteudos_comunidade_ordem($cont["conteudos_comunidade_ordem"]);
            $conteudo->setConteudos_comunidade_del($cont["conteudos_comunidade_del"]);
            
            return $conteudo;
        }

        static function objProvas($cont){
            
            $prova = new Provas();
            $prova->setProvas_id($cont["provas_id"]);
            $prova->setProfessores_id($cont["professores_id"]);
            $prova->setTurmas_id($cont["turmas_id"]);
            $prova->setProvas_data($cont["provas_data"]);
            $prova->setProvas_del($cont["provas_del"]);
            
            return $prova;
        }
        
        static function objPerguntas($perg){
            $pergunta = new Perguntas();
            $pergunta->setPerguntas_id($perg["perguntas_id"]);
            $pergunta->setConteudos_id($perg["conteudos_id"]);
            $pergunta->setPerguntas_descricao($perg["perguntas_descricao"]);
            $pergunta->setPerguntas_del($perg["perguntas_del"]);
            
            return $pergunta;
        }
        
        static function objPerguntas_comunidade($perg){
            $pergunta = new Perguntas_comunidade();
            $pergunta->setPerguntas_comunidade_id($perg["perguntas_comunidade_id"]);
            $pergunta->setConteudos_comunidade_id($perg["conteudos_comunidade_id"]);
            $pergunta->setPerguntas_comunidade_descricao($perg["perguntas_comunidade_descricao"]);
            $pergunta->setPerguntas_comunidade_del($perg["perguntas_comunidade_del"]);
            
            return $pergunta;
        }
        
        static function objRespostas($desc){
            $descont = new Respostas();
            $descont->setRespostas_id($desc["respostas_id"]);
            $descont->setPerguntas_id($desc["perguntas_id"]);
            $descont->setRespostas_desc($desc["respotas_desc"]);
            $descont->setRespostas_correta($desc["respostas_correta"]);
            $descont->setRespostas_del($desc["respostas_del"]);
            
            return $descont;
        }
        
        static function objRespostas_comunidade($desc){
            $descont = new Respostas_comunidade();
            $descont->setRespostas_comunidade_id($desc["respostas_comunidade_id"]);
            $descont->setPerguntas_comunidade_id($desc["perguntas_comunidade_id"]);
            $descont->setRespostas_comunidade_desc($desc["respotas_comunidade_desc"]);
            $descont->setRespostas_comunidade_correta($desc["respostas_comunidade_correta"]);
            $descont->setRespostas_comunidade_del($desc["respostas_comunidade_del"]);
            
            return $descont;
        }
        
        static function objSlides($slides){
            $slide = new Slides();
            $slide->setSlides_id($nota["slides_id"]);
            $slide->setConteudos_id($nota["conteudos_id"]);
            $slide->setSlides_ordem($nota["slides_ordem"]);
            $slide->setSlides_conteudo($nota["slides_conteudo"]);
            $slide->setSlides_del($nota["slides_del"]);
            
            return $slide;
        }
        
        static function objSlides_comunidade($slides){
            $slide = new Slides_comunidade();
            $slide->setSlides_comunidade_id($nota["slides_comunidade_id"]);
            $slide->setConteudos_comunidade_id($nota["conteudos_comunidade_id"]);
            $slide->setSlides_comunidade_ordem($nota["slides_comunidade_ordem"]);
            $slide->setSlides_comunidade_conteudo($nota["slides_comunidade_conteudo"]);
            $slide->setSlides_comunidade_del($nota["slides_comunidade_del"]);
            
            return $slide;
        }
        
        static function objQuestoes_prova($questoes){
            $questao = new Questoes_provas();
            $questao->setQuestoes_prova_id($questoes['questoes_prova_id']);
            $questao->setProvas_id($questoes['provas_id']);
            $questao->setPerguntas_id($questoes['perguntas_id']);
            $questao->setQuestoes_prova_del($questos['questoes_prova_del']);
            return $questao;
        }


        static function objRespostas_prova($resp){
            $respostas = new Respostas_prova();
            $respotas->setRespostas_prova_id($resp['respostas_prova_id']);
            $respotas->setAlunos_id($resp['alunos_id']);
            $respotas->setRespostas_prova_media($resp['respostas_prova_media']);
            $respotas->setRespostas_prova_del($resp['respostas_prova_del']);

            return $respostas;
        }

        static function objDesempenhos($desempenhos){
        	$desempenho = new Desempenhos();
        	$desempenho->setDesempenhos_id($desempenhos['desempenhos_id']);
        	$desempenho->setAlunos_id($desempenhos['alunos_id']);
        	$desempenho->setDesempenhos_dificuldade($desempenhos['desempenhos_dificuldade']);
        	$desempenho->setDesempenhos_notafinal($desempenhos['desempenhos_notafinal']);
        	$desempenho->setDesempenhos_tempo($desempenhos['desempenhos_tempo']);
        	$desempenho->setDesempenhos_del($desempenhos['desempenhos_del']);

        	return $desempenho;
        }

        static function objConteudos_liberados($cont){
            $conteudo_liberado = new Conteudos_liberados();
            $conteudo_liberado->setConteudos_liberados_id($cont['conteudos_liberados_id']);
            $conteudo_liberado->setConteudos_id($cont['conteudos_id']);
            $conteudo_liberado->setTurmas_id($cont['turmas_id']);
            $conteudo_liberado->setProfessores_id($cont['professores_id']);
            $conteudo_liberado->setConteudos_liberados_del($cont['conteudos_liberados_del']);

            return $conteudo_liberado;
        }
        static function objConteudos_comunidade_liberados($cont){
            $conteudo_liberado = new Conteudos_comunidade_liberados();
            $conteudo_liberado->setConteudos_comunidade_liberados_id($cont['conteudos_comunidade_liberados_id']);
            $conteudo_liberado->setConteudos_comunidade_id($cont['conteudos_comunidade_id']);
            $conteudo_liberado->setTurmas_id($cont['turmas_id']);
            $conteudo_liberado->setProfessores_id($cont['professores_id']);
            $conteudo_liberado->setConteudos_comunidade_liberados_del($cont['conteudos_comunidade_liberados_del']);

            return $conteudo_liberado;
        }
        
        static function objRecupera_senha($recup){
            $recupera = new Recupera_senha();
            $recupera->setRecupera_senha_id($recup["recupera_senha_id"]);
            $recupera->setUsuarios_id($recup["usuarios_id"]);
            $recupera->setRecupera_senha_hash($recup["recupera_senha_hash"]);
            $recupera->setRecupera_senha_del($recup["recupera_senha_del"]);
            
            return $recupera;
        }
	}
?>