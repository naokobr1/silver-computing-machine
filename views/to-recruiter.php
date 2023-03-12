<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!--CSS-->
        <link rel="stylesheet" href="./assets/styles/style.css">
        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>To Recruiter</title>
    </head>
<body>
    <div class="wrapper">
        <!-- (1)Header area -->
        <?php  include('header.html'); ?>

        <!-- (2) Outline area -->
        <div class="outline container pt-5">
            <div class="outline-header">
                <h1>About Career Center</h1>
            </div>
        </div>    
        <div class="outline-bg">
            <div class="outline container">
                <div class="row">
                    <div class="outline-left col-6">
                        <img src="./assets/images/to_recruiter.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="outline-right col-6">
                        <p class="text-uppercase fw-bold">outline</p>
                        <ul>
                            <li><a href="#biz-org">To Businesses and Organizations</a></li>
                            <li><a href="#appointments">About Visiting Appointments</a></li>
                            <li><a href="#job-offer">Submit job offer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">    
            <!-- (3) To Bussiness and Organization area -->
            <section class="biz-org pb-5 pt-5" id="biz-org">

                <div class="section-header row pb-2">
                    <h2 class="title">To Businesses and Organizations</h2>
                </div>
                <div class="section-content row">
                    <p class="pb-2 fs-5">ABC University would like to thank you for your continued support of our educational and research activities, career development support for students, and employment opportunities. We are pleased to offer a variety of programs including on-campus company research seminars, meetings with alumni, and internships.
                    <br><br>To submit a job application, please click the link at the bottom of this page.</p>
                </div>

            </section>

            <!-- (4) Appointments area -->
            <div class="appointments pb-5" id="appointments">

                <div class="section-header row pb-2">
                    <h2 class="title">About Visiting Appointments</h2>
                </div>
                <div class="section-content row">
                    <div class="section-content-left col-6">
                        <img src="./assets/images/campus.jpg" alt="">
                    </div>
                    <div class="section-content-right col-6">
                        <p class="fs-5">We are available to exchange information on employment status, job requests, etc. in either face-to-face or online formats (Zoom, Teams, etc.). If you would like to schedule an interview, please call the contact information below.</p>
                        <p class="mb-0">TEL: XXX-XXX-XXX</p>
                        <p>Email: XXX@XXXXXX</p>
                        
                </div>
            </div>

            <!-- (5) Job offer area -->
            <div class="job-offer pb-5" id="job-offer">

                <div class="section-header row pb-2">
                    <h2 class="title">Submit job offer </h2>
                </div>
                <div class="section-content row">
                    <div class="section-content-left col-6">
                        <img src="./assets/images/job_offer.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="section-content-right col-6">
                        <p class="fs-5">Click here to submit job applications for current students.</p>
                        <p>Sample text sample text Sample text sample text Sample text sample textSample text sample text </p>
                        <a href="#" class="btn btn-primary float-end mt-3">Submit job offer   ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 10)Footer area -->
    <?php  include('footer.html'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>