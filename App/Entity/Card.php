<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Card
{
    /*
    olhando essa classe primeiramente define um atributo chamado Conneection que recebe a instancia da conexão e usa somente ela
    lembrando o atributo que recebe a instancia da conexão tem que ser privado
    */
    public $cardId;
    public $cardName;
    public $cardQuantity;
    public $cardRarity;
    public $cardType;

    public function createCard()
    {
        $db = new Database('card');
        $this->cardId = $db->insert([
            'name' => $this->cardName,
            'quantity' => $this->cardQuantity,
            'rarity' => $this->cardRarity,
            'type'=> $this->cardType
        ]);

        return true;
    }

    public function updateCard()
    {
        return (new Database('card'))->update('id = '.$this->id,[
                'quantity' => $this->cardQuantity,
                'rarity' => $this->cardRarity,
                'type'=> $this->cardType
        ]);
    }

    public function deleteCard()
    {
        return (new Database('card'))->delete('id ='.$this->id);
    }

    public static  function getCards($where = null, $order = null, $limit = null)
    {
        return (new Database('card'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getCard($cardId)
    {
        return (new Database('card'))->select('id ='. $cardId)
                                      ->fetchObject(self::class);
    }
}

