<?php

// Verificar se a página esta sendo carregada por post
 if($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once('./classes/Contato.class.php');

  $usrcontato = New Contato();

  // Atribuindo as infos do form no objeto do tipo Usuario:

  $usrcontato->nome = strip_tags($_POST['nome']);
  $usrcontato->email = strip_tags($_POST['email']);
  $usrcontato->telefone = strip_tags($_POST['telefone']);

  if($usrcontato->Cadastrar() == 1) {
    header('Location: ../index.php?sucesso=0');

  } else {
    header('Location: ../index.php?falha=0');

  }

 } else {
  echo "<h3>Essa página deve ser carregada por POST</h3>";
  
 }

?>