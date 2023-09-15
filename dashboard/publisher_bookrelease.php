<?php
ini_set('display_errors', '0');
include "header.php";
include "publisher_sidebar.php";
$user_id = $user['id'];
$bkrls_id = $_GET['bkrlsid'];
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
                        <h4 class="mb-sm-0">Book Release Proposal</h4>
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

                        if ($user_id) {
                            $sql1 = "SELECT epb.*, dtp.* FROM event_propsl_bkrls epb join day_time_prefer dtp on epb.id = dtp.book_rls_id WHERE epb.id = ?";
                            $stmt1 = $con->prepare($sql1);
                            $stmt1->bind_param("i", $bkrls_id);
                            $stmt1->execute();
                            $result1 = $stmt1->get_result();
                            $bkrlsdetls = $result1->fetch_assoc();
                            $book_title = $bkrlsdetls['book_title'];
                            $book_genere = $bkrlsdetls['book_genere'];
                            $brief_descrptn = $bkrlsdetls['brf_description'];
                            $author = $bkrlsdetls['author'];
                            $release_by = $bkrlsdetls['released_by'];
                            $releas_by_cntct = $bkrlsdetls['relcd_by_cntct'];
                            $recvd_by = $bkrlsdetls['recived_by'];
                            $recvd_by_cntct = $bkrlsdetls['recvd_by_contact'];
                            $guest1 = $bkrlsdetls['guest1'];
                            $guest1_cntct = $bkrlsdetls['guest1_contct'];
                            $guest2 = $bkrlsdetls['guest2'];
                            $guest2_cntct = $bkrlsdetls['guest2_contct'];
                            $guest3 = $bkrlsdetls['guest3'];
                            $guest3_cntct = $bkrlsdetls['guest3_contct'];
                            $evnt_day1 = $bkrlsdetls['day_prfr1'];
                            $time_slot1 = $bkrlsdetls['time_prfr1'];
                            $evnt_day2 = $bkrlsdetls['day_prfr2'];
                            $time_slot2 = $bkrlsdetls['time_prfr2'];
                            $evnt_day3 = $bkrlsdetls['day_prfr3'];
                            $time_slot3 = $bkrlsdetls['time_prfr3'];
                            $bkrls_cntct_persn_name = $bkrlsdetls['contact_persn_name'];
                            $bkrls_cntct_persn_mobile = $bkrlsdetls['contact_persn_mobile'];
                            $bkrls_cntct_persn_email = $bkrlsdetls['contact_persn_email'];
                            $remark = $bkrlsdetls['remarks'];
                            $book_cover = base64_encode($bkrlsdetls['book_cover']);
                            $current_date = new DateTime();
                            $date = date_format($current_date, "Y-m-d H:i:s");
                        } else {
                            $book_title = '';
                            $book_genere = '';
                            $brief_descrptn = '';
                            $author = '';
                            $release_by = '';
                            $releas_by_cntct = '';
                            $recvd_by = '';
                            $recvd_by_cntct = '';
                            $guest1 = '';
                            $guest1_cntct = '';
                            $guest2 = '';
                            $guest2_cntct = '';
                            $guest3 = '';
                            $guest3_cntct = '';
                            $evnt_day1 = '';
                            $time_slot1 = '';
                            $evnt_day2 = '';
                            $time_slot2 = '';
                            $evnt_day3 = '';
                            $time_slot3 = '';
                            $bkrls_cntct_persn_name = '';
                            $bkrls_cntct_persn_mobile = '';
                            $bkrls_cntct_persn_email = '';
                            $remark = '';
                        }
                        if (isset($_POST['bkrls_save'])) {
                            $book_title =
                                mysqli_real_escape_string($con, $_POST['book_title']);
                            $book_genere =
                                mysqli_real_escape_string($con, $_POST['book_genere']);
                            $brief_descrptn =
                                mysqli_real_escape_string($con, $_POST['brief_descrptn']);
                            $author =
                                mysqli_real_escape_string($con, $_POST['author']);
                            $release_by =
                                mysqli_real_escape_string($con, $_POST['release_by']);
                            $releas_by_cntct =
                                mysqli_real_escape_string($con, $_POST['releas_by_cntct']);
                            $recvd_by =
                                mysqli_real_escape_string($con, $_POST['recvd_by']);
                            $recvd_by_cntct =
                                mysqli_real_escape_string($con, $_POST['recvd_by_cntct']);
                            $guest1 =
                                mysqli_real_escape_string($con, $_POST['guest1']);
                            $guest1_cntct =
                                mysqli_real_escape_string($con, $_POST['guest1_cntct']);
                            $guest2 =
                                mysqli_real_escape_string($con, $_POST['guest2']);
                            $guest2_cntct =
                                mysqli_real_escape_string($con, $_POST['guest2_cntct']);
                            $guest3 =
                                mysqli_real_escape_string($con, $_POST['guest3']);
                            $guest3_cntct =
                                mysqli_real_escape_string($con, $_POST['guest3_cntct']);
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
                            $bkrls_cntct_persn_name =
                                mysqli_real_escape_string($con, $_POST['cntct_persn_name']);
                            $bkrls_cntct_persn_mobile =
                                mysqli_real_escape_string($con, $_POST['cntct_persn_mobile']);
                            $bkrls_cntct_persn_email =
                                mysqli_real_escape_string($con, $_POST['cntct_persn_email']);
                            $remark =
                                mysqli_real_escape_string($con, $_POST['remark']);
                            $current_date = new DateTime();
                            $date = date_format($current_date, "Y-m-d H:i:s");
                            if (!empty($_FILES["book_cover"]["name"])) {
                                // Get file info 
                                $fileName = basename($_FILES["book_cover"]["name"]);
                                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                                // Allow certain file formats 
                                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                                if (in_array($fileType, $allowTypes)) {
                                    $image = $_FILES['book_cover']['tmp_name'];
                                    $imgContent = addslashes(file_get_contents($image));
                                } else {
                                    $msg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                                    $status = "NOTOK";
                                }
                            } else {
                                if (!$book_cover) {
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
                                if ($bkrlsdetls) {
                                    if (!$imgContent && $book_cover) {
                                        $query = "UPDATE event_propsl_bkrls SET book_title = '$book_title', author = '$author', book_genere = '$book_genere', brf_description = '$brief_descrptn', released_by = '$release_by', relcd_by_cntct = '$releas_by_cntct',  recived_by = '$recvd_by', recvd_by_contact = '$recvd_by_cntct', guest1 = '$guest1', guest1_contct = '$guest1_cntct', guest2 = '$guest2', guest2_contct = '$guest2_cntct', guest3 = '$guest3', guest3_contct = '$guest3_cntct', contact_persn_name = '$bkrls_cntct_persn_name', contact_persn_email = '$bkrls_cntct_persn_email', contact_persn_mobile = '$bkrls_cntct_persn_mobile', remarks = '$remark',updated_at = '$date' WHERE id = $bkrls_id";
                                    } else {
                                        $query = "UPDATE event_propsl_bkrls SET book_title = '$book_title', author = '$author',book_genere = '$book_genere', brf_description = '$brief_descrptn', released_by = '$release_by', relcd_by_cntct = '$releas_by_cntct', recived_by = '$recvd_by', recvd_by_contact = '$recvd_by_cntct', guest1 = '$guest1', guest1_contct = '$guest1_cntct', guest2 = '$guest2', guest2_contct = '$guest2_cntct', guest3 = '$guest3', guest3_contct = '$guest3_cntct', contact_persn_name = '$bkrls_cntct_persn_name', contact_persn_email = '$bkrls_cntct_persn_email', contact_persn_mobile = '$bkrls_cntct_persn_mobile', remarks = '$remark', book_cover = '$imgContent', updated_at = '$date' WHERE id = $bkrls_id";
                                    }
                                } else {
                                    $query = "INSERT INTO event_propsl_bkrls (users_id, book_title, book_genere, brf_description, author,  released_by, relcd_by_cntct, recived_by, recvd_by_contact, guest1, guest1_contct, guest2, guest2_contct, guest3, guest3_contct, contact_persn_name, contact_persn_mobile,contact_persn_email, remarks,  updated_at, status, book_cover) VALUES ('$user_id','$book_title',  '$book_genere','$brief_descrptn','$author',  '$release_by', '$releas_by_cntct','$recvd_by','$recvd_by_cntct', '$guest1', '$guest1_cntct', '$guest2', '$guest2_cntct', '$guest3', '$guest3_cntct', '$bkrls_cntct_persn_name', '$bkrls_cntct_persn_mobile', '$bkrls_cntct_persn_email', '$remark', '$date', 'E', '$imgContent')";
                                }
                                $result1 = mysqli_query($con, $query);
                                if ($result1) {
                                    $querySelectbookrls = "SELECT id FROM event_propsl_bkrls WHERE users_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                    $resultSelectBookrls = mysqli_query($con, $querySelectbookrls);
                                    $book_rls_id = $resultSelectBookrls->fetch_array();
                                    if ($bkrls_id) {
                                        $querydaytime = "UPDATE day_time_prefer SET day_prfr1 = '$evnt_day1', day_prfr2 = '$evnt_day2', day_prfr3 = '$evnt_day3', time_prfr1 = '$time_slot1', time_prfr2 = '$time_slot2', time_prfr3 = '$time_slot1' WHERE book_rls_id = '$bkrls_id'";
                                    } else {
                                        $querydaytime = "INSERT INTO day_time_prefer (user_id, book_rls_id, book_dscn_id, spcl_event_id, day_prfr1, day_prfr2, day_prfr3, time_prfr1, time_prfr2, time_prfr3) VALUES ('$user_id','$book_rls_id[id]' ,'0' , '0', '$evnt_day1', '$evnt_day2', '$evnt_day3', '$time_slot1', '$time_slot2', '$time_slot3')";
                                    }
                                    $resultdaytime = mysqli_query($con, $querydaytime);
                                    if ($resultdaytime) {
                                        $errormsg = "
                                      <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                                        Your Event Proposal for Book Release is Successfully Saved. 
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
                        <div class="card-body p-4 ">
                            <div class="tab-content">
                                <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    print $errormsg;
                                }
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row bg-grey">
                                        <div class="col-6 form-group">
                                            <label> Book Title</label>
                                            <input type="text" class="form-control" name="book_title" id="book_title" placeholder="Book Title" value="<?= $book_title; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label>Book Genre</label>
                                            <?php
                                            $bookgenere_query = "SELECT * FROM book_genere";
                                            $bookgenere_stmt = $con->prepare($bookgenere_query);
                                            $bookgenere_stmt->execute();
                                            $bookgenere_result = $bookgenere_stmt->get_result();
                                            $book_generes = $bookgenere_result->fetch_all();
                                            ?>
                                            <select class="form-control form-group" name="book_genere" id="book_genere">
                                                <option value="0">Select Book Genre</option>
                                                <?php foreach ($book_generes as $genere) {
                                                    if ($genere[0] == $book_genere) {
                                                        $genere_selected = 'selected';
                                                    } else {
                                                        $genere_selected = "";
                                                    } ?>
                                                    <option value="<?= $genere[0] ?>" <?= $genere_selected ?>><?= $genere[1]; ?> <?= $genere[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br><label> Brief Description</label>
                                            <textarea class="form-control" name="brief_descrptn" id="brief_descrptn" placeholder="Description" value="<?= $brief_descrptn; ?>" <?= $edit; ?>><?= $brief_descrptn; ?></textarea>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Author</label>
                                            <input type="text" class="form-control" name="author" id="author" placeholder="Author" value="<?= $author; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Releasing by</label>
                                            <input type="text" class="form-control" name="release_by" id="release_by" placeholder="Releasing by" value="<?= $release_by; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="releas_by_cntct" id="releas_by_cntct" placeholder="Releasing by Contact" value="<?= $releas_by_cntct; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Receiving by</label>
                                            <input type="text" class="form-control" name="recvd_by" id="recvd_by" placeholder="Received by" value="<?= $recvd_by; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="recvd_by_cntct" id="recvd_by_cntct" placeholder="Receiving by Contact" value="<?= $recvd_by_cntct; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Guest 1</label>
                                            <input type="text" class="form-control" name="guest1" id="guest1" placeholder="Guest 1" value="<?= $guest1; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="guest1_cntct" id="guest1_cntct" placeholder="Guest1 Contact" value="<?= $guest1_cntct; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Guest 2</label>
                                            <input type="text" class="form-control" name="guest2" id="guest2" placeholder="Guest 2" value="<?= $guest2; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Contact</label>
                                            <input type="text" class="form-control" name="guest2_cntct" id="guest2_cntct" placeholder="Guest2 Contact" value="<?= $guest2_cntct; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Guest 3</label>
                                            <input type="text" class="form-control" name="guest3" id="guest3" placeholder="Guest 3" value="<?= $guest3; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Contact</label>
                                            <input type="text" class="form-control" name="guest3_cntct" id="guest3_cntct" placeholder="Guest3 Contact" value="<?= $guest3_cntct; ?>" <?= $edit; ?>>
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
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Event Date Preference 1</label>
                                            <select class="form-control form-group" name="evnt_day1" id="evnt_day1" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Day</option>
                                                <?php foreach ($event_days as $days) {
                                                    if ($days[0] == $evnt_day1) {
                                                        $evnt_day1_selected = 'selected';
                                                    } else {
                                                        $evnt_day1_selected = "";
                                                    }
                                                ?>
                                                    <option value="<?= $days[0] ?>" <?= $evnt_day1_selected ?>><?= $days[1]; ?> - <?= $days[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Time Slot Preference 1</label>
                                            <select class="form-control form-group" name="time_slot1" id="time_slot1" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Time</option>
                                                <?php foreach ($event_slots as $event_slot) {
                                                    if ($event_slot[0] == $time_slot1) {
                                                        $time_slot1_selected = 'selected';
                                                    } else {
                                                        $time_slot1_selected = '';
                                                    } ?>
                                                    <option value="<?= $event_slot[0] ?>" <?= $time_slot1_selected ?>><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Event Date Preference 2</label>
                                            <select class="form-control form-group" name="evnt_day2" id="evnt_day2" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Day</option>
                                                <?php foreach ($event_days as $days) {
                                                    if ($days[0] == $evnt_day2) {
                                                        $evnt_day2_selected = 'selected';
                                                    } else {
                                                        $evnt_day2_selected = '';
                                                    } ?>
                                                    <option value="<?= $days[0] ?>" <?= $evnt_day2_selected ?>><?= $days[1]; ?> - <?= $days[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Time Slot Preference 2</label>
                                            <select class="form-control form-group" name="time_slot2" id="time_slot2" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Time</option>
                                                <?php foreach ($event_slots as $event_slot) {
                                                    if ($event_slot[0] == $time_slot2) {
                                                        $time_slot2_selected = 'selected';
                                                    } else {
                                                        $time_slot2_selected = '';
                                                    } ?>
                                                    <option value="<?= $event_slot[0] ?>" <?= $time_slot2_selected ?>><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Event Date Preference 3</label>
                                            <select class="form-control form-group" name="evnt_day3" id="evnt_day3" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Day</option>
                                                <?php foreach ($event_days as $days) {
                                                    if ($days[0] == $evnt_day3) {
                                                        $evnt_day3_selected = 'selected';
                                                    } else {
                                                        $evnt_day3_selected = "";
                                                    }
                                                ?>?>
                                                <option value="<?= $days[0] ?>" <?= $evnt_day3_selected ?>><?= $days[1]; ?> - <?= $days[2]; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Time Slot Preference 3</label>
                                            <select class="form-control form-group" name="time_slot3" id="time_slot3" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Time</option>
                                                <?php foreach ($event_slots as $event_slot) {
                                                    if ($event_slot[0] == $time_slot3) {
                                                        $time_slot3_selected = 'selected';
                                                    } else {
                                                        $time_slot3_selected = '';
                                                    }
                                                ?>
                                                    <option value="<?= $event_slot[0] ?>" <?= $time_slot3_selected ?>><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Contact Person Name</label>
                                            <input type="text" class="form-control" name="cntct_persn_name" id="cntct_persn_name" placeholder="Contact Person Name" value="<?= $bkrls_cntct_persn_name; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact Person Mobile</label>
                                            <input type="text" class="form-control" name="cntct_persn_mobile" id="cntct_persn_mobile" placeholder="Contact Person Mobile" min="0" value="<?= $bkrls_cntct_persn_mobile; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact Person Email</label>
                                            <input type="email" class="form-control" name="cntct_persn_email" id="cntct_persn_email" placeholder="Contact Person Email" min="0" value="<?= $bkrls_cntct_persn_email; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Remarks / Other information</label>
                                            <textarea class="form-control" name="remark" id="remark" placeholder="Remarks / Other information" value="<?= $remark; ?>" <?= $edit; ?>><?= $remark; ?></textarea>
                                        </div>
                                        <div class="form-group col-6">
                                            <br>
                                            <label>Please upload Book Cover<br>
                                                (Only JPG, JPEG, PNG files are allowed for uploads.)</label>
                                            <!-- <input type="file" class="form-control" name="book_cover" id="book_cover" placeholder="Upload Book Cover" <?= $hide; ?> value="<?= $comp_name; ?>" <?= $edit; ?>><br> -->
                                        </div>
                                        <div class="form-group col-6">
                                            </br>
                                            <input type="file" class="form-control" name="book_cover" id="book_cover" placeholder="*Upload Bookcover" <?= $hide; ?> <?= $edit; ?>>
                                            <label id="book_cover_lab">
                                                <img src="data:image/jpg;charset=utf8;base64,<?= $book_cover; ?>" height="70vh" id="book_cover_img" <?= $edit; ?>>
                                            </label>
                                            <span id="changebook_cover" onclick="changeBookcover();" <?= $edit; ?>><u>Change Bookcover</u></span>

                                            <!-- <input type="file" class="form-control" name="book_cover" id="book_cover" placeholder="*Upload Bookcover"> -->
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            <button type="submit" name="bkrls_save" class="btn btn-primary" id="save">Save</button>
                                            <!-- <?php if ($bkrlsdetls) { ?>
                                            <button type="submit" class="btn btn-success" name="submit-form" id="submit-form">Submit</button>
                                        <?php } ?> -->
                                            <span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>
                                        </div>
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript">
    var _URL = window.URL || window.webkitURL;

    function changeBookcover() {
        $("#book_cover").removeAttr('hidden');
        $("#book_cover_img").remove();
    }
</script>