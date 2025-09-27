<?php
function getLastNews() {
    global $pdo;
    $sql = "
        SELECT  
        news.id,
        c.name as category_name,
        news.category_id as category_id,
        news.title,
        news.seen_count,
        news.create_at,
        news.description,
        news.img
        from news left join category as c on news.category_id=c.id and c.status=".STATUS_ACTIVE."
        where news.status=".STATUS_ACTIVE."
        order by news.create_at desc
        limit 3
    ";
    $pr=$pdo->prepare($sql);
    $pr->execute();
    return $pr->fetchAll(PDO::FETCH_ASSOC);

}

function getNewsById($id) {
    global $pdo;
    $sql = "SELECT news.*, c.name as category_name
    from news left join category as c on news.category_id = c.id 
    where news.id=:id";

    $pre = $pdo->prepare($sql);
    $pre->bindValue(":id", $id, PDO::PARAM_INT);
    $pre->execute();

    return $pre->fetch(PDO::FETCH_ASSOC);
}

function updateCount($id) {
    global $pdo;
    $sql = "UPDATE news set seen_count = seen_count + 1 where id =:id";
    $pre = $pdo->prepare($sql);
    $pre->bindValue(":id", $id, PDO::PARAM_INT);
    try {
        return $pre->execute();
    }catch(PDOException $e) {
        dd($e->getMessage());
    }
}

function getNewsByCategory($id) {
    global $pdo;

    $sql = "SELECT news.*, c.name as category_name 
    from news left join category as c on news.category_id=c.id
    where c.id=:id";

    $pre=$pdo->prepare($sql);
    $pre->bindValue(":id", $id, PDO::PARAM_INT);
    $pre->execute();

    return $pre->fetchAll(PDO::FETCH_ASSOC);

}

function getAllNews() {
    global $pdo;
    $sql = "SELECT news.*, c.name as category_name from news left join category as c on news.category_id=c.id";
    $pre = $pdo->prepare($sql);
    $pre->execute();
    return $pre->fetchAll(PDO::FETCH_ASSOC);
}






?>