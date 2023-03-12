<?php
include "./functions/user-function.php";
session_start();
// $row = getUser($_SESSION['account_id']);

// if(isset($_POST['btn_update'])){
//     updateUser($_SESSION['account_id']);
// }
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
    <title>Profile</title>
</head>
<body>
    <!-- <?php
    // include 'user-menu.php';
    ?> -->

 

    <div class="profile-head container text-white p-4 ps-5">
        <h2 class="display"><i class="fas fa-user"></i>Profile</h2>
    </div>
        
    <main class="container">
        <form  method="post" enctype="multipart/form-data" class="my-5">
            <div class="row">
                <div class="col-8 px-5">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="first-name" class="form-label">First Name</label>
                            <input type="text" class="form-control mb-2" name="first_name" id="first-name" value="<?= $row['first_name'] ?>">
                        </div>
                        <div class="col-6">
                            <label for="last-name" class="form-label">Last Name</label>
                            <input type="text" class="form-control mb-2" name="last_name" id="last-name"  value="<?= $row['last_name'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control mb-2" name="address" id="address"  value="<?= $row['address'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="contact-no" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control mb-2" name="contact_no" id="contact-no" value="<?= $row['contact_number'] ?>"  >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control mb-2" name="username" id="username" value="<?= $row['username'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control mb-2" name="password" placeholder="Enter password to confirm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <button type="submit" name="btn_update" class="btn btn-primary w-100 mt-3">UPDATE</button>
                        </div>                    
                    </div>
                </div>
                <div class="col-4">
                    
                    <!-- <?php
                    // echo "<img src= './img/".$row['avatar']."'alt='" . $_SESSION['username']. "' class='card-img-top'>";
                    ?> -->
                    <input type="file" name="photo" class="form-control" id="formFile" accept="image/*">
                    <?php if(isset($error['image']) && $error['image'] === 'type'): ?>
                    <p class="error">* Please specify ".png" or ".jpeg" images for photos.</p>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </main>
        


</body>
</html>