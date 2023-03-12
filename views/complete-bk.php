<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../assets/styles/style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Complete</title>
</head>
<body>
    <?php  
    include('user-menu-bar.php'); 
    ?>
    <div class="container-fluid">
        <h1 class="reservation">Complete</h1>
        <div class="card text-center">
            <div class="card-body">
                <i class="fa-solid fa-check complete-icon"></i>
                <h2 class="card-title">Your booking has been completed.</h2>
                
                <div class="d-grid gap-2 my-3 mx-auto" style="width:50%">
                    <a class="btn rounded-pill" type="submit" href="icss-user-menu.php">Return to top</a>
                </div>
            </div>            
        </div>
        
        
    </div>
        
</body>
</html>