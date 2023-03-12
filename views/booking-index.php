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
    <title>Booking Index</title>
</head>
<body>
    <?php  
    include('admin-menu-bar.php'); 
    ?>
    <div class="container-fluid">
        <h1 class="counselor">Booking Index</h1>   

        

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Counselor Name</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "../classes/booking.php";
                $booking = new Booking;
                $bk_list = $booking->getAllBookings();
                while($bk_details = $bk_list->fetch_assoc()): ?>
                <tr>
                    <td><?= $bk_details['bk_id'] ?></td>
                    <td><?= $bk_details['bk_date'] ?></td>
                    <td><?= $bk_details['bk_time'] ?></td>
                    <td><?= $bk_details['csl_first_name'].$bk_details['csl_last_name'] ?></td>
                    <td><?= $bk_details['first_name'].$bk_details['last_name'] ?></td>
                    <td><?= $bk_details['bk_note'] ?></td>
                </tr>
                <?php endwhile; ?>                
            </tbody>

        </table>
    </div>
    
    
</body>
</html>