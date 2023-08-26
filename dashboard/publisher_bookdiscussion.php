<?php
ini_set('display_errors', '0');
include "header.php";
include "sidebar_publisher.php";
$user_id = $user['id'];
?>
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
                        <h4 class="mb-sm-0">Book Discussion Proposal</h4>
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
            <br><br>
            <div class="row">
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <!-- <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                                <i class="fas fa-home"></i> New Blog
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
                        <?php
                        $status = "OK";
                        $msg = "";
                        if (isset($_GET['discid'])) {
                            $bookDiscId = $_GET['discid'];
                            $querySelectBookDscn = "SELECT * FROM evnt_propsl_bkdscn WHERE id = '$bookDiscId'";
                            $resultBookDscn = mysqli_query($con, $querySelectBookDscn);
                            $bookDscn = $resultBookDscn->fetch_array();
                            if($bookDscn) {
                                $disc_sub = $bookDscn['book_name'];
                            // var_dump($book_dscn_id['id']);
                        }
                        }
                        if (isset($_POST['disc_save'])) {
                            $disc_sub =
                                mysqli_real_escape_string($con, $_POST['disc_sub']);
                            $disc_book =
                                mysqli_real_escape_string($con, $_POST['disc_book']);
                            $modrtr =
                                mysqli_real_escape_string($con, $_POST['modrtr']);
                            $modrtr_cntct =
                                mysqli_real_escape_string($con, $_POST['modrtr_cntct']);
                            $prtcpnt1 =
                                mysqli_real_escape_string($con, $_POST['prtcpnt1']);
                            $prtcpnt1_cntct =
                                mysqli_real_escape_string($con, $_POST['prtcpnt1_cntct']);
                            $prtcpnt2 =
                                mysqli_real_escape_string($con, $_POST['prtcpnt2']);
                            $prtcpnt2_cntct =
                                mysqli_real_escape_string($con, $_POST['prtcpnt2_cntct']);
                            $prtcpnt3 =
                                mysqli_real_escape_string($con, $_POST['prtcpnt3']);
                            $prtcpnt3_cntct =
                                mysqli_real_escape_string($con, $_POST['prtcpnt3_cntct']);
                            $prtcpnt4 =
                                mysqli_real_escape_string($con, $_POST['prtcpnt4']);
                            $prtcpnt4_cntct =
                                mysqli_real_escape_string($con, $_POST['prtcpnt4_cntct']);
                            $evnt_day1 =
                                mysqli_real_escape_string($con, $_POST['evnt_day1']);
                            $time_slot1 =
                                mysqli_real_escape_string($con, $_POST['time_slot1']);
                            $evnt_day2 =
                                mysqli_real_escape_string($con, $_POST['evnt_day2']);
                            $time_slot2 =
                                mysqli_real_escape_string($con, $_POST['time_slot2']);
                            $evnt_day3 =
                                mysqli_real_escape_string($con, $_POST['evnt_day3']);
                            $time_slot3 =
                                mysqli_real_escape_string($con, $_POST['time_slot3']);
                            $cntct_name =
                                mysqli_real_escape_string($con, $_POST['cntct_name']);
                            $cntct_phno =
                                mysqli_real_escape_string($con, $_POST['cntct_phno']);
                            $cntct_mail =
                                mysqli_real_escape_string($con, $_POST['cntct_mail']);
                            $disc_remark =
                                mysqli_real_escape_string($con, $_POST['disc_remark']);
                            $current_date = new DateTime();
                            $date = date_format($current_date, "Y-m-d H:i:s");
                            if (!empty($_FILES["disc_book_cover"]["name"])) {
                                // Get file info 
                                $fileName = basename($_FILES["disc_book_cover"]["name"]);
                                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                                // Allow certain file formats 
                                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                                if (in_array($fileType, $allowTypes)) {
                                    $image = $_FILES['disc_book_cover']['tmp_name'];
                                    $imgContent = addslashes(file_get_contents($image));
                                } else {
                                    $msg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                                    $status = "NOTOK";
                                }
                            } else {
                                if (!$disc_book_cover) {
                                    $msg = 'Please select an image file to upload.';
                                    $status = "NOTOK";
                                }
                            }
                            if ($time_slot1 == '0') {
                                $time_slot1 = '5';
                            }
                            if ($evnt_day1 == '0') {
                                $evnt_day1 = '8';
                            }
                            if ($time_slot2 == '0') {
                                $time_slot2 = '5';
                            }
                            if ($evnt_day2 == '0') {
                                $evnt_day2 = '8';
                            }
                            if ($time_slot3 == '0') {
                                $time_slot3 = '5';
                            }
                            if ($evnt_day3 == '0') {
                                $evnt_day3 = '8';
                            }
                            $errormsg = "";
                            if ($status == "NOTOK") {
                                $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>" .
                                    $msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                               </div>"; //printing error if found in validation
                            } else {
                                $query1 = "INSERT INTO evnt_propsl_bkdscn (user_id, subject, book_name, moderator, participant1, participant2, participant3, participant4, cntct_name, cntct_phno, cntct_mail, updated_at, remarks, status, modrtr_cntct, part1_cntct, part2_cntct, part3_cntct, part4_cntct, book_cover) VALUES ('$user_id', '$disc_sub', '$disc_book', '$modrtr', '$prtcpnt1', '$prtcpnt2', '$prtcpnt3', '$prtcpnt4', '$cntct_name', '$cntct_phno', '$cntct_mail', '$date', '$disc_remark', 'E', '$modrtr_cntct', '$prtcpnt1_cntct', '$prtcpnt2_cntct', '$prtcpnt3_cntct', '$prtcpnt4_cntct', '$imgContent')";
                                $result1 = mysqli_query($con, $query1);
                                if ($result1) {
                                    $querySelectDscn = "SELECT id FROM evnt_propsl_bkdscn WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                    $resultSelect = mysqli_query($con, $querySelectDscn);
                                    $book_dscn_id = $resultSelect->fetch_array();
                                    $querydaytime = "INSERT INTO day_time_prefer (user_id, book_rls_id, book_dscn_id, spcl_event_id, day_prfr1, day_prfr2, day_prfr3, time_prfr1, time_prfr2, time_prfr3) VALUES ('$user_id', '0', '$book_dscn_id[id]', '0', '$evnt_day1', '$evnt_day2', '$evnt_day3', '$time_slot1', '$time_slot2', '$time_slot3')";
                                    $resultdaytime = mysqli_query($con, $querydaytime);
                                    if ($resultdaytime) {
                                        $errormsg = "
                              <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                                Your Profile Details is Successfully Saved. Proceed with stall(s) booking.
                                                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
                                                </div>";
                                    } else {
                                        $errormsg = "
                                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                               Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.
                                               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                               </div>";
                                    }
                                } else {
                                    $errormsg = "
                                <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                           Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.
                                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                           </div>";
                                }
                            }
                        }
                        ?>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        print $errormsg;
                                    }
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row bg-grey">
                                            <div class="form-group col-12"></div>
                                            <!-- <div class="form-group col-12">
                                                <label><b>Publishing House / Organization</b></label>
                                            </div> -->
                                            <div class="form-group col-6">
                                                Subject
                                                <input type="text" class="form-control" name="disc_sub" placeholder="Subject" id="disc_sub">
                                            </div>
                                            <div class="form-group col-6">
                                                Name of Book
                                                <input type="text" class="form-control" name="disc_book" id="disc_book" placeholder="Name of Book">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Moderator
                                                <input type="text" class="form-control" name="modrtr" id="modrtr" placeholder="Moderator">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Contact No.
                                                <input type="text" class="form-control" name="modrtr_cntct" id="modrtr_cntct" placeholder="Moderator Contact No.">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Particiapant 1
                                                <input type="text" class="form-control" name="prtcpnt1" id="prtcpnt1" placeholder="Particiapant 1">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Contact No.
                                                <input type="text" class="form-control" name="prtcpnt1_cntct" id="prtcpnt1_cntct" placeholder="Particiapant 1 Contact No.">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Particiapant 2
                                                <input type="text" class="form-control" name="prtcpnt2" id="prtcpnt2" placeholder="Particiapant 2">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Contact No.
                                                <input type="text" class="form-control" name="prtcpnt2_cntct" id="prtcpnt2_cntct" placeholder="Particiapant 2 Contact No.">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Particiapant 3
                                                <input type="text" class="form-control" name="prtcpnt3" id="prtcpnt3" placeholder="Particiapant 3">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Contact No.
                                                <input type="text" class="form-control" name="prtcpnt3_cntct" id="prtcpnt3_cntct" placeholder="Particiapant 3 Contact No.">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Particiapant 4
                                                <input type="text" class="form-control" name="prtcpnt4" id="prtcpnt4" placeholder="Particiapant 4">
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Contact No.
                                                <input type="text" class="form-control" name="prtcpnt4_cntct" id="prtcpnt4_cntct" placeholder="Particiapant 4 Contact No.">
                                            </div>
                                            <?php
                                            $day_query = "SELECT * FROM event_date";
                                            $day_stmt = $con->prepare($day_query);
                                            $day_stmt->execute();
                                            $day_result = $day_stmt->get_result();
                                            $event_days = $day_result->fetch_all();
                                            $slot_query = "SELECT * FROM time_slot";
                                            $slot_stmt = $con->prepare($slot_query);
                                            $slot_stmt->execute();
                                            $slot_result = $slot_stmt->get_result();
                                            $event_slots = $slot_result->fetch_all();
                                            ?>
                                            <!-- <div class="col-6">
                                                <br>
                                                <b>Choose any 3 preferable days</b>
                                                <br><br>                                            
                                                <?php foreach ($event_days as $event_day) { ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="day[]" value="<?php $event_day[0]; ?>"><?= $event_day[2]; ?>                                                        
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="col-6">
                                                <br>
                                                <b>Choose any 3 preferable time</b>
                                                <br><br>                                            
                                                <?php foreach ($event_slots as $event_slot) { ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="time[]" value="<?php $event_slot[0]; ?>"><?= $event_slot[1]; ?>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div> -->
                                            <div class="form-group col-6">
                                                <br>
                                                Event Date Preference 1
                                                <select class="form-control form-group" name="evnt_day1" id="evnt_day1" style="height:35px;" required="required">
                                                    <option value="0">Select Proposed Event Day</option>
                                                    <?php foreach ($event_days as $event_day) {
                                                        // $evntDaySelect = "";
                                                        // if ($event_day[0] == $evnt_day) {
                                                        //     $evntDaySelect = 'selected';
                                                        // }
                                                    ?>
                                                        <option value="<?= $event_day[0] ?>"><?= $event_day[1]; ?> - <?= $event_day[2]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Time Slot Preference 1
                                                <select class="form-control form-group" name="time_slot1" id="time_slot1" style="height:35px;" required="required">
                                                    <option value="0">Select Proposed Event Time</option>
                                                    <?php foreach ($event_slots as $event_slot) {
                                                        // $evntTmeSelect = "";
                                                        // if ($event_slot[0] == $time_slot) {
                                                        //     $evntTmeSelect = 'selected';
                                                        // }
                                                    ?>
                                                        <option value="<?= $event_slot[0] ?>"><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Event Date Preference 2
                                                <select class="form-control form-group" name="evnt_day2" id="evnt_day2" style="height:35px;" required="required">
                                                    <option value="0">Select Proposed Event Day</option>
                                                    <?php foreach ($event_days as $event_day) {
                                                        // $evntDaySelect = "";
                                                        // if ($event_day[0] == $evnt_day) {
                                                        //     $evntDaySelect = 'selected';
                                                        // }
                                                    ?>
                                                        <option value="<?= $event_day[0] ?>"><?= $event_day[1]; ?> - <?= $event_day[2]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Time Slot Preference 2
                                                <select class="form-control form-group" name="time_slot2" id="time_slot2" style="height:35px;" required="required">
                                                    <option value="0">Select Proposed Event Time</option>
                                                    <?php foreach ($event_slots as $event_slot) {
                                                        // $evntTmeSelect = "";
                                                        // if ($event_slot[0] == $time_slot) {
                                                        //     $evntTmeSelect = 'selected';
                                                        // }
                                                    ?>
                                                        <option value="<?= $event_slot[0] ?>"><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Event Date Preference 3
                                                <select class="form-control form-group" name="evnt_day3" id="evnt_day3" style="height:35px;" required="required">
                                                    <option value="0">Select Proposed Event Day</option>
                                                    <?php foreach ($event_days as $event_day) {
                                                        // $evntDaySelect = "";
                                                        // if ($event_day[0] == $evnt_day) {
                                                        //     $evntDaySelect = 'selected';
                                                        // }
                                                    ?>
                                                        <option value="<?= $event_day[0] ?>"><?= $event_day[1]; ?> - <?= $event_day[2]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <br>
                                                Time Slot Preference 3
                                                <select class="form-control form-group" name="time_slot3" id="time_slot3" style="height:35px;" required="required">
                                                    <option value="0">Select Proposed Event Time</option>
                                                    <?php foreach ($event_slots as $event_slot) {
                                                        // $evntTmeSelect = "";
                                                        // if ($event_slot[0] == $time_slot) {
                                                        //     $evntTmeSelect = 'selected';
                                                        // }
                                                    ?>
                                                        <option value="<?= $event_slot[0] ?>"><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- <div class="col-6">
                                                </br>
                                                <label>Book Cover (Only JPG, JPEG, PNG files are allowed for uploads.)</label>
                                            </div> -->
                                            <div class="form-group col-6">
                                                </br>
                                                Book Cover (Only JPG, JPEG, PNG files are allowed for uploads.)
                                                <input type="file" class="form-control" name="disc_book_cover" id="disc_book_cover" placeholder="Upload Book Cover">

                                                <!--<span id="changelogo" onclick="changeLogo();" <?= $edit; ?>><u>Change Logo</u></span> -->

                                                <!-- <input type="file" class="form-control" name="logo" id="logo" placeholder="*Upload Logo"> -->
                                            </div>
                                            <div class="form-group col-6">
                                                </br></br>
                                                <label>
                                                    <!-- <?= $fileName; ?> -->
                                                </label>
                                            </div>
                                            <div class="form-group col-6">
                                                </br>
                                                Contact Person Name
                                                <input type="text" class="form-control" name="cntct_name" id="cntct_name" placeholder="Contact Person Name">
                                            </div>
                                            <div class="form-group col-6">
                                                </br>
                                                Contact Phone No.
                                                <input type="text" class="form-control" name="cntct_phno" id="cntct_phno" placeholder="Contact Phone No.">
                                            </div>
                                            <div class="form-group col-6">
                                                </br>
                                                Contact Email Id.
                                                <input type="email" class="form-control" name="cntct_mail" id="cntct_mail" placeholder="Contact Email Id.">
                                            </div>
                                            <div class="form-group col-6">
                                                </br>
                                                Remarks
                                                <input type="text" class="form-control" name="disc_remark" id="disc_remark" placeholder="Remarks">
                                            </div>
                                        </div><br>
                                        <!-- <div class="col-12">
                                            <button class="btn btn-bordered active btn-block mt-3" id="preview_btn" onclick="checkTerm();"><span class="text-white pr-3"><i class="fa fa-eye"></i></span>Preview</button>
                                            <button type="submit" class="btn btn-bordered active btn-block mt-3" name="save" id="save"><span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Save</button>
                                        </div> -->
                                        <div class="col-lg-12">

                                            <button type="submit" name="disc_save" class="btn btn-primary" id="disc_save">Save</button>
                                            <!-- <?php if ($user_profile) { ?>
                                                <button type="submit" class="btn btn-success" name="submit-form" id="submit-form">Submit</button>
                                            <?php } ?> -->
                                            <!-- <span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span> -->
                                        </div>
                                    </form>
                                </div>
                                <!--end tab-pane-->

                                <!--end tab-pane-->

                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include "footer.php"; ?>