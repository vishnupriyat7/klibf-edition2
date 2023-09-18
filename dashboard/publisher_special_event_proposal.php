<?php
ini_set('display_errors', '0');
include "header.php";
include "publisher_sidebar.php";
$user_id = $user['id'];
$spclevnt_id = $_GET['speclevntid'];
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
                        <h4 class="mb-sm-0">Special Event Proposal</h4>
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

                        if ($user_id) {
                            $sql1 = "SELECT * FROM special_event_propsl WHERE id = ?";
                            $stmt1 = $con->prepare($sql1);
                            $stmt1->bind_param("i", $spclevnt_id);
                            $stmt1->execute();
                            $result1 = $stmt1->get_result();
                            $spclevntdtls = $result1->fetch_assoc();
                            $event_name = $spclevntdtls['event_name'];
                            $dignitaries = $spclevntdtls['digniteries_guests'];
                            $brf_descrptn = $spclevntdtls['event_brf_description'];
                            $spcl_prsn_cntct = $spclevntdtls['event_contact_persn'];
                            $spcl_mobile = $spclevntdtls['mobile'];
                            $spcl_email = $spclevntdtls['email'];
                            $spcl_remark = $spclevntdtls['remarks'];
                            $current_date = new DateTime();
                            $date = date_format($current_date, "Y-m-d H:i:s");
                        } else {
                            $event_name = '';
                            $dignitaries = '';
                            $brf_descrptn = '';
                            $spcl_prsn_cntct = '';
                            $spcl_mobile = '';
                            $spcl_email = '';
                            $spcl_remark = '';
                        }
                        if (isset($_POST['spcl_save'])) {
                            $event_name =
                                mysqli_real_escape_string($con, $_POST['event_name']);
                            $dignitaries =
                                mysqli_real_escape_string($con, $_POST['dignitaries']);
                            $brf_descrptn =
                                mysqli_real_escape_string($con, $_POST['brf_descrptn']);
                            $spcl_prsn_cntct =
                                mysqli_real_escape_string($con, $_POST['spcl_prsn_name']);
                            $spcl_mobile =
                                mysqli_real_escape_string($con, $_POST['spcl_mobile']);
                            $spcl_email =
                                mysqli_real_escape_string($con, $_POST['spcl_email']);
                            $spcl_remark =
                                mysqli_real_escape_string($con, $_POST['spcl_remark']);
                            $current_date = new DateTime();
                            $date = date_format($current_date, "Y-m-d H:i:s");
                            if ($status == "NOTOK") {
                                $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>" .
                                    $msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                   </div>"; //printing error if found in validation
                            } else {

                                if ($spclevntdtls) {
                                    $query1 = "UPDATE special_event_propsl SET event_name = '$event_name', event_brf_description = '$brf_descrptn', digniteries_guests = '$dignitaries', event_contact_persn = '$spcl_prsn_cntct', email = ' $spcl_email', mobile = ' $spcl_mobile', updated_at = now(),remarks = ' $spcl_remark', updated_at = '$date' WHERE id = $spclevnt_id";
                                } else {
                                    $query1 = "INSERT INTO special_event_propsl (users_id, event_name, event_brf_description, digniteries_guests, event_contact_persn, email, mobile, updated_at, remarks) VALUES ('$user_id', '$event_name', '$brf_descrptn', '$dignitaries', '$spcl_prsn_cntct', '$spcl_email', '$spcl_mobile', '$date', '$spcl_remark')";
                                }

                                $result1 = mysqli_query($con, $query1);
                                if ($result1) {
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
                            }
                        } ?>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    print $errormsg;
                                }
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row d-flex bg-grey">
                                        <div class="form-group col-6">
                                            <label>Name of Event</label>
                                            <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Name of Event" value="<?= $event_name; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Dignitaries / Celebrities / Guests</label>
                                            <textarea class="form-control" name="dignitaries" id="dignitaries" placeholder="Dignitaries / Celebrities / Guests" value="<?= $dignitaries; ?>" <?= $edit; ?>><?= $dignitaries; ?></textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Brief Description</label>
                                            <textarea class="form-control" name="brf_descrptn" id="brf_descrptn" placeholder="Description" value="<?= $brf_descrptn; ?>" <?= $edit; ?>><?= $brf_descrptn; ?></textarea>
                                        </div>
                                        <div class="form-group col-6">
                                            <br>
                                            <label>Contact Person Name</label>
                                            <input type="text" class="form-control" name="spcl_prsn_name" id="spcl_prsn_name" placeholder="Contact Person Name" value="<?= $spcl_prsn_cntct; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="form-group col-6">
                                            <br>
                                            <label>Contact No.</label>
                                            <input type="text" class="form-control" name="spcl_mobile" id="spcl_mobile" placeholder="Contact No." value="<?= $spcl_mobile; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="form-group col-6">
                                            <br>
                                            <label>Email Id</label>
                                            <input type="email" class="form-control" name="spcl_email" id="spcl_email" placeholder="Email Id" value="<?= $spcl_email; ?>" <?= $edit; ?>>
                                        </div>
                                        <div class="form-group col-6">
                                            <br>
                                            <label>Remarks / Other Information</label>
                                            <input class="form-control" name="spcl_remark" id="spcl_remark" placeholder="Remarks / Other information" value="<?= $spcl_remark; ?>" <?= $edit; ?>>
                                        </div>
                                    </div><br>
                                    <div class="col-lg-12">
                                        <button type="submit" name="spcl_save" class="btn btn-primary" id="spcl_save">Save</button>
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