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
                            <?php
                            $day_query = "SELECT * FROM event_date";
                            $day_stmt = $con->prepare($day_query);
                            $day_stmt->execute();
                            $day_result = $day_stmt->get_result();
                            $event_days = $day_result->fetch_all();
                            ?>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="example_length">
                                        <br>
                                        <label>Select a Day <select aria-controls="example" class="form-select form-group" name="report_date_select" id="report_date_select" onchange="getQueue();">
                                                <option value="0">Select Proposed Visit Day</option>
                                                <?php foreach ($event_days as $days) { ?>
                                                    <option value="<?= $days[0] ?>" <?= $evnt_day1_selected ?>><?= $days[1]; ?> - <?= $days[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <label>Select a Day <select name="example_length" aria-controls="example" class="form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">Select a Date</div> -->
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped daywise-report" style="font-style:normal; font-size: 12px;">
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
                                        <th data-ordering="false">Choosed Slot</th>
                                        <!-- <th>Action</th> -->
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody id="report-daywise">
                                    
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

        function getQueue() {
            var day_id = $("#report_date_select").val();
            $.ajax({
                type: "POST",
                url: "reception_get_queue_list.php",
                data: {
                    'day_id': day_id
                },
                dataType: "json",
                encode: true,
            }).done(function(data) {
                // console.log(data);
                $("#report-daywise").empty();
                $("#report-daywise").append(data);
            });
        }




        //         $(document).ready(function () {
        //   $("form").submit(function (event) {
        //     var formData = {
        //       name: $("#name").val(),
        //       email: $("#email").val(),
        //       superheroAlias: $("#superheroAlias").val(),
        //     };

        //     $.ajax({
        //       type: "POST",
        //       url: "process.php",
        //       data: formData,
        //       dataType: "json",
        //       encode: true,
        //     }).done(function (data) {
        //       console.log(data);
        //     });

        //     event.preventDefault();
        // });
        // });
    </script>