<?php 

class DataBase{

    public static $connection;

    public static function setUpConnection(){
        if(!isset(DataBase::$connection)){
            DataBase::$connection= new mysqli("localhost","root","ikgKD@2005","eshop","3306");
        }
    }

    public static function iud($q){
        DataBase::setUpConnection();
        DataBase::$connection->query($q);
    }

    public static function search($q){
        DataBase::setUpConnection();
        $resultset = DataBase::$connection->query($q);
        return $resultset;
    }

}

?>