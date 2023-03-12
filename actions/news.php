<?php
include "../classes/news.php";
$news_title = $_POST['news_title']; 
$category_id = $_POST['category_id']; 
$description = $_POST['description'];
// $flyer_tmp = $_POST['flyer'];
// $file_name = $_POST['file_name'];
//$_FILES['inputで指定したname']['tmp_name']：一時保存ファイル名
$flyer_tmp = $_FILES['flyer']['tmp_name'];
//$_FILES['inputで指定したname']['name']：ファイル名
$file_name = $_FILES['flyer']['name'];
// echo $flyer_tmp. '<hr>';
// echo $file_name;
$news = new News;

// $news->getFiveNews();
$news->getAllCategories();
$news->createNews($news_title, $category_id, $description, $file_name, $flyer_tmp);
?>