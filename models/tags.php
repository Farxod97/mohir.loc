<?php
    function getTags() {
                global $pdo;
                $sql = "select 
                id, 
                name 
                from tags where status=".STATUS_ACTIVE."
            ";

    $pr = $pdo->prepare($sql);
    $pr->execute();
    return $pr->fetchAll(pdo::FETCH_ASSOC);
    }


?>