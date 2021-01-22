<?php
class Database{
    public static function getConnection(){
        $path = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($path);

        $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);

        if($conn->connect_error){
            die("Erro: " . $conn->connect_error);
        }
                
        // try{
        //     $conn = new PDO(sprintf('mysql:host=%s;dbname=%s', $env['host'], $env['database']), $env['username'], $env['password']);
        // } catch(PDOException $e){
        //     print "Erro: " . $e->getMessage() . "<br>";
        //     die();
        // }

        return $conn;
    }

    public static function getResultFromQuery($sql){
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}