<?php
require $_SERVER['DOCUMENT_ROOT'] . "/config/db_config.php";
class DbManager {
    private function getPDO() {
        static $pdo;
        global $dsn;
        global $user;
        global $password;
        if (!isset($pdo)) {
            $pdo = new PDO($dsn, $user, $password, array());
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $pdo;
    }
    function execute($sql, $param) {
        $pdo = $this->getPDO();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($param);
            if (stripos(strtolower($sql), 's') === 0) {
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_LAST)) {
                    $result[] = $row;
                }
                return $result;
            } else {
                return $pdo->lastInsertId('id');
            }
        } catch (PDOException $e) {
            print('Error:'.$e->getMessage());
        }
        $stmt->closeCursor();
    }
}
