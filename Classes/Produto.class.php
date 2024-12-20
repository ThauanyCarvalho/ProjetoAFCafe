<?php
require_once 'C:/xampp/htdocs/ProjetoAFCafe/Classes/CRUD.class.php';
require_once 'C:/xampp/htdocs/ProjetoAFCafe/Classes/Database.class.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Produtos extends CRUD{

protected $table = "Produto";
private $id;
private $nomeProduto;
private $descricaoProduto;
private $foto;



public function add(){
    // SQL para inserir dados, sem o campo 'id' se for autoincrementado
    $sql = "INSERT INTO Produto (nomeProduto, descricaoProduto, foto) VALUES (:nomeProduto, :descricaoProduto, :foto)";

    // Preparar a declaração usando a classe Database
    $stmt = Database::prepare($sql);

    // Atribuindo os valores aos parâmetros
    $stmt->bindParam(":nomeProduto", $this->nomeProduto);
    $stmt->bindParam(":descricaoProduto", $this->descricaoProduto);
    $stmt->bindParam(":foto", $this->foto);

    // Executar e retornar o status
    return $stmt->execute();
}
public function update($campo, $id){

}
public function __construct() {}
  

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
 * Get the value of nomeProduto
 */ 
public function getNomeProduto()
{
return $this->nomeProduto;
}

/**
 * Set the value of nomeProduto
 *
 * @return  self
 */ 
public function setNomeProduto($nomeProduto)
{
$this->nomeProduto = $nomeProduto;

return $this;
}

/**
 * Get the value of descricaoProduto
 */ 
public function getDescricaoProduto()
{
return $this->descricaoProduto;
}

/**
 * Set the value of descricaoProduto
 *
 * @return  self
 */ 
public function setDescricaoProduto($descricaoProduto)
{
$this->descricaoProduto = $descricaoProduto;

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
