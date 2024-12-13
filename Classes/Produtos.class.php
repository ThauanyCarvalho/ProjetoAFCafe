<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Produtos extends CRUD{

protected $table = "cad_produtos";
private $id;
private $nome;
private $preco;
private $descricao;
private $imagem;



public function add(){
    #Sql de Inserir
    $sql = "INSERT INTO cad_produtos (nomeProduto, preco, descricao, imagem) VALUES (:nomeProduto, :preco, :descricao, :imagem)";

    #Preparar a declaração usando a classe Database
    $stmt = Database::prepare($sql);

    #atribuindo os valores aos parâmetros
    $stmt->bindParam(":nomeProduto", $this->nome) ;
    $stmt->bindParam(":preco", $this->preco) ;
    $stmt->bindParam(":descricao", $this->descricao) ;
    $stmt->bindParam(":imagem", $this->imagem) ;

    $stmt->execute();

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
 * Get the value of status
 */ 
public function getDescricao()
{
    return $this->descricao;
}

/**
 * Set the value of status
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