<?php
function getCategory() {
    global $pdo;
    $sql = "select
        id, 
        name 
        from category where status=".STATUS_ACTIVE."
    ";
    $pr=$pdo->prepare($sql);
    $pr->execute();
    return $pr->fetchAll(pdo::FETCH_ASSOC);
    
}



?>