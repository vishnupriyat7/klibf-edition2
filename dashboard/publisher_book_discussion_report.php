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
                    <div class="card" style="width:170%">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Book Discussion Proposal Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'publisher_book_discussion_report-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped overflow-auto" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        <th>Action</th>
                                        <th data-ordering="false">Subject</th>
                                        <th data-ordering="false">Book Name</th>
                                        <th data-ordering="false">Book Cover</th>
                                        <th data-ordering="false">Moderator</th>
                                        <th data-ordering="false">Moderator Contact</th>
                                        <th data-ordering="false">Participant 1</th>
                                        <th data-ordering="false">Participant 1 Contact No</th>
                                        <th data-ordering="false">Participant 2</th>
                                        <th data-ordering="false">Participant 2 Contact No</th>
                                        <th data-ordering="false">Participant 3</th>
                                        <th data-ordering="false">Participant 3 Contact No</th>
                                        <th data-ordering="false">Participant 4</th>
                                        <th data-ordering="false">Participant 4 Contact No</th>
                                        <th data-ordering="false">Date Proposed 1</th>
                                        <th data-ordering="false">Time Proposed 1</th>
                                        <th data-ordering="false">Date Proposed 2</th>
                                        <th data-ordering="false">Time Proposed 2</th>
                                        <th data-ordering="false">Date Proposed 3</th>
                                        <th data-ordering="false">Time Proposed 3</th>
                                        <th data-ordering="false">Contact Person Name</th>
                                        <th data-ordering="false">Contact No</th>
                                        <th data-ordering="false">Email Id</th>
                                        <th data-ordering="false">Remarks</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $userId = $user['id'];
                                    $querybookDiscProp = "SELECT epb.*, ed1.event_date as day1_date, ed1.event_day as day1, ed2.event_date as day2_date, ed2.event_day as day2, ed3.event_date as day3_date, ed3.event_day as day3, ts1.slot_time as slotime1, ts1.slot_name as slotname1, ts2.slot_time as slotime2, ts2.slot_name as slotname2, ts3.slot_time as slotime3, ts3.slot_name as slotname3  
                                    FROM evnt_propsl_bkdscn epb 
                                    join day_time_prefer dtp on epb.id = dtp.book_dscn_id 
                                    join event_date ed1 on dtp.day_prfr1 = ed1.id 
                                    join event_date ed2 on dtp.day_prfr2 = ed2.id 
                                    join event_date ed3 on dtp.day_prfr3 = ed3.id
                                    join time_slot ts1 on dtp.time_prfr1 = ts1.id
                                    join time_slot ts2 on dtp.time_prfr2 = ts2.id
                                    join time_slot ts3 on dtp.time_prfr3 = ts3.id
                                    where epb.user_id = '$userId' ORDER BY epb.id DESC";
                                    $discDiscProps = mysqli_query($con, $querybookDiscProp);
                                    $counter = 0;
                                    while ($discDiscProp = mysqli_fetch_array($discDiscProps)) {
                                        // var_dump($discDiscProp);die;
                                        $id = $discDiscProp['id'];
                                        $subject = $discDiscProp['subject'];
                                        $bookName = $discDiscProp['book_name'];
                                        $moderator = $discDiscProp['moderator'];
                                        $modrtr_cntct = $discDiscProp['modrtr_cntct'];
                                        $participant1 = $discDiscProp['participant1'];
                                        $part1_cntct = $discDiscProp['part1_cntct'];
                                        $participant2 = $discDiscProp['participant2'];
                                        $part2_cntct = $discDiscProp['part2_cntct'];
                                        $participant3 = $discDiscProp['participant3'];
                                        $part3_cntct = $discDiscProp['part3_cntct'];
                                        $participant4 = $discDiscProp['participant4'];
                                        $part4_cntct = $discDiscProp['part4_cntct'];
                                        $cntct_name = $discDiscProp['cntct_name'];
                                        $cntct_phno = $discDiscProp['cntct_phno'];
                                        $cntct_mail = $discDiscProp['cntct_mail'];
                                        $remarks = $discDiscProp['remarks'];
                                        $book_cover = base64_encode($discDiscProp['book_cover']);
                                        $day1_date = $discDiscProp['day1_date'];
                                        $day1 = $discDiscProp['day1'];
                                        $day2_date = $discDiscProp['day2_date'];
                                        $day2 = $discDiscProp['day2'];
                                        $day3_date = $discDiscProp['day3_date'];
                                        $day3 = $discDiscProp['day3'];
                                        $slotime1 = $discDiscProp['slotime1'];
                                        $slotname1 = $discDiscProp['slotname1'];
                                        $slotime2 = $discDiscProp['slotime2'];
                                        $slotname2 = $discDiscProp['slotname2'];
                                        $slotime3 = $discDiscProp['slotime3'];
                                        $slotname3 = $discDiscProp['slotname3'];
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>
                                            <td>

                                                <a href='publisher_bookdiscussion.php?bkdscnid=<?= $id; ?>' class='dropdown-item edit-item-btn'>
                                                <button class="btn btn-primary"> <i class='ri-edit-box-fill align-bottom me-2 text-white'></i> Edit</button>
                                                </a>

                                            </td>
                                            <td>
                                                <?= $subject; ?>
                                            </td>
                                            <td>
                                                <?= $bookName; ?>
                                            </td>
                                            <td>
                                                <img src="data:image/jpg;charset=utf8;base64,<?= $book_cover; ?>" height="70vh">
                                            </td>
                                            <td>
                                                <?= $moderator; ?>
                                            </td>
                                            <td>
                                                <?= $modrtr_cntct; ?>
                                            </td>
                                            <td>
                                                <?= $participant1; ?>
                                            </td>
                                            <td>
                                                <?= $part1_cntct; ?>
                                            </td>
                                            <td>
                                                <?= $participant2; ?>
                                            </td>
                                            <td>
                                                <?= $part2_cntct; ?>
                                            </td>
                                            <td>
                                                <?= $participant3; ?>
                                            </td>
                                            <td>
                                                <?= $part3_cntct; ?>
                                            </td>
                                            <td>
                                                <?= $participant4; ?>
                                            </td>
                                            <td>
                                                <?= $part4_cntct; ?>
                                            </td>
                                            <td>
                                                <?= $day1; ?> <br> <?= $day1_date; ?>
                                            </td>
                                            <td>
                                                <?= $slotname1; ?> <br> <?= $slotime1; ?>
                                            </td>
                                            <td>
                                                <?= $day2; ?> <br> <?= $day2_date; ?>
                                            </td>
                                            <td>
                                                <?= $slotname2; ?> <br> <?= $slotime2; ?>
                                            </td>
                                            <td>
                                                <?= $day3; ?> <br> <?= $day3_date; ?>
                                            </td>
                                            <td>
                                                <?= $slotname3; ?> <br> <?= $slotime3; ?>
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