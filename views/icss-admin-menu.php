
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
    <title>ICSS Menu</title>
</head>
<body class="home">
    <?php  
    include('user-menu-bar.php'); 
    ?>
    <div class="container">        
        <div class="inner">
            <h1 class="home-logo">
                Internet Career Support System<br>
                For Admin
            </h1>
            <div class="icss-menu">
                <div><a href="add-news.php" class="btn btn-primary px-5 py-3 mt-5 ms-3" role="button">Add News</a></div>
                <div><a href="add-counselor.php" class="btn btn-primary px-5 py-3 mt-5 ms-3" role="button">Add Counselor</a></div>
                <div><a href="booking-index.php" class="btn btn-primary px-5 py-3 mt-5 mb-5 ms-3" role="button">View booking status</a></div>
            </div>
        </div>
    </div>
    
</body>
</html>