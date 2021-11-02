<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Edit card');

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

if(isset($_POST['quantity'])){

  $card->cardQuantity = $_POST['quantity'];
  $card->cardType = $_POST['type'];
  $card->cardRarity = $_POST['rarity'];
  $card->updateCard();

  header('location: index.php');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form-edit.php';
include __DIR__.'/includes/footer.php';