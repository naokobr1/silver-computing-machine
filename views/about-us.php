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
        <title>About us</title>
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
                        <img src="./assets/images/about_us_students.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="outline-right col-6">
                        <p class="text-uppercase fw-bold">outline</p>
                        <ul>
                            <li><a href="#intro">Introduction of Career Center</a></li>
                            <li><a href="#policy">Our policy</a></li>
                            <li><a href="#message">A message from the chief of Carreer center</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">    
            <!-- (3) Introduction area -->
            <section class="intro pb-5 pt-5" id="intro">

                <div class="section-header row pb-2">
                    <h2 class="title">INTRODUCTION OF CAREER CENTER</h2>
                </div>
                <div class="section-content row">
                    <h3 class="pb-2">Students proactively look to the future and determine their own career paths. We support them through a variety of  events and programs to nurture the skills they need to design their careers.</h3>
                    <p>Sample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text</p>
                </div>

            </section>

            <!-- (4) Our policy area -->
            <div class="policy pb-5" id="policy">

                <div class="section-header row pb-2">
                    <h2 class="title">Our policy</h2>
                </div>
                <div class="section-content row">
                    <h3 class="pb-2">The Career Center provides support through various events and programs to help students acquire the abilities and skills necessary to "balance student life and career design".</h3>
                    <p class="fs-3 border-bottom border-secondary">Three competencies we want students to acquire</p>
                    <ul class="pb-2">
                        <li>The ability to find "optimal solutions" to problems for which there are no correct answers</li>
                        <li>The ability to independently determine one's own career path and develop (control) one's own career</li>
                        <li>The ability to enhance their expertise and face social issues with a future-oriented mindset.</li>
                    </ul>
                    <p class="fs-3 border-bottom border-secondary">Career Center Initiatives</p>
                    <ul>
                        <li>Provide opportunities for practical problem-based learning (PBL) in collaboration with companies</li>
                        <li>Career education programs for first and second year students (Career Start Program in collaboration with companies)</li>
                        <li>Practical seminars to broaden students' perspectives on social issues and structures</li>
                    </ul>
                </div>
            </div>

            <!-- (5) Message area -->
            <div class="message pb-5" id="message">

                <div class="section-header row pb-2">
                    <h2 class="title">A message from the chief of Carreer center </h2>
                </div>
                <div class="section-content row">
                    <img src="./assets/images/chief.jpg" alt="" class="img-fluid">
                    <p class="pt-2">Sample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text Sample text sample textSample text sample text Sample text sample text</p>
                </div>
            </div>

            <!-- (6) Opening hours area -->
            <div class="open_hours pb-5" id="open_hours">

                <div class="section-header row pb-2">
                    <h2 class="title">Opening hours </h2>
                </div>
                <div class="section-content row">
                    <div class="section-content-left col-6">
                        <img src="./assets/images/open_hours.jpg" alt="">
                    </div>
                    <div class="section-content-right col-6">
                        <p class="fs-4 border-bottom border-secondary">MON-FRI    9:00-17:00</p>
                        <ul>
                            <li>Excluding holidays.</li>
                            <li>Closing dates during the year-end, New Year, and Bon vacation periods will be announced separately.</li>
                        </ul>
                </div>
            </div>
        </div>        

    </div>
    <!-- 10)Footer area -->
    <?php  include('footer.html'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>