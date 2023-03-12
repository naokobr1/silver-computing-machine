<?php
// session_start();
include "../classes/news.php";
$news = new News;

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
    <title>ABC University Career Center</title>
    <style>
        .section_login{
            background-color: red;
            /*background-image:url('../assets/images/campus.jpg');
            background-size: cover;*/
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- (1)Header area -->
        <?php  include('header-bar.php'); ?>

        <!-- (2) Headline area -->
        <section class="index-headline" id="index-headline">
            <div class="index-headline-text">
                <h2>Together, we will find the future.</h2>
                <p>ABC University Center For Career Development</p>
            </div>
        </section>

        <!-- section -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- (3)Event area -->
                        <section class="event pb-5 pt-5" id="event">
                            <div class="container-md">
                                <div class="section-header row pb-2">
                                    <h2 class="title">Pick up event</h2>
                                </div>
                                <div class="section-content row">
                                    <div class="event-list col-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-img-top mb-3">
                                                    <img src="../assets/images/event_img.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 class="card-subtitle text-muted">2022.12.10</h6>
                                                <h6 class="card-subtitle">A seminar for job hunting</h6>                                        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-list col-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-img-top mb-3">
                                                    <img src="../assets/images/event_img.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 class="card-subtitle text-muted">2022.12.10</h6>
                                                <h6 class="card-subtitle">A seminar for job hunting</h6>                                        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-list col-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-img-top mb-3">
                                                    <img src="../assets/images/event_img.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 class="card-subtitle text-muted">2022.12.10</h6>
                                                <h6 class="card-subtitle">A seminar for job hunting</h6>                                        
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="event-list col-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-img-top mb-3">
                                                    <img src="../assets/images/event_img.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 class="card-subtitle text-muted">2022.12.10</h6>
                                                <h6 class="card-subtitle">A seminar for job hunting</h6>                                        
                                            </div>
                                        </div>
                                    </div>

                                    
                                
                                </div>
                                <div class="pb-3 pt-3">
                                    <a href="#" class="btn float-end">view more   ></a>
                                </div>
                                
                            </div>  
                        </section>

                        <!-- (4) News area -->
                        <section class="news pb-5" id="news">
                            <div class="container-md">
                                <div class="section-header row pb-2">
                                    <h2 class="title">News</h2>
                                </div>
                                <div class="section-content row">
                                    <div class="news-list">
                                        <?php
                                        $news = new News;
                                        $news_list = $news->getFiveNews();
                                        while($news_row = $news_list->fetch_assoc()): ?>
                                        <p><span class="me-4"><?= $news_row['date_posted']; ?></span><span class="me-2 tag"><?= $news_row['category_name']; ?></span><a href="news-detail.php?news_id=<?= $news_row['news_id']?>" class="fs-4"><?= $news_row['news_title'];?></a></p>
                                        <?php endwhile; ?>
                                        <!-- <a href="news-index.php" class="btn float-end">view more   ></a> -->
                                        <div class="row">
                                            <div class="col text-end">
                                            <a href="news-index.php" class="btn btn-bottom">view more   ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </section>
                        
                        <!-- (5) About us area -->
                        <section class="about-us pb-5" id="about-us">
                            <div class="container-md">
                                <div class="section-header row pb-2">
                                    <h2 class="title">About us</h2>             
                                </div>
                                <div class="section-content row">
                                    <div class="section-left col-6">
                                        <img src="../assets/images/about_us_students.jpg" alt="university students" class="img-fluid">
                                    </div>
                                    <div class="section-right col-6">
                                        <h3>We contribute to the development of the next generation of human resources as a good understanding of students in order to survive in unpredictable times.</h3>
                                        <p>Sample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text</p>
                                        
                                        <div class="row relative bottom-0">
                                            <div class="col text-end">
                                                <a href="#" class="btn btn-primary btn-block  float-end btn-bottom">view more   ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                                
                        <!-- (6) Career support system area -->
                        <section class="career-support pb-5" id="career-support">
                            <div class="container-md">
                                <div class="section-header row pb-2">
                                    <h2 class="title ">carrer support system</h2>             
                                </div>
                                <div class="section-content row">
                                    <div class="section-left col-6">
                                        <img src="../assets/images/c_support_system.jpg" alt="staff and students" class="img-fluid">
                                    </div>
                                    <div class="section-right col-6">
                                        <h3>Here is an introduction to the support systems available to college students</h3>
                                        <p>Sample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text</p>
                                        <a href="#" class="btn btn-block float-end btn-bottom">view more   ></a>
                                    </div>
                                </div>
                            </div>
                        </section>
                                        
                        <!-- (7) Employment result area -->
                        <section class="emp-result pb-5" id="emp-result">
                            <div class="container-md">
                                <div class="section-header row pb-2">
                                    <h2 class="title ">Employment result</h2>             
                                </div>
                                <div class="section-content row">
                                    <div class="section-left col-6">
                                        <img src="../assets/images/emp_result.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="section-right col-6">
                                        <h3>The high rate of employment offers is supported by the solid academic skills and broad perspective fostered in classes, and by the wide variety of career and employment support offered to each student.</h3>
                                        <p>Sample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text</p>
                                        <a href="#" class="btn btn-block btn-primary float-end btn-bottom">view more   ></a>
                                    </div>
                                </div>
                            </div>
                        </section>
                                                
                        <!-- (8) Recruiter area -->
                        <section class="recruiter pb-5" id="recruiter">
                            <div class="container-md">
                                <div class="section-header row pb-2">
                                    <h2 class="title ">To recruiter</h2>             
                                </div>
                                <div class="section-content row">
                                    <div class="section-left col-6">
                                        <img src="../assets/images/to_recruiter.jpg" alt="resume" class="img-fluid">
                                    </div>
                                    <div class="section-right col-6">
                                        <h3>To submit a job application, please click here.</h3>
                                        <p>Sample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text</p>
                                        <div class="align-bottom">
                                            <a href="#" class="btn btn-block  float-end btn-bottom">submit job offer   ></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                        <!-- (9) ICSS login/register area -->
                        <section class="login-regi pb-5" id="login-regi">
                            <div class="container-md">
                                <div class="section-header row pb-2">
                                    <h2 class="title ">ICSS LOGIN/REGISTER</h2>             
                                </div>
                                <div class="section-content row">
                                    <div class="section-left col-6" style="overflow:auto;">
                                        <img src="../assets/images/campus.jpg" alt="campas" class="base img-fluid">
                                        <div class="inner" >
                                           <img src="../assets/images/univ_mark.png" class="img-cicle img-responsive" alt="university mark">
                                            <p>ABC University<br>
                                                Internet Career Support System</p>
                                        </div>
                                    </div>
                                    <div class="section-right col-6">
                                        <ul class="h3">
                                            <li>Career Consultation Appointment</li>
                                            <li>Submit Career decision form</li>
                                        </ul>  
                                        <a href="login.php" class="btn btn-block  float-end btn-bottom">ICSS LOGIN   ></a>
                                        <p>Click <a href="">here </a> if you do not have an account </p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        

        <!-- 10)Footer area -->
        <?php  include('footer.html'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>