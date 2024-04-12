<?php

require_once('Banco.class.php');

class Contato{

  public $id;
  public $nome;
  public $email;
  public $telefone;
  

  // Métodos
  public function Listar() {
    $sql = "SELECT * FROM contatos";
    $conexao = Banco::conectar();
    // Converter o comando sql (string) em um objeto
    $comando = $conexao->prepare($sql);
    // Executar o comando
    $comando->execute();
    // Entregar o resultado para $resultado como um array associativo
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
    
    // Desconectar
    Banco::desconectar();

    return $resultado;
  }

  public function ListarPorID() {
    $sql = "SELECT * FROM contatos WHERE id = ?";
    $conexao = Banco::conectar();
    // Converter o comando sql (string) em um objeto
    $comando = $conexao->prepare($sql);
    // Executar o comando
    $comando->execute([$this->id]);
    // Entregar o resultado para $resultado como um array associativo
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
    
    // Desconectar
    Banco::desconectar();

    return $resultado;
  }

  public function Cadastrar() {
    $sql = "INSERT INTO contatos(nome, email, telefone) VALUES (?,?,?)";
    $conexao = Banco::conectar();
    // Converter o comando sql (string) em um objeto
    $comando = $conexao->prepare($sql);

    // Executar o comando
    $comando->execute([$this->nome, $this->email, $this->telefone]);
    $linhas = $comando->rowCount();
    // Desconectar
    Banco::desconectar();
    // Retornar a quantidade de linhas cadastradas
    return $linhas;

  }

  public function Apagar() {
    $sql = "DELETE FROM contatos WHERE id = ?";
    $conexao = Banco::conectar();
    // Converter o comando sql (string) em um objeto
    $comando = $conexao->prepare($sql);

    // Executar o comando
    $comando->execute([$this->id]);
    $linhas = $comando->rowCount();
    // Desconectar
    Banco::desconectar();
    // Retornar a quantidade de linhas cadastradas
    return $linhas;

  }

  public function Modificar() {
    $sql = "UPDATE contatos SET nome=?, email=?, telefone=? WHERE id=?";
    $conexao = Banco::conectar();
    // Converter o comando sql (string) em um objeto
    $comando = $conexao->prepare($sql);

    // Executar o comando
    $comando->execute([$this->nome, $this->email, $this->telefone, $this->id]);
    $linhas = $comando->rowCount();
    // Desconectar
    Banco::desconectar();
    // Retornar a quantidade de linhas cadastradas
    return $linhas;
  }
}


?>