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
    <title>Add couselor</title>
</head>
<body>
    <?php  
    include('admin-menu-bar.php'); 
    ?>
    <div class="container-fluid">
        <h1 class="counselor">Add Counselor</h1>
        <form class="container-fluid" action="../actions/counselor.php" method="post" >
            <div class="mb-3">
                <label for="csl-first-name" class="rsv-label">1. First name</label>
                <input type="text"  class="form-control" name="csl_first_name" id="csl-first-name" placeholder="first name">
                <label for="csl-last-name" class="rsv-label">2. Last name</label>
                <input type="text"  class="form-control" name="csl_last_name" id="csl-last-name" placeholder="last name">
                <label for="csl-last-name" class="rsv-label">3. Note</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="csl_note" id="csl-note" rows="3" placeholder="Note"></textarea>
            </div>
            <div class="d-grid gap-2">                
                <input type="submit" class="btn-primary" value="Add Counselor">
                <a href="#" class="btn btn-secondary">Cansel</a>
            </div>
                           
        </form>

        

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "../classes/counselor.php";
                $counselor = new Counselor;
                $csl_list = $counselor->getAllCounselors();
                while($csl_details = $csl_list->fetch_assoc()): ?>
                <tr>
                    <td><?= $csl_details['csl_id'] ?></td>
                    <td><?= $csl_details['csl_first_name'] ?></td>
                    <td><?= $csl_details['csl_last_name'] ?></td>
                    <td><?= $csl_details['csl_note'] ?></td>
                </tr>
                <?php endwhile; ?>                
            </tbody>

        </table>
    </div>
    
    
</body>
</html>