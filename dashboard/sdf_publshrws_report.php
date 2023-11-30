<?php include "header.php"; ?>
<?php if ($user['user_type'] == 'SD') {
    include "sdf_sidebar.php";
}
// else {
//     include "pgmcmtee_sidebar.php";
// }

function convertNumberToWordsForIndia($number)
{
    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
        '0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five',
        '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten',
        '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen',
        '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
        '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy',
        '80' => 'eighty', '90' => 'ninty',
    );

    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $received_number_array = array();

    //Store all received numbers into an array
    for ($i = 0; $i < $number_length; $i++) {
        $received_number_array[$i] = substr($number, $i, 1);
    }

    //Populate the empty array with the numbers received - most critical operation
    for ($i = 9 - $number_length, $j = 0; $i < 9; $i++, $j++) {
        $number_array[$i] = $received_number_array[$j];
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, pay-slip 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for ($i = 0, $j = 1; $i < 9; $i++, $j++) {
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
            if ($number_array[$j] == 0 || $number_array[$i] == "1") {
                $number_array[$j] = intval($number_array[$i]) * 10 + $number_array[$j];
                $number_array[$i] = 0;
            }
        }
    }

    $value = "";
    for ($i = 0; $i < 9; $i++) {
        if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
            $value = $number_array[$i] * 10;
        } else {
            $value = $number_array[$i];
        }
        if ($value != 0) {
            $number_to_words_string .= $words["$value"] . " ";
        }
        if ($i == 1 && $value != 0) {
            $number_to_words_string .= "Crores ";
        }
        if ($i == 3 && $value != 0) {
            $number_to_words_string .= "Lakhs ";
        }
        if ($i == 5 && $value != 0) {
            $number_to_words_string .= "Thousand ";
        }
        if ($i == 6 && $value != 0) {
            $number_to_words_string .= "Hundred ";
        }
    }
    if ($number_length > 9) {
        $number_to_words_string = "Sorry This does not support more than 99 Crores";
    }
    return ucwords(strtolower("Rupees " . $number_to_words_string) . " Only.");
}
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<style>
    #print-slip td {
        text-align: center !important;
        width: 10%;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Report</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li> -->
                                <!-- <li class="breadcrumb-item active">Add</li> -->
                                <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="width:100%">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Coupon Details Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="pay-slip" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('print-slip', 'stallpaymentreport-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="print-slip" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead class="text-center justify-content-center">
                                    <tr>
                                        <th data-ordering="false" rowspan="2">Sl.No</th>
                                        <th data-ordering="false" rowspan="2">Publisher Name</th>
                                        <th data-ordering="false" rowspan="2">Contact Number</th>
                                        <th data-ordering="false" colspan="2">50 Coupon</th>
                                        <th data-ordering="false" colspan="2">100 Coupon</th>
                                        <th data-ordering="false" colspan="2">200 Coupon</th>
                                        <th data-ordering="false" rowspan="2">Sub Total</th>
                                        <th data-ordering="false" colspan="4">Bank</th>
                                        <th data-ordering="false" rowspan="2">Action</th>


                                    </tr>
                                    <tr>
                                        <!-- <th data-ordering="false">Serial.No </th> -->
                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Amount</th>
                                        <!-- <th data-ordering="false">Serial.No </th> -->
                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Amount</th>
                                        <!-- <th data-ordering="false">Seril.No </th> -->
                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Amount</th>
                                        <th data-ordering="false">Name</th>
                                        <th data-ordering="false">Account No.</th>
                                        <th data-ordering="false">Branch </th>
                                        <th data-ordering="false">IFSC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $userId = $user['id'];
                                    $querycoupon = "SELECT up.fascia, up.cntct_prsn_mobile, up.head_org_addr, cp.id as cpid, cb.id as cbid, cp.*, cb.*  FROM coupon_publisher cp JOIN users_profile up ON cp.users_id = up.user_id JOIN  coupon_bankdtls cb ON cp.users_id = cb.users_id ORDER BY cp.id DESC";

                                    // $querycoupon = "SELECT cp.*, cb.*  FROM coupon_publisher cp JOIN  coupon_bankdtls cb ON cp.users_id = cb.users_id WHERE cp.users_id = $userId ORDER BY cp.id DESC";
                                    $couponlist = mysqli_query($con, $querycoupon);
                                    // var_dump($couponlist);
                                    $counter = 0;
                                    while ($coupon = mysqli_fetch_array($couponlist)) {
                                        $id = $coupon['cpid'];
                                        var_dump($id);
                                        $pub_name = $coupon['fascia'];
                                        $head_org_addr = $coupon['head_org_addr'];
                                        $capitalized_head_org_addr = ucfirst(strtolower($head_org_addr));
                                        // var_dump($capitalized_head_org_addr);
                                        $cntct_no = $coupon['cntct_prsn_mobile'];
                                        // var_dump($pub_name);
                                        // $couponinvoice = $coupon['cpn_bill_no'];
                                        $coupon50ct = $coupon['cpn_50_count'];
                                        // $coupon50slno = $coupon['cpn_50_srlno'];
                                        $coupon50amnt = $coupon50ct * 50;
                                        $formattedCoupon50amnt = number_format($coupon50amnt, 0, '', ',');
                                        // var_dump($formattedCoupon50amnt);
                                        $coupon100ct = $coupon['cpn_100_count'];
                                        // $coupon100slno = $coupon['cpn_100_srlno'];
                                        $coupon100amnt = $coupon100ct * 100;
                                        $formattedCoupon100amnt = number_format($coupon100amnt, 0, '', ',');
                                        // var_dump($formattedCoupon100amnt);
                                        $coupon200ct = $coupon['cpn_200_count'];
                                        // $coupon200slno = $coupon['cpn_200_srlno'];
                                        $coupon200amnt = $coupon200ct * 200;
                                        $formattedCoupon200amnt = number_format($coupon200amnt, 0, '', ',');
                                        // var_dump($formattedCoupon200amnt);
                                        // $coupontotalamnt = $coupon['total_amount'];
                                        $coupontotalamnt = $coupon50amnt + $coupon100amnt + $coupon200amnt;
                                        $formtd_coupontotalamnt = number_format($coupontotalamnt, 0, '', ',');
                                        $bankname = $coupon['bank_name'];
                                        $account_no = $coupon['account_no'];
                                        $bank_ifsc = $coupon['bank_ifsc'];
                                        $bank_branch = $coupon['bank_branch'];
                                        $totalinword = convertNumberToWordsForIndia($coupontotalamnt);

                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>
                                            <td>
                                                <?= $pub_name; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_no; ?>
                                            </td>

                                            <td>
                                                <?= $coupon50ct; ?>
                                            </td>
                                            <td>
                                                <?= $coupon50amnt; ?>
                                            </td>
                                            <td>
                                                <?= $coupon100ct; ?>
                                            </td>
                                            <td>
                                                <?= $coupon100amnt; ?>
                                            </td>

                                            <td>
                                                <?= $coupon200ct; ?>
                                            </td>
                                            <td>
                                                <?= $coupon200amnt; ?>
                                            </td>

                                            <td>
                                                <?= $coupontotalamnt; ?>
                                            </td>
                                            <td>
                                                <?= $bankname; ?>
                                            </td>
                                            <td>
                                                <?= $account_no; ?>
                                            </td>

                                            <td>
                                                <?= $bank_branch; ?>
                                            </td>
                                            <td>
                                                <?= $bank_ifsc; ?>
                                            </td>
                                            <td>
                                                <button name="print" class="btn btn-primary" id="pay-slip" onclick="printSlip(<?= $id; ?>)">Print Payment Slip</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!-- container-fluid -->
    </div>
</div>
<iframe id="print-frame" style="display: none;"></iframe>
<!-- End Page-content -->
<?php include "footer.php"; ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript">
    function printSlip(id) {
        alert(id);
        var pubName = <?php echo json_encode($pub_name) ?>;
        var head_org_addr = <?php echo json_encode($capitalized_head_org_addr) ?>;
        var cntct_no = <?php echo json_encode($cntct_no) ?>;
        var coupon50ct = <?php echo json_encode($coupon50ct) ?>;
        var coupon50amnt = <?php echo json_encode($formattedCoupon50amnt) ?>;
        var coupon100ct = <?php echo json_encode($coupon100ct) ?>;
        var coupon100amnt = <?php echo json_encode($formattedCoupon100amnt) ?>;
        var coupon200ct = <?php echo json_encode($coupon200ct) ?>;
        var coupon200amnt = <?php echo json_encode($formattedCoupon200amnt) ?>;
        var coupontotalamnt = <?php echo json_encode($formtd_coupontotalamnt) ?>;
        var bankname = <?php echo json_encode($bankname) ?>;
        var account_no = <?php echo json_encode($account_no) ?>;
        var bank_ifsc = <?php echo json_encode($bank_ifsc) ?>;
        var bank_branch = <?php echo json_encode($bank_branch) ?>;
        var totalinword = <?php echo json_encode($totalinword) ?>;
        // ... (other variables)
        var htmlContent = " ";
        var htmlContent = '<html><head><style>' +
            '@media print {' +
            '   table, th, td {' +
            '       border: none !important;' +
            '   }' +
            '   body {' +
            '       font-size: 10pt;' +
            '   }' +
            '}</style>' +
            '<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />' +
            '<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />' +
            '<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />' +
            '<link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />' +
            '</head><body><br><label><img src="assets/images/Logo_01.png" height="70vh" style="float: left;"></label>' +
            '<h3><b>PAYMENT DETAILS</b></h3><br><h4><b>Name of Publisher:&nbsp;&nbsp;' + pubName + '</h4>' +
            '<br><h4><b>Address:&nbsp;&nbsp;' + head_org_addr + '</h4><br><h4><b>Contact No:&nbsp;&nbsp;' + cntct_no + '</h4>' +
            '<br><h3><b>AMOUNT DETAILS</b></h3><table class="table table-info table-responsive" id="pay-slip">' +
            '<tr><th class="text-center">Denomination</th><th class="text-center">Count</th><th class="text-center">Amount(in ₹).</th></tr>' +
            '<tbody><tr><th class="text-center">50</th><td class="text-center">' + coupon50ct + '</td>' +
            '<td class="text-center">' + coupon50amnt + '</td></tr><tr><th class="text-center">100</th>' +
            '<td class="text-center">' + coupon100ct + '</td><td class="text-center">' + coupon100amnt + '</td></tr>' +
            '<tr><th class="text-center">200</th><td class="text-center">' + coupon200ct + '</td>' +
            '<td class="text-center">' + coupon200amnt + '</td></tr><tr><td colspan="2">Total amount payable (in ₹&nbsp;).</td>' +
            '<td><b>' + coupontotalamnt + '</b></td></tr><tr><td>Total amount payable (in words).</td>' +
            '<td><b>' + totalinword + '</b></td></tr></tbody></table><br><h4><b><u>Details of bank account to which payment is made:</u></b></h4>' +
            '<table class="table table-info table-responsive" id="pay-slip"><tr><td><b>Bank Name:</b></td>' +
            '<td>' + bankname + '</td></tr><tr><td><b>Branch:</b></td><td>' + bank_branch + '</td></tr>' +
            '<tr><td><b>Account Number:</b></td><td>' + account_no + '</td></tr><tr><td><b>IFSC</b></td>' +
            '<td colspan="1">' + bank_ifsc + '</td></tr></tbody></table><br><br>' +
            '<h4 style="float: end; text-align: right;"><b>VERIFIED</b></h4></body></html>';

        // var htmlContent = '<html><head> <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" /><link href="assets/css/app.min.css" rel="stylesheet" type="text/css" /><link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" /></head><body><br><label><img src="assets/images/Logo_01.png" height="70vh" style="float: left;"></label><h3><b>PAYMENT DETAILS</b></h3><br><h4><b>Name of Publisher:&nbsp;&nbsp;' + pubName + '</h4><br><h4><b>Address:&nbsp;&nbsp;' + head_org_addr + '</h4><br><h4><b>Contact No:&nbsp;&nbsp;'+ cntct_no +'</h4><br><h3><b>AMOUNT DETAILS</b></h3><table class="table table-info table-responsive" id="pay-slip"><tr><th class="text-center">Denomination</th><th class="text-center">Count</th><th class="text-center">Amount</th></tr><tbody><tr><th class="text-center">50</th><td class="text-center">' + coupon50ct + '</td><td class="text-center">' + coupon50amnt + '</td></tr><tr><th class="text-center">100</th><td class="text-center">' + coupon100ct + '</td><td class="text-center">' + coupon100amnt + '</td></tr><tr><th class="text-center">200</th><td class="text-center">' + coupon200ct + '</td><td class="text-center">' + coupon200amnt + '</td></tr><tr><td colspan="2">Total amount payable (in ₹&nbsp;).</td><td><b>' + coupontotalamnt + '</b></td></tr><tr><td>Total amount payable (in words).</td><td><b>' + totalinword + '</b></td></tr></tbody></table><br><h4><b><u>Details of bank account to which payment is made:</u></b></h4><table class="table table-info table-responsive" id="pay-slip"><tr><td><b>Bank Name:</b></td><td>' + bankname + '</td></tr><tr><td><b>Branch:</b></td><td>' + bank_branch + '</td></tr><tr><td><b>Account Number:</b></td><td>' + account_no + '</td></tr><tr><td><b>IFSC</b></td><td colspan="1">' + bank_ifsc + '</td></tr></tbody></table><br><br><h4 style="float: end; text-align: right;"><b>VERIFIED</b></h4></body></html>'

        var iframe = document.getElementById("print-frame");
        iframe.contentDocument.write(htmlContent);
        iframe.contentDocument.close();
        iframe.focus(); // Optional: focus on the iframe
        iframe.contentWindow.print();
        
    }
    
</script>