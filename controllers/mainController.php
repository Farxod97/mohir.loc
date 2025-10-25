<?php
require_once "models/mainModel.php";
$menus = getAllMenus();
$menus = getAllMenus();
$category = getCategory();
$tags = getTags();
$socials = getSocials();
$news = getLastNews();

if(isset($_GET) && !empty($_GET['controller'])) {
    $controller = $_GET['controller'];
    
    switch($controller) {
        case "news_view":
            if(isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                if(!is_numeric($id)) {
                    require_once 'views/error.php';
                }
                $newsItem=getNewsById($id);
                if(!updateCount($id)) {
                    $_SESSION['error']="Update qilishda muammo bor";
                }
                require_once 'views/view.php';
            }else{
                require_once 'views/error.php';
            }
        break;
        
        case "news_category":
            if(isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                if(!is_numeric($id)) {
                    require_once 'views/error.php';
                }
                $news_blog = getNewsByCategory($id);
                require_once "views/blog.php";
            }else {
                require_once 'views/error.php';
            }
            
        break;

        case "news_all":
            $news_blog = getAllNews();
            require_once "views/blog.php";

        break;
    }
}else{

   require_once 'views/index.php';
} 
?>