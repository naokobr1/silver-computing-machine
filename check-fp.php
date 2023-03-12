<?php 
session_start();
require('./functions/user-function.php');
if(isset($_SESSION['form'])){
    $form = $_SESSION['form'];
} else {
    //If check.php is called directly
    header('Location: future-path-form.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $db = dbconnect();    
    $stmt = $db->prepare('INSERT INTO future_path (fp_class_id, industry_id, occupation_id, student_id, fp_note) VALUES (?, ?, ?, ?, ?)');
    if(!$stmt) {
        die($db->error);
    }
    $stmt->bind_param('iiiss', $form['fp_class_id'], $form['industry_id'], $form['occupation_id'], $form['student_id'], $form['fp_note']);
    $success = $stmt->execute();
    if(!$success){
        die($db->error);
    }

    unset($_SESSION['form']);
    header('Location: complete-fp.php');
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
    <title>Checking of future path details</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="reservation">CHECK YOUR Future path</h1>
        <table class="table">
            
            <tbody>
                <tr>
                <?php
                    $db = dbconnect();
                    $stmt = $db->prepare('SELECT fp_class_name from future_path_class WHERE fp_class_id = ?');
                    if(!$stmt){
                        die($db->error);
                    }
                    $stmt->bind_param('i', $form['fp_class_id']);
                    $success = $stmt->execute();
                    if(!$success){
                        die($db->error);
                    }
                    ?>
                    <th scope="row">Future path</th>
                    <?php
                    $stmt->bind_result($fp_class_name); ?>
                    <td><?php echo h($fp_class_name); ?></td>
                </tr>
                <tr>
                    
                    <th scope="row">Industry</th>
                    <td><?php echo h($form['industry_name']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Occupation</th>
                    <td><?php echo h($form['occupation_name']); ?></td>
                </tr>
                <!-- <tr>
                    <?php
                    // $db = dbconnect();
                    // $stmt = $db->prepare('SELECT csl_first_name, csl_last_name from counselors WHERE csl_id = ?');
                    if(!$stmt){
                        die($db->error);
                    }
                    $stmt->bind_param('i', $form['csl_id']);
                    $success = $stmt->execute();
                    if(!$success){
                        die($db->error);
                    }
                    // ?>
                    <th scope="row">Counselor</th>
                    <?php
                    $stmt->bind_result($csl_first_name, $csl_last_name); ?>
                
                    <td colspan="2"><?php echo h($csl_first_name).' '. h($csl_last_name); ?></td>
                </tr> -->
                <tr>
                    <th scope="row">Note</th>
                    <td colspan="2"><?php echo h($form['fp_note']); ?></td>
                </tr>
            </tbody>
        </table>
        <div class="d-grid gap-2 mx-3">
                <a class="btn btn-primary rounded-pill rsv-btn" type="submit" href="complete-fp.php">Submit</a>
                <a class="btn btn-primary rounded-pill rsv-btn" href="reservation-form.php" type="button">RETURN</a>
        </div>
    </div>
        
</body>
</html>