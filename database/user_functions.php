<?php

require_once 'connection.php';
require_once 'connection_functions.php';

/**
 * Add new user function: insert a new user in the database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param array $data Data to insert
 * 
 * @return bool True if insert is correct, false otherwise
 */
function addUser(PDO $db, string $dbtable, array $data = []): bool {
    $status = false;
    if (is_array($data)) {
        $tratedData = dataArrayToString($data);

        $query = "INSERT INTO {$dbtable}({$tratedData['columns']}) VALUES ({$tratedData['bindValues']})";

        if (query($db, $query, $tratedData['values']))
            $status = true;
    }
    return $status;
}

/**
 * Get user function: check if user exists in the database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param string $username Username to check
 * 
 * @return bool True if user exists, false otherwise
 */
function getUser(PDO $db, string $dbtable, string $username): bool {
    $status = false;

    $query = "SELECT * FROM {$dbtable} WHERE username = :username";

    $user = query($db, $query, [$username], true);

    if ($user) {
        $status = true;
    }

    return $status;
}

/**
 * Obtain user function: get user data from database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param string $username Username to obtain
 * 
 * @return array User data
 */
function obtainUser($db, $dbtable, $username): array {
    $query = "SELECT * FROM {$dbtable} WHERE username = :username";

    $user = query($db, $query, [$username], true);

    return $user;
}

/**
 * Auth function: check if user exists and password is correct
 * 
 * @param PDO $db Database connection
 * @param string $username Username to check
 * @param string $password Password to check
 * 
 * @return bool True if user exists and password is correct, false otherwise
 */
function auth($db, $username, $password): bool
{
    try {
        $query = "SELECT * FROM users WHERE username = :username";
        $user = query($db, $query, [$username], true);

        if (is_array($user)) {
            $checkPassword = password_verify($password, $user['password']);

            if ($checkPassword) {
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}

/**
 * Create student function: insert a new student in the database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param array $data Data to insert
 * 
 * @return bool True if insert is correct, false otherwise
 */
function createStudent(PDO $db, string $dbtable, array $data = []): bool {
    $status = false;
    if (is_array($data)) {
        $studentData = [
            'name' => $data['username'],
            'user_id' => $data['id']
        ];
        $tratedData = dataArrayToString($studentData);

        $query = "INSERT INTO {$dbtable}({$tratedData['columns']}) VALUES ({$tratedData['bindValues']})";

        if (query($db, $query, $tratedData['values']))
            $status = true;
    }
    return $status;
}

/**
 * Get student function: check if student exists in the database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param string $user_id User id to check
 * @param string $returnMethod Return method
 * 
 * @return mixed True if student exists and array if wants to get Student, false otherwise 
 */
function getStudent(PDO $db, string $dbtable, string $user_id, string $returnMethod) {

    $query = "SELECT * FROM {$dbtable} WHERE user_id = :user_id";

    $user = query($db, $query, [$user_id], true);



    if ($returnMethod == "boolean") {
        if ($user) {
            return true;
        } else {
            return false;
        }
    } else if ($returnMethod == "array") {
        return $user;
    }
}

/**
 * Update student function: update student data in the database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param array $data Data to update
 * @param string $id Student id to update
 * 
 * @return bool True if update is correct, false otherwise
 */
function updateStudent(PDO $db, string $dbtable, array $data = [], string $id): bool {
    $status = false;
    if (is_array($data)) {
        $tratedData = dataArrayToStringUpdate($data);
        
        $query = "UPDATE {$dbtable} SET {$tratedData['columns']} WHERE user_id = $id";
        
        if (query($db, $query, $tratedData['values'])) {
            $status = true;
        }
    }
    return $status;
}

/**
 * Create teacher function: insert a new teacher in the database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param array $data Data to insert
 * 
 * @return bool True if insert is correct, false otherwise
 */
function createTeacher(PDO $db, string $dbtable, array $data = []): bool {
    $status = false;
    if (is_array($data)) {
        $teacherData = [
            'name' => $data['username'],
            'user_id' => $data['id']
        ];
        $tratedData = dataArrayToString($teacherData);

        $query = "INSERT INTO {$dbtable}({$tratedData['columns']}) VALUES ({$tratedData['bindValues']})";

        if (query($db, $query, $tratedData['values']))
            $status = true;
    }
    return $status;
}

/**
 * Get teacher function: check if teacher exists in the database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param string $user_id User id to check
 * @param string $returnMethod Return method
 * 
 * @return mixed True if teacher exists and array if wants to get Teacher, false otherwise 
 */
function getTeacher(PDO $db, string $dbtable, string $user_id, string $returnMethod) {

    $query = "SELECT * FROM {$dbtable} WHERE user_id = :user_id";

    $user = query($db, $query, [$user_id], true);

    if ($returnMethod == "") {
        if ($user) {
            return true;
        } else {
            return false;
        }
    } else if ($returnMethod == "array") {
        return $user;
    }
}

/**
 * Update teacher function: update teacher data in the database
 * 
 * @param PDO $db Database connection
 * @param string $dbtable Table name
 * @param array $data Data to update
 * @param string $id Teacher id to update
 * 
 * @return bool True if update is correct, false otherwise
 */
function updateTeacher(PDO $db, string $dbtable, array $data = [], string $id): bool {
    $status = false;
    if (is_array($data)) {
        $tratedData = dataArrayToStringUpdate($data);
        
        $query = "UPDATE {$dbtable} SET {$tratedData['columns']} WHERE user_id = $id";
        
        if (query($db, $query, $tratedData['values'])) {
            $status = true;
        }
    }
    return $status;
}

