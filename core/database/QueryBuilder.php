<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $inicio = null, $rows_count = null)
    {
        $sql = "select * from {$table}";

        if($inicio >= 0 && $rows_count > 0){
            $sql .= " LIMIT {$inicio}, {$rows_count}"; 
        }


        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

   public function countALL($table)
    {
        $sql = "SELECT COUNT(*) FROM {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectOne($table, $id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id=:id LIMIT 1', $table);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);

            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function insert($table, $parameters)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
        $table,
        implode(', ', array_keys($parameters)),
        ':' . implode(', :', array_keys($parameters)),
    );

    try{
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);

    } catch (Exception $e){
        die($e->getMessage());
    }
    }


    public function update($table, $id, $parameters)
    {
        $sql = sprintf('UPDATE %s SET %s WHERE id = %s',
        $table,
        implode(', ',array_map(function($param){
            return $param . ' = :' .$param;
        }, array_keys($parameters))),
        $id
    );

     try{
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);

    } catch (Exception $e){
        die($e->getMessage());
    }

    }

    public function delete($table, $id)
    {
        $sql = sprintf('DELETE FROM %s WHERE %s',
        $table,
        'id = :id'); 

     try{
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(compact('id'));

    } catch (Exception $e){
        die($e->getMessage());
    }
 
        
    }

    public function verificaLogin($email, $senha): mixed
    {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(
                [
                    'email' => $email,
                    'password' => $senha
                ]
            );

            $user= $stmt->fetch(PDO::FETCH_OBJ);

            return $user;
  
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}