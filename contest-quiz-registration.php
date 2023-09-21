<!DOCTYPE html>
<html lang="en">

<?php include "head-style.php"; ?>

<style>
    /* Additional CSS for adjusting the card width */
    .card {
        max-width: 100vw;
        /* Allow the card to expand to its container's width */
    }

    .horizontal-shake {
        position: relative;
        animation: shake 0.8s infinite;
    }


    @keyframes shake {
        0% {
            transform: translateX(0);
        }

        20% {
            transform: translateX(-5px);
        }

        40% {
            transform: translateX(5px);
        }

        60% {
            transform: translateX(-5px);
        }

        80% {
            transform: translateX(5px);
        }

        100% {
            transform: translateX(0);
        }
    }
</style>

<body>

    <!-- ======= Header ======= -->
    <?php include "header-inner.php"; ?>
    <!-- End Header -->

    <main id="about-inner-main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Quiz Registration</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Quiz</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- <section class="contest-bkrvw-reg"> -->
        <!-- <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card overflow-auto">
                            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScKw20kdrJw7rUjexrK_vo8HU4-mIN3M1NT7wAXfSbFYrph9w/viewform?embedded=true" width="640" height="1815" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
                        </div>
                     </div> 

                </div>
            </div> -->
        <!-- <div class="container d-flex justify-content-center align-items-center min-vh-100"> -->
        <!-- Section to hold your Google Sheets link -->
        <section>
            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">
                    <!--end col-->
                    <div class="col-xxl-12 col-12 col-md-12 col-lg-12">
                        <div class="card mt-xxl-n5">


                            <div class="card-body p-4">
                                <div class="tab-content">
                                    <div class="d-flex justify-content-end">

                                        <a href="https://forms.gle/R88MphceQWm3JfsA8" class="mr-2 btn btn-success horizontal-shake" target="_blank"><i class="fa fa-download"></i> Click Here to Apply</a>

                                    </div>

                                    <div class="align-items-center text-center">
                                        <h3><b>Rules & Regulations</b></h3>

                                    </div>
                                    <!-- <div class="tab-pane active" id="personalDetails" role="tabpanel"> -->

                                    <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScKw20kdrJw7rUjexrK_vo8HU4-mIN3M1NT7wAXfSbFYrph9w/viewform?embedded=true" width="1000" height="1815" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe> -->
                                    <ul>
                                        <li class="contact-info color-1 bg-hover active hover-bottom p-2">
                                            <!-- <h3>Rules & Regulations</h3> -->

                                            <h5>
                                                <small>
                                                    <ul>
                                                        <li>
                                                            <h5> <b><span> 1. Overview </b></span></h5>
                                                        </li>
                                                        <ul>

                                                            <li>&emsp;<b>&emsp;1.1</b>&emsp; Allotment of the Stalls to publishers will be at the sole discretion of the Kerala Legislature Secretariat(hereinafter referred to as ‘Organizer’). The Organizer reserves the right to accept or reject Applications without assigning any reason thereof. </li><br>
                                                            <li>&emsp;<b>&emsp;1.2</b>&emsp; In case of a natural disaster or if circumstances so warrant, the Organizer reserves the right to postpone, alter or cancel the Fair. In case the Fair is cancelled before the inauguration, rental collected will be refunded at the earliest after deducting the GST.</li><br>
                                                            <li>&emsp;<b>&emsp;1.3</b>&emsp; The accepted applications will be considered as an agreement (under the accepted terms) between the exhibitor and the Organizer subject to the availability of space. No correspondence will be done with those exhibitors who fail to get stalls allotted in the fair. </li><br>
                                                            <li>&emsp;<b>&emsp;1.4</b>&emsp; Display of relevant banners, posters, etc. on or within the Stall is permitted. However, no display will be allowed outside the Stall. </li><br>
                                                            <li>&emsp;<b>&emsp;1.5</b>&emsp; Sale of books and other reading materials will be permitted on the following conditions:<br>
                                                                <ul>
                                                                    <li><b>*</b> A minimum discount to be allowed on the printed price at the rate
                                                                        mentioned below.</li><br>
                                                                    <div class="table-details">
                                                                        <table>
                                                                            <tr>
                                                                                <th>

                                                                                </th>
                                                                                <th>
                                                                                    <label>Malayalam books</label>
                                                                                </th>
                                                                                <th>
                                                                                    <label>English books</label>
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <label>For Individuals</label>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <label>35%</label>

                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <label>35%</label>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <label>For Library and
                                                                                        Institutional purchase</label>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <label>35%</label>

                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <label>35%</label>

                                                                                </td>
                                                                            </tr>

                                                                        </table>
                                                                    </div>
                                                                    <br>
                                                                    <li><b>*</b> No books or materials forbidden by law, including those violating the Copyright Act, should be displayed or sold. Exhibitors will be solely responsible for any violation in this regard and the Organizer will not be liable for such violations. Exhibitors will indemnify the Organizer from and against all proceedings and expenses whatsoever in consequence of any such violation.</li>
                                                                </ul>
                                                        </ul>
                                                        <li>
                                                            <h5> <b><span>2.&emsp; Booking of Space : </span></b></h5>
                                                        </li>
                                                       



                                                    </ul>
                                                </small>
                                            </h5>


                                        </li>
                                    </ul>
                                    <!-- </div> -->
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
        </section>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "footer.php" ?>

</body>

</html>