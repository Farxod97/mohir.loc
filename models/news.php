<?php
function getLastNews() {
    global $pdo;
    $sql = "
        select 
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






?>