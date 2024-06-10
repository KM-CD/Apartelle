<?php
include_once 'admin/include/class.user.php'; 
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APARTELLE RESERVATION</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <style>
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            padding: 15px;
            margin-top: 20px;
            color: #fff;
        }
        body {
            background-image: url('images/d_y.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        h4 {
            color: #ffbb2b;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h6 {
            color: navajowhite;
            font-family: monospace;
            margin-bottom: 5px;
        }
        .button-container {
            margin-top: 10px;
        }
        .button {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="img-responsive" src="images/apartelle.png" style="width:100%; height:180px;">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li class="active"><a href="reservation.php">View Reservation</a></li>

                   <li><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://www.facebook.com/profile.php?id=100064205496998"><img src="images/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>                    
                </ul>
            </div>
        </nav>

        <?php
        $sql = "SELECT * FROM rooms WHERE book='true'";
        $result = mysqli_query($user->db, $sql);

        if($result) {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo "
                        <div class='well'>
                            <h4>".$row['room_cat']."</h4>
                            <hr>
                            <h6>Check-in: ".$row['checkin']." | Check-out: ".$row['checkout']."</h6>
                            <h6>Name: ".$row['name']."</h6>
                            <h6>Phone: ".$row['phone']."</h6>
                            <h6>Booking Condition: ".$row['book']."</h6>
                            <div id='timer".$row['room_id']."'></div>
                            <div class='button-container'>
                                <a href='edit_all_room.php?id=".$row['room_id']."'><button class='btn btn-primary button'>Edit</button></a>
                                <a href='delete_room.php?id=".$row['room_id']."'><button class='btn btn-danger button'>Delete</button></a>
                            </div>
                        </div>";
                }
            } else {
                echo "<div class='well'>No Data Exist</div>";
            }
        } else {
            echo "<div class='well'>Cannot connect to server</div>";
        }
        ?>

        <div style="text-align: center; margin-top: 20px;">
            <a href="admin.php" class="btn btn-default">Back to Home</a>
        </div>
    </div>

    <script>
        // Calculate time remaining until check-out date
        function calculateTimeRemaining(checkoutDate, timerId) {
            var countDownDate = new Date(checkoutDate).getTime();
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));

            document.getElementById(timerId).innerHTML = "Time remaining until check-out: " + days + " days";
        }

        // Set timers for each check-out date
        <?php
        $result = mysqli_query($user->db, $sql);
        if($result) {
            while($row = mysqli_fetch_array($result)) {
                echo "calculateTimeRemaining('".$row['checkout']."', 'timer".$row['room_id']."');";
            }
        }
        ?>
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>