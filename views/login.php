<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="./assets/styles/style.css">
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
                <form action="../actions/login.php" method="post">
                    <label for="student-id" class="small">Student ID Number</label>
                    <input type="text" name="student_id" class="form-control mb-2" autofocus pattern="^[0-9a-zA-Z]+$" value="" required>

                    <label for="password" class="small">Password</label>
                    <input type="password" name="password" class="form-control mb-5" minlength="5" required>

                    <input type="submit" value="Log in" name="btn_log_in" class="btn btn-primary w-100" required>

                </form>
                <p class="text-center mt-3 small">Don't have an account <a href="register.php" class="text-decoration-none">create one here</p>
            </div>
        </div>
    </div>
    
</body>
</html>