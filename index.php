<?php

require __DIR__.'/vendor/autoload.php';

use App\Entity\Card;

$cards = Card::getCards();

include __DIR__ .'/includes/header.php';
include __DIR__.'/includes/cards.php';
include __DIR__.'/includes/footer.php';