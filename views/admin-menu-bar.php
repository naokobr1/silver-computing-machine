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
            <div class="navbar-middle">
                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a href="booking-form.php" class="nav-link">ADD NEWS</a></li>
                    <li class="nav-item"><a href="future-path-form.php" class="nav-link">ADD-COUNSELOR</a></li>
                    <li class="nav-item"><a href="career-decision-form.php" class="nav-link">View booking status</a></li>
                </ul>
            </div>
            <div class="navbar-right">
                <li class="nav-item"><a href="#" class="nav-link" ><?= $_SESSION['student_id'] ;?></a></li>
                <li class="nav-item"><a href="../actions/logout.php" class="nav-link">Logout</a></li>
            </div>
          
        </div>
        
    </div>
</nav>   