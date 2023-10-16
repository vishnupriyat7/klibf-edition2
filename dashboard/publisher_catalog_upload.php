<?php
ini_set('display_errors', '0');
include "header.php";
include "publisher_sidebar.php";
$user_id = $user['id'];
?>
<style>
    #pay-slip td {
        text-align: right !important;
        width: 20%;
    }
</style>
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
                        <h4 class="mb-sm-0">Chellan Upload</h4>
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
            <?php
            $status = "OK";
            if (isset($_POST['save_catalogue'])) {
                $current_date = new DateTime();
                $date = date_format($current_date, "Y-m-d H:i:s");
                if (!empty($_FILES['catalogue'])) {
                    $idir = "../catalogue/"; //my directory file is supposed to be saved in
                    $randomd = rand(0000000, 9999999); //creates a random number as filename
                    $domain = "http://" . $_SERVER['HTTP_HOST'];
                    $file_ext = strrchr($_FILES['catalogue']['name'], '.');
                    //   grabs file extension. my code checked if the file was a pdf a different way and neither seems to work.
                    $destination = $randomd . $file_ext; //new filename
                    if ($file_ext == '.pdf') {
                        move_uploaded_file($_FILES['catalogue']['tmp_name'], "$idir" . $destination);
                        $pdf = $domain . "/catalogue/" . $destination;
                    } else {
                        $msg = 'File type not supported.';
                        $status = "NOTOK";
                    }
                }
                if ($status == "NOTOK") {
                    $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>" .
                        $msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                   </div>"; //printing error if found in validation
                } else {
                    $query = "INSERT INTO publisher_catalogue (user_id, filename, updated_date) VALUES ('$user_id', '$destination', '$date')";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        $errormsg = "
              <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                Your Catalogue is Successfully Saved.
                                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
                                </div>
               ";
                    }
                }
            }
            ?>
            <br><br>
            <div class="row">
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
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
                                            <div class="form-group col-12">
                                                <br>
                                                <label><b>Upload Your Catalogue</b></label>
                                            </div>

                                            <div class="form-group col-12 col-md-6">
                                                </br>
                                                *Upload PDF File
                                                </br>
                                                <input type="file" class="form-control" name="catalogue" id="catalogue" placeholder="*Upload PDF File">
                                                <!-- <label id="catalogue">
                                                    <img src="data:image/jpg;charset=utf8;base64,<?= $imgChellan; ?>" height="100vh" id="image_chellan" <?= $edit; ?>>
                                                </label>
                                                <span id="changeChellan" onclick="changeChellan();" <?= $edit; ?>><u>Change Chellan Image</u></span> -->
                                            </div>
                                        </div> <br>
                                        <div class="col-lg-12">
                                            <button type="submit" name="save_catalogue" class="btn btn-primary" id="save_catalogue">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <iframe id="print-frame" style="display: none;"></iframe>
    <!-- End Page-content -->

    <?php include "footer.php"; ?>