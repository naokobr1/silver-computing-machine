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
    <title>Add-News</title>
</head>
<body>
    <?php  
    include('admin-menu-bar.php'); 
    ?>
    <div class="container-fluid">
        <h1>ADD NEWS</h1>
        <form action="check-news.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="news-title" class="form-label">News Title</label>
                <input type="text" class="form-control mt-3" name="news_title" id="news-title" placeholder="TITLE">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">News Category</label>
                <select name="category_id" id="category" class="form-select mt-3">
                    <option value="" hidden>CATEGORY</option>
                    <?php
                        include "../classes/news.php";
                        $news = new News;
                        $cat_list = $news->getAllCategories();
                        while($cat_details = $cat_list->fetch_assoc()){
                            echo "<option value='".$cat_details['category_id']."'>".$cat_details['category_name']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">News Content</label>
                <textarea class="form-control" name="description" id="description" cols="50" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <p>If you upload a PDF file of the flyer, please select it on the next checking page.</p>
                <!-- <label for="flyer">PDF file of the flyer</label>
                <input type="file" name="flyer" id="flyer" class="custom-file-input" size="35" accept=".pdf"> -->
            </div>
            
            <div class="d-grid gap-2">                
                <input type="submit" class="btn rounded-pill" value="Check News">
                <a href="#" class="btn rounded-pill btn-back">Cansel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>