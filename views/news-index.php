
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!--CSS-->
        <link rel="stylesheet" href="../assets/styles/style.css">
        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>News</title>
    </head>
<body>
    <div class="wrapper">
        <!-- (1)Header area -->
        <?php  include('header-bar.php'); ?>

        <!-- (2) Headline area -->
        <div class="news-headline mt-5" id="news-headline">
            <h2 class="headline-title text-center text-white">News</h2>
        </div>

        <div class="container-fluid">    
            <!-- (3) News area -->
            <?php
            include "../classes/news.php";
            $news = new News;
            $news_list = $news->Pagenation();

            while($news_row = $news_list->fetch_assoc()): ?>
            <?php $description = $news_row['description']; ?>
            <div class="news row pb-3 pt-5">                
                <div class="col-5">                
                    <div class="tag"><?=$news_row['category_name']; ?></div>
                    <h3><a href="news-detail.php?news_id=<?= $news_row['news_id']?>"><?= $news_row['news_title']; ?></a></h3>
                    <p class="date"><?=$news_row['date_posted']; ?></p>
                </div>
                <div class="col-7">
                    <p class="description"><a href="news-detail.php?news_id=<?= $news_row['news_id']?>"><?php echo htmlspecialchars(mb_substr($description,0,200)); ?></a>
                    </p>
                </div>
            </div>
            <?php endwhile; ?>
            
            <!-- (4)Pagination area-->
            <nav aria-label="Page navigation" class="page-area">
                <ul class="pagination justify-content-center">
                    <?php
                    $news_total = $news->getAllNews();
                    $number_of_result =  $news_total->num_rows;
                    $results_per_page = 5;  
                    if (!isset ($_GET['page']) ) {  
                        $page = 1;  
                    } else {  
                        $page = $_GET['page'];  
                    }

                    $number_of_page = ceil ($number_of_result / $results_per_page);  
                    $prev_page = ($page > 1) ? $page - 1 : null; // Previous page number
                    $next_page = ($page < $number_of_page) ? $page + 1 : null; // Next page number
                    
                    echo "<li class='page-item'>";
                    if ($prev_page !== null) {
                        echo "<a class='page-link' href='news-index.php?page=".$prev_page."'>&laquo;Previous</a>";
                    }else{
                        echo "<a class='page-link disabled'>&laquo;Previous</a>";
                    }
                    echo "</li>";             

                    for($page = 1; $page<= $number_of_page; $page++){
                        echo "<li class='page-item'>
                            <a href='news-index.php?page=".$page."' class='page-link'>
                                ".$page."
                            </a>
                        </li>";
                    }

                    if($next_page !== null) {
                        echo "<li class='page-item'><a class='page-link' href='news-index.php?page=".$next_page."'>&raquo; Next </a></li>";
                    }
                    ?>
                </ul>  
            </nav>
        </div>        

    </div>
    <!-- 10)Footer area -->
    <?php  include('footer.html'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>