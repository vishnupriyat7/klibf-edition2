<?php
include "config.php";
$date_id = $_POST['date'];
$query_slot = "select * from queue_slot";
$result_slot = mysqli_query($conn, $query_slot);
$slots = $result_slot->fetch_all();
// var_dump($slots);
foreach ($slots as $slot) {
    $query_count = "select sum(count) from queue where date_id = $date_id and slot_id = $slot[0]";
    $result_count = mysqli_query($conn, $query_count);
    $queue_count = $result_count->fetch_all();
    $queue_slot_avail[] = array("id" => $slot[0], "slot" => $slot[1], "count" => $queue_count[0][0]);
}
header("Content-Type: application/json");
echo json_encode($queue_slot_avail);
