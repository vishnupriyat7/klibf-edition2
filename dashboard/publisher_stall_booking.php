<?php
ini_set('display_errors', '0');
include "header.php";
include "publisher_sidebar.php";
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
                        <h4 class="mb-sm-0">Stall Booking</h4>
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
                        <?php
                        $status = "OK";
                        $msg = "";
                        $current_date = new DateTime();
                        $date = date_format($current_date, "Y-m-d H:i:s");
                        if ($user_id) {
                            $sql_profile = "SELECT id, org_name FROM users_profile WHERE user_id = ?";
                            $stmt_prof = $con->prepare($sql_profile);
                            $stmt_prof->bind_param("s", $user_id);
                            $stmt_prof->execute();
                            $res_prof = $stmt_prof->get_result();
                            $user_prof = $res_prof->fetch_assoc();
                            $sql1 = "SELECT * FROM stall_booking WHERE user_id = ?";
                            $stmt1 = $con->prepare($sql1);
                            $stmt1->bind_param("s", $user_id);
                            $stmt1->execute();
                            $result1 = $stmt1->get_result();
                            $user_stall = $result1->fetch_assoc();
                            $stall3x3 = $user_stall['stalls_3x3'];
                            $stall3x2 = $user_stall['stalls_3x2'];
                            $amt3x3 = 10000;
                            $tot_amt3x3 = ($stall3x3 * $amt3x3) + ($amt3x3 * $stall3x3 * 18) / 100;
                            $amt3x2 = 7500;
                            $tot_amt3x2 = ($stall3x2 * $amt3x2) + ($amt3x2 * $stall3x2 * 18) / 100;
                            $stall_status = $user_stall['status'];
                            if ($stall_status != 'S') {
                                $edit_count = '';
                            } else {
                                $edit_count = 'disabled';
                            }
                            $total_amt = $tot_amt3x3 + $tot_amt3x2;
                        } else {
                            $tot_amt3x3 = $tot_amt3x2 = $total_amt = 0;
                            $stall3x3 = 0;
                            $stall3x2 = 0;
                        }
                        if (!$user_prof) {
                            $errormsg = "
                                <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                Kindly update your profile and proceed with stall(s) booking.
                                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                           </div>";
                        } else {
                            if (isset($_POST['submit-stall'])) {

                                $term =
                                    mysqli_real_escape_string($con, $_POST['terms']);
                                if ($term == "on") {
                                    if ($user_id && $user_stall) {
                                        $query = "UPDATE stall_booking SET stalls_3x3 = '$stall3x3', stalls_3x2 = '$stall3x2', status = 'S', updated_date = '$date' WHERE user_id = '$user_id'";
                                    } else {
                                        $query = "INSERT INTO stall_booking (stalls_3x3, stalls_3x2, status, updated_date, user_id) VALUES ('$stall3x3', '$stall3x2', 'S', '$date', '$user_id')";
                                    }
                                    $resultSub = mysqli_query($con, $query);
                                    $profile_sub = "UPDATE users_profile SET submitted = 1 WHERE user_id = '$user_id'";
                                    $profSubres = mysqli_query($con, $profile_sub);
                                    if ($resultSub && $profSubres) {
                                        $errormsg = "
                          <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                            Your Stall Booking is Successfully Submitted. Further edit is not possible.
                                            <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
                                            </div>";
                                    } else {
                                        $errormsg = "
                                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                               Save your stall booking initially then submit.
                                               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                               </div>";
                                    }
                                }
                            }
                            if (isset($_POST['save_stall'])) {
                                $term =
                                    mysqli_real_escape_string($con, $_POST['terms']);
                                if ($term == "on") {
                                    $stall3x3 =
                                        mysqli_real_escape_string($con, $_POST['stall3x3']);
                                    $stall3x2 =
                                        mysqli_real_escape_string($con, $_POST['stall3x2']);
                                    if ($stall3x3 == "") {
                                        $stall3x3 = 0;
                                    }
                                    if ($stall3x2 == "") {
                                        $stall3x2 = 0;
                                    }
                                    $errormsg = "";
                                    if ($user_id && $user_stall) {
                                        $query = "UPDATE stall_booking SET stalls_3x3 = '$stall3x3', stalls_3x2 = '$stall3x2', status = 'E', updated_date = '$date' WHERE user_id = '$user_id'";
                                    } else {
                                        $query = "INSERT INTO stall_booking (stalls_3x3, stalls_3x2, status, updated_date, user_id) VALUES ('$stall3x3', '$stall3x2', 'E', '$date', '$user_id')";
                                    }
                                    $result = mysqli_query($con, $query);
                                    if ($result) {
                                        $errormsg = "
                              <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                                Your booking is Successfully Saved.
                                                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
                                                </div>
                               ";
                                    } else {
                                        $errormsg = "
                                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                               Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help test.
                                               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                               </div>";
                                    }
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
                                            <div class="form-group col-12">
                                                <label><b>Choose your Stall</b></label>
                                            </div>
                                            <div class="form-group col-12">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <input class="form-control font-weight-bold text-center" value="Size of Stall" disabled>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control font-weight-bold text-center" value="Fare / Unit + 18% GST Extra (in ₹  )" disabled>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control font-weight-bold text-center" value="No. Required " disabled>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control font-weight-bold text-center" value="Total (in ₹  )" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <input class="form-control" value="3m X 3m" disabled>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control text-right" value="10000" id="amt3x3" disabled>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="number" class="form-control text-right" name="stall3x3" placeholder="00" id="stall3x3" onchange="amount();" value="<?= $stall3x3; ?>" max="5" min="0" <?= $edit_count; ?>>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="text" class="form-control text-right" name="rate_amt" placeholder="00" id="rate_amt" disabled value="<?= $tot_amt3x3; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <input class="form-control" value="3m X 2m" disabled>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control text-right" value="7500" id="amt3x2" disabled>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="number" class="form-control text-right" name="stall3x2" id="stall3x2" placeholder="00" onchange="amount();" value="<?= $stall3x2; ?>" max="5" <?= $edit_count; ?>>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="text" class="form-control text-right" name="rate_amt3x2" id="rate_amt3x2" placeholder="00" disabled value="<?= $tot_amt3x2; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-9">
                                                        <input class="form-control font-weight-bold text-right" value="Total amount payable (in ₹  )." disabled>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="text" class="form-control text-right" name="totamt" id="totamt" placeholder="00" disabled value="<?= $total_amt; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <!-- <div class="col-lg-12">
                                            <button type="submit" name="save_stall" class="btn btn-primary" id="save_stall">Save</button>
                                        </div> -->
                                        <?php if ($stall_status != 'S') { ?>
                                            <div class="col-md-12">
                                                <br>
                                                <input type="checkbox" name="terms" required="required" class="text-justify" id="terms">&emsp;I/We, <?= $user_stall['org_name'] ?>, hereby agree to abide by the <a href="rules-regulation.php" target="_blank"> &nbsp;Rules & Regulations</a> of the Kerala Legislature International Book Festival 2023 2nd Edition given in the Terms and Conditions and as decided by the Kerala Legislature Secretariat from time to time.
                                                <br><br>
                                                <medium class="text-danger">**Disclaimer: Once you submitted, further editing is not possible.</medium><br>
                                                <br>
                                            </div>
                                            <div class="col-lg-12">

                                                <button type="submit" name="save_stall" class="btn btn-primary" id="save_stall">Save</button>
                                                <!-- </div> -->
                                                <button type="submit" class="btn btn-success" name="submit-stall" id="submit-stall">Submit</button>

                                            </div>
                                        <?php  } ?>

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
        // document.getElementById("logo").addEventListener("change", function(event) {
        //     var file;
        //     const fsize = this.files[0].size;
        //     if (fsize > 1048576) {
        //         alert("File size too big, please select a file less than 2MB");
        //         return false;
        //     }

        // });

        // function showAlert() {
        //     alert("Do you want to submit? Once you submit, you cannot edit further.")
        //     return 1;
        // }

        function sameCheck() {
            var sameval = document.getElementById("same-check").checked;
            if (sameval === true) {
                $("#prsn_name").val($("#head_name").val());
                $("#prsn_addr").val($("#head_addr").val());
                $("#prsn_mobile").val($("#head_mobile").val());
                $("#prsn_email").val($("#head_email").val());
            } else {
                $("#prsn_name").val("");
                $("#prsn_addr").val("");
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
            var orgNature = $("#org_nature").val();
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
            var tot_stall = (stall_count3x3 * 1) + (stall_count3x2 * 1);
            if (stall_count3x3 > 5) {
                alert("You can't choose more than 5 stalls");
                $("#stall3x3").val("");
            }
            if (stall_count3x2 > 5) {
                alert("You can't choose more than 5 stalls");
                $("#stall3x2").val("");
            }
            if (tot_stall > 5) {
                alert("You can select only 5 stalls altogether");
                $("#stall3x3").val("");
                $("#stall3x2").val("");
                $("#rate_amt").val("");
                $("#rate_amt3x2").val("");
                $("#totamt").val("");
            }
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
        //     var orgnature = $("#org_nature").val();
        //     if (orgnature === "P") {
        //         document.getElementById("natr_lab").innerHTML = "Publisher";
        //     } else if (orgnature === "A") {
        //         document.getElementById("natr_lab").innerHTML = "Publisher & Distributer";
        //         $('#preview-tab').find('#nature_new').append("<td><label>Major Publishing House(s) which are distributed</label></td><td colspan='2'><label>" + $('#mjr_pub_val').val() + "</label></td>");
        //     }
        //     document.getElementById("head_nam_lab").innerHTML = $("#head_name").val();
        //     document.getElementById("head_addr_lab").innerHTML = $("#head_addr").val();
        //     document.getElementById("head_mob_lab").innerHTML = $("#head_mobile").val();
        //     document.getElementById("head_email_lab").innerHTML = $("#head_email").val();
        //     document.getElementById("head_site_lab").innerHTML = $("#head_site").val();
        //     document.getElementById("prsn_nam_lab").innerHTML = $("#prsn_name").val();
        //     document.getElementById("prsn_addr_lab").innerHTML = $("#prsn_addr").val();
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
        //     document.getElementById("logo_lab").innerHTML = $("#logo").val();
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
            printWindow.document.write('./assets/img/logo/header2.jpg');
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
            var org_nature = $("#org_nature").val();
            if (org_nature == 'P') {
                printWindow.document.write('Publisher');
            } else {
                printWindow.document.write('Publisher & Distributer</td></tr><tr><td>Major Publishing House(s) which are distributed  </td><td>');
                printWindow.document.write($("#mjr_pub_val").val());
            }
            printWindow.document.write('</td></tr><tr><th colspan="2">Head of the Publishing House / Organization</th></tr><tr><td>Name  </td><td>');
            printWindow.document.write($("#head_name").val());
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
            printWindow.document.write($("#prsn_addr").val());
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
            const [file] = logo.files
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
