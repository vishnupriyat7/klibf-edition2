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
                            <h5 class="card-title mb-0">Book Release Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'publisher_book_discussion_report-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        <th data-ordering="false">Id</th>
                                        <th data-ordering="false">Publisher Name</th>
                                        <th data-ordering="false">Book Title</th>
                                        <th data-ordering="false">Author</th>
                                        <th data-ordering="false">Book Genere</th>
                                        <!-- <th data-ordering="false">Book Cover</th> -->
                                        <th data-ordering="false">Brief Description</th>
                                        <th data-ordering="false">Releasing by</th>
                                        <th data-ordering="false">Releasing by Contact No</th>
                                        <th data-ordering="false">Receiving by </th>
                                        <th data-ordering="false">Receiving by Contact No</th>
                                        <th data-ordering="false">Guest 1</th>
                                        <th data-ordering="false">Guest 1 Contact No</th>
                                        <th data-ordering="false">Guest 2</th>
                                        <th data-ordering="false">Guest 2 Contact No</th>
                                        <th data-ordering="false">Guest 3</th>
                                        <th data-ordering="false">Guest 3 Contact No</th>
                                        <th data-ordering="false">Event Date Proposed 1</th>
                                        <th data-ordering="false">Time Proposed 1</th>
                                        <th data-ordering="false">Event Date Proposed 2</th>
                                        <th data-ordering="false">Time Proposed 2</th>
                                        <th data-ordering="false">Event Date Proposed 3</th>
                                        <th data-ordering="false">Time Proposed 3</th>
                                        <th data-ordering="false">Contact Person Name</th>
                                        <th data-ordering="false">Contact Person Mobile</th>
                                        <th data-ordering="false">Contact Person Email</th>

                                        <th data-ordering="false">Remarks</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $userId = $user['id'];

                                    // $querybookRls = "SELECT * FROM event_propsl_bkrls epb join day_time_prefer dtp on epb.id = dtp.book_rls_id where epb.users_id = '$userId' ORDER BY epb.id DESC";


                                    // $querybookRls = "SELECT up.org_name, epb.*, ed1.event_date as day1_date, ed1.event_day as day1, ed2.event_date as day2_date, ed2.event_day as day2, ed3.event_date as day3_date, ed3.event_day as day3, ts1.slot_time as slotime1, ts1.slot_name as slotname1, ts2.slot_time as slotime2, ts2.slot_name as slotname2, ts3.slot_time as slotime3, ts3.slot_name as slotname3, bg.genere 
                                    // FROM event_propsl_bkrls epb 
                                    // join book_genere bg on epb.book_genere = bg.id
                                    // join day_time_prefer dtp on epb.id = dtp.book_rls_id
                                    // join event_date ed1 on dtp.day_prfr1 = ed1.id 
                                    // join event_date ed2 on dtp.day_prfr2 = ed2.id 
                                    // join event_date ed3 on dtp.day_prfr3 = ed3.id
                                    // join time_slot ts1 on dtp.time_prfr1 = ts1.id
                                    // join time_slot ts2 on dtp.time_prfr2 = ts2.id
                                    // join time_slot ts3 on dtp.time_prfr3 = ts3.id
                                    // join users_profile up on epb.users_id = up.user_id
                                    // ORDER BY epb.id DESC";

                                    // var_dump($querybookRls);


                                    $querybookRls = "SELECT up.org_name, epb.id,
                                    up.org_name,
                                    epb.book_title,
                                    bg.genere,
                                    epb.author,
                                    epb.brf_description,
                                    epb.released_by,
                                    epb.relcd_by_cntct,
                                    epb.recived_by,
                                    epb.recvd_by_contact,
                                    epb.guest1,
                                    epb.guest1_contct,
                                    epb.guest2,
                                    epb.guest2_contct,
                                    epb.guest3,
                                    epb.guest3_contct,
                                    epb.contact_persn_name,
                                    epb.contact_persn_email,
                                    epb.contact_persn_mobile,
                                    epb.updated_at,
                                    epb.remarks,
                                    epb.status, ed1.event_date as day1_date, ed1.event_day as day1, ed2.event_date as day2_date, ed2.event_day as day2, ed3.event_date as day3_date, ed3.event_day as day3, ts1.slot_time as slotime1, ts1.slot_name as slotname1, ts2.slot_time as slotime2, ts2.slot_name as slotname2, ts3.slot_time as slotime3, ts3.slot_name as slotname3, bg.genere 
                                    FROM event_propsl_bkrls epb 
                                    join book_genere bg on epb.book_genere = bg.id
                                    join day_time_prefer dtp on epb.id = dtp.book_rls_id
                                    join event_date ed1 on dtp.day_prfr1 = ed1.id 
                                    join event_date ed2 on dtp.day_prfr2 = ed2.id 
                                    join event_date ed3 on dtp.day_prfr3 = ed3.id
                                    join time_slot ts1 on dtp.time_prfr1 = ts1.id
                                    join time_slot ts2 on dtp.time_prfr2 = ts2.id
                                    join time_slot ts3 on dtp.time_prfr3 = ts3.id
                                    join users_profile up on epb.users_id = up.user_id
                                    ORDER BY epb.id DESC";

                                    $bookprps = mysqli_query($con, $querybookRls);
                                    $counter = 0;
                                    while ($bookprp = mysqli_fetch_array($bookprps)) {
                                        $id = $bookprp['id'];
                                        $org_name = $bookprp['org_name'];
                                        $booktitle = $bookprp['book_title'];
                                        $author = $bookprp['author'];
                                        $book_genere = $bookprp['genere'];
                                        $book_cover = base64_encode($bookprp['book_cover']);
                                        $brf_description = $bookprp['brf_description'];
                                        $released_by = $bookprp['released_by'];
                                        $relcd_by_cntct = $bookprp['relcd_by_cntct'];
                                        $recived_by = $bookprp['recived_by'];
                                        $recvd_by_contact = $bookprp['recvd_by_contact'];
                                        $guest1 = $bookprp['guest1'];
                                        $guest1_contct = $bookprp['guest1_contct'];
                                        $guest2 = $bookprp['guest2'];
                                        $guest2_contct = $bookprp['guest2_contct'];
                                        $guest3 = $bookprp['guest3'];
                                        $guest3_contct = $bookprp['guest3_contct'];
                                        $contact_persn_name = $bookprp['contact_persn_name'];
                                        $contact_persn_email = $bookprp['contact_persn_email'];
                                        $contact_persn_mobile = $bookprp['contact_persn_mobile'];
                                        $remark = $bookprp['remarks'];
                                        $day1_date = $bookprp['day1_date'];
                                        $day1 = $bookprp['day1'];
                                        $day2_date = $bookprp['day2_date'];
                                        $day2 = $bookprp['day2'];
                                        $day3_date = $bookprp['day3_date'];
                                        $day3 = $bookprp['day3'];
                                        $slotime1 = $bookprp['slotime1'];
                                        $slotname1 = $bookprp['slotname1'];
                                        $slotime2 = $bookprp['slotime2'];
                                        $slotname2 = $bookprp['slotname2'];
                                        $slotime3 = $bookprp['slotime3'];
                                        $slotname3 = $bookprp['slotname3'];
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>
                                            <td>
                                                <?= $id; ?>
                                            </td>
                                            <td>
                                                <?= $org_name; ?>
                                            </td>
                                            <td>
                                                <?= $booktitle; ?>
                                            </td>
                                            <td>
                                                <?= $author; ?>
                                            </td>
                                            <td>
                                                <?= $book_genere; ?>
                                            </td>
                                            <!-- <td>
                                                <img src="data:image/jpg;charset=utf8;base64,<?= $book_cover; ?>" height="70vh">
                                            </td> -->
                                            <td>
                                                <?= $brf_description; ?>
                                            </td>

                                            <td>
                                                <?= $released_by; ?>
                                            </td>
                                            <td>
                                                <?= $relcd_by_cntct; ?>
                                            </td>
                                            <td>
                                                <?= $recived_by; ?>
                                            </td>
                                            <td>
                                                <?= $recvd_by_contact; ?>
                                            </td>
                                            <td>
                                                <?= $guest1; ?>
                                            </td>
                                            <td>
                                                <?= $guest1_contct; ?>
                                            </td>
                                            <td>
                                                <?= $guest2; ?>
                                            </td>
                                            <td>
                                                <?= $guest2_contct; ?>
                                            </td>
                                            <td>
                                                <?= $guest3; ?>
                                            </td>
                                            <td>
                                                <?= $guest3_contct; ?>
                                            </td>
                                            <td>
                                                <?= $day1; ?><br> <?= $day1_date; ?>
                                            </td>
                                            <td>
                                                <?= $slotname1; ?><br> <?= $slotime1; ?>
                                            </td>
                                            </td>
                                            <td>
                                                <?= $day2; ?><br> <?= $day2_date; ?>
                                            </td>
                                            <td>
                                                <?= $slotname2 ?><br> <?= $slotime2; ?>
                                            </td>
                                            <td>
                                                <?= $day3; ?><br> <?= $day3_date; ?>
                                            </td>
                                            <td>
                                                <?= $slotname3; ?><br> <?= $slotime3; ?>
                                            </td>
                                            <td> <?= $contact_persn_name; ?></td>
                                            <td>
                                                <?= $contact_persn_mobile; ?>
                                            </td>
                                            <td>
                                                <?= $contact_persn_email; ?>
                                            </td>
                                            <td>
                                                <?= $remark; ?>
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