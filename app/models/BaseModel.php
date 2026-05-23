<?php

class BaseModel
{
    /**
     * @var null|PDO The shared PDO database connection instance.
     */
    protected static $db;

    /**
     * Initializes and retrieves the singleton database connection.
     * * Reads the configuration file, builds the DSN dynamically, 
     * and instantiates a secure PDO instance with strict error modes 
     * if no connection currently exists.
     *
     * @return PDO The active, shared PHP Data Object database connection.
     */
    public static function connect()
    {
        if (self::$db === null) {

            $config = require __DIR__ . '/../../config/database.php';

            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                $config['host'],
                $config['dbname'],
                $config['charset']
            );

            try {
                self::$db = new PDO(
                    $dsn,
                    $config['user'],
                    $config['password'],
                    [
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES   => false,
                    ]
                );
            } catch (PDOException $e) {
                // --> En producción esto iría a log
                die('Error de conexión con la base de datos');
            }
        }

        return self::$db;
    }
}
