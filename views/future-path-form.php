<?php
// session_start();
include "../classes/future-path.php";
$future_path = new FuturePath;

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
    <title>Future Path form</title>
</head>
<body>
    <?php
    include 'user-menu-bar.php';
    ?>
    <div class="container-fluid">
        <h1 class="fp">Submit future path form</h1>
        <form class="fp-form container-fluid" method="post" action="check-fp.php">
            <!--1. Select Future path-->
            <div class="mb-3">
                <label for="fp-cat-id" class="form-label">1.Please select your preferred future path.</label>
                <select class="form-select" name="fp_cat_id" id="fp-cat-id">
                    <option value="" hidden>Future Path</option>
                    <?php
                    $fp_result = $future_path->getAllFpCat();
                    while($fp_row=$fp_result->fetch_assoc()):?>
                        <!--fetch_assoc = transform the result into associative array -->
                        <option value="<?= $fp_row['fp_cat_id']; ?>"> <?= $fp_row['fp_cat_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <!--2. Select Industry-->           
            <div class="mb-3">
                <label for="industry" class="form-label">2.Please select the industry in which you would like to work.
</label>
                <select class="form-select" name="industry_id" id="industry-id">
                    <option value="" hidden>Industry</option>
                    <?php
                    $ind_result = $future_path->getAllIndustries();
                    while($ind_row=$ind_result->fetch_assoc()):?>
                        <!--fetch_assoc = transform the result into associative array -->
                        <option value="<?= $ind_row['industry_id']; ?>"> <?= $ind_row['industry_name']; ?></option>
                    <?php endwhile; ?>                    
                </select>
                
            </div>
            <!--3. Select Occupation-->
            
            <div class="mb-3">
                <label for="occupation" class="form-label">3.Please select the type of occupation you would like to do.</label>
                <select class="form-select" name="occupation_id" id="occupation-id">
                    <option value="" hidden>Occupation</option>
                    <?php
                    $occ_result = $future_path->getAllOccupations();
                    while($occ_row=$occ_result->fetch_assoc()):?>
                        <!--fetch_assoc = transform the result into associative array -->
                        <option value="<?= $occ_row['occupation_id']; ?>"> <?= $occ_row['occupation_name']; ?></option>
                    <?php endwhile; ?>   
                </select>
                
            </div>
            
            <!--4. fp Note-->
            <div class="mb-3">
                <label for="fp-note" class="form-label">Note</label>
                <textarea class="form-control" name="fp_note" id="fp-note" rows="3" placeholder="Note"></textarea>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary rounded-pill rsv-btn" type="submit">CHECK</button>
                <button class="btn btn-primary rounded-pill rsv-btn" type="button">RETURN</button>
            </div>
        </form>
    </div>
        
</body>
</html>