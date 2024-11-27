<?php
#nome do arquivo CRUD.class.php

abstract class CRUD{
protected $table;
abstract public function add();
abstract public function update ($campo, $id);
}

public function all(){
    #construindo o comando SQL
    $sql = "SELECT * FROM $this->table";
    #Preparando o comando para executar
    $stmt = Database::prepare($sql);
    #Executando o comando
    $stmt->execute();
    #retornando os dados do banco de dados
    return $stmt->fetchALL(PDO::FETCH_OBJ);
    }
    