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

    public function searchFromDB($search,$inicio,$itensPage,$option)
    {
    
        $string_busca = "%$search%"; 


        if($option == 1)
            $sql = "SELECT * FROM users WHERE name LIKE :string_busca OR email LIKE :string_busca LIMIT :inicio, :fim"; //procura no BD os nomes e os emails que batem com a string de busca.
        else
            $sql = "SELECT * FROM posts WHERE tittle LIKE :string_busca OR content LIKE :string_busca LIMIT :inicio, :fim";


        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':string_busca',$string_busca,PDO::PARAM_STR);
        $stmt->bindValue(':inicio', (int)$inicio,PDO::PARAM_INT);
        $stmt->bindValue(':fim', (int)$itensPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectFromDB($search)// pesquisa por posts da lista de post
    {
        $string_busca = "%$search%"; 

        $sql = "SELECT * FROM posts WHERE tittle LIKE :string_busca OR content LIKE :string_busca";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':string_busca',$string_busca,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function countFromSearch($table,$busca,$option)
    {

        if($option == 1)
            $sql = "SELECT COUNT(*) as total_ocorr FROM $table WHERE name like :busca OR email LIKE :busca";
        else
            $sql = "SELECT COUNT(*) as total_ocorr FROM $table WHERE tittle like :busca OR content LIKE :busca";

            
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':busca',"%$busca%");
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['total_ocorr'];
    }
}