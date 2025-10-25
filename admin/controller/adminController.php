<?php
    require_once __DIR__.'/../../models/mainModel.php';
    if(isset($_GET['acontroller']) && !empty($_GET['acontroller'])) {
        $controller = $_GET['acontroller'];

        switch($controller) {
            
            // menu CRUD start
            case('menu_index'): 
                $menus = getAllMenus();
                require_once __DIR__."/../views/menu/menu_index.php";
            break;

            case('menu_create'): 
                $name = null;
                $position = null;
                $url = null;
                $status = null;

                if(!empty($_POST)) {
                    $name = $_POST['name'];
                    $position = $_POST['position'];
                    $url = $_POST['url'];
                    $status = $_POST['status'];


                    if(!empty($name) && !empty($position) && !empty($url) && !empty($status)) {
                        if(menuCreate($name, $position, $url, $status)) {
                            $_SESSION['success']="Menu muvaffaqiyatli qo'shildi";
                            header("Location:?acontroller=menu_index");
                            exit();
                        }
                    }else {
                        $_SESSION['error']="Barcha inputlar to'ldirilishi shart";
                    }
                }
                require_once __DIR__."/../views/menu/menu_form.php";
            break;
            
            case('menu_update'):
                if(!isset($_GET['id']) || empty($_GET['id'])) {
                    require_once __DIR__."/../views/404.php";
                }
                $id = $_GET['id'];
                $menuItem = getMenuById($id);
                if(!$menuItem) {
                    require_once __DIR__."/../views/404.php";
                }
                
                    if(isset($_POST) && !empty($_POST)) {
                        $name = $_POST['name'];
                        $position = $_POST['position'];
                        $url = $_POST['url'];
                        $status = $_POST['status'];

                        if(empty($name) || empty($position) || empty($url) || empty($status)) {
                            $_SESSION['error']="Barcha polyalar to'ldirilsin";
                        };

                        if(menuUpdate($id, $name, $position, $url, $status)){
                            $_SESSION['success']="Menu muvaffaqiyatli tahrirlandi";
                            header("Location:?acontroller=menu_index");
                            exit();
                        }
                    }
                require_once __DIR__."/../views/menu/menu_form.php";
            break;
            
            case('menu_delete'):
                if(isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $_GET['id'];
                    if(deleteMenu($id)) {
                        $_SESSION['success']="Menu muvaffaqiyatli o'chirildi";
                        header("Location:?acontroller=menu_index");
                        exit();
                    }
                }
            break;
            // menu CRUD end

            // news CRUD start
            case('news_index'):
                $page_count=pageCount('news');
                $page = isCorrectPage($page_count);

                $news = getAllNews($page);
                require_once __DIR__."/../views/news/news_index.php";
            break;

            case('news_create'):

               
                $categories = getCategory();
                $image = getImageName();

                
                if(!empty($_POST)) {
                    $title = $_POST['title'];
                    $category_id=$_POST['category_id'];
                    $description=$_POST['description'];
                    $body = $_POST['body'];
                    $status = $_POST['status'];

                    if(!empty($title) && !empty($category_id) && !empty($description) && !empty($body) && !empty($status)) {
                        if($lastId=newsCreate($title, $description, $category_id, $body, $status, $image)) {
                            saveImage('news', $lastId, $image);
                            $_SESSION['success']="News muvvafaqiyatli yuklandi";
                            header("Location:?acontroller=news_index");
                            exit;
                        }
                            
                    }else{
                        $_SESSION['error']="Barcha inputlar to'ldirilsin";
                    }
                }
                require_once __DIR__."/../views/news/news_form.php";
            break;

            case('news_update'):
                if(!isset($_GET['id']) && empty($_GET['id'])) {
                    require_once __DIR__."/../views/404.php";
                }

                $id = $_GET['id'];
                if(!is_numeric($id)) {
                    require_once __DIR__."/../views/404.php";
                }

                $newsItem = getNewsById($id);

                if(isset($_POST) && !empty($_POST)) {

                    $oldImage=getImage('news', $newsItem['id'], $newsItem['img']);
                    $image=getImageName();

                    if(!empty($image) && !empty($oldImage)) {
                        
                        deleteImage("news", $newsItem['id'], $newsItem['img']);
                    }

                    $title = $_POST['title'];
                    $category_id=$_POST['category_id'];
                    $description=$_POST['description'];
                    $body = $_POST['body'];
                    $status = $_POST['status'];

                    if(empty($title) || empty($category_id) || empty($description) || empty($body) || empty($status)) {
                        $_SESSION['error']="Barcha polyalar to'ldirilsin";
                    };

                
                    if(newsUpdate($id, $title, $category_id, $description, $body, $status, $image)) {
                        saveImage('news', $newsItem['id'], $image);
                        $_SESSION['success']="Yangilik muvvafaqiyatli tahrirlandi";
                        header("Location:?acontroller=news_index");
                        exit;
                    }
                }else  {
                $category_id=$newsItem['category_id'];
                $categoryItem = getCategoryById($category_id);
                $categories=getCategory();
                }

                require_once __DIR__."/../views/news/news_form.php";

            break;

            case('news_delete'):
                $id = isCorrectId();
                if(!isCorrectId()) {
                    require_once __DIR__."/../views/404.php";
                }

                $news = getNewsById($id);

                if(!empty($news)) {
                    $deleteImage=deleteImage('news', $news['id'], $news['img']);
                    $deleteFolder=deleteFolder('news', $id);
                    if(deleteNews($id) && $deleteImage) {
                        $_SESSION['success']="News muvaffaqiyatli o'chirildi";
                        header("Location:?acontroller=news_index");
                        exit();
                    }else{
                        $_SESSION['error']="Yangilikni o'chirishda muammo bo'ldi";
                        header("Location:?acontroller=news_index");
                        exit();
                    }
                }                
            break;
            // news CRUD end

            // news_category CRUD
            case('category_index'):
                $categories = getAllCategory();
                require_once __DIR__."/../views/category/category_index.php";

            break;

            case('category_create'):
                if(!empty($_POST)) {
                    $name = $_POST['name'];
                    $status = $_POST['status'];

                    if(!empty($name) && !empty($status)) {
                        if(categoryCreate($name, $status)) {
                            $_SESSION['success']="Category muvafaqiyatli qo'shildi";
                            header("Location:?acontroller=category_index");
                            exit;
                        }
                    }else{
                        $_SESSION['error']="Barcha inputlar to'ldirilsin";
                    }
                }
                require_once __DIR__."/../views/category/category_form.php";
            break;

            case('category_update'):
                $id = isCorrectId();
                if(!isCorrectId()) {
                    require_once __DIR__."/../views/404.php";
                }

                if(isset($_POST) && !empty($_POST)) {
                    $name = $_POST['name'];
                    $status = $_POST['status'];

                    if(empty($name) || empty($status)) {
                        $_SESSION['error']="Barcha polyalar to'ldirilsin";
                    };

                    if(categoryUpdate($id, $name, $status)) {
                        $_SESSION['success']="Category muvafaqiyatli taxrirlandi";
                        header("Location:?acontroller=category_index");
                        exit;
                    }
                }else{
                    $categoryItem = getCategoryById($id);
                    require_once __DIR__."/../views/category/category_form.php";
                }
            break;

            case('category_delete'):
                $id = isCorrectId();
                if(!isCorrectId()) {
                    require_once __DIR__."/../views/404.php";
                }
                if(deleteCategory($id)) {
                    $_SESSION['success']="News muvaffaqiyatli o'chirildi";
                    header("Location:?acontroller=category_index");
                    exit();
                }
            break;
            //news_category CRUD end
        }
    }else {
        require_once "views/index.php";
    }
    



?>