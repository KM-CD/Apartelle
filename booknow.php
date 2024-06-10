<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APARTELLE RESERVATION</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        label {
            color: #ffbb2b;
            font-size: 13px;
            font-weight: 100;
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li class="active"><a href="reservation.php">Online Reservation</a></li>

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

        $roomname = $_GET['roomname'];

        if(isset($_REQUEST['submit'])) {
            extract($_REQUEST); 
            $checkinDate = strtotime($checkin);
            $currentDate = time();
            if($checkinDate < $currentDate) {
                echo "<script type='text/javascript'>alert('Error: Check-in date cannot be before the current date.');</script>";
            } else {
                $result = $user->booknow($checkin, $checkout, $name, $phone, $roomname);
                if($result) {
                    echo "<script type='text/javascript'>alert('".$result."');</script>";
                }
            }
        }
        ?>

        <div class="well">
            <h2>Book Now: <?php echo $roomname; ?></h2>
            <hr>
            <form action="" method="post" name="room_category" onsubmit="return validateDates()">
                <div class="form-group">
                    <label for="checkin">Check In:</label>&nbsp;&nbsp;&nbsp;
                    <input type="date" class="datepicker" name="checkin">
                </div>
                <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="date" class="datepicker" name="checkout">
                </div>
                <div class="form-group">
                    <label for="name">Enter Your Full Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="John Wick" required>
                </div>
                <div class="form-group">
                    <label for="phone">Enter Your Phone Number:</label>
                    <input type="text" class="form-control" name="phone" placeholder="018XXXXXXX" required>
                </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Book Now</button>
                <br>
                <div id="click_here">
                    <a href="admin.php">Back to Home</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateDates() {
            var checkinDate = new Date(document.getElementsByName("checkin")[0].value);
            var currentDate = new Date();
            if (checkinDate < currentDate) {
                alert("Error: Check-in date cannot be before the current date.");
                return false;
            }
            return true;
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>