<?php

//connect to mysql server using PDO php data objects DSN data source name
//connect to database and execute a query

class  database{

    public $connection;

    public function __construct($config, $username = 'root', $password = 'MYSQL_saurabh@5378*')
    {


//        dd('mysql:'.http_build_query($config,'',';'));

        $dsn = 'mysql:'.http_build_query($config,'',';');

//        $pdo = new PDO($dsn);
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE =>  PDO::FETCH_ASSOC
        ] );

    }
    public function query($query, $params = [])
    {

        $statement = $this->connection->prepare("$query");

        $statement->execute($params);

//          $posts =  $statement->fetchall(PDO::FETCH_ASSOC );
//          return  $statement->fetchall(PDO::FETCH_ASSOC );
        return $statement;
    }
}
