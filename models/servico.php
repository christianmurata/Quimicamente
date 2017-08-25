<?php
 //   namespace Quimicamente\Model{
    require "suporte.php";
    include_once("entidades.php");


    $Servico = new Servico();
    class Servico{
// ------------------------------ Objetos ----------------------------------
        
        static function objUsuarios($usr){
            $usuario = new Usuarios();
            $usuario->setUsuarios_id($usr["usuarios_id"]);
            $usuario->setusuarios_nome($usr["usuarios_nome"]);
            $usuario->setUsuarios_email($usr["usuarios_email"]);
            $usuario->setUsuarios_senha($usr["usuarios_senha"]);
            $usuario->setUsuarios_foto($usr["usuarios_foto"]);
            $usuario->setUsuarios_nivel($usr["usuarios_nivel"]);
            $usuario->setUsuarios_datanasc($usr["usuarios_datanasc"]);
            $usuario->setUsuarios_del($usr["usuarios_del"]);

            if($usr["usuarios_id"] != 0){

                if($usuario->getUsuarios_nivel() == 2){     //PROFESSOR
                    $sql = "SELECT * FROM professores WHERE professores_id = ?";
                    $param = array($usr["usuarios_id"]);
                    $n = Database::selecionarParam($sql, $param);

                    $usuario->setProfessores(Servico::objProfessores($n[0]));                 
                }

                if($usuario->getUsuarios_nivel() == 3){     //ALUNO
                    $sql = "SELECT * FROM alunos WHERE alunos_id = ?";
                    $param = array($usr["usuarios_id"]);
                    $n = Database::selecionarParam($sql, $param);
                    $usuario->setAlunos(Servico::objAlunos($n[0])); 
                }
            }
            return $usuario;
        }
    


        static function objTurmas($tur){
            $turma = new Turmas();
            $turma->setTurmas_id($tur["turmas_id"]);
            $turma->setTurmas_nome($tur["turmas_nome"]);
            $turma->setTurmas_excluido($tur["turmas_excluido"]);
            
            $sql = "SELECT * FROM professores WHERE professores_id = ?";
            $param = array($tur["professores_id"]);
            
            $query = Database::selecionarParam($sql, $param);
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
            $aluno->setTurmas($al["turmas"]);
            $aluno->setConteudo_id($al["conteudos_id"]);
            $aluno->setAlunos_del($al["alunos_del"]);
            
            return $alunos;
        }
        
        static function objConteudos($cont){
            $conteudo = new Conteudos();
            $conteudo->setConteudos_id($cont["conteudos_id"]);
            $conteudo->setConteudos_nome($cont["conteudos_nome"]);
            $conteudo->setConteudos_descricao($cont["conteudos_descricao"]);
            $conteudo->setConteudos_ordem($cont["conteudos_ordem"]);
            $conteudo->setConteudos_tipo($cont["conteudos_tipo"]);
            $conteudo->setConteudos_del($cont["conteudos_del"]);
            
            return $conteudo;
        }
        
        static function objPerguntas($perg){
            $pergunta = new Perguntas();
            $pergunta->setPerguntas_id($perg["perguntas_id"]);
            $pergunta->setConteudos_id($perg["conteudos_id"]);
            $pergunta->setPerguntas_descricao($perg["perguntas_descricao"]);
            $pergunta->setExcluido($perg["perguntas_del"]);
            
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
        
        static function objSlides($slides){
            $slide = new Slides();
            $slide->setSlides_id($nota["slides_id"]);
            $slide->setConteudos_id($nota["conteudos_id"]);
            $slide->setSlides_ordem($nota["slides_ordem"]);
            $slide->setSlides_conteudo($nota["slides_conteudo"]);
            $slide->setSlides_del($nota["slides_del"]);
            
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
// ------------------------------ Usuarios ---------------------------------
// ------------------------------ Tela sala aluno --------------------------
        
        static function selecionarConteudosAluno(){
            $sql = "SELECT * FROM conteudos WHERE conteudos_del = 'N' ";
            
            try{
                $query = Database::selecionar($sql);
                
                if($query){
                	for($i = 0; $i < count($query); $i++){
                		$conteudos[$i] = objConteudos($query[$i]);
                	}
                	return $conteudos;
                }
                
            }catch(Exception $e){
                die("Erro: ". $e->getMessage);
            }
            
        }
	}
?>