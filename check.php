<?php

session_start();
require('./functions/user-function.php');
if(isset($_SESSION['form'])){
    $form = $_SESSION['form'];
} else {
    //check.phpが直接呼び出されてしまった時は
    header('Location: register.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $db = dbconnect();    
    $stmt = $db->prepare('INSERT INTO accounts (student_id,	first_name,	last_name,	password, contact_no, email, photo) VALUES (?, ?, ?, ?, ?, ?, ?)');
    if(!$stmt) {
        die($db->error);
    }
    $password = password_hash($form['password'], PASSWORD_DEFAULT);
    $stmt->bind_param('sssssss', $form['st_id'], $form['first_name'], $form['last_name'], $password, $form['contact_no'], $form['email'], $form['image']);
    $success = $stmt->execute();
    if(!$success){
        die($db->error);
    }

    unset($_SESSION['form']);
    header('Location: complete.php');
}


// if(isset($_SESSION['form'])) {
//     $form = $_SESSION['form'];
// } else {
//     header('Location: register.php');
//     exit();
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="./assets/styles/style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Comfirm</title>
</head>
<body>
    <div class="container w-50">
		<div class="card mt-3">
            <div class="card-header text-center">
                <h1>Comfirm</h1>
            </div>
            <div class="card-body">
                <p>Please confirm the information you have entered and click the "Register" button.</p>
                <form action="" method="post">
                    <dl>
                        <dt>Student ID Number</dt>
                        <dd><?php echo h($form['st_id']); ?></dd>
                        <dt>First name</dt>
                        <dd><?php echo h($form['first_name']); ?></dd>
                        <dt>Last name</dt>
                        <dd><?php echo h($form['last_name']); ?></dd>
                        <dt>Contact number</dt>
                        <dd><?php echo h($form['contact_no']); ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo h($form['email']); ?></dd>
                        <dt>Password</dt>
                        <dd>【Not displayed.】</dd>
                        <dt>Photo</dt>
                        <dd>
                            <img src="./accounts_pictures/<?php echo h($form['image']); ?>" width="100" alt="" >
                        </dd>
                    </dl>
                    <div><a href="register.php?action=rewrite">&laquo;&nbsp;Rewrite</a> | <input type="submit" value="Register" /></div>
                    
                    
                    
                </form>
            </div>
		</div>

		

	</div>
</body>

</html>
</html>