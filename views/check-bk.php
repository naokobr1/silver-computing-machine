<?php 
// session_start();
include "../classes/counselor.php";
//collect data from booking form
$bk_date = $_POST['bk_date'];
$bk_time = $_POST['bk_time'];
$csl_id = $_POST['csl_id'];
$bk_note = $_POST['bk_note'];
// $student_id = $_SESSION['student_id'];

$checkcounselor = new Counselor;
?>


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
    <title>Checking of booking details</title>
</head>
<body>
    <?php  
    include('user-menu-bar.php'); 
    ?>
    <div class="container-fluid">
        <h1 class="reservation">CHECK YOUR BOOKING</h1>
        <form action="../actions/booking.php" method="post">            
            <dl>
                <dt>Date</dt>
                <dd><?= $bk_date; ?></dd>
                <input type="hidden" name="bk_date" id="bk_date" value="<?= $bk_date; ?>">

                <dt>Time</dt>
                <dd><?= $bk_time; ?></dd>
                <input type="hidden" name="bk_time" id="bk_time" value="<?= $bk_time; ?>">
                
                <dt>Counselor</dt>                
                <?php
                $csl_row = $checkcounselor->getCounselor($csl_id);
                ?>
                <dd><?= $csl_row['csl_first_name']. ' '.$csl_row['csl_last_name']; ?></dd>
                <input type="hidden" name="csl_id" id="csl-id" value="<?= $csl_row['csl_id'];?>">
                 
                <dt>Note</dt>
                <dd><?= $bk_note; ?></dd>
                <input type="hidden" name="bk_note" id="bk_note" value="<?= $bk_note; ?>">
            </dl>

            <div class="d-grid gap-2 mx-3">
                <button class="btn rounded-pill" type="submit" href="complete-bk.php">Finalise your booking</button>
                <a class="btn rounded-pill btn-back" href="booking-form.php" type="button">RETURN</a>
            </div>
        </form>
        
    </div>
        
</body>
</html>