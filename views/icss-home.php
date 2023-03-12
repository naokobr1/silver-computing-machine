<?php
session_start();

?>


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
    <title>ICSS Home</title>
</head>
<body class="home">
    <div class="container">
        <div class="inner">
            <h1 class="home-logo">
                ABC University<br>Internet Career Support System
            </h1>
            <div class="home-menu">
                <div class="home-menu-left">
                    <div class="home-menu-logo">
                        <img src="../assets/images/univ_mark.png" alt="logo">
                    </div>
                    <div class="home-menu-icss">
                        <p class="title-icss">For ABC University students</p>
                        <h2>ICSS</h2>
                    </div>
                </div>
                <div class="home-menu-right">
                    <div class="home-menu-label">
                        <h3>ABC University<br>Internet Career Support System<br>
                        ICSS Servise Lists</h3>

                    </div>
                    <ul class="home-menu-list">
                        <li>Consultation Reservation</li>
                        <li>Submit your future path form</li>
                        <li>Submit Career decision form</li>
                    </ul>
                    <div>
                        <div class="btn">
                        <a href="login.php">LOGIN</a>
                        </div>
                        <div class="btn">
                            <a href="register.php">REGISTER</a>
                        </div>
                    </div>
                    
                    <div class="btn btn-back mt-1">
                        <a href="index.php">RETURN TO HOME</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>