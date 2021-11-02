<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Add Card');

use App\Entity\Card;

if(isset($_POST['name'])){

    $card = new Card();
    $card->cardName = $_POST['name'];
    $card->cardQuantity = $_POST['quantity'];
    $card->cardRarity = $_POST['rarity'];
    $card->cardType = $_POST['type'];
    $card->createCard();

    header('location: index.php');
    exit;
}

include __DIR__ .'/includes/header.php';
include __DIR__.'/includes/form-card.php';
include __DIR__.'/includes/footer.php';