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
            margin-top: 20px;
            padding: 15px;
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
        h3 {
            color: #ffbb2b;
        }
        p {
            color: #fff;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="img-responsive" src="images/apartelle.png" style="width:100%; height:180px;">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li><a href="reservation.php">Online Reservation</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://www.facebook.com/profile.php?id=100064205496998"><img src="images/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>                    
                </ul>
            </div>
        </nav>

        <?php
        include_once 'admin/include/class.user.php'; 
        $user = new User(); 

        // Fetch reservation data from the database
        $sql = "SELECT * FROM rooms";
        $result = mysqli_query($user->db, $sql);

        // Display each reservation review in a separate container
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                echo "
                    <div class='well'>
                        <h3>Reservation Review</h3>
                        <p><strong>Booking ID:</strong> ".$row['room_id']."</p>
                        <p><strong>Room Name:</strong> ".$row['room_cat']."</p>
                        <p><strong>Check-in Date:</strong> ".$row['checkin']."</p>
                        <p><strong>Check-out Date:</strong> ".$row['checkout']."</p>
                        <p><strong>Name:</strong> ".$row['name']."</p>
                        <p><strong>Phone:</strong> ".$row['phone']."</p>
                    </div>";
            }
        } else {
            echo "<div class='well'>No reservations found.</div>";
        }
        ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>