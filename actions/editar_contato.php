<?php

// Verificar se a página esta sendo carregada por post
 
  require_once('./classes/Contato.class.php');

  $usrcontato = New Contato();

  // Atribuindo as infos do form no objeto do tipo Usuario:

  $usrcontato->nome = strip_tags($_POST['nome']);
  $usrcontato->email = strip_tags($_POST['email']);
  $usrcontato->telefone = strip_tags($_POST['telefone']);
  $usrcontato->id = strip_tags($_POST['id']);

  if($usrcontato->Modificar() == 1) {
    header('Location: ../editar.php?sucesso=2');
  } else {
    header('Location: ../editar.php?falha=2');
  }


?>