<?php
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
        
        public function getPerguntas($value){
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
?>