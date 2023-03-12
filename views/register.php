
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
                <form action="../actions/register.php" method="post" enctype="multipart/form-data">
                    <label for="st-id" class="form-label">Student ID number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control mb-3" name="student_id" max="7" value="" required>

                    <div class="row">
                        <div class="col">
                            <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" name="first_name" value="" required>
                        </div>
                        <div class="col">
                            <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" name="last_name" value="" required>                            
                        </div>
                    </div>
                    
                    <label for="contact-no" class="form-label">Contact Number <span class="text-danger">*</span></label>
                    <input type="number" class="form-control mb-3" name="contact_no" id="contact-no" value="" required>
                    
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control mb-3" name="email" id="email" value="" required>
  
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control mb-3" name="password" id="password" value=""  minlength="5" required>

                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" name="image" size="35" value="">
                                        
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