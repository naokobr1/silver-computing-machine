<?php 
// session_start();
include "../classes/news.php";
//collect data from form
$news_title = $_POST['news_title']; 
$category_id = $_POST['category_id']; 
$description = $_POST['description'];
// //$_FILES['inputで指定したname']['tmp_name']：一時保存ファイル名
// $flyer_tmp = $_FILES['flyer']['tmp_name'];
// //$_FILES['inputで指定したname']['name']：ファイル名
// $flyer_name = $_FILES['flyer']['name'];
$news = new News;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="./assets/styles/style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Checking of News details</title>
</head>
<body>
    <?php  
    // include('user-menu-bar.php'); 
    ?>
    <div class="container-fluid">
        <h1 class="reservation">CHECK NEWS DETAILS</h1>
        <form action="../actions/news.php" method="post" enctype="multipart/form-data">            
            <dl>
                <dt>Date</dt>
                <dd><?= $news_title; ?></dd>
                <input type="hidden" name="news_title" id="news-title" value="<?= $news_title; ?>">
                
                <dt>Category</dt>                
                <?php
                $cat_row = $news->getCategory($category_id);
                ?>
                <dd><?= $cat_row['category_name']; ?></dd>
                <input type="hidden" name="category_id" id="category" value="<?= $cat_row['category_id'];?>">
    
               
                <dt>Note</dt>
                <dd><?= $description; ?></dd>
                <input type="hidden" name="description" id="description" value="<?= $description; ?>">

                <dt>PDF file of the flyer</dt>
                <label for="flyer">PDF file of the flyer</label>
                <input type="file" name="flyer" id="flyer" class="custom-file-input" size="35" accept=".pdf">
<!-- 
                <input type="text" hidden name="flyer" id="flyer" value="<?= $flyer_tmp; ?>">
                <input type="text" hidden name="file_name" id="file-name" value="<?= $flyer_name; ?>"> -->
            </dl>

            <div class="d-grid gap-2 mx-3">
                <button class="btn btn-primary rounded-pill rsv-btn" type="submit" href="complete-bk.php">ADD NEWS</button>
                <a class="btn btn-primary rounded-pill rsv-btn" href="add-news.php" type="button">RETURN</a>
            </div>
        </form>
        
    </div>
        
</body>
</html>