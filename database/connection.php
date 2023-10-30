<?php

/**
 * Database connection in MySQL using PDO
 * 
 * @param string $dsn Data Source Name
 * @param string $userdb User of the database
 * @param string $passdb Password of the database
 * 
 * @return PDO|null $db Database connection
 */
function connectMySQL(string $dsn, string $userdb, string $passdb) {
    try {
        // Crear conexión con la base de datos
        $db = new PDO($dsn, $userdb, $passdb);
        // Establecer el modo de error a excepción. En caso de error, lanzará una excepción.
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        // Devolver la conexión
        return $db; 
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null; // Indicar que la conexión no se estableció
    }
}

/**
 * Database connection in SQLite using PDO
 * 
 * @param string $dbname Name of the database
 * 
 * @return PDO|null $db Database connection
 */
function connectSqlite(string $dbname) {
    try {
        $db = new PDO('sqlite:'.__DIR__.'/database/'.$dbname.'.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $db;
}

