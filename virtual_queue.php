<!DOCTYPE html>
<html lang="en">

<?php include "head-style.php"; ?>

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
                            if (isset($_POST['save'])) {
                                $inst_name =
                                    mysqli_real_escape_string($con, $_POST['inst_name']);
                                $inst_addr =
                                    mysqli_real_escape_string($con, $_POST['inst_addr']);
                                $cntct_prsn1 =
                                    mysqli_real_escape_string($con, $_POST['cntct_prsn1']);
                                $cntct_no1 =
                                    mysqli_real_escape_string($con, $_POST['cntct_no1']);
                                $cntct_prsn2 =
                                    mysqli_real_escape_string($con, $_POST['cntct_prsn2']);
                                $cntct_no2 =
                                    mysqli_real_escape_string($con, $_POST['cntct_no2']);
                                $cntct_mail =
                                    mysqli_real_escape_string($con, $_POST['cntct_mail']);
                                $queue_date =
                                    mysqli_real_escape_string($con, $_POST['date_select']);
                                $queue_slot =
                                    mysqli_real_escape_string($con, $_POST['slot_select']);
                                $prsn_count =
                                    mysqli_real_escape_string($con, $_POST['prsn_count']);
                                $current_date = (new \DateTime())->format('Y-m-d H:i:s');
                                $errormsg = "";
                                if ($status == "NOTOK") {
                                    $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>" .
                                        $msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                               </div>"; //printing error if found in validation
                                } else {
                                    $query = "INSERT INTO queue (inst_name, inst_addr, cntct_name1, cntct_no1, cntct_name2, cntct_no2, email, count, date_id, slot_id, booked_date, status) VALUES ('$inst_name', '$inst_addr', '$cntct_prsn1','$cntct_no1', '$cntct_prsn2', '$cntct_no2', '$cntct_mail', $prsn_count, $queue_date, $queue_slot, '$current_date', 'E')";
                                    $result = mysqli_query($con, $query);
                                    $query_date = "SELECT queue_date FROM queue_date WHERE id = $queue_date";
                                    $result_date = mysqli_query($con, $query_date);
                                    $query_slot = "SELECT slot FROM queue_slot WHERE id = $queue_slot";
                                    $result_slot = mysqli_query($con, $query_slot);
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
                                        <input type="number" class="form-control col-sm-12" name="cntct_no1" id="cntct_no1" placeholder="*Contact No." required="required" min="0">
                                    </div>
                                    <div class="form-group col-12 col-lg-8 col-md-6 col-sm-12">
                                        <br>
                                        <input type="text" class="form-control col-sm-12" name="cntct_prsn2" id="cntct_prsn2" placeholder="*Name of Contact Person 2" required="required">
                                    </div>
                                    <div class="form-group col-12 col-lg-4 col-md-6 col-sm-12">
                                        <br>
                                        <input type="number" class="form-control col-sm-12" name="cntct_no2" id="cntct_no2" placeholder="*Contact No." required="required" min="0">
                                    </div>
                                    <div class="form-group col-12 col-lg-12 col-md-12 col-sm-12">
                                        <br>
                                        <input type="email" class="form-control col-sm-12" name="cntct_mail" id="cntct_mail" placeholder="*Email">
                                    </div>
                                    <div class="form-group col-12 col-lg-4 col-md-6 col-sm-12">
                                        <br>
                                        <input type="number" class="form-control col-sm-12" name="prsn_count" id="prsn_count" placeholder="*No.of persons" required="required" min="0">
                                    </div>
                                    <div class="form-group col-12 col-lg-6 col-md-6 col-sm-12">
                                        <br>
                                        <!-- <div class="col-2"> -->
                                        <!-- <b>Select Date</b> -->
                                        <!-- </div> -->
                                        <!-- <div class="form-group col-6"> -->
                                        <!-- <b>Select Date</b> -->
                                        <input type="date" name="begin" placeholder="Select Date" id="queue_date" value="" min="2023-11-01" max="2023-11-07" onchange="loadSlot();">
                                        <!-- <input type="date" id="part2_dob" name="part2_dob" placeholder="Date of Birth"> -->
                                        <!-- </div> -->
                                    </div>
                                    <input type="hidden" id="slot_select" name="slot_select">
                                    <input type="hidden" id="date_select" name="date_select">
                                    <div class="col-12" id="avail_slot"></div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-bordered active btn-block mt-3" name="save" id="register_queue"><span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Book Queue</button>
                                </div><br>
                                <div class="col-12">
                                    <p style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: left; font-size: small;">For any queries, please contact:<br>

                                        Sheeja PK, Under Secretary- 9446334859 <br>

                                        Sheeba Varghese, Deputy Secretary- 9446122660 <br>

                                        Jayasree VL, Section Officer- 9207196761 <br>

                                        Bindhuraj, Section Officer- 9447036221 <br>

                                        Remya HR, Section Officer- 9446284522 </p>
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
        event.preventDefault();
        var date_select = $("#queue_date").val();
        switch (date_select) {
            case '2023-01-09':
                date_id = 1;
                break;
            case '2023-01-10':
                date_id = 2;
                break;
            case '2023-01-11':
                date_id = 3;
                break;
            case '2023-01-12':
                date_id = 4;
                break;
            case '2023-01-13':
                date_id = 5;
                break;
            case '2023-01-14':
                date_id = 6;
                break;
            case '2023-01-15':
                date_id = 7;
                break;
        }
        $("#date_select").val(date_id);
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
                    var add_slot = "<div class='row'><div class='col-12'><b>Choose your Slot</b1></div>";
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].count === null) {
                            var avail = 500 - 0;
                        } else {
                            var avail = 500 - data[i].count;
                        }
                        if (avail <= 0) {
                            add_slot = add_slot + "<button class='col-12 btn-danger col-lg-3 col-md-6 col-sm-12' style='padding:0 !important;margin:.5% !important;' onclick='checkSlot(" + data[i].id + ");'>" + data[i].slot + "<br>Availability: " + avail + "</button>";
                            // var btn_style = 'btn-danger';
                        } else {
                            // var btn_style = 'btn-info';

                            add_slot = add_slot + "<button class='col-12 btn-info col-lg-3 col-md-6 col-sm-12' style='padding:0 !important;margin:.5% !important;' onclick='checkSlot(" + data[i].id + ");'>" + data[i].slot + "<br>Availability: " + avail + "</button>";
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