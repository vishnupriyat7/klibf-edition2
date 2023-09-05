<?php include "header.php"; ?>
<?php include "pgmcmtee_sidebar.php"; ?>

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
                    <div class="card" style="width: 170%;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Special Event Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'special_event_report-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        <th data-ordering="false">Name of Organization</th>
                                        <th data-ordering="false">Name of Event</th>
                                        <th data-ordering="false">Brief Description of Event</th>
                                        <th data-ordering="false">Dignitaries / Celebrities / Guests</th>
                                        <th data-ordering="false">Contact Person Name</th>
                                        <th data-ordering="false">Email Id</th>
                                        <th data-ordering="false">Contact No.</th>
                                        <th data-ordering="false">Remarks / Other Information</th>


                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $userId = $user['id'];

                                    // $queryspclevntprpsl = "SELECT * FROM event_propsl_bkrls epb join day_time_prefer dtp on epb.id = dtp.book_rls_id where epb.users_id = '$userId' ORDER BY epb.id DESC";


                                    $queryspclevntprpsl = "SELECT up.org_name, epb.* FROM special_event_propsl epb 
                                    join users_profile up on epb.users_id = up.user_id
                                    ORDER BY epb.id DESC";
                                    // var_dump($queryspclevntprpsl);

                                    $spclevntprpsl = mysqli_query($con, $queryspclevntprpsl);
                                    // var_dump($spclevntprpsl);
                                    $counter = 0;
                                    while ($spclevnt = mysqli_fetch_array($spclevntprpsl)) {
                                        $id = $spclevnt['id'];
                                        $org_name = $spclevnt['org_name'];
                                        $event_name = $spclevnt['event_name'];
                                        $event_brf_description = $spclevnt['event_brf_description'];
                                        $digniteries_guests = $spclevnt['digniteries_guests'];
                                        $event_contact_persn = $spclevnt['event_contact_persn'];
                                        $mobile = $spclevnt['mobile'];
                                        $email = $spclevnt['email'];
                                        $remarks = $spclevnt['remarks'];


                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>
                                            <td>
                                                <?= $org_name; ?>
                                            </td>
                                            <td>
                                                <?= $event_name; ?>
                                            </td>
                                            <td>
                                                <?= $event_brf_description; ?>
                                            </td>
                                            <td>
                                                <?= $digniteries_guests; ?>
                                            </td>
                                            <td>
                                                <?= $event_contact_persn; ?>
                                            </td>
                                            <td>
                                                <?= $email; ?>
                                            </td>

                                            <td>
                                                <?= $mobile; ?>
                                            </td>
                                            <td>
                                                <?= $remark; ?>
                                            </td>



                                            <td>
                                                <div class='dropdown d-inline-block'>
                                                    <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                        <i class='ri-more-fill align-middle'></i>
                                                    </button>
                                                    <ul class='dropdown-menu dropdown-menu-end'>
                                                        <!-- <li>
                                                            <a href='publisher_bookdiscussion.php?discid=<?= $id; ?>' class='dropdown-item edit-item-btn'>
                                                                <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Edit
                                                            </a>
                                                        </li> -->
                                                        <!-- <li>
                                                            <a href='deletesocial.php?id=$id' class='dropdown-item remove-item-btn'>
                                                                <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete
                                                            </a>
                                                        </li> -->
                                                        <li>
                                                            <?php
                                                            // $query = "SELECT * FROM users_profile where user_id='$id'";
                                                            // $profileusers = mysqli_query($con, $query);
                                                            // $user_profile_row = mysqli_fetch_row($profileusers);
                                                            // if ($user_profile_row) {
                                                            //     $btnenbl = "hidden";
                                                            // } else {
                                                            //     $btnenbl = "";
                                                            // }
                                                            ?>
                                                            <!-- <a href='' class='dropdown-item remove-item-btn'>
                                                                <i class='ri-delete-bin-fill align-bottom me-2 text-danger'></i>Delete
                                                            </a> -->
                                                        </li>
                                                    </ul>
                                                </div>
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