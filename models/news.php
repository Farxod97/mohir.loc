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
        news.img,
        news.status
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
    try{
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
        dd($e->getMessage(), true);
    }
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

function getAllNews($page) {
    global $pdo;
    $limit = 5;
    $offset = ($page-1)*$limit;
    $sql = "SELECT news.*, c.name as category_name from news left join category as c on news.category_id=c.id LIMIT :offset, :limit" ;
    $pre = $pdo->prepare($sql);
    $pre->bindParam(":offset", $offset, pdo::PARAM_INT);
    $pre->bindParam(":limit", $limit, pdo::PARAM_INT);
    $pre->execute();
    return $pre->fetchAll(PDO::FETCH_ASSOC);
}

function newsCreate($title, $description, $category_id, $body, $status, $image) {
    global $pdo;
    $sql = "INSERT into news (title, description, category_id, body, status, img)
    values (:title, :description, :category_id, :body, :status, :image )";
    $pre=$pdo->prepare($sql);

    $pre->bindParam(":title", $title, pdo::PARAM_STR);
    $pre->bindParam(":description", $description, pdo::PARAM_STR);
    $pre->bindParam(":category_id", $category_id, pdo::PARAM_INT);
    $pre->bindParam(":body", $body, pdo::PARAM_STR);
    $pre->bindParam(":status", $status, pdo::PARAM_STR);
    $pre->bindParam(":image", $image, pdo::PARAM_STR);

    try{
        $pre->execute();
        return $pdo->lastInsertId();
    }catch(PDOException $e) {
        dd($e->getMessage(), true);
    } 
}

function newsUpdate($id, $title, $category_id, $description, $body, $status, $image) {
    global $pdo;
    $sql = "UPDATE news  set title=:title, category_id=:category_id, description=:description, body=:body, status=:status, img=:image where id=:id";
    $pre = $pdo->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->bindParam(':title', $title, PDO::PARAM_STR);
    $pre->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $pre->bindParam(':description', $description, PDO::PARAM_STR);
    $pre->bindParam(":body", $body, PDO::PARAM_STR);
    $pre->bindParam(":status", $status, PDO::PARAM_INT);
    $pre->bindParam(':image', $image, PDO::PARAM_STR);
    try{
        return $pre->execute();
    } catch(PDOException $e) {
        die("Xatolik:" .$e->getMessage());
    }
 
}

function deleteNews($id) {
    global $pdo;
    $sql = "DELETE from news where id=:id";
    $pre = $pdo->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);

    try{
      return  $pre->execute();
    }catch(PDOException $e) {
        die("Xatolik". $e->getMessage());
    }
}
?>