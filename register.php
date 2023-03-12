<?php
require("./functions/user-function.php");
session_start();
if(isset($_GET['action']) && $_GET['action'] === 'rewrite' && isset($_SESSION['form'])){
    $form = $_SESSION['form'];
} else {
    $form = [
        'st_id' => '',
        'first_name' => '',
        'last_name' => '',
        'contact_no' => '',
        'email' => '',
        'password' => '',
    ];
}

$error = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['st_id'] = filter_input(INPUT_POST, 'st_id', FILTER_SANITIZE_SPECIAL_CHARS);
    if($form['st_id'] === '') {
        $error['st_id'] = 'blank';
    }
    $form['first_name'] = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    if($form['first_name'] === ''){
        $error['first_name'] = 'blank';
    }
    $form['last_name'] = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    if($form['last_name'] === ''){
        $error['last_name'] = 'blank';
    }
    $form['contact_no'] = filter_input(INPUT_POST, 'contact_no', FILTER_SANITIZE_NUMBER_INT);
    if($form['contact_no'] === ''){
        $error['contact_no'] = 'blank';
    }
    $form['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if($form['email'] === ''){
        $error['email'] = 'blank';
    } else {
        $db = dbconnect();
        $stmt = $db->prepare('SELECT count(*) from accounts where student_id=?');
        if(!$stmt){
            die($db->error);
        }
        $stmt->bind_param('s', $form['st_id']);
        $success = $stmt->execute();
        if(!$success){
            die($db->error);
        }
        // select 構文の結果を受け取る($cntという変数に結果を取得していく)
        $stmt->bind_result($cnt);
        $stmt->fetch();
        
        if($cnt > 0) {
            $error['st_id'] = 'duplicate';
        }
        
        
    }

    $form['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    if($form['password'] === ''){
        $error['password'] = 'blank';
    } else if (strlen($form['password']) < 4) {
        $error['password'] = 'length';
    }

    $image = $_FILES['image'];
    if($image['name'] !== '' && $image['error'] === 0){
        $finfo = new finfo();
        $mime = $finfo->file($image['tmp_name'], FILEINFO_MIME_TYPE);
        // $type = mime_content_type($image['tmp_name']);
        if($mime !== 'image/png' && $mime !== 'image/jpeg') {
            $error['image'] = 'type';
        }
    }

    if(empty($error)) {
        $_SESSION['form'] = $form;
        // Upload image
        if($image['name'] !== '') {
            $filename =date('YmdHis') . '_'. $image['name'];
            if(!move_uploaded_file($image['tmp_name'], './assets/accounts_pictures/' . $filename)){
                die('The file upload failed.');
            }
            // $filenameをセッションに記憶させる
            $_SESSION['form']['image'] = $filename;

        } else {
            $_SESSION['form']['image'] = '';
        }
        header('Location: check.php');
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
    <title>Registration</title>
</head>
<body>
    <div class="container w-50">
        <div class="card mt-3">
            <div class="card-header text-center">
                <h1>Register Here</h1>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="st-id" class="form-label">Student ID number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control mb-3" name="st_id" max="7" value="<?php echo h($form['st_id']); ?>">
                    <?php if(isset($error['st_id']) && $error['st_id'] === 'blank'): ?>
                        <p class="error">* Enter your student ID number.</p>
                    <?php endif; ?>
                    <?php if(isset($error['st_id']) && $error['st_id'] === 'duplicate'): ?>
                        <p class="error">* The Student ID Number you entered is already registered.</p>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col">
                            <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" name="first_name" value="<?php echo h($form['first_name']); ?>" >
                            <?php if(isset($error['first_name']) && $error['first_name'] === 'blank'): ?>
                                <p class="error">* Please enter your First name.</p>
                            <?php endif; ?>
                        </div>
                        <div class="col">
                            <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" name="last_name" value="<?php echo h($form['last_name']); ?>">
                            <?php if(isset($error['last_name']) && $error['last_name'] === 'blank'): ?>
                                <p class="error">* Please enter your Last name.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <label for="telno" class="form-label">Contact Number <span class="text-danger">*</span></label>
                    <input type="number" class="form-control mb-3" name="contact_no" value="<?php echo h($form['contact_no']); ?>" >
                    <?php if(isset($error['contact_no']) && $error['contact_no'] === 'blank'): ?>
                        <p class="error">* Please enter your Contact number.</p>
                    <?php endif; ?>
                    
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control mb-3" name="email" value="<?php echo h($form['email']); ?>" >
                    <?php if(isset($error['email']) && $error['email'] === 'blank'): ?>
                        <p class="error">* Please enter your Email address.</p>
                    <?php endif; ?>
                    <?php if(isset($error['email']) && $error['email'] === 'duplicate'): ?>
                        <p class="error">* The email address you entered is already registered.</p>
                    <?php endif; ?>
  
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control mb-3" name="password" value="<?php echo h($form['password']); ?>">
                    <?php if(isset($error['password']) && $error['password'] === 'blank'): ?>
                        <p class="error">* Please enter your Password.</p>
                    <?php endif; ?>
                    <?php if(isset($error['password']) && $error['password'] === 'length'): ?>
                        <p class="error">* Password must be at least 4 characters..</p>
                    <?php endif; ?>
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" name="image" size="35" value="">
                    <?php if(isset($error['image']) && $error['image'] === 'type'): ?>
                        <p class="error">* Please specify ".png" or ".jpeg" images for photos.</p>
                    <?php endif; ?>                   
                    
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="btn_sign_up" class="btn btn-dark w-75">Comfirm</button>
                        </div>
                        <div class="col">
                            <p class="text-end">Have an account? <a href="#">Sign in</a></p>
                        </div>
                    </div>
                    
                    
                </form>
                
            </div>
            
        </div>
        
    </div>


    
</body>
</html>