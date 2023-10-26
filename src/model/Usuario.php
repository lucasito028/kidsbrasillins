<?php

    namespace Usuario;

    require_once 'server/Database.php';
    require_once 'server/Crud.php';
    require_once 'index.php';


    use PDO, PDOException, Database\Database, Crud\Crud;
    
    final class Usuario extends Database implements Crud{

        function select($dados): array{

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

        function insert($dados){

        }

        function update($dados){

        }

        function delete($dados){

        }

        function view($dados){

        }

    }

