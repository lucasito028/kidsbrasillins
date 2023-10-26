<?php

    namespace Usuario;

    require_once 'server/Database.php';
    require_once 'server/Crud.php';
    require_once 'index.php';


    use PDO, PDOException, Database\Database, Crud\Crud;
    
    final class Usuario extends Database implements Crud{

        
        final function select($dados): array{

            try{
    
                $this->conn = $this->connect();
        
                if ($this->conn) {
                    $stmt = $this->conn->prepare(
                        "select CPF, 
                        concat(NOME, ' ', SOBRENOME) as `Nome Completo` from PESSOA 
                        where FKIDTIPOPESSOA like 1 
                        order by CPF asc 
                        limit 25;"
                    );
        
                    if ($stmt->execute()) {
                        // Recupera todos os registros como um array associativo
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        return $result;
                    } else {
                        return [];
                    }
                } else {
                    return ["Nada"];
                }
            } catch (PDOException $err) {
                die("Erro");
            }
        }


        final function insert($dados){

            try{
            
                $this -> conn = $this -> connect();
        
                    if($this -> conn){
                        
                        $stmt = $this -> conn -> prepare(
                        "insert into 
                        PESSOA (FKIDTIPOPESSOA, NOME, SOBRENOME) 
                        values (1, :nome, :sobrenome)"
                        );
        
                        $stmt->bindParam(":nome", $dados["NMCLIENTE"], PDO::PARAM_STR);
                        $stmt->bindParam(":sobrenome", $dados["SBCLIENTE"], PDO::PARAM_STR);

                        $result = $stmt->execute();
        
                        if($result){
        
                            return "success";
        
                        }else{
        
                            return "fail";
        
                        }
        
        
                    }else{
                        return "paunahoradeconectar";
                    }
        
        
                }
        
                catch(PDOException $err){
        
                    return "Erro". $err->getMessage();
        
                }
        
        }


        final function update($dados){
            
            try{
            
                $this -> conn = $this -> connect();
        
                    if($this -> conn){
                        
                        $stmt = $this -> conn -> prepare(
                        "update pessoa set NOME = :nome,
                        SOBRENOME = :sobrenome where CPF = :id"
                        );

                        $stmt->bindParam(":nome", $dados["NMCLIENTE"], PDO::PARAM_STR);
                        $stmt->bindParam(":sobrenome", $dados["SBCLIENTE"], PDO::PARAM_STR);
                        $stmt->bindParam(":id", $dados["CPFCLIENTE"], PDO::PARAM_INT);
        

                        $result = $stmt->execute();
        
                        if($result){
                            
                            return "success";
        
                        }else{
        
                            return "fail";
        
                        }
        
        
                    }else{
                        return "paunahoradeconectar";
                    }
        
        
                }
        
                catch(PDOException $err){
        
                    return "Erro". $err->getMessage();
        
                }
        }


        final function delete($dados){

            try{
            
                $this -> conn = $this -> connect();
        
                    if($this -> conn){
                        
                        $stmt = $this -> conn -> prepare(
                        "delete from pessoa 
                        where CPF = :id"
                        );
        
                        $stmt->bindParam(":id", $dados["CPFCLIENTE"], PDO::PARAM_INT);

                        $result = $stmt->execute();
        
                        if($result){
                            
                            return "success";
        
                        }else{
        
                            return "fail";
        
                        }
        
        
                    }else{
                        return "paunahoradeconectar";
                    }
        
        
                }
        
                catch(PDOException $err){
        
                    return "Erro". $err->getMessage();
        
                }
        
            }
        

        final function view($dados){

        }

    }

