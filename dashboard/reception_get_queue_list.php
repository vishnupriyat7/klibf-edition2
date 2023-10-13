<?php
include "z_db.php";
if (isset($_POST['day_id'])) {
    $day_id = $_POST['day_id'];
    $query = "SELECT q.*, ed.*, qs.* FROM queue q JOIN event_date ed on q.date_id = ed.id JOIN queue_slot qs on q.slot_id = qs.id WHERE ed.id = $day_id";
    $queueList = mysqli_query($con, $query);

    // Perform some processing to get the queue data based on the day_id.
    // You can replace the following with your actual database query or any other logic to fetch the data.
    var_dump($day_id);

    // $queueData = array(
    //     array(
    //         'patient_name' => 'John Doe',
    //         'appointment_time' => '10:00 AM',
    //     ),
    //     array(
    //         'patient_name' => 'Jane Smith',
    //         'appointment_time' => '11:30 AM',
    //     ),
    //     // Add more data as needed
    // );

    // // Return the data as a JSON response
    // echo json_encode($queueData);
} else {
    // Handle the case where 'day_id' is not set in the POST request
    echo json_encode(array('error' => 'Day ID not provided'));
}
?>
<!-- var_dump($_POST('day_id'));die; -->