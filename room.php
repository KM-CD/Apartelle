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
            height: 200px;
        }
        
        body {
            background-image: url('images/d_y.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
        
        h4 {
            color: #ffbb2b;
        }
        h6 {
            color: navajowhite;
            font-family: monospace;
        }
        span {
            color: #ffbb2b;
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
                    <li><a href="review.php">Review</a></li>
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
        $sql = "SELECT * FROM room_category";
        $result = mysqli_query($user->db, $sql);
        
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    // Display room details with price
                    echo "
                        <div class='row'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 well'>
                                <h4>".$row['roomname']."</h4><hr>
                                <h6><span>No of Beds:</span> ".$row['no_bed']." ".$row['bedtype']." bed.</h6>
                                <h6><span>Facilities:</span> ".$row['facility']."</h6>
                                <h6><span>Price:</span> ".$row['price']." </h6>
                            </div>
                            <div class='col-md-3'>
                                <a href='./booknow.php?roomname=".$row['roomname']."'><button class='btn btn-primary button'>Book Now</button></a>
                            </div>   
                        </div>";
                }
            } else {
                echo "NO Data Exist";
            }
        } else {
            echo "Cannot connect to server".$result;
        }
        ?>

        <div style="text-align: center; margin-top: 20px;">
            <a href="admin.php">Back to admin</a>
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>