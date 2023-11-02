<?php include "header.php"; ?>
<?php include "publisher_sidebar.php"; ?>

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
                            <h5 class="card-title mb-0">Publisher Coupon List</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'publisher_book_discussion_report-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead class="text-center">
                                    <tr>
                                        <th data-ordering="false" rowspan="2">Sl.No</th>
                                        <th data-ordering="false" rowspan="2">Invoice No.</th>
                                        <th data-ordering="false" colspan="2">Coupon 50 </th>

                                        <th data-ordering="false" colspan="2">Coupon 100</th>

                                        <th data-ordering="false" colspan="2">Coupon 200</th>

                                        <th data-ordering="false" rowspan="2">Amount</th>
                                        <!-- <th data-ordering="false" rowspan="2">Bank Name</th>
                                        <th data-ordering="false" rowspan="2">Branch</th>
                                        <th data-ordering="false" rowspan="2">Account Number</th>
                                        <th data-ordering="false" rowspan="2">IFSC</th> -->
                                        <!-- <th data-ordering="false" rowspan="2">Action</th> -->
                                    </tr>
                                    <tr>

                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Sl.No </th>
                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Sl.No </th>
                                        <th data-ordering="false">Count</th>
                                        <th data-ordering="false">Sl.No </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $userId = $user['id'];
                                    $querycoupon = "SELECT cp.*, cb.*  FROM coupon_publisher cp JOIN  coupon_bankdtls cb ON cp.users_id = cb.users_id WHERE cp.users_id = $userId ORDER BY cp.id DESC";
                                    $couponlist = mysqli_query($con, $querycoupon);
                                    $counter = 0;
                                    while ($coupon = mysqli_fetch_array($couponlist)) {
                                        $id = $coupon['id'];
                                        $couponinvoice = $coupon['cpn_bill_no'];
                                        $coupon50ct = $coupon['cpn_50_count'];
                                        $coupon50slno = $coupon['cpn_50_srlno'];
                                        $coupon100ct = $coupon['cpn_100_count'];
                                        $coupon100slno = $coupon['cpn_100_srlno'];
                                        $coupon200ct = $coupon['cpn_200_count'];
                                        $coupon200slno = $coupon['cpn_200_srlno'];
                                        $coupontotal = $coupon['total_amount'];
                                        // $bankname = $coupon['bank_name'];
                                        // $account_no = $coupon['account_no'];
                                        // $bank_ifsc = $coupon['bank_ifsc'];
                                        // $bank_branch = $coupon['bank_branch'];

                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>

                                            <td>
                                                <?= $couponinvoice; ?>
                                            </td>
                                            <td>
                                                <?= $coupon50ct; ?>
                                            </td>
                                            <td>
                                                <?= $coupon50slno; ?>
                                            </td>

                                            <td>
                                                <?= $coupon100ct; ?>
                                            </td>

                                            <td>
                                                <?= $coupon100slno; ?>
                                            </td>
                                            <td>
                                                <?= $coupon200ct; ?>
                                            </td>
                                            <td>
                                                <?= $coupon200slno; ?>
                                            </td>
                                            <td>
                                                <?= $coupontotal; ?>
                                            </td>
                                            <!-- <td>
                                                <?= $bankname; ?>
                                            </td>
                                            <td>
                                                <?= $account_no; ?>
                                            </td>
                                            <td>
                                                <?= $bank_ifsc; ?>
                                            </td>
                                            <td>
                                                <?= $bank_branch; ?>
                                            </td> -->
                                            <!-- <td>

                                                <a href='publisher_bookrelease.php?bkrlsid=<?= $id; ?>' class='dropdown-item edit-item-btn'>
                                                    <button class="btn btn-primary"> <i class='ri-edit-box-fill align-bottom me-2 text-white'></i> Edit</button>
                                                </a>


                                            </td> -->

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