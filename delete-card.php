<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Card;


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php');
    exit;
  }
  
  $card = Card::getCard($_GET['id']);
  
  // o que levaria um carda a não ser uma instancia de Card, sendo que o getCard é chamado diretamente do objeto Card?
  if(!$card instanceof Card){
    header('location: index.php');
    exit;
  }

// essa verificação aqui pode ser removida
// e feita na linha 8 junto com a verificação de id
if(isset($_POST['delete'])){
    
  $card->deleteCard();

  header('location: index.php');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirm-delete.php';
include __DIR__.'/includes/footer.php';
