<?php include "header.php"; ?>
<?php include "reception_sidebar.php"; ?>

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
                            <h5 class="card-title mb-0">Queue Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'stallbookingreport-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        <th data-ordering="false">Institution Name</th>
                                        <th data-ordering="false">Institution Address</th>
                                        <th data-ordering="false">Contact Person 1</th>
                                        <th data-ordering="false">Contact No.</th>
                                        <th data-ordering="false">Contact Person 2</th>
                                        <th data-ordering="false">Contact No.</th>
                                        <th data-ordering="false">Email</th>
                                        <th data-ordering="false">No.of Persons</th>
                                        <th data-ordering="false">Choosed Day</th>
                                        <th data-ordering="false">Choosed Slot</th>
                                        <!-- <th>Action</th> -->
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT q.*, ed.*, qs.* FROM queue q JOIN event_date ed on q.date_id = ed.id JOIN queue_slot qs on q.slot_id = qs.id";
                                    $queueList = mysqli_query($con, $query);
                                    // var_dump(mysqli_fetch_array($bookstall));
                                    $counter = 0;
                                    while ($queue = mysqli_fetch_array($queueList)) {
                                        $id = "$queue[id]";
                                        $inst_name = "$queue[inst_name]";
                                        $inst_addr = "$queue[inst_addr]";
                                        $cntct_name1 = "$queue[cntct_name1]";
                                        $cntct_name2 = "$queue[cntct_name2]";
                                        $cntct_no1 = "$queue[cntct_no1]";
                                        $cntct_no2 = "$queue[cntct_no2]";
                                        $email = "$queue[email]";
                                        $count = "$queue[count]";
                                        $event_date = "$queue[event_date]";
                                        $event_day = "$queue[event_day]";
                                        $slot_time = "$queue[slot_time]";
                                        $slot_name = "$queue[slot_name]";
                                        $booked_date = "$queue[booked_date]";
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>

                                            <td>
                                                <?= $inst_name; ?>
                                            </td>
                                            <td>
                                                <?= $inst_addr; ?>
                                            </td>

                                            <td>
                                                <?= $cntct_name1; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_no1; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_name2; ?>
                                            </td>
                                            <td>
                                                <?= $cntct_no2; ?>
                                            </td>
                                            <td>
                                                <?= $email; ?>
                                            </td>
                                            <td>
                                                <?= $count; ?>
                                            </td>
                                            <td>
                                                <?= $event_date; ?> - <?= $event_day; ?>
                                            </td>
                                            <td>
                                                <?= $slot_time; ?> - <?= $slot_name; ?>
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