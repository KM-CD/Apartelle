<?php
include_once 'admin/include/class.user.php'; 
$user = new User();

// Check if room ID is provided in the URL
if(isset($_GET['id'])) {
    $room_id = $_GET['id'];

    // Perform the deletion operation
    $sql = "DELETE FROM rooms WHERE room_id = $room_id";
    $result = mysqli_query($user->db, $sql);

    if($result) {
        // Deletion successful
        echo "Room booking deleted successfully.";
    } else {
        // Error in deletion
        echo "Error deleting room booking.";
    }
} else {
    // Room ID not provided
    echo "Room ID not specified for deletion.";
}

// Redirect back to the original page after deletion
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
?>