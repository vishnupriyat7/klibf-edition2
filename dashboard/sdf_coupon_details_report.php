<?php include "header.php";?>
<?php if ($user['user_type'] == 'SD') {
    include "sdf_sidebar.php";
}
// else {
//     include "pgmcmtee_sidebar.php";
// }
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
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
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Coupon Details Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'stallpaymentreport-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead class="text-center justify-content-center">
                                    <tr>
                                        <th data-ordering="false" rowspan="2">Sl.No</th>
                                        <th data-ordering="false" rowspan="2">Publisher Name</th>
                                        <th data-ordering="false" rowspan="2">Invoice No.</th>
                                        <th data-ordering="false" colspan="3">50 Coupon</th>
                                        <th data-ordering="false" colspan="3">100 Coupon</th>
                                        <th data-ordering="false" colspan="3">200 Coupon</th>
                                        <th data-ordering="false" rowspan="2">Total No.of Coupon</th>
                                        <th data-ordering="false" rowspan="2">Total Amount</th>
                                        <!-- <th data-ordering="false" colspan="4">Bank</th> -->

                                    </tr>
                                    <tr>
                                        <th data-ordering="false">Serial.No </th>
                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Amount</th>
                                        <th data-ordering="false">Serial.No </th>
                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Amount</th>
                                        <th data-ordering="false">Seril.No </th>
                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Amount</th>
                                        <!-- <th data-ordering="false">Name</th>
                                        <th data-ordering="false">Account No</th>
                                        <th data-ordering="false">Branch </th>
                                        <th data-ordering="false">IFSC</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$userId = $user['id'];
$querycoupon = "SELECT up.fascia, cp.*, cb.*  FROM coupon_publisher cp JOIN users_profile up ON cp.users_id = up.user_id ORDER BY cp.id DESC";

// $querycoupon = "SELECT cp.*, cb.*  FROM coupon_publisher cp JOIN  coupon_bankdtls cb ON cp.users_id = cb.users_id WHERE cp.users_id = $userId ORDER BY cp.id DESC";
$couponlist = mysqli_query($con, $querycoupon);
$counter = 0;
while ($coupon = mysqli_fetch_array($couponlist)) {
    $id = $coupon['id'];
    $pub_name = $coupon['fascia'];
    // var_dump($pub_name);
    $couponinvoice = $coupon['cpn_bill_no'];
    $coupon50ct = $coupon['cpn_50_count'];
    $coupon50slno = $coupon['cpn_50_srlno'];
    $coupon50amnt = $coupon50ct * 50;
    $coupon100ct = $coupon['cpn_100_count'];
    $coupon100slno = $coupon['cpn_100_srlno'];
    $coupon100amnt = $coupon100ct * 50;
    $coupon200ct = $coupon['cpn_200_count'];
    $coupon200slno = $coupon['cpn_200_srlno'];
    $coupon200amnt = $coupon200ct * 50;
    $coupontotalamnt = $coupon['total_amount'];
    $coupontotal = $coupon50ct + $coupon100ct + $coupon200ct;
    // $bankname = $coupon['bank_name'];
    // $account_no = $coupon['account_no'];
    // $bank_ifsc = $coupon['bank_ifsc'];
    // $bank_branch = $coupon['bank_branch'];

    ?>
                                        <tr>
                                            <td>
                                                <?=++$counter;?>
                                            </td>
                                            <td>
                                                <?=$pub_name;?>
                                            </td>
                                            <td>
                                                <?=$couponinvoice;?>
                                            </td>
                                            <td>
                                                <?=$coupon50slno;?>
                                            </td>
                                            <td>
                                                <?=$coupon50ct;?>
                                            </td>
                                            <td>
                                                <?=$coupon50amnt;?>
                                            </td>

                                            <td>
                                                <?=$coupon100slno;?>
                                            </td>

                                            <td>
                                                <?=$coupon100ct;?>
                                            </td>
                                            <td>
                                                <?=$coupon100amnt;?>
                                            </td>
                                            <td>
                                                <?=$coupon200slno;?>
                                            </td>
                                            <td>
                                                <?=$coupon200ct;?>
                                            </td>
                                            <td>
                                                <?=$coupon200amnt;?>
                                            </td>
                                            <td>
                                                <?=$coupontotal;?>
                                            </td>

                                            <td>
                                                <?=$coupontotalamnt;?>
                                            </td>
                                            <!-- <td>
                                                <?=$bankname;?>
                                            </td>
                                            <td>
                                                <?=$account_no;?>
                                            </td>

                                            <td>
                                                <?=$bank_branch;?>
                                            </td>
                                            <td>
                                                <?=$bank_ifsc;?>
                                            </td> -->
                                           
                                        </tr>
                                    <?php }?>
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

<!-- End Page-content -->
<?php include "footer.php";?>