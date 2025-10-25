<?php
    function getAllMenus() {
        global $pdo;
        $sql = "select * from menu where status=".STATUS_ACTIVE;
        $pre=$pdo->prepare($sql);
        try {
            $pre->execute();
            return $pre->fetchAll(pdo::FETCH_ASSOC);
        }catch(PDOException $e) {
            dd($e->getMessage());
        }
    }

    function menuCreate($name, $position, $url, $status) {
        global $pdo;
        $sql = "INSERT into menu (`name`, `position`, `url`, `status`) values (:name, :position, :url, :status)";
        $pre= $pdo->prepare($sql);
        $pre->bindParam(":name", $name, pdo::PARAM_STR);
        $pre->bindParam(":position", $position, PDO::PARAM_INT);
        $pre->bindParam(":url", $url, PDO::PARAM_STR);
        $pre->bindParam(":status", $status, PDO::PARAM_INT);

        try{
            return $pre->execute();
        } catch(PDOException $e) {
            dd($e->getMessage(), true);
        }
    }

    function getMenuById($id) {
        global $pdo;
        $sql = "SELECT * from menu where id=:id";
        $pre= $pdo->prepare($sql);
        $pre->bindParam(":id", $id, PDO::PARAM_INT);
        try{
            $pre->execute();
            return $pre->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e) {
            die("Xatolik". $e->getMessage());
        }
    }

    function menuUpdate($id, $name, $position, $url, $status) {
        global $pdo;
        $sql = "UPDATE menu  set name=:name, position=:position, url=:url, status=:status where id=:id";
        $pre = $pdo->prepare($sql);
        $pre->bindParam(':name', $name, PDO::PARAM_STR);
        $pre->bindParam(':position', $position, PDO::PARAM_INT);
        $pre->bindParam(':url', $url, PDO::PARAM_STR);
        $pre->bindParam(":status", $status, PDO::PARAM_INT);
        $pre->bindParam(":id", $id, PDO::PARAM_INT);
        try{
            return $pre->execute();
        } catch(PDOException $e) {
            die("Xatolik:" .$e->getMessage());
        }
    } 

    function deleteMenu($id) {
        global $pdo;
        $sql = "DELETE from menu where id=:id";
        $pre = $pdo->prepare($sql);
        $pre->bindParam(':id', $id, PDO::PARAM_INT);

        try{
          return  $pre->execute();
        }catch(PDOException $e) {
            die("Xatolik". $e->getMessage());
        }
    }


?>