<?php

abstract class CRUD{
    protected $table;
    abstract public function add();
    abstract public function update($campo, $id);

    public function all(){

         #construindo o comando sql
         $sql = "SELECT * FROM $this->table";
         #preparando o comando para executar
         $stmt = Database::prepare($sql);
         #executando o comando
         $stmt-> execute();
         #retornando os dados do banco de dados
         return $stmt->fetchAll(PDO::FETCH_OBJ);

   }

   public function search(string $campo, int $id){
    $sql = "SELECT * FROM $this->table WHERE $campo = :id";
    $stmt = Database::prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $dados = $stmt->fetch(PDO::FETCH_OBJ);
        return $dados;
    }else{
        return null;
    }
   }
}