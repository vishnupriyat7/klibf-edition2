<?php
include "z_db.php";
if (isset($_POST['day_id'])) {
    $day_id = $_POST['day_id'];
    $query = "SELECT q.*, ed.*, qs.* FROM queue q JOIN event_date ed on q.date_id = ed.id JOIN queue_slot qs on q.slot_id = qs.id WHERE ed.id = $day_id";
    $queueList = mysqli_query($con, $query);
    $counter = 0;
    $result = "";
    while ($queue = mysqli_fetch_array($queueList)) {
        $id = "$queue[id]";
        $inst_name = "$queue[inst_name]";
        $inst_addr = "$queue[inst_addr]";
        $cntct_name1 = "$queue[cntct_name1]";
        $cntct_name2 = "$queue[cntct_name2]";
        $cntct_no1 = "$queue[cntct_no1]";
        $cntct_no2 = "$queue[cntct_no2]";
        $email = "$queue[email]";
        $count = "$queue[count]";
        $event_date = "$queue[event_date]";
        $event_day = "$queue[event_day]";
        $slot_time = "$queue[slot_time]";
        $slot_name = "$queue[slot_name]";
        $booked_date = "$queue[booked_date]";
        ++$counter;
        $result = $result . "<tr>
            <td>
               $counter
            </td>
            <td>
                $inst_addr
            </td>
            <td>
                $inst_name 
            </td>
            <td>
                $cntct_name1 
            </td>
            <td>
                $cntct_no1
            </td>
            <td>
                $cntct_name2 
            </td>
            <td>
                $cntct_no2
            </td>
            <td>
                $email
            </td>
            <td>
                $count 
            </td>            
            <td>
               $slot_time - $slot_name 
            </td>
        </tr>";
    }

    // Perform some processing to get the queue data based on the day_id.
    // You can replace the following with your actual database query or any other logic to fetch the data.
    // var_dump($day_id);

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
    echo json_encode($result);
} else {
    // Handle the case where 'day_id' is not set in the POST request
    echo json_encode(array('error' => 'Day ID not provided'));
}
