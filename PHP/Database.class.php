<?php
final class Database{
    private static $driver = "mysql";# driver de conexão com banco de dados
    private static $host = "localhost";#Endereço do banco de dados
    private static $dbname = "campoDigital";#Nome do banco de dados
    private static $port = 3306; # Porta de conexão
    private static $username = "root"; #usuário do banco de dados
    private static $password = "root"; # senha do banco de dados
    private static $charset = "utf8mb4"; # tipo de cartacteres
    private static $pdo = null;
    private static $error;

    public static function connect() {
        if (self::$pdo === null) {
            if (self::$driver === "mysql") {
                $dsn ="mysql:host=" . self::$host . "; port=" . self::$port . ";dbname=" . self::$dbname . ";charset=" . self::$charset;
            }elseif (self::$driver === "pgsql") {
                $dsn ="pgsql:host=" . self::$host . "; port=" . self::$port . ";dbname=" . self::$dbname;
            }else {
                throw new Exception("Driver de banco de banco e dados não suportado" . self::$driver);
            }

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,#Define o modo de tratamento e erro
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,#Como os dados retornam nas consultas
                PDO::ATTR_PERSISTENT => false, # Abrir nova conexão
                PDO::ATTR_EMULATE_PREPARES => false, #evitar emular pelo PHP
            ];

            try{
                self::$pdo = new PDO($dsn, self::$username, self::$password, $options);
            } catch(PDOException $e){
                self::$error = $e->getMessage();
                echo"Erro de conexão" . self::$error;
            }
        }
        #retorna a conexão
        return self::$pdo;
    }

    #Método estático para preparar uma declaração SQL

    public static function prepare($sql) {
        $pdo = self::connect();
        if($pdo){
            return $pdo->prepare($sql);
        }
        return false;
    }

}