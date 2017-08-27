<?php
    
    //-----------------------------------------------------------------------------------------------------------
    //--------------------------- CLASSE PARA CONEXÃƒO COM O BANCO DE DADOS Database -----------------------------
    //------------------------ PARA USO DA QUARKZ TECHNOLOGY, PROGRAMADO POR PEDRO LUIZ -------------------------
    //-----------------------------------------------------------------------------------------------------------

   
    
//    GAMBIARRA NOJENTA QUE EU FAZIA:

//    if(isset($_SESSION["db"]) == false){
//        session_start();
//        $_SESSION["db"] = new Db($pdo);
//    }

	class Database{
        //AGORA TODAS OS MÃ‰TODOS E VARIÃVEIS SÃƒO ESTÃTICOS, NÃƒO PRECISAM SER INSTANCIADOS.
        static $pdo;
        static function conecta(){
            //O CONTEUDO DESSA FUNÃ‡ÃƒO FICAVA FORA DA CLASSE, 
            //E AQUI HAVIA UM CONSTRUTOR PARA RECEBER A CONEXÃƒO
            
            //----------------- DEFININDO DADOS DA CONEXÃƒO 
            $drive = "pgsql";
            $host = "localhost";
            $porta = "5432";
            $banco = "quimicamente_teste";
            $usuario = "postgres";
            $senha = "murata97";
            //--------------------------------------------

            //STRING DE CONEXÃƒO
            $con = "$drive:host=$host;port=$porta;dbname=$banco;user=$usuario;password=$senha";

            //CRIAÃ‡ÃƒO DA CONEXÃƒO COM A BASE DE DADOS 
            //O OBJETO $pdo Ã‰ QUEM MANDA AS QUERYs PRO BANCO E AS EXECUTA, ATRAVÃ‰S DAS FUNÃ‡Ã•ES DO PDO
            try{
                Database::$pdo = new PDO($con);
                Database::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      //HABILITAR EXCEÃ‡Ã•ES
            }
            catch(PDOExeption $e){
                echo "NÃ£o foi possÃ­vel conectar a base de dados. Erro: <br>".$e->getMessage();        
            }
            
        }
		
		static function executar($sql){		//QUERY SEM RETORNO
            Database::conecta();        //FAZ A CONEXÃƒO
			try{
                //CHAMA O OBJETO $pdo, QUE EXECUTA O sql PASSADO POR PARÃ‚METRO DENTRO DA FUNÃ‡ÃƒO
				$query = Database::$pdo->query($sql);
			}
            
            //TRATAMENTO DE ERROS
			catch(PDOException $e){      
				echo "Erro ao processar consulta. Erro: <br>".$e->getMessage()."<br>";
			}
		}
		
		static function executarParam($sql, $param){		//EXECUTA QUERYs COM PARÃ‚METROS, SEM RETORNO
            Database::conecta();        //FAZ A CONEXÃƒO
            $i = 1;         //INDÃCE PARA INDICAR OS PARÃ‚METROS
            try{
                //PREPARA O BANCO COM A QUERY, ASSIM NÃƒO PRECISANDO CONCATENAR A SQL BRUTA,
                //EVITANDO SQL INJECTION
                $stmt = Database::$pdo->prepare($sql);
                
                //PERCORRE O ARRAY COM OS PARÃ‚METROS. CADA "?" NA SQL CORRESPONDE A UM DELES
                //O bindValue() FIXA O PARÃ‚METRO. QUANDO SE USA "?" NA QUERY Ã‰ 
                //PRECISO USAR UM NÃšMERO INTEIRO PARA REPRESENTAR CADA PARÃ‚METRO NO bindValue()
                //POR ISSO O CONTADOR  $i++
                
                foreach($param as $value){
                    $stmt->bindValue($i++, $value);
                }
                //COM A SQL E OS PARÃ‚METROS PASSADO, A QUERY Ã‰ EXECUTADA.
                $stmt->Execute();
            }
            //TRATAMENTO DE ERROS
            catch(PDOException $e){
                die("Erro ao processar consulta. Erro: <br>".$e->getMessage().".<br>");
            }
		}
		
		static function selecionarParam($sql, $param){		//SELECIONAR REGISTROS, RETORNA ARRAY
            Database::conecta();        //FAZ A CONEXÃƒO
			$i = 1;         //INDÃCE PARA INDICAR OS PARÃ‚METROS
            try{
                //PREPARA O BANCO COM A QUERY, ASSIM NÃƒO PRECISANDO CONCATENAR A SQL BRUTA,
                //EVITANDO SQL INJECTION
                $stmt = Database::$pdo->prepare($sql);
                
                //PERCORRE O ARRAY COM OS PARÃ‚METROS. CADA "?" NA SQL CORRESPONDE A UM DELES
                //O bindValue() FIXA O PARÃ‚METRO. QUANDO SE USA "?" NA QUERY Ã‰ 
                //PRECISO USAR UM NÃšMERO INTEIRO PARA REPRESENTAR CADA PARÃ‚METRO NO bindValue()
                //POR ISSO O CONTADOR  $i++
                
                foreach($param as $value){
                    $stmt->bindValue($i++, $value);
                }
                //COM A SQL E OS PARÃ‚METROS PASSADO, A QUERY Ã‰ EXECUTADA.
                $query = $stmt->Execute();
            }
            catch(PDOException $e){
                die("Erro ao processar consulta. Erro: <br>".$e->getMessage().".<br>");
            }
            //SE A QUERY FOI EXECUTADA COM SUCESSO, MONTA UM ARRAY COM OS RESULTADOS
            //E O RETORNA
            if($query){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
		}
		
		static function selecionar($sql){		//SELECIONAR REGISTROS, RETORNA ARRAY
            Database::conecta();        //FAZ A CONEXÃƒO
            try{
                //EXECUTA A QUERY DIRETAMENTE
				$query = Database::$pdo->query($sql);
			}
			catch(PDOException $e){
				echo "Erro ao processar consulta. Erro: <br>".$e->getMessage()."<br>";
			}
            
            //SE A QUERY FOI EXECUTADA COM SUCESSO, MONTA UM ARRAY COM OS RESULTADOS
            //E O RETORNA
            if($query){
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
		}

        static function selecionaObjeto($sql, $param){      //SELECIONAR REGISTROS, RETORNA ARRAY
            Database::conecta();        //FAZ A CONEXÃƒO
            try{
                //PREPARA O BANCO COM A QUERY, ASSIM NÃƒO PRECISANDO CONCATENAR A SQL BRUTA,
                //EVITANDO SQL INJECTION
                $stmt = Database::$pdo->prepare($sql);
                
                //PERCORRE O ARRAY COM OS PARÃ‚METROS. CADA "?" NA SQL CORRESPONDE A UM DELES
                //O bindValue() FIXA O PARÃ‚METRO. QUANDO SE USA "?" NA QUERY Ã‰ 
                //PRECISO USAR UM NÃšMERO INTEIRO PARA REPRESENTAR CADA PARÃ‚METRO NO bindValue()
                //POR ISSO O CONTADOR  $i++
                
                $stmt->bindValue(1, $param);
                //COM A SQL E OS PARÃ‚METROS PASSADO, A QUERY Ã‰ EXECUTADA.
                $query = $stmt->Execute();
            }
            catch(PDOException $e){
                die("Erro ao processar consulta. Erro: <br>".$e->getMessage().".<br>");
            }
            //SE A QUERY FOI EXECUTADA COM SUCESSO, MONTA UM ARRAY COM OS RESULTADOS
            //E O RETORNA
            if($query){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
        }  
	}
    ?>