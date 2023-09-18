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
                    <div class="card" style="width:150%">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Special Event Proposal Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'special_event_proposal-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped overflow-auto" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        <th>Action</th>
                                        <th data-ordering="false">Name of Event</th>
                                        <th data-ordering="false">Dignitaries / Guests</th>
                                        <th data-ordering="false">Brief Discription</th>
                                        <th data-ordering="false">Contact Person Name</th>
                                        <th data-ordering="false">Contact No</th>
                                        <th data-ordering="false">Email Id</th>
                                        <th data-ordering="false">Remarks</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $userId = $user['id'];
                                    $querySpclEventProp = "SELECT * FROM special_event_propsl where users_id = '$userId' ORDER BY id DESC";
                                    $spclEventProps = mysqli_query($con, $querySpclEventProp);
                                    $counter = 0;
                                    while ($spclEventProp = mysqli_fetch_array($spclEventProps)) {
                                        $id = $spclEventProp['id'];
                                        $event_name = $spclEventProp['event_name'];
                                        $eventDescription = $spclEventProp['event_brf_description'];
                                        $guests = $spclEventProp['digniteries_guests'];
                                        $cntct_name = $spclEventProp['event_contact_persn'];
                                        $cntct_phno = $spclEventProp['mobile'];
                                        $cntct_mail = $spclEventProp['email'];
                                        $remarks = $spclEventProp['remarks'];
                                        

                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>
                                            <td>
                                                <a href='publisher_special_event_proposal.php?speclevntid=<?= $id; ?>' class='dropdown-item edit-item-btn'>
                                                    <button class="btn btn-primary"> <i class='ri-edit-box-fill align-bottom me-2 text-white'></i> Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <?= $event_name; ?>
                                            </td>
                                            <td>
                                                <?= $guests; ?>
                                            </td>
                                            <td>
                                                <?= $eventDescription; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_name; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_phno; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_mail; ?>
                                            </td>
                                            <td>
                                                <?= $remarks; ?>
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