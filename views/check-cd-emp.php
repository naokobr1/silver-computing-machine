<?php 
// session_start();
include "../classes/future-path.php";

//collect data from future path form
$fp_cat_id = $_POST['fp_cat_id'];
$company = $_POST['company'];
$industry_id = $_POST['industry_id'];
$occ_id = $_POST['occupation_id'];
$pref_id = $_POST['prefecture'];
$cd_note = $_POST['cd_note'];
$app_cat_id = $_POST['apply'];

// $student_id = $_SESSION['student_id'];

$get_fp_cat = new FuturePath;
$get_industry = new FuturePath;
$get_occupation = new FuturePath;
$get_prefecture = new FuturePath;
$get_app = new FuturePath;

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
    <link rel="stylesheet" href="./assets/styles/style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Checking of career decision detail</title>
</head>
<body>
    <?php  
    include('user-menu-bar.php'); 
    ?>
    <div class="container-fluid">
        <h1 class="reservation">CHECK YOUR CAREER DECISION FORM</h1>
        <form action="../actions/future-path.php" method="post">            
            <dl>
                <dt>Your future path</dt>
                <?php
                $fp_cat_row = $get_fp_cat->getFpCat($fp_cat_id);
                ?>
                <dd><?= $fp_cat_row['fp_cat_name']; ?></dd>
                <input type="hidden" name="fp_cat_id" id="fp-cat-id" value="<?= $fp_cat_row['fp_cat_id']; ?>">
    
                <dt>Company name</dt>
                <dd><?= $company ;?></dd>
                <input type="hidden" name="company" id="company" value="<?= $company;?>">

                <dt>the prefecture of the head office</dt>
                <?php
                $pref_row = $get_prefecture->getprefecture($pref_id);
                ?>
                <dd><?= $pref_row['pref_name']; ?></dd>
                <input type="hidden" name="prefecture" id="prefecture" value="<?= $pref_row['pref_id']; ?>">

                <dt>Industry</dt>
                <?php
                $ind_row = $get_industry->getIndustry($industry_id);
                ?>
                <dd><?= $ind_row['industry_name']; ?></dd>
                <input type="hidden" name="industry_id" id="industry_id" value="<?= $ind_row['industry_id']; ?>">
                
                <dt>Type of occupation</dt>                
                <?php
                $occ_row = $get_occupation->getOccupation($occ_id);
                ?>
                <dd><?= $occ_row['occupation_name']; ?></dd>
                <input type="hidden" name="occupation_id" id="occupation-id" value="<?= $occ_row['occupation_id']; ?>">

                <dt>How to apply</dt>
                <?php
                $app_row = $get_app->getAppCat($app_cat_id);
                ?>
                <dd><?= $app_row['app_cat_name']; ?></dd>
                <input type="hidden" name="apply" id="apply-id" value="<?= $app_row['app_cat_id']; ?>">
    
            </div>
               
                <dt>Note</dt>
                <dd><?= $cd_note; ?></dd>
                <input type="hidden" name="cd_note" id="cd_note" value="<?= $cd_note; ?>">
            </dl>

            <div class="d-grid gap-2 mx-3">
                <button class="btn btn-primary rounded-pill rsv-btn" type="submit" name="btn_cd_emp">Finalise your submission</button>
                <a class="btn btn-primary rounded-pill rsv-btn" href="reservation-form.php" type="button">RETURN</a>
            </div>
        </form>
        
    </div>
        
</body>
</html>