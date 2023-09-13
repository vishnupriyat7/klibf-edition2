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
                    <div class="card" style="width: 120%;">
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
                                        <th data-ordering="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT up.*, sb.*, ch.*, ch.id as chid FROM users_profile up JOIN stall_booking sb ON up.user_id = sb.user_id JOIN challan ch ON up.user_id = ch.user_id ORDER BY up.id DESC";
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
                                                <img src="data:image/jpg;charset=utf8;base64,<?= $challan_image; ?>" height="70vh" onclick="enlargeImage(this)" style="cursor: pointer;">
                                            </td>
                                            <div id="enlarged-image-container" style="display: none;">
                                                <img id="enlarged-image" src="" alt="Enlarged Image" style="max-width: 90%; max-height: 90vh;">
                                            </div>

                                            <td>

                                                <?php
                                                $query = "SELECT * FROM challan where id= '$book[chid]'";
                                                $challan_dtls = mysqli_query($con, $query);
                                                $challan_dtls_row = mysqli_fetch_row($challan_dtls);
                                                if ($challan_dtls_row[10] == 'A') { ?>
                                                    <button class="btn btn-success">Approved</button>

                                                <?php } else { ?>

                                                    <a href='update_finance_stall_report.php?id=<?= $book["chid"] ?>' class='dropdown-item remove-item-btn' <?= $btnenbl; ?>>
                                                        <button class="btn btn-primary"> <i class='ri-user-follow-fill align-bottom me-2 text-white'></i> <span class="text-white">Verify / Approve</span></button>
                                                    </a>
                                                <?php   }
                                                ?>
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

        function enlargeImage(clickedImage) {
            // Get the source of the clicked image
            var imageSource = clickedImage.src;

            // Get references to the enlarged image and its container
            var enlargedImage = document.getElementById("enlarged-image");
            var enlargedImageContainer = document.getElementById("enlarged-image-container");

            // Set the source of the enlarged image
            enlargedImage.src = imageSource;

            // Show the enlarged image container
            enlargedImageContainer.style.display = "block";

            // Close the enlarged image on click
            enlargedImage.onclick = function() {
                enlargedImageContainer.style.display = "none";
            };
        }
    </script>