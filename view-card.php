<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','View card');

use \App\Entity\Card;


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php');
  exit;
}

$card = Card::getCard($_GET['id']);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form-view-card.php';
include __DIR__.'/includes/footer.php';