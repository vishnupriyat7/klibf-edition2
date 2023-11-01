<?php
ini_set('display_errors', '0');
include "header.php";
include "publisher_sidebar.php";
$user_id = $user['id'];
function convertNumberToWordsForIndia($number)
{
    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
        '0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five',
        '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten',
        '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen',
        '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
        '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy',
        '80' => 'eighty', '90' => 'ninty'
    );

    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $received_number_array = array();

    //Store all received numbers into an array
    for ($i = 0; $i < $number_length; $i++) {
        $received_number_array[$i] = substr($number, $i, 1);
    }

    //Populate the empty array with the numbers received - most critical operation
    for ($i = 9 - $number_length, $j = 0; $i < 9; $i++, $j++) {
        $number_array[$i] = $received_number_array[$j];
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for ($i = 0, $j = 1; $i < 9; $i++, $j++) {
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
            if ($number_array[$j] == 0 || $number_array[$i] == "1") {
                $number_array[$j] = intval($number_array[$i]) * 10 + $number_array[$j];
                $number_array[$i] = 0;
            }
        }
    }

    $value = "";
    for ($i = 0; $i < 9; $i++) {
        if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
            $value = $number_array[$i] * 10;
        } else {
            $value = $number_array[$i];
        }
        if ($value != 0) {
            $number_to_words_string .= $words["$value"] . " ";
        }
        if ($i == 1 && $value != 0) {
            $number_to_words_string .= "Crores ";
        }
        if ($i == 3 && $value != 0) {
            $number_to_words_string .= "Lakhs ";
        }
        if ($i == 5 && $value != 0) {
            $number_to_words_string .= "Thousand ";
        }
        if ($i == 6 && $value != 0) {
            $number_to_words_string .= "Hundred ";
        }
    }
    if ($number_length > 9) {
        $number_to_words_string = "Sorry This does not support more than 99 Crores";
    }
    return ucwords(strtolower("Rupees " . $number_to_words_string) . " Only.");
}
function generateInvoice($invoiceNo)
{
    $alphaCode = array(
        "1" => "A",
        "2" => "B",
        "3" => "C",
        "4" => "D",
        "5" => "E",
        "6" => "F",
        "7" => "G",
        "8" => "H",
        "9" => "I",
        "0" => "J"
    );
    $currentDate = new DateTime();
    $year = $currentDate->format("y");
    $arr1 = str_split($year);
    $generatedNo = $alphaCode[$arr1[0]] . $alphaCode[$arr1[1]] . $invoiceNo;
    return $generatedNo;
}
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
                        <h4 class="mb-sm-0">Coupon Upload</h4>
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
                        if (isset($_POST['save_payment'])) {
                            $bank_name = mysqli_real_escape_string($con, $_POST['bank_name']);
                            $paid_amt = mysqli_real_escape_string($con, $_POST['paid_amt']);
                            $trnctn_no = mysqli_real_escape_string($con, $_POST['trnctn_no']);
                            $trnctn_type = mysqli_real_escape_string($con, $_POST['trnctn_type']);
                            $ifsc = mysqli_real_escape_string($con, $_POST['ifsc']);
                            $trnctn_dt = mysqli_real_escape_string($con, $_POST['trnctn_dt']);
                            $payee = mysqli_real_escape_string($con, $_POST['payee_nme']);
                            $gst = mysqli_real_escape_string($con, $_POST['gst_num']);
                            $current_date = new DateTime();
                            $date = date_format($current_date, "Y-m-d H:i:s");
                            if ($total_amt != $paid_amt) {
                                $msg = 'Transaction amount mismatch. Please enter total amount.';
                                $status = "NOTOK";
                            }
                            if ($trnctn_type == '0') {
                                $msg = 'Please select mode of transaction.';
                                $status = "NOTOK";
                            } elseif ($trnctn_type == 'D') {
                                if ($bank_name == '') {
                                    $msg = 'Please enter Bank Name.';
                                    $status = "NOTOK";
                                }
                                if ($ifsc == '') {
                                    $msg = 'Please enter IFSC.';
                                    $status = "NOTOK";
                                } elseif (strlen($ifsc) != 11) {
                                    $msg = 'IFSC should be 11 characters length.';
                                    $status = "NOTOK";
                                }
                            } elseif ($trnctn_type == 'O') {
                                if ($trnctn_no == '') {
                                    $msg = 'Please enter Transaction Number.';
                                    $status = "NOTOK";
                                }
                            }
                            if ($payee == '') {
                                $msg = 'Please enter payee name.';
                                $status = "NOTOK";
                            }
                            if ($gst != '' && strlen($gst) != 15) {
                                $msg = 'GST Number should be 15 characters length.';
                                $status = "NOTOK";
                            }
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
                                if (!$chellan_img && !$imgChellan) {
                                    $msg = 'Please select an image file to upload.';
                                    $status = "NOTOK";
                                }
                            }
                            // $imgChellan =  base64_encode($imgContent);
                            $errormsg = "";
                            if ($status == "NOTOK") {
                                $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>" .
                                    $msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                               </div>"; //printing error if found in validation
                            } else {
                                if ($chellan['id'] > 0) {
                                    if ($imgContent) {
                                        $query = "UPDATE challan SET user_id = '$user_id', bank_name = '$bank_name', paid_amt = '$paid_amt', trnctn_no = '$trnctn_no', trnctn_type = '$trnctn_type', trnctn_date = '$trnctn_dt', challan_img = '$imgContent', updated_date = '$date', paye_name = '$payee', ifsc = '$ifsc' WHERE user_id = '$user_id';";
                                    } else {
                                        $query = "UPDATE challan SET user_id = '$user_id', bank_name = '$bank_name', paid_amt = '$paid_amt', trnctn_no = '$trnctn_no', trnctn_type = '$trnctn_type', trnctn_date = '$trnctn_dt', updated_date = '$date', paye_name = '$payee', ifsc = '$ifsc' WHERE user_id = '$user_id';";
                                    }
                                } else {
                                    $query = "INSERT INTO challan (user_id, bank_name, paid_amt, trnctn_no, trnctn_type, trnctn_date, challan_img, status, updated_date, paye_name, ifsc) VALUES ('$user_id', '$bank_name', '$paid_amt', '$trnctn_no', '$trnctn_type', '$trnctn_dt', '$imgContent', 'E', '$date',  '$payee', '$ifsc');";
                                }
                                $querygst = "UPDATE users_profile SET gst_no = '$gst' WHERE user_id = '$user_id';";
                                $result = mysqli_query($con, $query);
                                $resultusergst = mysqli_query($con, $querygst);
                                if ($result && $resultusergst) {
                                    $errormsg = "
                              <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                                Your payment details is Successfully Saved.
                                                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
                                                </div>
                               ";
                                    $sql_profile = "SELECT id, org_name, gst_no, head_org_email FROM users_profile WHERE user_id = ?";
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
                                    $totalinword = convertNumberToWordsForIndia($total_amt);
                                    $chellanQuery = "SELECT * FROM challan WHERE user_id = ?";
                                    $stmt_chellan = $con->prepare($chellanQuery);
                                    $stmt_chellan->bind_param("s", $user_id);
                                    $stmt_chellan->execute();
                                    $res_chellan = $stmt_chellan->get_result();
                                    $chellan = $res_chellan->fetch_assoc();
                                    $bank_name = $chellan['bank_name'];
                                    $paid_amt = $chellan['paid_amt'];
                                    $trnctn_no = $chellan['trnctn_no'];
                                    $ifsc = $chellan['ifsc'];
                                    $trnctn_dt = $chellan['trnctn_date'];
                                    $payee = $chellan['paye_name'];
                                    $trnctn_type = $chellan['trnctn_type'];
                                    $gst = $user_prof['gst_no'];
                                    $chellanStatus = $chellan['status'];
                                    $imgChellan = base64_encode($chellan['challan_img']);
                                } else {
                                    $errormsg = "
                                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                               Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help test.
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
                                            <div class="form-group col-12"><br>
                                                <label><b>Coupon Details</b></label>
                                            </div>
                                            <!--  -->
                                            <div class="form-group col-12 col-md-1">
                                                <br>
                                                *Coupons
                                                <input type="text" class="form-control" placeholder="₹50" required="required" disabled>
                                            </div>
                                            <div class="form-group col-12 col-md-1">
                                                <br>
                                                *Count
                                                <input type="text" class="form-control" name="count50" id="count50" placeholder="0" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="claim_amount();">
                                            </div>
                                            <div class="form-group col-12 col-md-8">
                                                <br>
                                                *Serial Number
                                                <input type="text" class="form-control" name="cpn_serial_50" id="cpn_serial_50" required="required"  placeholder="Serial Numbers">
                                            </div>
                                            <!-- <div class="form-group col-12 col-md-1">
                                                <br>
                                                *Bill No
                                                <input type="text" class="form-control" name="cpn_bill_50" id="cpn_bill_50" required="required"  placeholder="Bill No.">
                                            </div> -->
                                            <div class="form-group col-12 col-md-2">
                                                <br>
                                                *Amount
                                                <input type="text" class="form-control" name="total50" id="total50" placeholder="₹0" required="required" disabled>
                                            </div>
                                            <div class="form-group col-12 col-md-1">
                                                <br>
                                                <input type="text" class="form-control" placeholder="₹100" disabled>
                                            </div>                                            
                                            <div class="form-group col-12 col-md-1">
                                                <br>
                                                <input type="text" class="form-control" name="count100" id="count100" placeholder="0" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="claim_amount();">
                                            </div>
                                            <div class="form-group col-12 col-md-8">
                                                <br>
                                                <input type="text" class="form-control" name="cpn_serial_100" id="cpn_serial_100" required="required" placeholder="Serial Numbers">
                                            </div>
                                            <!-- <div class="form-group col-12 col-md-1">
                                                <br>
                                                <input type="text" class="form-control" name="cpn_bill_100" id="cpn_bill_100" required="required"  placeholder="Bill No.">
                                            </div> -->
                                            <div class="form-group col-12 col-md-2">
                                                <br>
                                                <input type="text" class="form-control" name="total100" id="total100" placeholder="₹0" required="required" disabled>
                                            </div>
                                            <div class="form-group col-12 col-md-1">
                                                <br>
                                                <input type="text" class="form-control" placeholder="₹200" disabled>
                                            </div>
                                            <div class="form-group col-12 col-md-1">
                                                <br>
                                                <input type="text" class="form-control" name="count200" id="count200" placeholder="0" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="claim_amount();">
                                            </div>
                                            <div class="form-group col-12 col-md-8">
                                                <br>
                                                <input type="text" class="form-control" name="cpn_serial_200" id="cpn_serial_200" required="required" placeholder="Serial Numbers">
                                            </div>
                                            <!-- <div class="form-group col-12 col-md-1">
                                                <br>
                                                <input type="text" class="form-control" name="cpn_bill_200" id="cpn_bill_200" required="required"  placeholder="Bill No.">
                                            </div> -->
                                            <div class="form-group col-12 col-md-2">
                                                <br>
                                                <input type="text" class="form-control" name="total200" id="total200" placeholder="₹0" required="required" disabled>
                                                <br>
                                            </div>
                                            <hr>
                                            <div class="form-group col-12 col-md-6">
                                                <label>Total Coupon Value</label>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <input type="text" class="form-control" name="total_claim" id="total_claim" placeholder="₹0" required="required" disabled>
                                                <br>
                                            </div>
                                            <hr>
                                            <div class="form-group col-12"><br>
                                                <label><b>Bank Details</b></label>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <br>
                                                Bank Name
                                                <input type="text" class="form-control" name="cpn_bank_name" placeholder="Bank Name" id="cpn_bank_name" value="<?= $bank_name; ?>" <?= $edit; ?>>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <br>
                                                Branch
                                                <input type="text" class="form-control" name="cpn_bank_branch" placeholder="Branch" id="cpn_bank_branch" value="<?= $bank_name; ?>" <?= $edit; ?>>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <br>
                                                Account No
                                                <input type="text" class="form-control" name="cpn_acc_no" id="cpn_acc_no" placeholder="Account No" value="<?= $trnctn_no; ?>" <?= $edit; ?>>
                                            </div>
                                            <div class="form-group col-12 col-md-6" id="ifsc-div">
                                                <br>
                                                IFSC
                                                <input type="text" class="form-control" name="cpn_ifsc" id="cpn_ifsc" placeholder="IFSC" value="<?= $ifsc; ?>" maxlength="11" minlength="11" <?= $edit; ?>>
                                            </div>
                                            <div class="col-lg-12">
                                                <br>
                                                <button type="submit" name="save_cpn" class="btn btn-primary" id="save_cpn">Save</button>
                                            </div>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function claim_amount() {
            // var amt50 = 10000;
            var count50 = $("#count50").val();
            amt50 = 50 * count50;
            var count100 = $("#count100").val();
            amt100 = 100 * count100;
            var count200 = $("#count200").val();
            amt200 = 200 * count200;
            total_amt = amt50 +amt100 +amt200;
            $("#total50").val(amt50);
            $("#total100").val(amt100);
            $("#total200").val(amt200);
            $("#total_claim").val(total_amt);
        }
    </script>