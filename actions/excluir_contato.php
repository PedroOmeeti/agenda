<?php

  if(isset($_GET['id'])) {
    require_once('./classes/Contato.class.php');

    $usrcontato = New Contato();
    $usrcontato->id = $_GET['id'];
    if($usrcontato->Apagar() == 1) {
      // Redirecionar:
      header('Location: ../index.php=sucesso=1');
    } else {
      header('Location: ../index.php=falha=1');
    }

  } else {
    echo '<h3>O ID deve ser informado na URL.</h3>';
  }
?>