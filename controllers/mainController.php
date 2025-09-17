<?php
require_once "models/mainModel.php";
$menus = getMenus();

$news = getLastNews();

$category = getCategory();

$tags = getTags();

$socials = getSocials();
require_once 'views/index.php';

?>