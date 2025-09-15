<?php
    function getSocials() {
        global $pdo;
        $sql = "select * from social where status=".STATUS_ACTIVE;
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



?>