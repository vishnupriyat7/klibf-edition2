<?php include "header.php"; ?>
<?php include "finance_sidebar.php"; ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
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
                            <h5 class="card-title mb-0">Stall Booking Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'stallpaymentreport-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        <th data-ordering="false">Organization Name</th>

                                        <th data-ordering="false">GST Number</th>

                                        <th data-ordering="false">Contact Person Name</th>

                                        <th data-ordering="false">Contact Person Mobile</th>
                                        <th data-ordering="false">Contact Person Email</th>

                                        <th data-ordering="false">Number of Stalls Allotted 3X3</th>
                                        <th data-ordering="false">Number of Stalls Allotted 3X2</th>
                                        <th data-ordering="false">Payee Name</th>
                                        <th data-ordering="false">Bank Name</th>
                                        <th data-ordering="false">IFSC</th>
                                        <th data-ordering="false">Transaction Type</th>
                                        <th data-ordering="false">Transaction Number</th>
                                        <th data-ordering="false">Transaction Date</th>
                                        <th data-ordering="false">Challan Image</th>
                                        <th data-ordering="false">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT up.*, sb.*, ch.*  FROM users_profile up JOIN stall_booking sb ON up.user_id = sb.user_id JOIN challan ch ON up.user_id = ch.user_id ORDER BY up.id DESC";
                                    $bookstall = mysqli_query($con, $query);
                                    // var_dump(mysqli_fetch_array($bookstall));
                                    $counter = 0;
                                    while ($book = mysqli_fetch_array($bookstall)) {
                                        $id = "$book[id]";
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
                                        $challan_image = base64_encode($book['challan_img']);

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

                                                <img src="data:image/jpg;charset=utf8;base64,<?= $challan_image; ?>" height="70vh">
                                                <!-- <?= $logo; ?> -->

                                            </td>

                                            <td>
                                                <div class='dropdown d-inline-block'>
                                                    <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                        <i class='ri-more-fill align-middle'></i>
                                                    </button>
                                                    <ul class='dropdown-menu dropdown-menu-end'>
                                                        <!-- <li>
                                                            <a href='editstall_registration.php?id=$id' class='dropdown-item edit-item-btn'>
                                                                <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Edit
                                                                
                                                            </a>
                                                        </li> -->
                                                        <li>
                                                            <a href='deletesocial.php?id=$id' class='dropdown-item remove-item-btn'>
                                                                <i class='ri-check-double-fill align-bottom me-2 text-success'></i> Approve
                                                            </a>
                                                        </li>
                                                        <!-- <li>
                                                            <a href='deletestall_registration.php?id=<?= $id ?>' class='dropdown-item remove-item-btn'>
                                                                <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete
                                                            </a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php  }
                                    ?>
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
    <!-- End Page-content -->
    <?php include "footer.php"; ?>

    <script>
        function exportTableToExcel(example, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(example);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            // Specify file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';
            // Create download link element
            downloadLink = document.createElement("a");
            document.body.appendChild(downloadLink);
            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                // Setting the file name
                downloadLink.download = filename;
                //triggering the function
                downloadLink.click();
            }
        }
    </script>