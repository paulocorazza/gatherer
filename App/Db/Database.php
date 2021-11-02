<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database
{
    // Troca toda essa tripa de constantes por atributos privados, assim evita que algum engraçadinho acesse isso daqui e foda o teu banco
    // mais pra frente tu pode implementar o composer e usar a lib .env pra passar as configs para as variaveis de ambiente do sistema
    const HOST = 'localhost:3306';
    const NAME = 'gatherer';
    const USER = 'root';
    const PASSWORD = 'password';

    private $table;
    private $connection;

    public function __construct($table = null)
    {
       $this->table = $table; 
       $this->setConnection();
    }

    //cria a conexão
    private function setConnection()
    {
         try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         }
         catch(PDOException $e){
             die('Error : ' . $e->getMessage());
         }
    }

      /**
   * Método responsável por executar queries dentro do banco de dados **/
    public function execute($query,$params = [])
    {
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
                return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    //método para inserir os dados no banco
    public function insert($values)
    {

        $fields = array_keys($values);
        $binds  = array_pad([],count($fields),'?');

        
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();

 
    }

    //metodo responsavel por executar a consulta no banco
    
    //Esse monte de parametro aqui pode ser refatorado pra um objeto chamado Filters e dentro deles ele receber cada um desses campos
    // no parametro fields joga apenas os campos básicos para que a tua query venha mais otimizada, pois se puxar todos os campos sem necessidade
    // vai acabar perdendo em performance em relação ao select pelos campos
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        // dado o comentario acima tu pode verificar se o objeto filters veio vazio, caso sim faz a tratativa pra fazer apenas o select sem os filtros
        
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    
        return $this->execute($query);
    }

    public function update($where,$values)
    {
        
        $fields = array_keys($values);
    
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    
        $this->execute($query,array_values($values));
    
        return true;
    }

    public function delete($where)
    {
        // clausula where muito vaga, mais facil passar no partametro do metodo o id do registro       
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
    }

} 
