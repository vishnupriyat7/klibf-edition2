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
                            <h5 class="card-title mb-0">Payment Chellan Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'stallpaymentreport-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        <th data-ordering="false">Action</th>
                                        <th data-ordering="false">Organization Name</th>
                                        <th data-ordering="false">GST Number</th>
                                        <th data-ordering="false">Contact Person Name</th>
                                        <th data-ordering="false">Contact Person Mobile</th>
                                        <th data-ordering="false">Contact Person Email</th>
                                        <th data-ordering="false">Stalls 3X3</th>
                                        <th data-ordering="false">Stalls 3X2</th>
                                        <th data-ordering="false">Rate</th>
                                        <th data-ordering="false">GST</th>
                                        <th data-ordering="false">Total Amount to be Paid</th>
                                        <th data-ordering="false">Paid Amount</th>
                                        <th data-ordering="false">Payee Name</th>
                                        <th data-ordering="false">Bank Name</th>
                                        <th data-ordering="false">IFSC</th>
                                        <th data-ordering="false">Transaction Type</th>
                                        <th data-ordering="false">Transaction Number</th>
                                        <th data-ordering="false">Transaction Date</th>
                                        <th data-ordering="false">Challan Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT up.*, sb.*, ch.user_id, ch.bank_name, ch.paid_amt, ch.trnctn_no, ch.trnctn_type, ch.trnctn_date, ch.paye_name, ch.ifsc, ch.status, ch.updated_date, ch.invoice_no, ch.id as chid FROM users_profile up JOIN stall_booking sb ON up.user_id = sb.user_id JOIN challan ch ON up.user_id = ch.user_id ORDER BY up.id DESC";
                                    $bookstall = mysqli_query($con, $query);
                                    $counter = 0;
                                    while ($book = mysqli_fetch_array($bookstall)) {
                                        $id = "$book[id]";
                                        $amt3x3 = 10000;
                                        $amt3x2 = 7500;
                                        $pub_user_id = "$book[user_id]";
                                        $org_name = "$book[org_name]";
                                        $gst_no = "$book[gst_no]";
                                        $cntct_prsn_name = "$book[cntct_prsn_name]";
                                        $cntct_prsn_addr = "$book[cntct_prsn_addr]";
                                        $cntct_prsn_mobile = "$book[cntct_prsn_mobile]";
                                        $cntct_prsn_email = "$book[cntct_prsn_email]";
                                        $cntct_prsn_watsapp = "$book[cntct_prsn_watsapp]";
                                        $alloted_stall3x3 = "$book[confirm_3X3]";
                                        $alloted_stall3x2 = "$book[confirm_3X2]";
                                        $rate = ($amt3x3 * $alloted_stall3x3) + ($amt3x2 *  $alloted_stall3x2);
                                        $gst = ($amt3x3 * $alloted_stall3x3 * 18 / 100) + ($amt3x2 *  $alloted_stall3x2 * 18 / 100);
                                        $amounttobe_paid = $gst + $rate;
                                        $paid_amount = "$book[paid_amt]";
                                        $payee_name = "$book[paye_name]";
                                        $bank_name = "$book[bank_name]";
                                        $ifsc = "$book[ifsc]";
                                        $transaction_natr = "$book[trnctn_type]";
                                        if ($transaction_natr == 'O') {
                                            $transaction_type = "Online Transaction";
                                        } else {
                                            $transaction_type = "Offline Transaction";
                                        }
                                        $transaction_number = "$book[trnctn_no]";
                                        $transaction_date = "$book[trnctn_date]";
                                        $status = $book["status"];
                                        $chellan_id = $book["chid"];
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>
                                            <td>
                                                <?php if ($status == 'A') { ?>
                                                    <button class="btn btn-success">Approved</button>
                                                <?php } else { ?>
                                                    <?php if ($user['user_type'] != 'PC') { ?>
                                                        <a href='finance_stall_report_update.php?id=<?= $chellan_id ?>' class='dropdown-item remove-item-btn' <?= $btnenbl; ?>>
                                                            <button class="btn btn-primary"> <i class='ri-user-follow-fill align-bottom me-2 text-white'></i> <span class="text-white">Verify / Approve</span></button>
                                                        </a>
                                                    <?php } ?>
                                                <?php   }
                                                ?>
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