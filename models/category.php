<?php
function getAllCategory() {
    global $pdo;
    $sql = "select * from category";
    $pr=$pdo->prepare($sql);
    $pr->execute();
    return $pr->fetchAll(pdo::FETCH_ASSOC);
    
} 

function getCategory() {
    global $pdo;
    $sql = "select
        *
        from category where status=".STATUS_ACTIVE."
    ";
    $pr=$pdo->prepare($sql);
    $pr->execute();
    return $pr->fetchAll(pdo::FETCH_ASSOC);
    
}

function getCategoryById($id) {
    global $pdo;
    $sql = "SELECT * from category where id=:id";
    $pre=$pdo->prepare($sql);
    $pre->bindParam(":id", $id, PDO::PARAM_INT);

    try{
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
        dd($e->getMessage(), die);
    } 
}

function categoryCreate($name, $status) {
    
    global $pdo;
    $sql = "INSERT into category (name, status) values (:name, :status)";
    $pre = $pdo->prepare($sql);
    $pre->bindParam(":name", $name);
    $pre->bindParam(":status", $status);

    try{
        return $pre->execute();
    }catch(PDOException $e) {
        return dd($e->getMessage(), true);
    }

}

function categoryUpdate($id, $name, $status) {
    global $pdo;
    $sql="UPDATE category set  name=:name, status=:status where id=:id";
    $pre = $pdo->prepare($sql);
    $pre->bindParam(":id", $id, PDO::PARAM_INT);
    $pre->bindParam(":name", $name, PDO::PARAM_STR);
    $pre->bindParam(":status", $status, PDO::PARAM_INT);

    try{
        return $pre->execute();
    }catch(PDOException $e) {
        return dd($e->getMessage(), true);
    }
}

function deleteCategory($id) {
    global $pdo;
    $sql = "DELETE from category where id=:id";
    $pre = $pdo->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);

    try{
      return  $pre->execute();
    }catch(PDOException $e) {
        die("Xatolik". $e->getMessage());
    }
}

?>