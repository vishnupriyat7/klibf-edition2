<?php
include "config.php";
$date_id = $_POST['date'];
$slot_id = $_POST['slot'];
$query_slot = "select sum(count) as tot_count from queue where date_id=$date_id and slot_id=$slot_id";
// var_dump($query_slot);
// die;
$result_slot = mysqli_query($conn, $query_slot);
$tot_count = $result_slot->fetch_all();
header("Content-Type: application/json");
echo json_encode($tot_count[0][0]);
// var_dump($tot_count[0][0]);
// $slots = $result_slot->fetch_all();
// foreach ($slots as $slot) {
//     $query_count = "select sum(count) from queue where date_id = $date_id and slot_id = $slot[0]";
//     $result_count = mysqli_query($con, $query_count);
//     $queue_count = $result_count->fetch_all();
//     $queue_slot_avail[] = array("id" => $slot[0], "slot" => $slot[1], "count" => $queue_count[0][0]);
// }
// header("Content-Type: application/json");
// echo json_encode($queue_slot_avail);
