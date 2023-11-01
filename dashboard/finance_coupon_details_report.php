<?php include "header.php"; ?>
<?php if ($user['user_type'] == 'FC') {
    include "finance_sidebar.php";
} else {
    include "pgmcmtee_sidebar.php";
}
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
                    <div class="card" style="width: 250%;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Coupon Details Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'stallpaymentreport-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        <th data-ordering="false">Publisher Name</th>
                                        <th data-ordering="false">200 Coupon</th>
                                        <th data-ordering="false">100 Coupon</th>
                                        <th data-ordering="false">50 Coupon</th>
                                        <th data-ordering="false">Coupon Serial Number</th>
                                        <th data-ordering="false">Total No.of Coupon</th>
                                        <th data-ordering="false">Total Amount</th>
                                        <th data-ordering="false">Bank Name</th>
                                        <th data-ordering="false">IFSC</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT up.*, sb.*, ch.user_id, ch.bank_name, ch.paid_amt, ch.trnctn_no, ch.trnctn_type, ch.trnctn_date, ch.paye_name, ch.ifsc, ch.status, ch.updated_date, ch.invoice_no, ch.id as chid FROM users_profile up JOIN stall_booking sb ON up.user_id = sb.user_id JOIN challan ch ON up.user_id = ch.user_id ORDER BY up.id DESC";
                                    $coupon_detls = mysqli_query($con, $query);
                                    $counter = 0;
                                    while ($coupon = mysqli_fetch_array($coupon_detls)) {
                                        $id = "$coupon[id]";
                                        // var_dump($id);
                                        $amt3x3 = 10000;
                                        $amt3x2 = 7500;
                                        $pub_user_id = "$coupon[user_id]";
                                        $org_name = "$coupon[org_name]";
                                        $gst_no = "$coupon[gst_no]";
                                        $cntct_prsn_name = "$coupon[cntct_prsn_name]";
                                        $cntct_prsn_addr = "$coupon[cntct_prsn_addr]";
                                        $cntct_prsn_mobile = "$coupon[cntct_prsn_mobile]";
                                        $cntct_prsn_email = "$coupon[cntct_prsn_email]";
                                        $cntct_prsn_watsapp = "$coupon[cntct_prsn_watsapp]";
                                        $alloted_stall3x3 = "$coupon[confirm_3X3]";
                                        $alloted_stall3x2 = "$coupon[confirm_3X2]";
                                        $rate = ($amt3x3 * $alloted_stall3x3) + ($amt3x2 *  $alloted_stall3x2);
                                        $gst = ($amt3x3 * $alloted_stall3x3 * 18 / 100) + ($amt3x2 *  $alloted_stall3x2 * 18 / 100);
                                        $amounttobe_paid = $gst + $rate;
                                        $paid_amount = "$coupon[paid_amt]";
                                        $payee_name = "$coupon[paye_name]";
                                        $bank_name = "$coupon[bank_name]";
                                        $ifsc = "$coupon[ifsc]";
                                        $transaction_natr = "$coupon[trnctn_type]";
                                        if ($transaction_natr == 'O') {
                                            $transaction_type = "Online Transaction";
                                        } else {
                                            $transaction_type = "Offline Transaction";
                                        }
                                        $transaction_number = "$coupon[trnctn_no]";
                                        $transaction_date = "$coupon[trnctn_date]";
                                        $status = $coupon["status"];
                                        $chellan_id = $coupon["chid"];
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>

                                            <td>
                                                <?= $org_name; ?>
                                            </td>
                                            <td>
                                                <?= $gst_no; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_prsn_name; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_prsn_mobile; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_prsn_email; ?>
                                            </td>
                                            <td>
                                                <?= $alloted_stall3x3; ?>
                                            </td>
                                            <td>
                                                <?= $alloted_stall3x2; ?>
                                            </td>
                                            <td>
                                                <?= $rate; ?>
                                            </td>
                                            <td>
                                                <?= $gst; ?>
                                            </td>
                                            <td>
                                                <?= $amounttobe_paid; ?>
                                            </td>
                                            <td>
                                                <?= $paid_amount; ?>
                                            </td>
                                            <td>
                                                <?= $payee_name; ?>
                                            </td>
                                            <td>
                                                <?= $bank_name; ?>
                                            </td>
                                            <td>
                                                <?= $ifsc; ?>
                                            </td>
                                            <td>
                                                <?= $transaction_type; ?>
                                            </td>
                                            <td>
                                                <?= $transaction_number; ?>
                                            </td>
                                            <td>
                                                <?= $transaction_date; ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal<?= $id; ?>">View</button>
                                                <div class="modal" id="myModal<?= $id; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?= $org_name; ?></h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php
                                                                $imgQuery = "select challan_img from challan where id = $chellan_id";
                                                                $imgStmt = mysqli_query($con, $imgQuery);
                                                                $challan_image = $imgStmt->fetch_assoc();
                                                                $img_chellan = base64_encode($challan_image["challan_img"]);
                                                                ?>
                                                                <img src="data:image/jpg;charset=utf8;base64,<?= $img_chellan; ?>" height="auto" width="auto" style="max-width: 100%;" class="hover-image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php  }  ?>
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
<?php include "footer.php"; ?>