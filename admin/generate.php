<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation Report</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .well {
            background: #343a40;
            color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }
        h4 {
            color: #ffc107;
            margin-top: 0;
        }
        p {
            margin-bottom: 5px;
        }
        .home-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include_once 'include/class.user.php'; 
        $user = new User();

        // Specify the check-out date for the report
        $checkoutDate = 'checkout'; // Update this with the desired check-out date

        // Query the database for reservations with the specified check-out date
        $sql = "SELECT * FROM rooms WHERE checkout = '$checkoutDate'";
        $result = mysqli_query($user->db, $sql);

        // Display the report
        if($result && mysqli_num_rows($result) > 0) {
            echo "<h2>Reservations with Check-out Date on $checkoutDate</h2>";
            while($row = mysqli_fetch_array($result)) {
                echo "<div class='well'>
                        <h4>Room Name: ".$row['room_cat']."</h4>
                        <p>Check-in Date: ".$row['checkin']."</p>
                        <p>Check-out Date: ".$row['checkout']."</p>
                        <p>Guest Name: ".$row['name']."</p>
                        <p>Phone Number: ".$row['phone']."</p>
                      </div>";
            }
        } else {
            echo "<div class='well'>No reservations with check-out date on $checkoutDate.</div>";
        }
        ?>
        <div class="home-button">
        <a href="../admin.php">Back to Admin Panel</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>