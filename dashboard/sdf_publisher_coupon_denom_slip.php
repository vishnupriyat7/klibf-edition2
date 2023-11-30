<?php
include "z_db.php";
if (isset($_POST['id'])) {
    // var_dump($_POST['id']);
    $cpnpubid = $_POST['id'];
    $querycpnPub = "SELECT up.fascia, up.cntct_prsn_mobile, up.head_org_addr, cp.id as cpid, cb.id as cbid, cp.*, cb.*  FROM coupon_publisher cp JOIN users_profile up ON cp.users_id = up.user_id JOIN  coupon_bankdtls cb ON cp.users_id = cb.users_id WHERE cp.id = '$cpnpubid'";
    // var_dump($querycpnPub);
    $couponpub = mysqli_query($con, $querycpnPub);
    
    echo json_encode(mysqli_fetch_array($couponpub));
}
