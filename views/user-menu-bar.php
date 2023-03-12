<?php
session_start();
// include "../classes/account.php";
?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid" style="max-width: 100%;">
        <a class="navbar-brand" href="index.php"><img src="../assets/images/career_center_logo.png" alt="career-center-logo"></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-nav">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbar-nav">
            <div class="ms-auto">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="booking-form.php" class="nav-link">Consultation Booking</a></li>
                    <li class="nav-item"><a href="future-path-form.php" class="nav-link">Future path form</a></li>
                    <li class="nav-item"><a href="career-decision-form.php" class="nav-link">Career decision form</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" ><?= $_SESSION['student_id'] ;?></a></li>
                <li class="nav-item"><a href="../actions/logout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
          
        </div>
        
    </div>
</nav>   