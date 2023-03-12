<?php 
// session_start();
include "../classes/future-path.php";
//collect data from future path form
$fp_cat_id = $_POST['fp_cat_id'];
$industry_id = $_POST['industry_id'];
$occ_id = $_POST['occupation_id'];
$fp_note = $_POST['fp_note'];
// $student_id = $_SESSION['student_id'];

$get_fp_cat = new FuturePath;
$get_industry = new FuturePath;
$get_occupation = new FuturePath;

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
    <title>Checking of future path details</title>
</head>
<body>
    <?php  
    include('user-menu-bar.php'); 
    ?>
    <div class="container-fluid">
        <h1 class="reservation">CHECK YOUR FUTURE PATH</h1>
        <form action="../actions/future-path.php" method="post">            
            <dl>
                <dt>Your preferred future path</dt>
                <?php
                $fp_cat_row = $get_fp_cat->getFpCat($fp_cat_id);
                ?>
                <dd><?= $fp_cat_row['fp_cat_name']; ?></dd>
                <input type="hidden" name="fp_cat_id" id="fp-cat-id" value="<?= $fp_cat_row['fp_cat_id']; ?>">

                <dt>Industry in which you would like to work</dt>
                <?php
                $ind_row = $get_industry->getIndustry($industry_id);
                ?>
                <dd><?= $ind_row['industry_name']; ?></dd>
                <input type="hidden" name="industry_id" id="industry_id" value="<?= $ind_row['industry_id']; ?>">
                
                <dt>Type of occupation you would like to do.</dt>                
                <?php
                $occ_row = $get_occupation->getOccupation($occ_id);
                ?>
                <dd><?= $occ_row['occupation_name']; ?></dd>
                <input type="hidden" name="occupation_id" id="occupation-id" value="<?= $occ_row['occupation_id']; ?>">
                 
                <dt>Note</dt>
                <dd><?= $fp_note; ?></dd>
                <input type="hidden" name="fp_note" id="fp_note" value="<?= $fp_note; ?>">
            </dl>

            <div class="d-grid gap-2 mx-3">
                <button class="btn rounded-pill" type="submit" href="complete-fp.php">Finalise your submission</button>
                <a class="btn rounded-pill btn-back" href="reservation-form.php" type="button">RETURN</a>
            </div>
        </form>
        
    </div>
        
</body>
</html>