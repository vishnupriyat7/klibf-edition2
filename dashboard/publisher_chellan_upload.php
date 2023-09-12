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
                            $sql_profile = "SELECT id, org_name, gst_no FROM users_profile WHERE user_id = ?";
                            $stmt_prof = $con->prepare($sql_profile);
                            $stmt_prof->bind_param("s", $user_id);
                            $stmt_prof->execute();
                            $res_prof = $stmt_prof->get_result();
                            $user_prof = $res_prof->fetch_assoc();
                            $sql1 = "SELECT * FROM stall_booking WHERE user_id = ?";
                            $stmt1 = $con->prepare($sql1);
                            $stmt1->bind_param("i", $user_id);
                            $stmt1->execute();
                            $result1 = $stmt1->get_result();
                            $user_stall = $result1->fetch_assoc();
                            $stall3x3 = $user_stall['confirm_3X3'];
                            $stall3x2 = $user_stall['confirm_3X2'];
                            $amt3x3 = 10000;
                            $amt3x2 = 7500;
                            $rate3x3 = $stall3x3 * $amt3x3;
                            $rate3x2 = $stall3x2 * $amt3x2;
                            $gst3x3 = ($rate3x3 * 18) / 100;
                            $gst3x2 = ($rate3x2 * 18) / 100;
                            $tot_amt3x3 = $rate3x3 + $gst3x3;
                            $tot_amt3x2 = $rate3x2 +  $gst3x2;
                            // $stall_status = $user_stall['status'];
                            // if ($stall_status != 'S') {
                            //     $edit_count = '';
                            // } else {
                            //     $edit_count = 'disabled';
                            // }
                            $total_amt = $tot_amt3x3 + $tot_amt3x2;
                        } else {
                            $tot_amt3x3 = $tot_amt3x2 = $total_amt = 0;
                            $stall3x3 = 0;
                            $stall3x2 = 0;
                        }
                        // if (!$user_prof) {
                        //     $errormsg = "
                        //         <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                        //         Kindly update your profile and proceed with stall(s) booking.
                        //                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        //                    </div>";
                        // } else {                          
                        if (isset($_POST['save_payment'])) {
                            // var_dump("dfkhjb");
                            $bank_name = mysqli_real_escape_string($con, $_POST['bank_name']);
                            // if ($term == "on") {
                            $paid_amt = mysqli_real_escape_string($con, $_POST['paid_amt']);
                            $trnctn_no = mysqli_real_escape_string($con, $_POST['trnctn_no']);
                            $trnctn_type = mysqli_real_escape_string($con, $_POST['trnctn_type']);
                            $trnctn_dt = mysqli_real_escape_string($con, $_POST['trnctn_dt']);
                            $current_date = new DateTime();
                            $date = date_format($current_date, "Y-m-d H:i:s");
                            if (!empty($_FILES["chellan_img"]["name"])) {
                                // Get file info 
                                $fileName = basename($_FILES["chellan_img"]["name"]);
                                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                                // Allow certain file formats 
                                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                                if (in_array($fileType, $allowTypes)) {
                                    $image = $_FILES['chellan_img']['tmp_name'];
                                    $imgContent = addslashes(file_get_contents($image));
                                } else {
                                    $msg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                                    $status = "NOTOK";
                                }
                            } else {
                                if (!$chellan_img) {
                                    $msg = 'Please select an image file to upload.';
                                    $status = "NOTOK";
                                }
                                // }
                            }
                            $errormsg = "";
                            // var_dump($status);
                            $query = "INSERT INTO challan (user_id, bank_name, paid_amt, trnctn_no, trnctn_type, trnctn_date, challan_img, status, updated_date) VALUES ('$user_id', '$bank_name', '$paid_amt', '$trnctn_no', '$trnctn_type', '$trnctn_dt', '$imgContent', 'E', '$date');";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                $errormsg = "
                              <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                                Your payment details is Successfully Saved.
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
                            // }
                        }
                        // }
                        ?>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        print $errormsg;
                                    }
                                    ?>
                                    <div class="col-12">
                                        <label><b>Stall Allotment Details</b></label>
                                    </div>
                                    <div class="row">
                                        <table class="table table-info table-responsive" id="pay-slip">
                                            <tr>
                                                <th>
                                                    Stalls
                                                </th>
                                                <th>
                                                    Alloted
                                                </th>
                                                <th>
                                                    Rate
                                                </th>
                                                <th>
                                                    GST(18%)
                                                </th>
                                                <th>Amount</th>
                                            </tr>
                                            <tbody>
                                                <tr>
                                                    <th>3m X 3m</th>
                                                    <td class="text-justify"><?= $stall3x3; ?></td>&emsp;
                                                    <td><?= $rate3x3; ?></td>
                                                    <td><?= $gst3x3; ?></td>
                                                    <td><?= $tot_amt3x3; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>3m X 2m</th>
                                                    <td ><?= $stall3x2; ?></td>
                                                    <td><?= $rate3x2; ?></td>
                                                    <td><?= $gst3x2; ?></td>
                                                    <td><?= $tot_amt3x2; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">Total amount payable (in ₹ ).</td>
                                                    <td><b><?= $total_amt; ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="col-md-4 right">
                                        <button name="print" class="btn btn-primary" id="print-slip">Print Payment Slip</button>
                                        </div>
                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row bg-grey">
                                            <div class="form-group col-12">
                                                <br>
                                                <label><b>Upload your Payment Details</b></label>
                                            </div>
                                            <div class="form-group col-12 col-md-3">
                                                <br>*Mode of Payment
                                                <select class="form-control form-group" name="trnctn_type" id="trnctn_type" required="required" style="height:37px;" <?= $edit; ?>>
                                                    <option value="0" <?= $select0; ?>>Select</option>
                                                    <option value="D" <?= $selectp; ?>>Cash Deposit</option>
                                                    <option value="O" <?= $selecta; ?>>Online Transfer</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12 col-md-9">
                                                <br>
                                                Bank Name
                                                <input type="text" class="form-control" name="bank_name" placeholder="Bank Name" id="comp_name" value="<?= $comp_name; ?>" <?= $edit; ?>>
                                            </div>
                                            <div class="form-group col-12 col-md-3">
                                                <br>
                                                *Transaction Amount (in ₹ )
                                                <input type="text" class="form-control" name="paid_amt" id="paid_amt" placeholder="*Paid Amount (in  ₹ )" required="required" <?= $edit; ?>>
                                            </div>
                                            <div class="form-group col-12 col-md-3">
                                                <br>
                                                Transaction No
                                                <input type="text" class="form-control" name="trnctn_no" id="trnctn_no" placeholder="Transaction No" value="" <?= $edit; ?>>
                                            </div> 
                                            <div class="form-group col-12 col-md-3">
                                                <br>
                                                IFSC
                                                <input type="text" class="form-control" name="ifsc" id="ifsc" placeholder="IFSC" value="" <?= $edit; ?>>
                                            </div>                                             
                                            <div class="form-group col-12 col-md-3">
                                                <br>
                                                *Transaction Date
                                                <input type="date" class="form-control" name="trnctn_dt" id="trnctn_dt" placeholder="*Transaction Date" required="required" value="" <?= $edit; ?>>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <br>
                                                Organization Name
                                                <input type="text" class="form-control" value="<?= $user_prof['org_name']; ?>" disabled>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <br>
                                                *Payee Name
                                                <input type="text" class="form-control" name="payee_nme" id="payee_nme" placeholder="*Payee Name" required="required" value="" <?= $edit; ?>>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <br>
                                                GST Number
                                                <input type="text" class="form-control" name="gst_num" id="gst_num" placeholder="GST Number" value="<?= $user_prof['gst_no']; ?>" <?= $edit; ?>>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                </br>
                                                *Upload Payment Image
                                                </br>
                                                <input type="file" class="form-control" name="chellan_img" id="chellan_img" placeholder="*Upload Chellan Image" <?= $edit; ?>>
                                            </div>

                                        </div> <br>
                                        <!-- <div class="col-lg-12">
                                            <button type="submit" name="save_stall" class="btn btn-primary" id="save_stall">Save</button>
                                        </div> -->

                                        <!-- <div class="col-md-12">
                                                <br>
                                                <input type="checkbox" name="terms" required="required" class="text-justify" id="terms">&emsp;I/We, <?= $user_stall['org_name'] ?>, hereby agree to abide by the <a href="rules-regulation.php" target="_blank"> &nbsp;Rules & Regulations</a> of the Kerala Legislature International Book Festival 2023 2nd Edition given in the Terms and Conditions and as decided by the Kerala Legislature Secretariat from time to time.
                                                <br><br>
                                                <medium class="text-danger">**Disclaimer: Once you submitted, further editing is not possible.</medium><br>
                                                <br>
                                            </div> -->
                                        <div class="col-lg-12">

                                            <button type="submit" name="save_payment" class="btn btn-primary" id="save_payment">Save</button>
                                            <br><br>
                                                <medium class="text-danger">Disclaimer: <br>* Once your payment is made, the amount should not refund.<br></medium><br>
                                                <br>
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
        function printSlip() {
            var divToPrint = document.getElementById("pay-slip");
            newWin = window.open("");
            newWin.document.write('<br><label><img src="assets/images/Logo_01.png" height="70vh" class="text-left"></label>');
            newWin.document.write('<h3><b>PAYMENT SLIP</b></h3><br>');
            newWin.document.write('<h4><b>Organization: ');
            newWin.document.write(<?php echo json_encode ($user_prof['org_name']) ?>);
            newWin.document.write('</b></h4><br>');
            newWin.document.write('<html><head> <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" /><link href="assets/css/app.min.css" rel="stylesheet" type="text/css" /><link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" /></head><body>');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</body></html>');         
            newWin.print();
            newWin.close();
        }
        const btn = document.getElementById("print-slip");
        btn.addEventListener('click', () => printSlip())
    </script>