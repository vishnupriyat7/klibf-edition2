<?php
ini_set('display_errors', '0');
include "header.php";
include "sidebar_publisher.php";
$user_id = $user['id'];
// var_dump($user_id);die;
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
                                <a class="dropdown-item" href="logout.php"><i class="mdi mdi-book_coverut text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-book_coverut">Logout</span></a>
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
                                if (!$book_cover_bkrls) {
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
                                $query = "INSERT INTO event_propsl_bkrls (users_id,book_title,book_genere,brf_description, author,  released_by, relcd_by_cntct, recived_by, recvd_by_contact, guest1, guest1_contct, guest2, guest2_contct, guest3, guest3_contct, contact_persn_name, contact_persn_mobile,contact_persn_email, remarks,  updated_at, status, book_cover) VALUES ('$user_id','$book_title',  '$book_genere','$brief_descrptn','$author',  '$release_by', '$releas_by_cntct','$recvd_by','$recvd_by_cntct', '$guest1','$guest1_cntct', '$guest2', '$guest2_cntct','$guest3','$guest3_cntct','$bkrls_cntct_persn_name', '$bkrls_cntct_persn_mobile', '$bkrls_cntct_persn_email','$remark', '$date','E','$imgContent')";
                                $result1 = mysqli_query($con, $query);
                                if ($result1) {
                                    $querySelectbookrls = "SELECT id FROM event_propsl_bkrls WHERE users_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                    $resultSelectBookrls = mysqli_query($con, $querySelectbookrls);
                                    $book_rls_id = $resultSelectBookrls->fetch_array();
                                    $querydaytime = "INSERT INTO day_time_prefer (user_id, book_rls_id, book_dscn_id, spcl_event_id, day_prfr1, day_prfr2, day_prfr3, time_prfr1, time_prfr2, time_prfr3) VALUES ('$user_id','$book_rls_id[id]' ,'0' , '0', '$evnt_day1', '$evnt_day2', '$evnt_day3', '$time_slot1', '$time_slot2', '$time_slot3')";
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
                                            <input type="text" class="form-control" name="book_title" id="book_title" placeholder="Book Title" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label>Book Genre</label>
                                            <?php
                                            $bookgenere_query = "SELECT * FROM book_genere";
                                            $bookgenere_stmt = $con->prepare($bookgenere_query);
                                            $bookgenere_stmt->execute();
                                            $bookgenere_result = $bookgenere_stmt->get_result();
                                            $book_genere = $bookgenere_result->fetch_all();
                                            ?>
                                            <select class="form-control form-group" name="book_genere" id="book_genere">
                                                <option value="0">Select Book Genre</option>
                                                <?php foreach ($book_genere as $genere) { ?>
                                                    <option value="<?= $genere[0] ?>"><?= $genere[1]; ?> <?= $genere[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br><label> Brief Description</label>
                                            <textarea class="form-control" name="brief_descrptn" id="brief_descrptn" placeholder="Description" <?= $edit; ?>></textarea>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Author</label>
                                            <input type="text" class="form-control" name="author" id="author" placeholder="Author" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Releasing by</label>
                                            <input type="text" class="form-control" name="release_by" id="release_by" placeholder="Releasing by" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="releas_by_cntct" id="releas_by_cntct" placeholder="Releasing by Contact" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Receiving by</label>
                                            <input type="text" class="form-control" name="recvd_by" id="recvd_by" placeholder="Received by" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="recvd_by_cntct" id="recvd_by_cntct" placeholder="Receiving by Contact" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Guest 1</label>
                                            <input type="text" class="form-control" name="guest1" id="guest1" placeholder="Guest 1" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="guest1_cntct" id="guest1_cntct" placeholder="Guest1 Contact" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Guest 2</label>
                                            <input type="text" class="form-control" name="guest2" id="guest2" placeholder="Guest 2" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Contact</label>
                                            <input type="text" class="form-control" name="guest2_cntct" id="guest2_cntct" placeholder="Guest2 Contact" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Guest 3</label>
                                            <input type="text" class="form-control" name="guest3" id="guest3" placeholder="Guest 3" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Contact</label>
                                            <input type="text" class="form-control" name="guest3_cntct" id="guest3_cntct" placeholder="Guest3 Contact" <?= $edit; ?>>
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
                                                <?php foreach ($event_days as $days) { ?>
                                                    <option value="<?= $days[0] ?>"><?= $days[1]; ?> - <?= $days[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Time Slot Preference 1</label>
                                            <select class="form-control form-group" name="time_slot1" id="time_slot1" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Time</option>
                                                <?php foreach ($event_slots as $event_slot) { ?>
                                                    <option value="<?= $event_slot[0] ?>"><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Event Date Preference 2</label>
                                            <select class="form-control form-group" name="evnt_day2" id="evnt_day2" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Day</option>
                                                <?php foreach ($event_days as $days) { ?>
                                                    <option value="<?= $days[0] ?>"><?= $days[1]; ?> - <?= $days[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Time Slot Preference 2</label>
                                            <select class="form-control form-group" name="time_slot2" id="time_slot2" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Time</option>
                                                <?php foreach ($event_slots as $event_slot) { ?>
                                                    <option value="<?= $event_slot[0] ?>"><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Event Date Preference 3</label>
                                            <select class="form-control form-group" name="evnt_day3" id="evnt_day3" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Day</option>
                                                <?php foreach ($event_days as $days) { ?>
                                                    <option value="<?= $days[0] ?>"><?= $days[1]; ?> - <?= $days[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Time Slot Preference 3</label>
                                            <select class="form-control form-group" name="time_slot3" id="time_slot3" style="height:35px;">
                                                <option value="0" <?= $select0; ?>>Select Proposed Event Time</option>
                                                <?php foreach ($event_slots as $event_slot) { ?>
                                                    <option value="<?= $event_slot[0] ?>"><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label> Contact Person Name</label>
                                            <input type="text" class="form-control" name="cntct_persn_name" id="cntct_persn_name" placeholder="Contact Person Name" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact Person Mobile</label>
                                            <input type="text" class="form-control" name="cntct_persn_mobile" id="cntct_persn_mobile" placeholder="Contact Person Mobile" min="0" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Contact Person Email</label>
                                            <input type="email" class="form-control" name="cntct_persn_email" id="cntct_persn_email" placeholder="Contact Person Email" min="0" <?= $edit; ?>>
                                        </div>
                                        <div class="col-6 form-group">
                                            <br>
                                            <label>Remarks / Other information</label>
                                            <textarea class="form-control" name="remark" id="remark" placeholder="Remarks / Other information" <?= $edit; ?>></textarea>
                                        </div>
                                        <div class="form-group">
                                            <br>
                                            <label>Please upload Book Cover<br>
                                                (Only JPG, JPEG, PNG files are allowed for uploads.)</label>
                                            <input type="file" class="form-control" name="book_cover" id="book_cover" placeholder="Upload Book Cover" <?= $hide; ?> <?= $edit; ?>><br>
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            <button type="submit" name="bkrls_save" class="btn btn-primary" id="save">Save</button>
                                            <!-- <?php if ($user_profile) { ?>
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
    // document.getElementById("book_cover").addEventListener("change", function(event) {
    //     var file;
    //     const fsize = this.files[0].size;
    //     if (fsize > 1048576) {
    //         alert("File size too big, please select a file less than 2MB");
    //         return false;
    //     }

    // });

    function changeLogo() {
        $("#book_cover").removeAttr('hidden');
        $("#book_cover_img").remove();
    }

    function sameCheck() {
        var sameval = document.getElementById("same-check").checked;
        if (sameval === true) {
            $("#prsn_name").val($("#book_title").val());
            $("#brief_descrptn").val($("#head_addr").val());
            $("#prsn_mobile").val($("#head_mobile").val());
            $("#prsn_email").val($("#head_email").val());
        } else {
            $("#prsn_name").val("");
            $("#brief_descrptn").val("");
            $("#prsn_mobile").val("");
            $("#prsn_email").val("");
        }
    }

    function sameCheckMob() {
        var samemob = document.getElementById("same-mobile").checked;
        if (samemob === true) {
            $("#whatsapp").val($("#prsn_mobile").val());
        } else {
            $("#whatsapp").val("");
        }
    }

    function enterPublisher() {
        var orgNature = $("#book_genere").val();
        if (orgNature !== 'P') {
            $("#mjr_pub_hse").show();
        } else {
            $("#mjr_pub_hse").hide();
        }
    }

    function amount() {
        var amt3x3 = 10000;
        var stall_count3x3 = $("#stall3x3").val();
        tot_amt3x3 = (stall_count3x3 * amt3x3) + (amt3x3 * stall_count3x3 * 18) / 100;
        $("#rate_amt").val(tot_amt3x3);
        var amt3x2 = 7500;
        var stall_count3x2 = $("#stall3x2").val();
        tot_amt3x2 = (stall_count3x2 * amt3x2) + (amt3x2 * stall_count3x2 * 18) / 100;
        $("#rate_amt3x2").val(tot_amt3x2);
        var total_amt = tot_amt3x3 + tot_amt3x2;
        $("#totamt").val(total_amt);
    }

    // function checkTerm() {
    //     document.getElementById("terms").checked = false;
    //     document.getElementById("org_name_lab").innerHTML = $("#comp_name").val();
    //     document.getElementById("yers_lab").innerHTML = $("#estb_year").val();
    //     document.getElementById("reg_lab").innerHTML = $("#reg_no").val();
    //     document.getElementById("gst_lab").innerHTML = $("#gst_no").val();
    //     document.getElementById("lang_lab").innerHTML = $("#book_lang").val();
    //     document.getElementById("titl_lab").innerHTML = $("#title_no").val();
    //     document.getElementById("nature_new").innerHTML = "";
    //     var orgnature = $("#book_genere").val();
    //     if (orgnature === "P") {
    //         document.getElementById("natr_lab").innerHTML = "Publisher";
    //     } else if (orgnature === "A") {
    //         document.getElementById("natr_lab").innerHTML = "Publisher & Distributer";
    //         $('#preview-tab').find('#nature_new').append("<td><label>Major Publishing House(s) which are distributed</label></td><td colspan='2'><label>" + $('#mjr_pub_val').val() + "</label></td>");
    //     }
    //     document.getElementById("head_nam_lab").innerHTML = $("#book_title").val();
    //     document.getElementById("head_addr_lab").innerHTML = $("#head_addr").val();
    //     document.getElementById("head_mob_lab").innerHTML = $("#head_mobile").val();
    //     document.getElementById("head_email_lab").innerHTML = $("#head_email").val();
    //     document.getElementById("head_site_lab").innerHTML = $("#head_site").val();
    //     document.getElementById("prsn_nam_lab").innerHTML = $("#prsn_name").val();
    //     document.getElementById("brief_descrptn_lab").innerHTML = $("#brief_descrptn").val();
    //     document.getElementById("prsn_email_lab").innerHTML = $("#prsn_email").val();
    //     document.getElementById("prsn_mob_lab").innerHTML = $("#prsn_mobile").val();
    //     document.getElementById("prsn_wp_lab").innerHTML = $("#whatsapp").val();
    //     var stall3x3 = $("#stall3x3").val();
    //     var stall3x2 = $("#stall3x2").val();
    //     document.getElementById("3x3_lab").innerHTML = $("#stall3x3").val();
    //     document.getElementById("3x2_lab").innerHTML = $("#stall3x2").val();
    //     document.getElementById("3x2amt_lab").innerHTML = $("#amt3x2").val();
    //     document.getElementById("3x3amt_lab").innerHTML = $("#amt3x3").val();
    //     document.getElementById("fascia_lab").innerHTML = $("#fascia").val();
    //     document.getElementById("rmrk_lab").innerHTML = $("#remark").val();
    //     document.getElementById("book_cover_lab").innerHTML = $("#book_cover").val();
    //     $("#preview").modal({
    //         show: true
    //     });
    // }

    // document.getElementById("previewok").addEventListener("click", function(event) {
    //     event.preventDefault()
    //     var terms = document.getElementById("terms").checked;
    //     if (terms !== true) {
    //         alert("Please accept terms and conditions");
    //     } else {
    //         $("#preview-modal").modal('hide');
    //         $("#register").click();
    //     }
    // });

    $("#download").live("click", function() {
        var printWindow = window.open('', '', 'height=800,width=600');
        printWindow.document.write('<html><head><title>');
        printWindow.document.write('</title></head><body align="center">');
        printWindow.document.write('<img src="');
        printWindow.document.write('./assets/img/book_cover/header2.jpg');
        printWindow.document.write('" height="150" width="100%">');
        printWindow.document.write("<br><br><br><div align='center'>");
        printWindow.document.write("<table border='3'>");
        printWindow.document.write('<thead></thead><tbody><tr><th colspan="2">House / Organization</th></tr><tr><td>Name  <td>');
        printWindow.document.write($("#comp_name").val());
        printWindow.document.write('</td></tr><tr><td>Year of Establishment  </td><td>');
        printWindow.document.write($("#estb_year").val());
        printWindow.document.write('</td></tr><tr><td>Registration Number  </td><td>');
        printWindow.document.write($("#reg_no").val());
        printWindow.document.write('</td></tr><tr><td>GST Number  </td><td>');
        printWindow.document.write($("#gst_no").val());
        printWindow.document.write('</td></tr><tr><td>Language(s) in which books are published  </td><td>');
        printWindow.document.write($("#book_lang").val());
        printWindow.document.write('</td></tr><tr><td>Number of Titles Published  </td><td>');
        printWindow.document.write($("#title_no").val());
        printWindow.document.write('</td></tr><tr><td>Nature of Organization  </td><td>');
        var book_genere = $("#book_genere").val();
        if (book_genere == 'P') {
            printWindow.document.write('Publisher');
        } else {
            printWindow.document.write('Publisher & Distributer</td></tr><tr><td>Major Publishing House(s) which are distributed  </td><td>');
            printWindow.document.write($("#mjr_pub_val").val());
        }
        printWindow.document.write('</td></tr><tr><th colspan="2">Head of the Publishing House / Organization</th></tr><tr><td>Name  </td><td>');
        printWindow.document.write($("#book_title").val());
        printWindow.document.write('</td></tr><tr><td>Address  </td><td>');
        printWindow.document.write($("#head_addr").val());
        printWindow.document.write('</td></tr><tr><td>Email ID  </td><td>');
        printWindow.document.write($("#head_email").val());
        printWindow.document.write('</td></tr><tr><td>Website  </td><td>');
        printWindow.document.write($("#head_site").val());
        printWindow.document.write('</td></tr><tr><td>Mobile Number  </td><td>');
        printWindow.document.write($("#head_mobile").val());
        printWindow.document.write('</td></tr><tr><th colspan="2">Contact (In-charge) Person for the Fair</th></tr><tr><td>Name  </td><td>');
        printWindow.document.write($("#prsn_name").val());
        printWindow.document.write('</td></tr><tr><td>Address  </td><td>');
        printWindow.document.write($("#brief_descrptn").val());
        printWindow.document.write('</td></tr><tr><td>Email ID  </td><td>');
        printWindow.document.write($("#prsn_email").val());
        printWindow.document.write('</td></tr><tr><td>Mobile Number  </td><td>');
        printWindow.document.write($("#prsn_mobile").val());
        printWindow.document.write('</td></tr><tr><td>WhatsApp Number  </td><td>');
        printWindow.document.write($("#whatsapp").val());
        printWindow.document.write('</td></tr><tr><td>Estimated amount to remit (including GST)</td><td>');
        printWindow.document.write('₹.');
        printWindow.document.write($("#totamt").val());
        printWindow.document.write('/-</td></tr><tr><td>FASCIA Text  </td><td>');
        printWindow.document.write($("#fascia").val());
        printWindow.document.write('</td></tr><tr><td>Remarks  </td><td>');
        printWindow.document.write($("#remark").val());
        printWindow.document.write('</td></tr><tr><td>Logo  </td><td>');
        const [file] = book_cover.files
        if (file) {
            printWindow.document.write('<img id = "blah" height="50px" width="100px" src = "');
            printWindow.document.write(URL.createObjectURL(file));
            printWindow.document.write('" alt = "your image " />');
        }
        printWindow.document.write('<img src="');
        printWindow.document.write('">');
        printWindow.document.write('</tr></tr></tbody></table>');
        printWindow.document.write("</div>");
        printWindow.document.write('</body></html>');
        printWindow.document.close();
    });
</script>