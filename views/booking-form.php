<?php
// session_start();
include "../classes/counselor.php";
$counselor = new Counselor;

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
    <title>Reservation form</title>
</head>
<body>
    <?php  
    include('user-menu-bar.php'); 
    ?>
    
    <div class="container-fluid">
        <h1 class="reservation">BOOK a consultation</h1>
        <form class="rsv-form container-fluid" action="check-bk.php" method="post" >
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="bk-date" class="form-label">1.Please select a booking date</label>
                    <input type="date" name="bk_date" id="bk-date" class="form-control" required min="<?= date_create()->format('Y-m-d') ?>">
                </div>
                <div class="col-6">
                    <label for="bk-time" class="form-label">2.Please select a booking time</label>
                    <select class="form-select" name="bk_time" id="bk-time">
                        <option value="" hidden>Time</option>
                        <option value="09:30">09:30</option>
                        <option value="10:00">10:00</option>
                        <option value="10:30">10:30</option>
                        <option value="11:00">11:00</option>
                        <option value="13:00">13:00</option>
                        <option value="13:30">13:30</option>
                        <option value="14:00">14:00</option>
                        <option value="14:30">14:30</option>
                        <option value="15:00">15:00</option>
                        <option value="15:30">15:30</option>
                        <option value="16:00">16:00</option>
                    </select>
                </div>                
            </div>

            
            <div class="mb-3">
                <label for="csl-id" class="form-label">3.Please select a counselor</label>
                <select class="form-select" name="csl_id" id="csl-id">
                    <option value="" hidden>Counselor</option>
                    <?php


                    $csl_result = $counselor->getAllCounselors();
                    while($csls_row=$csl_result->fetch_assoc()):?>
                        <!--fetch_assoc = transform the result into associative array -->
                        <option value="<?= $csls_row['csl_id']; ?>"> <?= $csls_row['csl_first_name'].''. $csls_row['csl_last_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="bk-note" class="form-label">4.Note</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="bk_note" id="bk-note" rows="3" placeholder="Note"></textarea>
            </div>
            <div class="d-grid gap-2">
                <button class="btn rounded-pill" type="submit">CHECK</button>
                <button class="btn rounded-pill btn-back" type="button">RETURN</button>
            </div>
        </form>
    </div>
        
</body>
</html>