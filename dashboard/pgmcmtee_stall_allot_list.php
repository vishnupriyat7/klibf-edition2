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
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Stall Allotment Report</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <!-- <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%"> -->
                            <button onclick="exportTableToExcel('example', 'stallbookingreport-data')" class="btn btn-primary">Export Table Data To Excel File</button>
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped" style="font-style:normal; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Sl.No</th>
                                        
                                        <th data-ordering="false">Organization Name</th>
                                        <th data-ordering="false">Booked Stalls 3X3</th>
                                        <th data-ordering="false">Booked Stalls 3X2</th>
                                        <th data-ordering="false">Allot Stalls 3X3</th>
                                        <th data-ordering="false">Allot Stalls 3X2</th>
                                        <th data-ordering="false">Allotment</th>
                                        <!-- <th>Action</th> -->
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT up.id, up.org_name, sb.*  FROM users_profile up JOIN stall_booking sb ON up.user_id = sb.user_id ORDER BY up.id DESC";
                                    $bookstall = mysqli_query($con, $query);
                                    // var_dump(mysqli_fetch_array($bookstall));
                                    $counter = 0;
                                    while ($book = mysqli_fetch_array($bookstall)) {
                                        $id = "$book[id]";
                                        $pub_user_id = "$book[user_id]";
                                        $org_name = "$book[org_name]";                                        
                                        $stalls_3x3 = "$book[stalls_3x3]";
                                        $stalls_3x2 = "$book[stalls_3x2]";    
                                        $allot_3x3 = "$book[confirm_3X3]";
                                        $allot_3x2 = "$book[confirm_3X2]";
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter; ?>
                                            </td>
                                           
                                            <td>
                                                <?= $org_name; ?>
                                            </td>
                                           
                                            <td>
                                                <?= $stalls_3x3; ?>
                                            </td>
                                            <td>
                                                <?= $stalls_3x2; ?>
                                            </td>
                                            <td>
                                                <?= $allot_3x3; ?>
                                            </td>
                                            <td>
                                                <?= $allot_3x2; ?>
                                            </td>
                                            <td>
                                                <div class='dropdown d-inline-block'>
                                                    <!-- <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                        <i class='ri-more-fill align-middle'></i>
                                                    </button> -->
                                                    <!-- <ul class='dropdown-menu dropdown-menu-end'>
                                                        <li> -->
                                                            <a href='pgmcmtee_allot_stall.php?pubid=<?= $pub_user_id ?>' class='dropdown-item edit-item-btn'>
                                                                 <!-- <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'> -->
                                                        <i class='ri-edit-fill align-middle'></i>
                                                    <!-- </button> -->
                                                                <!-- <i class='ri-edit-fill align-bottom me-2 text-muted'></i> Allotment -->
                                                            </a>
                                                        <!-- </li>
                                                       
                                                    </ul> -->
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