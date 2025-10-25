<?php
function dd($arr, $die = false) {
    if($die) {
        echo "<pre>";
            print_r($arr);die();
    }else{
        echo "<pre>";
            print_r($arr);
        echo "</pre>";
    }
}

function getImage($table_name, $id, $filename) {
    if(empty($filename)) {
        return "assets/images/default.jpg?v=".time();
    }

    $imagePath = $_SERVER['DOCUMENT_ROOT']."/uploades/{$table_name}/{$id}/{$filename}";
    if(file_exists($imagePath)) {
        return "/uploades/{$table_name}/{$id}/{$filename}".'?v='.time();
    }

    return 'assets/images/default.jpg.?v='.time();

}

function saveImage($table_name, $id, $filename) {
    $file = $_FILES['image'];
    if(!isset($file) &&  $file['error'] !==0)
    return false;

    $allowed_types = ['image/jpg', 'image/png', 'image/jpeg' ];

    if(!in_array($file['type'], $allowed_types)) {
        return false;
    }

    $folderPath = $_SERVER['DOCUMENT_ROOT']."/uploades/{$table_name}/{$id}";

    if(!is_dir($folderPath)) {
        mkdir($folderPath);
    }

    $filePath = $folderPath.'/'.$filename;

    if(move_uploaded_file($file['tmp_name'], $filePath)) {
        return true;
    }
    return false;
}



function isCorrectId() {
    if(!isset($_GET['id']) || empty($_GET['id'])) {
        return false;
    }
    return $_GET['id'];
}

function getImageName() {
    if(!empty($_FILES)) {
        $file=$_FILES['image'];
        $fileArray=explode('.', $file['name']);
        $fileType=end($fileArray);

        $image = md5($fileArray[0]).'.'.$fileType;
        return $image;
    }

    return false;
}


function deleteImage($table_name, $id, $filename) {
    $filePath=$_SERVER['DOCUMENT_ROOT']."/uploades/{$table_name}/{$id}/{$filename}";

    if(file_exists($filePath)) {
        if(unlink($filePath)) {
            return true;
        }
    }

    return false;
}

function deleteFolder($table_name, $id) {
    $folderPath=$_SERVER['DOCUMENT_ROOT']."/uploades/{$table_name}/{$id}";

    if(is_dir($folderPath)) {
        if(rmdir($folderPath)) {
            return true;
        }
    }

    return false;
}


function pageCount($table_name) {
    global $pdo;
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $table_name)) {
        return false;
    }
    $sql = "SELECT * from $table_name";
    $pre=$pdo->prepare($sql);
    $pre->execute();

    $total_rows=$pre->rowCount();
    return  ceil($total_rows/LIMIT);
}

function isCorrectPage($page_count) {
    if(!isset($_GET['page']) || empty($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] < 1) {
        $page = 1;
    } elseif($_GET['page']>$page_count){
     $page=$page_count;
    }else{
        $page=$_GET['page'];
    }

    return $page;

}
?>