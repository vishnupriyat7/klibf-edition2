<!DOCTYPE html>
<html lang="en">


<?php
include 'config.php';
include "head-style.php"; ?>

<body>

    <!-- ======= Header ======= -->
    <?php include "header-inner.php"; ?>
    <!-- End Header -->

    <main id="queue-inner-main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Virtual Queue</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Virtual Queue</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->
        <section>
            <div class="container">
                <div class="justify-content-between align-items-center">
                    <!-- <div class="col-12 col-lg-3 col-md-2 col-sm-12"></div> -->
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12 contact-info color-1 bg-hover active hover-bottom" style="margin: 0 auto;">
                        <!-- Register Box -->
                        <div class="contact-box col-lg-12 col-md-12 col-sm-12 text-center">
                            <?php
                            $status = "OK";
                            $msg = "";
                            if (isset($_POST['register_queue'])) {
                                $inst_name =
                                    mysqli_real_escape_string($conn, $_POST['inst_name']);
                                $inst_addr =
                                    mysqli_real_escape_string($conn, $_POST['inst_addr']);
                                $cntct_prsn1 =
                                    mysqli_real_escape_string($conn, $_POST['cntct_prsn1']);
                                $cntct_no1 =
                                    mysqli_real_escape_string($conn, $_POST['cntct_no1']);
                                $cntct_prsn2 =
                                    mysqli_real_escape_string($conn, $_POST['cntct_prsn2']);
                                $cntct_no2 =
                                    mysqli_real_escape_string($conn, $_POST['cntct_no2']);
                                $cntct_mail =
                                    mysqli_real_escape_string($conn, $_POST['cntct_mail']);
                                $queue_date =
                                    mysqli_real_escape_string($conn, $_POST['date_select']);
                                $queue_slot =
                                    mysqli_real_escape_string($conn, $_POST['slot_select']);
                                $prsn_count =
                                    mysqli_real_escape_string($conn, $_POST['prsn_count']);
                                $current_date = (new \DateTime())->format('Y-m-d H:i:s');
                                $errormsg = "";
                                if ($status == "NOTOK") {
                                    $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>" .
                                        $msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                               </div>"; //printing error if found in validation
                                } else {
                                    $query = "INSERT INTO queue (inst_name, inst_addr, cntct_name1, cntct_no1, cntct_name2, cntct_no2, email, count, date_id, slot_id, booked_date, status) VALUES ('$inst_name', '$inst_addr', '$cntct_prsn1','$cntct_no1', '$cntct_prsn2', '$cntct_no2', '$cntct_mail', '$prsn_count', '$queue_date', '$queue_slot', '$current_date', 'E')";
                                    $result = mysqli_query($conn, $query);
                                    $query_date = "SELECT event_date FROM event_date WHERE id = $queue_date";
                                    $result_date = mysqli_query($conn, $query_date);
                                    $query_slot = "SELECT slot_name FROM queue_slot WHERE id = $queue_slot";
                                    $result_slot = mysqli_query($conn, $query_slot);
                                    $book_date = $result_date->fetch_all();
                                    $book_slot = $result_slot->fetch_all();
                                    // var_dump($result_date->fetch_all(), $result_slot->fetch_all());
                                    if ($result) { 
                                        $errormsg = "
                              <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                                <b>Registered Successfully. <br>Your booking has been confirmed for " . $book_date[0][0] . " at " . $book_slot[0][0] . ".</b></div>
                               ";
                                    } else {
                                        $errormsg = "
                                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                               Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.
                                               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                               </div>";
                                    }
                                }
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    print $errormsg;
                                }
                            }
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row bg-grey col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group col-12 col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" class="form-control col-sm-12" name="inst_name" placeholder="*Name of Institution" id="inst_name" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-12 col-md-12 col-sm-12">
                                        <br>
                                        <input type="text" class="form-control col-sm-12" name="inst_addr" id="inst_addr" placeholder="*Address" required="required">
                                    </div>
                                    <div class="form-group col-12 col-lg-8 col-md-6 col-sm-12">
                                        <br>
                                        <input type="text" class="form-control col-sm-12" name="cntct_prsn1" id="cntct_prsn1" placeholder="*Name of Contact Person 1" required="required">
                                    </div>
                                    <div class="form-group col-12 col-lg-4 col-md-6 col-sm-12">
                                        <br>
                                        <input type="text" class="form-control col-sm-12" name="cntct_no1" id="cntct_no1" placeholder="*Mobile No." required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                    <div class="form-group col-12 col-lg-8 col-md-6 col-sm-12">
                                        <br>
                                        <input type="text" class="form-control col-sm-12" name="cntct_prsn2" id="cntct_prsn2" placeholder="*Name of Contact Person 2" required="required">
                                    </div>
                                    <div class="form-group col-12 col-lg-4 col-md-6 col-sm-12">
                                        <br>
                                        <input type="text" class="form-control col-sm-12" name="cntct_no2" id="cntct_no2" placeholder="*Mobile No." required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                    <div class="form-group col-12 col-lg-12 col-md-12 col-sm-12">
                                        <br>
                                        <input type="email" class="form-control col-sm-12" name="cntct_mail" id="cntct_mail" placeholder="*Email">
                                    </div>
                                    <div class="form-group col-12 col-lg-4 col-md-6 col-sm-12">
                                        <br>
                                        <input type="number" class="form-control col-sm-12" name="prsn_count" id="prsn_count" placeholder="*No.of persons" required="required" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                    <?php
                                    $day_query = "SELECT * FROM event_date";
                                    $day_stmt = $conn->prepare($day_query);
                                    $day_stmt->execute();
                                    $day_result = $day_stmt->get_result();
                                    $event_days = $day_result->fetch_all();
                                    $slot_query = "SELECT * FROM queue_slot";
                                    $slot_stmt = $conn->prepare($slot_query);
                                    $slot_stmt->execute();
                                    $slot_result = $slot_stmt->get_result();
                                    $event_slots = $slot_result->fetch_all();
                                    ?>
                                    <div class="form-group col-12 col-lg-4 col-md-6 col-sm-12">
                                        <br>
                                        <!-- <div class="col-2"> -->
                                        <!-- <b>Select Date</b> -->
                                        <!-- </div> -->
                                        <!-- <div class="form-group col-6"> -->
                                        <!-- <b>Select Date</b> -->
                                        <select class="form-control form-group" name="date_select" id="date_select" style="height:35px;" onchange="loadSlot();">
                                            <option value="0">Select Proposed Visit Day</option>
                                            <?php foreach ($event_days as $days) { ?>
                                                <option value="<?= $days[0] ?>" <?= $evnt_day1_selected ?>><?= $days[1]; ?> - <?= $days[2]; ?></option>
                                            <?php } ?>
                                        </select>
                                        <!-- <input type="date" id="part2_dob" name="part2_dob" placeholder="Date of Birth"> -->
                                        <!-- </div> -->
                                    </div>
                                    <!-- <div class="form-group col-12 col-lg-4 col-md-6 col-sm-12">
                                        <br>
                                        <select class="form-control form-group" name="slot_select" id="slot_select" style="height:35px;">
                                            <option value="0">Select Proposed Visit Time</option>
                                            <?php foreach ($event_slots as $event_slot) {
                                                // if ($event_slot[0] == $time_slot1) {
                                                //     $time_slot1_selected = 'selected';
                                                // } else {
                                                //     $time_slot1_selected = '';
                                                // } ?>
                                                <option value="<?= $event_slot[0] ?>"><?= $event_slot[1]; ?> - <?= $event_slot[2]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> -->
                                    <input type="hidden" id="slot_select" name="slot_select">
                                    <div class="form-group col-12" id="avail_slot"></div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-bordered btn-success btn-block mt-3" name="register_queue" id="register_queue"><span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Book Queue</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                <br>
                                    <p><b>For any queries, please contact:</b><br>
                                        Shaji R, Deputy Secretary - 9497015937<br>
                                        Sheeja P K, Under Secretary- 9446334859 <br>
                                        Jayasree V L, Under Secretary- 9207196761 <br>
                                        Bindhuraj, Section Officer- 9447036221 <br>
                                        Remya H R, Section Officer- 9446284522 </p>
                                </div>
                            </form>
                            <p class="form-message"></p>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-lg-3 col-md-2 col-sm-12"></div> -->
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "footer.php" ?>

</body>

</html>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript">
    function loadSlot() {
        // event.preventDefault();
        var date_id = $("#date_select").val(); 
        if (date_id === 0) {
            $("#avail_slot").empty();
        } else {
            $.ajax({
                dataType: "json",
                url: "list_slot.php",
                type: "POST",
                data: {
                    date: date_id
                },
                dataType: "json",
                success: function(data) {
                    $("#avail_slot").empty();
                    // var add_slot = "";
                    var add_slot = "<b>Choose your Slot</b><div class='row'>";
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].count === null) {
                            var avail = 500 - 0;
                        } else {
                            var avail = 500 - data[i].count;
                        }
                        if (avail <= 0) {
                            add_slot = add_slot + "<div class='form-group col-12 col-lg-3 col-md-4 col-sm-12'><button class='col-12 btn btn-danger mt-3' onclick='checkSlot(" + data[i].id + ");' style='margin:0;'>" + data[i].slot + "<br>Availability: " + avail + "</button></div>";
                            // var btn_style = 'btn-danger';
                        } else {
                            // var btn_style = 'btn-info';

                            add_slot = add_slot + "<div class='form-group col-12 col-lg-3 col-md-4 col-sm-12'><button class='col-12 btn btn-info mt-3' onclick='checkSlot(" + data[i].id + ");' style='margin:0;'>" + data[i].slot + "<br>Availability: " + avail + "</button></div>";
                        }
                    }
                    // add_slot = add_slot + "<button class='col-12 btn-danger col-lg-3 col-md-6 col-sm-12' style='padding:0 !important;margin:.5% !important;' onclick='checkSlot(" + data[i].id + ");'>" + data[i].slot + "<br>Availability: " + avail + "</button>";
                    add_slot = add_slot + "</div>";
                    document.getElementById("avail_slot").innerHTML = add_slot;
                }
            });
        }
    }

    function checkSlot(slot_id) {
        event.preventDefault();
        var date_id = $("#date_select").val();
        var prsn_count = $("#prsn_count").val();
        $.ajax({
            dataType: "json",
            url: "check_slot.php",
            type: "POST",
            data: {
                date: date_id,
                slot: slot_id
            },
            dataType: "json",
            success: function(data) {
                if (data !== null) {
                    var avail_count = 500 - data;
                    if (avail_count <= 0) {
                        alert("This slot is fully occupied. Please choose another.");
                    } else {
                        var avail_count_now = 500 - (parseInt(data) + parseInt(prsn_count));
                        if (avail_count_now < 0) {
                            alert("Limit exceeded. Please choose another.");
                        } else {
                            $("#slot_select").val(slot_id);
                        }
                    }
                } else {
                    var avail_count_check = 500 - prsn_count;
                    if (avail_count_check < 0) {
                        alert("Limit exceeded. Please provide count upto 500.");
                    } else {
                        $("#slot_select").val(slot_id);
                    }
                }
            }

        });
    }
</script>