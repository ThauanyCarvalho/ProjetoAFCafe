<?php

// idUsuario int NOT NULL AUTO_INCREMENT PRIMARY KEY,
//       nomeUsuario varchar(255) NOT NULL,
//      emailUsuario varchar(255) NOT NULL,
//      celularUsuario varchar(14) NOT NULL,
//      statusUsuario varchar(20) NOT NULLL

#Nome do arquivo Aluno.class.php
require_once 'C:/xampp/htdocs/ProjetoAFCafe/PHP/CRUD.class.php';
require_once 'C:/xampp/htdocs/ProjetoAFCafe/PHP/Database.class.php';

class Usuario extends CRUD{

    protected $table = "Usuario";
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $status;

    public function add(){
        #Sql de Inserir
        $sql = "INSERT INTO Usuario (nomeUsuario, emailUsuario, senhaUsuario, statusUsuario) VALUES (:nomeUsuario, :emailUsuario, :senhaUsuario,  :statusUsuario)";

        #Preparar a declaração usando a classe Database
        $stmt = Database::prepare($sql);

        #atribuindo os valores aos parâmetros
        $stmt->bindParam(":nomeUsuario", $this->nome) ;
        $stmt->bindParam(":emailUsuario", $this->email) ;
        $stmt->bindParam(":senhaUsuario", $this->senha) ;
        $stmt->bindParam(":statusUsuario", $this->status) ;
  

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

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of celular
     */ 
    

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
    }

 
