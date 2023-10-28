<?php

// En este fichero se establecen funciones útiles para ejecutar consultas a la base de datos
require_once 'connection.php'; 

/**
 * Convierte un array de datos en una cadena de texto para ser usada en una consulta SQL
 * 
 * @param array $data
 * 
 * @return array columns, bindValues, values
 */
function dataArrayToString(array $data): array {
    $columns = '';
    $bindValues = '';
    $values = [];

    foreach($data as $column => $value) {
        $columns .= '`' . $column . '`,';
        $bindValues .= ':' . $column . ',';
        $values[] = $value;
    }

    $columns = substr($columns, 0, -1);
    $bindValues = substr($bindValues, 0, -1);

    return [
        'columns' => $columns,
        'bindValues' => $bindValues,
        'values' => $values
    ];
}

/**
 * Convierte un array de datos en una cadena de texto para ser usada en una consulta SQL de actualización
 * 
 * @param array $data
 * 
 * @return array columns, values
 */
function dataArrayToStringUpdate(array $data): array {
    $columns = '';
    $values = [];

    foreach($data as $column => $value) {
        $columns .= '' . $column . ' = :' . $column . ',';
        $values[] = $value;
    }

    $columns = substr($columns, 0, -1);

    return [
        'columns' => $columns,
        'values' => $values
    ];
}

/**
 * Ejecuta una consulta SQL
 * 
 * @param PDO $db
 * @param string $sql
 * @param array $params
 * @param bool $return
 * 
 * @return bool|array
 */
function query(PDO $db, string $sql, array $params, bool $return = false) {
    try {
        $stmt = $db->prepare($sql);
    
        $stmt->execute($params);
        
        if ($return) return $stmt->fetch(PDO::FETCH_ASSOC);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

/**
 * Elimina la sesión y las cookies
 * 
 * @return void
 */
function clearSessionAndCookies(): void {
    session_destroy();

    setcookie("username", "", time()-3600);
    setcookie("password", "", time()-3600);
    setcookie("cookies_policy", "", time()-3600);
    setcookie("colorScheme", "", time()-3600);
    setcookie("language", "", time()-3600);
}