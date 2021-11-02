<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Card
{
    public $cardId;
    public $cardName;
    public $cardQuantity;

    public function createCard()
    {
        $db = new Database('card');
        $this->cardId = $db->insert([
            'name' => $this->cardName,
            'quantity' => $this->cardQuantity,
        ]);

        return true;
    }

    public function updateCard()
    {
        return (new Database('card'))->update('id = '.$this->cardId,[
            'name' => $this->cardName,
            'quantity' => $this->cardQuantity,
        ]);
    }

    public function deleteCard()
    {
        return (new Database('card'))->delete('id'.$this->cardId);
    }

    public static  function getCards($where = null, $order = null, $limit = null)
    {
        return (new Database('card'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
}

