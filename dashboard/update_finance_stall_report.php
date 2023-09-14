<?php
header("refresh:2;url=finance_stall_payment_report.php");
include_once("z_db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page

$toupdate = mysqli_real_escape_string($con, $_GET["id"]);
// var_dump($toupdate);die;
$current_date = new DateTime();
$date = date_format($current_date, "Y-m-d H:i:s");


$max_value = "SELECT MAX(invoice_no) as invoice_no FROM challan";
$max_value_dtls =mysqli_query($con, $max_value);

$res_max_value = mysqli_fetch_row($max_value_dtls);

$invoice_maxval = $res_max_value[0];
$next_invoice_val = str_pad((int)$invoice_maxval + 1, strlen($invoice_maxval), "0", STR_PAD_LEFT);

// var_dump($invoice_maxval);die;
$result = mysqli_query($con, "UPDATE challan SET status = 'A', updated_date = '$date', 	invoice_no = '$next_invoice_val' WHERE id='$toupdate'");
if ($result) {
    print "<center> Stall Allotment Successfully Approved<br/>Redirecting in 2 seconds...</center>";
} else {
    print "<center>Action could not be performed, check back again<br/>Redirecting in 2 seconds...</center>";
}
