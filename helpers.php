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

    $imagePath = "uploades/{$table_name}/{$id}/{$filename}";
    if(file_exists($imagePath)) {
        return $imagePath.'?v='.time();
    }

    return 'assets/images/default.jpg.?v='.time();

}


?>