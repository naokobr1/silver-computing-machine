<?php
session_start();
require('./functions/user-function.php');
$error = [];
$st_id = '';
$password = '';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
   $st_id = filter_input(INPUT_POST, 'st_id', FILTER_SANITIZE_SPECIAL_CHARS);
   $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
   if($st_id === '' || $password === ''){
      $error['login'] = 'blank';
   } else {
      // ログインチェック
      $db = dbconnect();
      $stmt = $db->prepare('SELECT student_id, first_name, last_name, password FROM accounts WHERE student_id =? LIMIT 1');
      if(!$stmt){
         die($db->error);
      }
      $stmt->bind_param('s', $st_id);
      $success = $stmt->execute();
      if(!$success) {
         die($db->error);
      }
      //結果を受け取っていく
      $stmt->bind_result($st_id, $first_name, $last_name, $hashed_pw);
      $stmt->fetch();
      if(password_verify($password, $hashed_pw)){
         //ログイン成功
         session_regenerate_id(); //セッションIDを再生成する
         $_SESSION['st_id'] = $st_id;
         $_SESSION['first_name'] = $first_name;
         $_SESSION['last_name'] = $last_name;
         header('Location: icss-user-menu.php');
         exit();
      }else {
         $error['login'] = 'failed';
      }

   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<body class="bg-light">



    <div class="row h-100 m-0">
         
         <div class="card w-25 mt-5 mx-auto px-0">
            <div class="card-header bg-white">
               <h1 class="card-title text-center mb-0">Login</h1>
            </div>
            <div class="card-body">
               <!-- <?php
               //    if(isset($_POST['btn_log_in'])){

               //       login();
                 
               //   }

               ?> -->
               <form action="" method="post">
                  <label for="st-id" class="small">Student ID Number</label>
                  <input type="text" name="st_id" class="form-control mb-2" autofocus pattern="^[0-9a-zA-Z]+$" value="<?php echo h($st_id); ?>">
                  <?php if(isset($error['login']) && $error['login'] === 'blank'): ?>
                     <p class="error">* Enter your e-mail address and password.</p>
                  <?php endif; ?>
                  <?php if(isset($error['login']) && $error['login'] === 'failed'): ?>
                     <p class="error">* Login failed. Please fill in the form correctly.</p>
                  <?php endif; ?>
                  <label for="password" class="small">Password</label>
                  <input type="password" name="password" class="form-control mb-5" value="<?php echo h($password); ?>">

                  <button type="submit" name="btn_log_in" class="btn btn-primary w-100">Log in</button>
               </form>

            </div>
         </div>
      </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>