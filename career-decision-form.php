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
    <link rel="stylesheet" href="./assets/styles/style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Career Decision form</title>
</head>
<body>
    <?php
    include 'user-menu-bar.php';
    ?>
    <div class="container-fluid">
        <h1 class="fp">Submit Career Decsion form</h1>
        <form class="fp-form container-fluid" method="post" action="check-cd.php">
            <!--1. Select Future path-->
            <div class="mb-3">
                <label for="fp-cat-id" class="form-label">1.Please select career path you have decided on.</label>
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
            <!-- Employment-->  
            <!--2. Company-->           
            <div class="mb-3">
                <label for="company" class="form-label">2.Please enter the name of the company or organisation that has offered you a job.</label>
                <input type="text" name="company" id="company" class="form-control" required >                
            </div>
            
            <!--3. Select location-->
            <div class="mb-3">
                <label for="prefecture" class="form-label">3.Please select the prefecture of the head office.</label>
                <select class="form-select" name="prefecture" id="prefecture" required>
                    <option value="" hidden>Prefecture</option>
                    <?php
                    $pref_result = $future_path->getAllPrefectures();
                    while($pref_row=$pref_result->fetch_assoc()):?>
                        <!--fetch_assoc = transform the result into associative array -->
                        <option value="<?= $pref_row['pref_id']; ?>"> <?= $pref_row['pref_name']; ?></option>
                    <?php endwhile; ?>   
                </select>
                
            </div>
            <!--4. Select Industry-->           
            <div class="mb-3">
                <label for="industry" class="form-label">4.Please select the company's industry.</label>
                <select class="form-select" name="industry_id" id="industry-id" required>
                    <option value="" hidden>Industry</option>
                    <?php
                    $ind_result = $future_path->getAllIndustries();
                    while($ind_row=$ind_result->fetch_assoc()):?>
                        <!--fetch_assoc = transform the result into associative array -->
                        <option value="<?= $ind_row['industry_id']; ?>"> <?= $ind_row['industry_name']; ?></option>
                    <?php endwhile; ?>                    
                </select>
                
            </div>
            <!--5. Select Occupation-->
            
            <div class="mb-3">
                <label for="occupation" class="form-label">5.Please select the type of occupation.</label>
                <select class="form-select" name="occupation_id" id="occupation-id" required>
                    <option value="" hidden>Occupation</option>
                    <?php
                    $occ_result = $future_path->getAllOccupations();
                    while($occ_row=$occ_result->fetch_assoc()):?>
                        <!--fetch_assoc = transform the result into associative array -->
                        <option value="<?= $occ_row['occupation_id']; ?>"> <?= $occ_row['occupation_name']; ?></option>
                    <?php endwhile; ?>   
                </select>                
            </div>

            <!--6. Select How to apply-->            
            <div class="mb-3">
                <label for="apply" class="form-label">6.Please select how you applied.</label>
                <select class="form-select" name="apply" id="apply" required>
                    <option value="" hidden>How to apply</option>
                    <?php
                    $app_result = $future_path->getAllAppCat();
                    while($app_row=$app_result->fetch_assoc()):?>
                        <!--fetch_assoc = transform the result into associative array -->
                        <option value="<?= $app_row['app_cat_id']; ?>"> <?= $app_row['app_cat_name']; ?></option>
                    <?php endwhile; ?>   
                </select>
                
            </div>

             <!--7. Further Education-->           
             <div class="mb-3">
                <label for="further-edu" class="form-label">7.Please enter your higher education.</label>
                <input type="text" name="further_edu" id="further-edu" class="form-control" >
                
            </div>
            
            <!--8. Career Decision Note-->
            <div class="mb-3">
                <label for="cd-note" class="form-label">8.Note</label>
                <textarea class="form-control" name="cd_note" id="cd-note" rows="3" placeholder="Note"></textarea>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary rounded-pill rsv-btn" type="submit">CHECK</button>
                <button class="btn btn-primary rounded-pill rsv-btn" type="button">RETURN</button>
            </div>
        </form>
    </div>
        
</body>
</html>