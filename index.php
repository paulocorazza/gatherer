<?php

require __DIR__.'/vendor/autoload.php';

use App\Entity\Card;



 if(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING)){
    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
    $condition = [
       strlen($search) ? 'name LIKE  "%' . $search .'%";' : null
   ];
   $where = implode(' AND ', $condition);
   $search = '';
 } else {
    $search = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
    $condition = [
       strlen($search) ? 'type =  "' . $search .'";' : null
    ];
    $where = implode(' WHERE ', $condition);
    $search = '';
 }


$cards = Card::getCards($where);


include __DIR__ .'/includes/header.php';
include __DIR__.'/includes/cards.php';
include __DIR__.'/includes/footer.php';