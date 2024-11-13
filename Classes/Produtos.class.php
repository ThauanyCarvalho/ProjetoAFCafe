<?php

class CadProduto extends CRUD{
    protected $table = "CadProduto";

    private $id;
    private $nomeProduto;
    private $preco;
    private $descricao;
    private $imagem;

    public function add() {
        #sql de inserir
        $sql = "INSERT INTO CadProduto (id, nomeProduto, preco, descricao, status, imagem) VALUES (:id, :nomeProduto, :preco, :descricao, :status, :imagem)";

        #prepara a declaração usando a classe DataBase
        $stmt = Database::prepare($sql);

        #atribuindo os valores oos parametros

        $stmt->bindParam(":id", $this->id) ;
        $stmt->bindParam("nomeProduto", $this->nomeProduto) ;
        $stmt->bindParam("preco", $this->preco) ;
        $stmt->bindParam("descricao", $this->descricao) ;
        $stmt->bindParam("imagem", $this->imagem) ;

        $stmt->execute();

    } 

    public function update($campo, $id) {

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
    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNomeProduto($nomeProduto)
    {
        $this->nomeProduto = $nomeProduto;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get the value of celular
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of celular
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }
}