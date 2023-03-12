
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!--CSS-->
        <!-- <link rel="stylesheet" href="./assets/styles/style.css"> -->
        <link rel="stylesheet" href="../assets/styles/style.css">
        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>News Detail</title>
    </head>
<body>
    <div class="wrapper">
        <!-- (1)Header area -->
        <?php  
        include "../classes/news.php";
        $news = new News;
        $news_id = $_GET['news_id'];
        $news_detail = $news->getNews($news_id);
        ?>

        <!--(2)Article area-->
        <article>
            <div class="container-fluid" style="max-width: 1200px;">    
                <!-- (3) News Head-->

                <div class="news-head mt-5">
                    <p class="tag"><?=$news_detail['category_name']; ?></p>
                    <p class="date ms-3"><?=$news_detail['date_posted']; ?></p>
                    <h1><?=$news_detail['news_title']; ?></h1>
                </div>
                <div class="container-fluid">
                    <img src="./assets/images/event_flier.jpg" alt="">
                </div>
                <div class="news-article-content">
                    <p class="fs-5"><?=$news_detail['description']; ?>                     
                    </p>                                  
                </div>
                <div class="flyer-pdf">
                    <?php
                    if($news_detail['flyer']){
                        echo '<iframe src="../assets/uploads_pdf/'.$news_detail['flyer'].'#toolbar=0" width="100%" height="500px">
    </iframe>';
                    } 
                    ?>
                    

                </div>

                <a href="news-index.php" class="btn btn-primary float-end">< back to news index</a>

               
            </div>  
        </article>
              

    </div>
    <!-- 10)Footer area -->
    <?php  include('footer.html'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>