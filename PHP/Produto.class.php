<?php

// id int NOT NULL auto_increment primary key,
// nomeProduto  varchar (100) NOT NULL,
// descricaoProduto varchar (600) NOT NULL,
// Foto varchar(255) DEFAULT NULL

#Nome do arquivo Aluno.class.php
require_once 'C:/xampp/htdocs/ProjetoAFCafe/PHP/CRUD.class.php';
require_once 'C:/xampp/htdocs/ProjetoAFCafe/PHP/Database.class.php';
class Produto extends CRUD{

    protected $table = "Produto";
    private $id;
    private $nome;
    private $descricao;
    private $foto;

    public function add(){
        #Sql de Inserir
        $sql = "INSERT INTO Produto (nomeProduto,descricaoProduto, foto) VALUES (:nomeProduto,:descricaoProduto, :foto)";

        #Preparar a declaração usando a classe Database
        $stmt = Database::prepare($sql);

        #atribuindo os valores aos parâmetros
        $stmt->bindParam(":nomeProduto", $this->nome) ;
        $stmt->bindParam(":descricaoProduto", $this->descricao) ;
        $stmt->bindParam(":foto", $this->foto) ;

        return $stmt->execute();

    }

    public function update($campo, $id){
    
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

   
    

    /**
     * Get the value of foto
     */ 
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }
}