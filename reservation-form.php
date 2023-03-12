<?php
require("./functions/user-function.php");

session_start();

$st_id = $_SESSION['st_id'];

$form = [
    'rsv_date' => '',
    'rsv_time' => '',
    'csl_id' => '',
    'note' =>'',
];
$error = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['rsv_date'] = filter_input(INPUT_POST, 'rsv_date', FILTER_SANITIZE_SPECIAL_CHARS);
    if($form['rsv_date'] === '') {
    $error['rsv_date'] = 'blank';
    }
    $form['rsv_time'] = filter_input(INPUT_POST, 'rsv_time', FILTER_SANITIZE_SPECIAL_CHARS);
    if($form['rsv_time'] === '') {
    $error['rsv_time'] = 'blank';
    }
    $form['csl_id'] = filter_input(INPUT_POST, 'csl_id', FILTER_SANITIZE_SPECIAL_CHARS);
    if($form['csl_id'] === '') {
    $error['csl_id'] = 'blank';
    }
    $form['note'] = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($error)) {
        $_SESSION['form'] = $form;        
        header('Location: check-rsv.php');
        exit();
        
    }
}
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
    <title>Reservation form</title>
</head>
<body>
    <?php
    include 'user-menu-bar.php';
    ?>
    <div class="container-fluid">
        <h1 class="reservation">RESERVE a consultation</h1>
        <form class="rsv-form container-fluid" method="post" >
            <div class="mb-3">
                <label for="rsv-date">1.Please select a booking date</label>
                <input type="date" name="rsv_date" id="rsv_date" class="form-control">
                <!-- <select class="form-select" name="rsv_date" id="rsv-date">
                    <option value="" hidden>Date</option>
                    <option value="12/1">12/1</option>
                    <option value="12/2">12/2</option>
                    <option value="12/3">12/3</option>
                </select> -->
                <?php if(isset($error['rsv_date']) && $error['rsv_date'] === 'blank'): ?>
                        <p class="error">* Select a booking date.</p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="rsv-time" class="form-label">2.Please select a booking time</label>
                <select class="form-select" name="rsv_time" id="rsv-time">
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
                <?php if(isset($error['rsv_time']) && $error['rsv_time'] === 'blank'): ?>
                        <p class="error">* Select a booking time.</p>
                <?php endif; ?>
            </div>
            <?php
            
            $db = dbconnect();
            $stmt = $db->prepare('SELECT csl_id, csl_first_name, csl_last_name from counselors');
            if(!$stmt){
                die($db->error);
            }
            $success = $stmt->execute();
            if(!$success){
                die($db->error);
            }
            ?>
            <div class="mb-3">
                <label for="csl-id" class="form-label">3.Please select a counselor</label>
                <select class="form-select" name="csl_id" id="csl-id">
                    <option value="" hidden>Counselor</option>
                    <?php
                    $stmt->bind_result($csl_id, $csl_first_name, $csl_last_name);
                    while($stmt->fetch()) : ?>
                    <option value="<?php echo h($csl_first_name); ?>"> <?php echo h($csl_first_name).''. h($csl_last_name); ?></option>
                    <?php endwhile; ?>
                </select>
                <?php if(isset($error['csl_id']) && $error['csl_id'] === 'blank'): ?>
                        <p class="error">* Select a Counselor.</p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="note" id="note" rows="3" placeholder="Note"></textarea>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary rounded-pill rsv-btn" type="submit">CHECK</button>
                <button class="btn btn-primary rounded-pill rsv-btn" type="button">RETURN</button>
            </div>
        </form>
    </div>
        
</body>
</html>