<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Card;


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php');
    exit;
  }
  
  $card = Card::getCard($_GET['id']);
  
  
  if(!$card instanceof Card){
    header('location: index.php');
    exit;
  }
  
if(isset($_POST['delete'])){

  $card->deleteCard();

  header('location: index.php');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirm-delete.php';
include __DIR__.'/includes/footer.php';