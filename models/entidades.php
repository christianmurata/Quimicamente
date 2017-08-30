<?php  
    class Usuarios{
        private $usuarios_id;
        private $usuarios_nome;
        private $usuarios_email;
        private $usuarios_senha;
        private $usuarios_nivel;
        private $usuarios_datanasc;
        private $usuarios_del;
        private $usuarios_foto;
        private $alunos;
        private $professores;
        
        public function setUsuarios_id($value){
            $this->usuarios_id = $value;
        }
        
        public function getUsuarios_id(){
            return $this->usuarios_id;
        }
        
        public function getUsuarios_nome(){
            return $this->usuarios_nome;
        }
        
        public function setUsuarios_nome($value){
           $this->usuarios_nome = $value;
        }
        
        public function getUsuarios_email(){
            return $this->usuarios_email;
        }
        
        public function setUsuarios_email($value){
            $this->usuarios_email = $value;
        }
        
        public function getUsuarios_senha(){
            return $this->usuarios_senha;
        }
        
        public function setUsuarios_senha($value){
            $this->usuarios_senha = $value;
        }     
        
        public function getUsuarios_nivel(){
            return $this->usuarios_nivel;
        }
        
        public function setUsuarios_nivel($value){
            $this->usuarios_nivel = $value;
        }    
        
        public function getUsuarios_datanasc(){
            return $this->usuarios_datanasc;
        }
        
        public function setUsuarios_datanasc($value){
            $this->usuarios_datanasc = $value;
        }  
        
        public function getUsuarios_foto(){
            return $this->usuarios_foto;
        }
        
        public function setUsuarios_foto($value){
            $this->usuarios_foto = $value;
        }  
        
        public function getUsuarios_del(){
            return $this->usuarios_del;
        }
        
        public function setUsuarios_del($value){
            $this->usuarios_del = $value;
        }      
        
        public function getProfessores(){
            return $this->Professores;
        }
        
        public function setProfessores($value){
            $this->Professores = $value;
        }      
        
        public function getAlunos(){
            return $this->Alunos;
        }
        
        public function setAlunos($value){
            $this->Alunos = $value;
        }          
        
    }  
    
    //-----------------------------------------------------------------------------------------------------
    
    class Professores{
        private $professores_id;
        private $usuarios_id;
        private $professores_cpf;
        private $professores_del;
        
        public function setUsuarios_id($value){
            $this->usuarios_id = $value;
        }
        
        public function getUsuarios_id(){
            return $this->usuarios_id;
        }
        
        public function setProfessores_id($value){
            $this->professores_id = $value;
        }
        
        public function getProfessores_id(){
            return $this->professores_id;
        }
        
        public function getProfessores_cpf(){
            return $this->professores_cpf;
        }
        
        public function setProfessores_cpf($value){
            $this->professores_cpf = $value;
        }     
        
        public function getProfessores_del(){
            return $this->professores_del;
        }
        
        public function setProfessores_del($value){
            $this->professores_del = $value;
        }      
    }
      
    
    //-----------------------------------------------------------------------------------------------------
    
    class Alunos{
        private $alunos_id;
        private $usuarios_id;
        private $turmas_id;
        private $conteudos_id;
        private $alunos_del;
        
        public function setUsuarios_id($value){
            $this->usuarios_id = $value;
        }
        
        public function getUsuarios_id(){
            return $this->usuarios_id;
        }
        
        public function setAlunos_id($value){
            $this->alunos_id = $value;
        }
        
        public function getAlunos_id(){
            return $this->alunos_id;
        }
        
        public function getTurmas_id(){
            return $this->turmas;
        }
        
        public function setTurmas_id($value){
            $this->turmas = $value;
        }    
        
        public function getConteudos_id(){
            return $this->conteudos_id;
        }
        
        public function setConteudos_id($value){
            $this->conteudos_id = $value;
        }       
        
        public function getAlunos_del(){
            return $this->alunos_del;
        }
        
        public function setAlunos_del($value){
            $this->alunos_del = $value;
        }    
    }
    
    //-----------------------------------------------------------------------------------------------------
    
    class Turmas{
        private $turmas_id;
        private $professores_id;
        private $turmas_nome;
        private $turma_del;
        
        public function setTurmas_id($value){
            $this->turmas_id = $value;
        }
        
        public function getTurmas_id(){
            return $this->turmas_id;
        }            
        
        public function setProfessores($value){
            $this->professores_id = $value;
        }
        
        public function getProfessores(){
            return $this->professores_id;
        }
        
        public function getTurmas_nome(){
            return $this->turmas_nome;
        }
        
        public function setTurmas_nome($value){
            $this->turmas_nome = $value;
        }    
        
        public function getTurmas_del(){
            return $this->turma_del;
        }  
        
        public function setTurmas_del($value){
            $this->turma_del = $value;
        }      
    }
    
    //-----------------------------------------------------------------------------------------------------
    
    class Conteudos{
        private $conteudos_id;
        private $conteudos_nome;
        private $conteudos_descricao;
        private $conteudos_ordem;
        private $conteudos_tipo;
        private $conteudos_del;
        
        public function setConteudos_id($value){
            $this->conteudos_id = $value;
        }
        
        public function getConteudos_id(){
            return $this->conteudos_id;
        }            
        
        public function getConteudos_nome(){
            return $this->conteudos_nome;
        }
        
        public function setConteudos_nome($value){
            $this->conteudos_nome = $value;
        }    
        
        public function getConteudos_descricao(){
            return $this->conteudos_descricao;
        }
        
        public function setConteudos_descricao($value){
            $this->conteudos_descricao = $value;
        }    
        
        public function getConteudos_ordem(){
            return $this->conteudos_ordem;
        }
        
        public function setConteudos_ordem($value){
            $this->conteudos_ordem = $value;
        }    
        
        public function getConteudos_tipo(){
            return $this->conteudos_tipo;
        }
        
        public function setConteudos_tipo($value){
            $this->conteudos_tipo = $value;
        }    
        
        public function getConteudos_del(){
            return $this->conteudos_del;
        }  
        
        public function setConteudos_del($value){
            $this->conteudos_del = $value;
        }      
    }   

    //-----------------------------------------------------------------------------------------------------
    
    class Conteudos_comunidade{
        private $conteudos_comunidade_id;
        private $professores_id;
        private $conteudos_comunidade_nome;
        private $conteudos_comunidade_descricao;
        private $conteudos_comunidade_ordem;
        private $conteudos_comunidade_tipo;
        private $conteudos_comunidade_del;
       
        public function getConteudos_comunidade_id(){
            return $this->conteudos_comunidade_id;
        }

        public function setConteudos_comunidade_id($conteudos_comunidade_id){
            $this->conteudos_comunidade_id = $conteudos_comunidade_id;
        }
           
        public function setProfessores_id($value){
            $this->professores_id = $value;
        }
        
        public function getProfessores_id(){
            return $this->professores_id;
        }

        public function getConteudos_comunidade_nome(){
            return $this->conteudos_comunidade_nome;
        }

        public function setConteudos_comunidade_nome($conteudos_comunidade_nome){
            $this->conteudos_comunidade_nome = $conteudos_comunidade_nome;
        }

        public function getConteudos_comunidade_descricao(){
            return $this->conteudos_comunidade_descricao;
        }

        public function setConteudos_comunidade_descricao($conteudos_comunidade_descricao){
            $this->conteudos_comunidade_descricao = $conteudos_comunidade_descricao;
        }

        public function getConteudos_comunidade_ordem(){
            return $this->conteudos_comunidade_ordem;
        }

        public function setConteudos_comunidade_ordem($conteudos_comunidade_ordem){
            $this->conteudos_comunidade_ordem = $conteudos_comunidade_ordem;
        }

        public function getConteudos_comunidade_tipo(){
            return $this->conteudos_comunidade_tipo;
        }

        public function setConteudos_comunidade_tipo($conteudos_comunidade_tipo){
            $this->conteudos_comunidade_tipo = $conteudos_comunidade_tipo;
        }

        public function getConteudos_comunidade_del(){
            return $this->conteudos_comunidade_del;
        }

        public function setConteudos_comunidade_del($conteudos_comunidade_del){
            $this->conteudos_comunidade_del = $conteudos_comunidade_del;
        }
    }
      
    //-----------------------------------------------------------------------------------------------------
    
    class Perguntas{
        private $perguntas_id;
        private $conteudos_id;
        private $perguntas_descricao;
        private $perguntas_del;
        
        public function setPerguntas_id($value){
            $this->perguntas_id = $value;
        }
        
        public function getPerguntas_id(){
            return $this->perguntas_id;
        }
        
        public function setConteudos_id($value){
            $this->conteudos_id = $value;
        }
        
        public function getConteudos_id(){
            return $this->conteudos_id;
        }
        
        public function getPerguntas_descricao(){
            return $this->perguntas_descricao;
        }
        
        public function setPerguntas_descricao($value){
            $this->perguntas_descricao = $value;
        }       
        
        public function getPerguntas_del(){
            return $this->perguntas_del;
        }
        
        public function setPerguntas_del($value){
            $this->perguntas_del = $value;
        }    
    }
      
    //-----------------------------------------------------------------------------------------------------
    
    class Perguntas_comunidade{
        private $perguntas_comunidade_id;
        private $professores_id;
        private $conteudos_comunidade_id;
        private $perguntas_comunidade_descricao;
        private $perguntas_comunidade_del;
        
        public function setPerguntas_comunidade_id($value){
            $this->perguntas_comunidade_id = $value;
        }
        
        public function getPerguntas_comunidade_id(){
            return $this->perguntas_comunidade_id;
        }
        
        public function setProfessores_id($value){
            $this->professores_id = $value;
        }
        
        public function getProfessores_id(){
            return $this->professores_id;
        }
        
        public function setConteudos_comunidade_id($value){
            $this->conteudos_comunidade_id = $value;
        }
        
        public function getConteudos_comunidade_id(){
            return $this->conteudos_comunidade_id;
        }
        
        public function getPerguntas_comunidade_descricao(){
            return $this->perguntas_comunidade_descricao;
        }
        
        public function setPerguntas_comunidade_descricao($value){
            $this->perguntas_comunidade_descricao = $value;
        }       
        
        public function getPerguntas_comunidade_del(){
            return $this->perguntas_comunidade_del;
        }
        
        public function setPerguntas_comunidade_del($value){
            $this->perguntas_comunidade_del = $value;
        }    
    }
      
    //-----------------------------------------------------------------------------------------------------

    class Respostas{
        private $respostas_id;
        private $perguntas_id;
        private $respostas_desc;
        private $respostas_correta;
        private $respostas_del;
        
        public function setRespostas_id(){
            return $this->respostas_id;
        }
        
        public function getRespostas_id($value){
            $this->respostas_id = $value;
        }
        
        public function setPerguntas_id(){
            return $this->perguntas_id;
        }
        
        public function getPerguntas_id($value){
            $this->perguntas_id = $value;
        }
        
        public function setRespostas_desc(){
            return $this->respostas_desc;
        }
        
        public function getRespostas_desc($value){
            $this->respostas_desc = $value;
        }
        
        public function setRespostas_correta(){
            return $this->respostas_correta;
        }
        
        public function getRespostas_correta($value){
            $this->respostas_correta = $value;
        }
        
        public function getRespostas_del(){
            return $this->respostas_del;
        }

        public function setRespostas_del($value){
            $this->respostas_del = $value;
        }
    }      

    //-----------------------------------------------------------------------------------------------------

    class Respostas_comunidade{
        private $respostas_comunidade_id;
        private $perguntas_comunidade_id;
        private $respostas_comunidade_desc;
        private $respostas_comunidade_correta;
        private $respostas_comunidade_del;
        
        public function setRespostas_comunidade_id(){
            return $this->respostas_comunidade_id;
        }
        
        public function getRespostas_comunidade_id($value){
            $this->respostas_comunidade_id = $value;
        }
        
        public function setPerguntas_comunidade_id(){
            return $this->perguntas_comunidade_id;
        }
        
        public function getPerguntas_comunidade_id($value){
            $this->perguntas_comunidade_id = $value;
        }
        
        public function setRespostas_comunidade_desc(){
            return $this->respostas_comunidade_desc;
        }
        
        public function getRespostas_comunidade_desc($value){
            $this->respostas_comunidade_desc = $value;
        }
        
        public function setRespostas_comunidade_correta(){
            return $this->respostas_comunidade_correta;
        }
        
        public function getRespostas_comunidade_correta($value){
            $this->respostas_comunidade_correta = $value;
        }
        
        public function getRespostas_comunidade_del(){
            return $this->respostas_comunidade_del;
        }

        public function setRespostas_comunidade_del($value){
            $this->respostas_comunidade_del = $value;
        }
    }
      
    //-----------------------------------------------------------------------------------------------------
    
    class Slides{
        private $slides_id;
        private $conteudos_id;
        private $slides_ordem;
        private $slides_conteudo;
        private $slides_del;
        
        public function setSlides_id($value){
            $this->slides_id = $value;
        }
        
        public function getSlides_id(){
            return $this->slides_id;
        }
        
        public function setConteudos_id($value){
            $this->conteudos_id = $value;
        }
        
        public function getConteudos_id(){
            return $this->conteudos_id;
        }
        
        public function getSlides_ordem(){
            return $this->slides_ordem;
        }
        
        public function setSlides_ordem($value){
            $this->slides_ordem = $value;
        }    
        
        public function getSlides_conteudo(){
            return $this->slides_conteudo;
        }
        
        public function setSlides_conteudo($value){
            $this->slides_conteudo = $value;
        }       
        
        public function getSlides_del(){
            return $this->slides_del;
        }

        public function setSlides_del($value){
            $this->slides_del = $value;
        }
    }
      
    //-----------------------------------------------------------------------------------------------------
      
    class Slides_comunidade{
        private $slides_comunidade_id;
        private $conteudos_comunidade_id;
        private $slides_comunidade_ordem;
        private $slides_comunidade_conteudo;
        private $slides_comunidade_del;
        
        public function getSlides_comunidade_id(){
            return $this->slides_comunidade_id;
        }

        public function setSlides_comunidade_id($slides_comunidade_id){
            $this->slides_comunidade_id = $slides_comunidade_id;
        }

        public function getConteudos_comunidade_id(){
            return $this->conteudos_comunidade_id;
        }

        public function setConteudos_comunidade_id($conteudos_comunidade_id){
            $this->conteudos_comunidade_id = $conteudos_comunidade_id;
        }

        public function getSlides_comunidade_ordem(){
            return $this->slides_comunidade_ordem;
        }

        public function setSlides_comunidade_ordem($slides_comunidade_ordem){
            $this->slides_comunidade_ordem = $slides_comunidade_ordem;
        }

        public function getSlides_comunidade_conteudo(){
            return $this->slides_comunidade_conteudo;
        }

        public function setSlides_comunidade_conteudo($slides_comunidade_conteudo){
            $this->slides_comunidade_conteudo = $slides_comunidade_conteudo;
        }

        public function getSlides_comunidade_del(){
            return $this->slides_comunidade_del;
        }

        public function setSlides_comunidade_del($slides_comunidade_del){
            $this->slides_comunidade_del = $slides_comunidade_del;
        }
    }

    //-----------------------------------------------------------------------------------------------------

    class Provas{
        private $provas_id;
        private $professores_id;
        private $turmas_id;
        private $provas_data;
        private $provas_del;
        
        public function getProvas_id(){
            return $this->provas_id;
        }

        public function setProvas_id($value){
            $this->provas_id = $value;
        }

        public function getProfessores(){
            return $this->professores_id;
        }

        public function setProfessores($value){
            $this->professores_id = $value;
        }

        public function getTurmas_id(){
            return $this->turmas_id;
        }

        public function setTurmas_id($value){
            $this->turmas_id = $value;
        }

        public function getProvas_data(){
            return $this->provas_data;
        }

        public function setProvas_data($value){
            $this->provas_data = $value;
        }

        public function getProvas_del(){
            return $this->provas_del;
        }

        public function setProvas_del($value){
            $this->provas_del = $value;
        }
    }
      
    //-----------------------------------------------------------------------------------------------------

    class Questoes_prova{
        private $questoes_provas_id;
        private $provas_id;
        private $perguntas_id;
        private $questoes_prova_del;
        
        public function getQuestoes_provas_id(){
            return $this->questoes_provas_id;
        }

        public function setQuestoes_provas_id($value){
            $this->questoes_provas_id = $value;
        }

        public function getProvas(){
            return $this->provas_id;
        }

        public function setProvas($value){
            $this->provas_id = $value;
        }

        public function getPerguntas(){
            return $this->perguntas_id;
        }

        public function setPerguntas($value){
            $this->perguntas_id = $value;
        }

        public function getQuestoes_prova_del(){
            return $this->questoes_prova_del;
        }

        public function setQuestoes_prova_del($value){
            $this->questoes_prova_del = $value;
        }
    }
      
    //-----------------------------------------------------------------------------------------------------
      
    class Respostas_prova{
        private $respostas_prova_id;
        private $alunos_id;
        private $provas_id;
        private $respostas_prova_media;
        private $respostas_prova_del;
        
        public function getRespostas_prova_id(){
            return $this->respostas_prova_id;
        }

        public function setRespostas_prova_id($value){
            $this->respostas_prova_id = $value;
        }

        public function getAlunos(){
            return $this->Alunos;
        }

        public function setAlunos($value){
            $this->alunos_id = $value;
        }

        public function getProvas(){
            return $this->provas_id;
        }

        public function setProvas($value){
            $this->provas_id = $value;
        }

        public function getRespostas_prova_media(){
            return $this->respostas_prova_media;
        }

        public function setRespostas_prova_media($value){
            $this->respostas_prova_media = $value;
        }

        public function getRespostas_prova_del(){
            return $this->respostas_prova_del;
        }

        public function setRespostas_prova_del($value){
            $this->respostas_prova_del = $value;
        }
    }

    //-----------------------------------------------------------------------------------------------------
    
    class Desempenhos{
        private $desempenhos_id;
        private $alunos_id;
        private $desempenhos_dificuldade;
        private $desempenhos_notafinal;
        private $desempenhos_tempo;
        private $desempenhos_del;      
        
		public function getAlunos_id(){
			return $this->alunos_id;
		}

		public function setAlunos_id($alunos_id){
			$this->alunos_id = $alunos_id;
		}
		
        public function setDesempenhos_id($value){
            $this->desempenhos_id = $value;
        }
        
        public function getDesempenhos_id(){
            return $this->desempenhos_id;
        }    
        
        public function setDesempenhos_dificuldade($value){
            $this->desempenhos_dificuldade = $value;
        }
        
        public function getDesempenhos_dificuldade(){
            return $this->desempenhos_dificuldade;
        }
        
        public function getDesempenhos_notafinal(){
            return $this->desempenhos_notafinal;
        }
        
        public function setDesempenhos_notafinal($value){
            $this->desempenhos_notafinal = $value;
        }    
        
        public function getDesempenhos_tempo(){
            return $this->desempenhos_tempo;
        }

        public function setDesempenhos_tempo($value){
            $this->desempenhos_tempo = $value;
        }

        public function getDesempenhos_del(){
            return $this->desempenhos_del;
        }

        public function setDesempenhos_del($value){
            $this->desempenhos_del = $value;
        }  
    }

    //-----------------------------------------------------------------------------------------------------

    class Conteudos_liberados{
        private $conteudos_liberados_id;
        private $conteudos_id;
        private $turmas_id;
        private $conteudos_liberados_del;      
        
        public function getConteudos_liberados_id(){
            return $this->conteudos_liberados_id;
        }
        
        public function setConteudos_liberados_id($value){
            $this->conteudos_liberados_id = $value;
        }    
        
        public function setConteudos_id($value){
            $this->conteudos_id = $value;
        }
        
        public function getConteudos_id(){
            return $this->conteudos_id;
        }    
        
        public function setTurmas_id($value){
            $this->turmas_id = $value;
        }
        
        public function getTurmas_id(){
            return $this->turmas_id;
        }
        
        public function getProfessores_id(){
            return $this->professores_id;
        }
        
        public function setProfessores_id($value){
            $this->professores_id = $value;
        }    
        
        public function getConteudos_liberados_del(){
            return $this->conteudos_liberados_del;
        }

        public function setConteudos_liberados_del($value){
            $this->conteudos_liberados_del = $value;
        }  
    }

    //-----------------------------------------------------------------------------------------------------

    class Conteudos_comunidade_liberados{
        private $conteudos_comunidade_liberados_id;
        private $conteudos_comunidade_id;
        private $turmas_id;
        private $conteudos_comunidade_liberados_del;  
        
        public function getConteudos_comunidade_liberados_id(){
            return $this->conteudos_comunidade_liberados_id;
        }

        public function setConteudos_comunidade_liberados_id($conteudos_comunidade_liberados_id){
            $this->conteudos_comunidade_liberados_id = $conteudos_comunidade_liberados_id;
        }

        public function getConteudos_comunidade_id(){
            return $this->conteudos_comunidade_id;
        }

        public function setConteudos_comunidade_id($conteudos_comunidade_id){
            $this->conteudos_comunidade_id = $conteudos_comunidade_id;
        }

        public function getTurmas_id(){
            return $this->turmas_id;
        }

        public function setTurmas_id($turmas_id){
            $this->turmas_id = $turmas_id;
        }

        public function getConteudos_comunidade_liberados_del(){
            return $this->conteudos_comunidade_liberados_del;
        }

        public function setConteudos_comunidade_liberados_del($conteudos_comunidade_liberados_del){
            $this->conteudos_comunidade_liberados_del = $conteudos_comunidade_liberados_del;
        }
    }

    //-----------------------------------------------------------------------------------------------------

    class Recupera_senha{
        private $Recupera_senha_id;
        private $Usuarios_id;
        private $Recupera_senha_hash;
        private $Recupera_senha_del;
        
        public function getRecupera_senha_id(){
            return $this->Recupera_senha_id;
        }

        public function setRecupera_senha_id($Recupera_senha_id){
            $this->Recupera_senha_id = $Recupera_senha_id;
        }

        public function getUsuarios_id(){
            return $this->Usuarios_id;
        }

        public function setUsuarios_id($Usuarios_id){
            $this->Usuarios_id = $Usuarios_id;
        }

        public function getRecupera_senha_hash(){
            return $this->Recupera_senha_hash;
        }

        public function setRecupera_senha_hash($Recupera_senha_hash){
            $this->Recupera_senha_hash = $Recupera_senha_hash;
        }

        public function getRecupera_senha_del(){
            return $this->Recupera_senha_del;
        }

        public function setRecupera_senha_del($Recupera_senha_del){
            $this->Recupera_senha_del = $Recupera_senha_del;
        }
    }
?>