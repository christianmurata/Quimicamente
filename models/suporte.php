<?php
    
    //-----------------------------------------------------------------------------------------------------------
    //--------------------------- CLASSE PARA CONEXÃO COM O BANCO DE DADOS Database -----------------------------
    //------------------------ PARA USO DA QUARKZ TECHNOLOGY, PROGRAMADO POR PEDRO LUIZ -------------------------
    //-----------------------------------------------------------------------------------------------------------

   
    
//    GAMBIARRA NOJENTA QUE EU FAZIA:

//    if(isset($_SESSION["db"]) == false){
//        session_start();
//        $_SESSION["db"] = new Db($pdo);
//    }

	class Database{
        //AGORA TODAS OS MÉTODOS E VARIÁVEIS SÃO ESTÁTICOS, NÃO PRECISAM SER INSTANCIADOS.
        static $pdo;
        static function conecta(){
            //O CONTEUDO DESSA FUNÇÃO FICAVA FORA DA CLASSE, 
            //E AQUI HAVIA UM CONSTRUTOR PARA RECEBER A CONEXÃO
            
            //----------------- DEFININDO DADOS DA CONEXÃO
            $drive = "pgsql";
            $host = "localhost";
            $porta = "5432";
            $banco = "quimicamente";
            $usuario = "quarkz";
            $senha = "4cess4_qu4rkz";
            //--------------------------------------------

            //STRING DE CONEXÃO
            $con = "$drive:host=$host;port=$porta;dbname=$banco;user=$usuario;password=$senha";

            //CRIAÇÃO DA CONEXÃO COM A BASE DE DADOS 
            //O OBJETO $pdo É QUEM MANDA AS QUERYs PRO BANCO E AS EXECUTA, ATRAVÉS DAS FUNÇÕES DO PDO
            try{
                Database::$pdo = new PDO($con);
                Database::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      //HABILITAR EXCEÇÕES
            }
            catch(PDOExeption $e){
                return "Não foi possível conectar a base de dados. Erro: <br>".$e->getMessage();
            }
            
        }
		
		static function executar($sql){		//QUERY SEM RETORNO
            Database::conecta();        //FAZ A CONEXÃO
			try{
                //CHAMA O OBJETO $pdo, QUE EXECUTA O sql PASSADO POR PARÂMETRO DENTRO DA FUNÇÃO
				$query = Database::$pdo->query($sql);
			}
            
            //TRATAMENTO DE ERROS
			catch(PDOException $e){
                return "Erro ao processar consulta. Erro: <br>".$e->getMessage()."<br>";
			}
		}
		
		static function executarParam($sql, $param){		//EXECUTA QUERYs COM PARÂMETROS, SEM RETORNO
            Database::conecta();        //FAZ A CONEXÃO
            $i = 1;         //INDÍCE PARA INDICAR OS PARÂMETROS
            try{
                //PREPARA O BANCO COM A QUERY, ASSIM NÃO PRECISANDO CONCATENAR A SQL BRUTA,
                //EVITANDO SQL INJECTION
                $stmt = Database::$pdo->prepare($sql);
                
                //PERCORRE O ARRAY COM OS PARÂMETROS. CADA "?" NA SQL CORRESPONDE A UM DELES
                //O bindValue() FIXA O PARÂMETRO. QUANDO SE USA "?" NA QUERY É 
                //PRECISO USAR UM NÚMERO INTEIRO PARA REPRESENTAR CADA PARÂMETRO NO bindValue()
                //POR ISSO O CONTADOR  $i++
                
                foreach($param as $value){
                    $stmt->bindValue($i++, $value);
                }
                //COM A SQL E OS PARÂMETROS PASSADO, A QUERY É EXECUTADA.
                return $stmt->Execute();

            }
            //TRATAMENTO DE ERROS
            catch(PDOException $e){
                return "Erro ao processar consulta. Erro: <br>".$e->getMessage().".<br>";
            }
		}
		
		static function selecionarParam($sql, $param){		//SELECIONAR REGISTROS, RETORNA ARRAY
            Database::conecta();        //FAZ A CONEXÃO
			$i = 1;         //INDÍCE PARA INDICAR OS PARÂMETROS
            try{
                //PREPARA O BANCO COM A QUERY, ASSIM NÃO PRECISANDO CONCATENAR A SQL BRUTA,
                //EVITANDO SQL INJECTION
                $stmt = Database::$pdo->prepare($sql);
                
                //PERCORRE O ARRAY COM OS PARÂMETROS. CADA "?" NA SQL CORRESPONDE A UM DELES
                //O bindValue() FIXA O PARÂMETRO. QUANDO SE USA "?" NA QUERY É 
                //PRECISO USAR UM NÚMERO INTEIRO PARA REPRESENTAR CADA PARÂMETRO NO bindValue()
                //POR ISSO O CONTADOR  $i++
                
                foreach($param as $value){
                    $stmt->bindValue($i++, $value);
                }
                //COM A SQL E OS PARÂMETROS PASSADO, A QUERY É EXECUTADA.
                $query = $stmt->Execute();
            }
            catch(PDOException $e){
                return "Erro ao processar consulta. Erro: <br>".$e->getMessage().".<br>";
            }
            //SE A QUERY FOI EXECUTADA COM SUCESSO, MONTA UM ARRAY COM OS RESULTADOS
            //E O RETORNA
            if($query){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
		}
		
		static function selecionar($sql){		//SELECIONAR REGISTROS, RETORNA ARRAY
            Database::conecta();        //FAZ A CONEXÃO
            try{
                //EXECUTA A QUERY DIRETAMENTE
				$query = Database::$pdo->query($sql);
			}
			catch(PDOException $e){
                return "Erro ao processar consulta. Erro: <br>".$e->getMessage()."<br>";
			}
            
            //SE A QUERY FOI EXECUTADA COM SUCESSO, MONTA UM ARRAY COM OS RESULTADOS
            //E O RETORNA
            if($query){
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
		}

        static function selecionaObjeto($sql, $param){      //SELECIONAR REGISTROS, RETORNA ARRAY
            Database::conecta();        //FAZ A CONEXÃO
            try{
                //PREPARA O BANCO COM A QUERY, ASSIM NÃO PRECISANDO CONCATENAR A SQL BRUTA,
                //EVITANDO SQL INJECTION
                $stmt = Database::$pdo->prepare($sql);
                
                //PERCORRE O ARRAY COM OS PARÂMETROS. CADA "?" NA SQL CORRESPONDE A UM DELES
                //O bindValue() FIXA O PARÂMETRO. QUANDO SE USA "?" NA QUERY É 
                //PRECISO USAR UM NÚMERO INTEIRO PARA REPRESENTAR CADA PARÂMETRO NO bindValue()
                //POR ISSO O CONTADOR  $i++
                
                $stmt->bindValue(1, $param, PDO::PARAM_STR);
                //COM A SQL E OS PARÂMETROS PASSADO, A QUERY É EXECUTADA.
                $query = $stmt->Execute();
            }
            catch(PDOException $e){
                return "Erro ao processar consulta. Erro: <br>".$e->getMessage().".<br>";
            }
            //SE A QUERY FOI EXECUTADA COM SUCESSO, MONTA UM ARRAY COM OS RESULTADOS
            //E O RETORNA
            if($query){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
        }

	}
