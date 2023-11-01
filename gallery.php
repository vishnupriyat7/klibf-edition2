<!DOCTYPE html>
<html lang="en">

<?php include "head-style.php"; ?>

<head>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        /* CSS for maintaining equal proportions */
        .equal-proportion {
            max-width: 100%;
            max-height: 100vh;
            width: 80vw;
            height: 40vh;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include "header-inner.php"; ?>
    <!-- End Header -->

    <main id="about-inner-main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Gallery</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Gallery</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="align-items-center ptb_50">
            <div class="container">
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#day1" data-toggle="tab">Day 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#day2" data-toggle="tab">Day 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#day3" data-toggle="tab">Day 3</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="#day4" data-toggle="tab">Day 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#day5" data-toggle="tab">Day 5</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#day6" data-toggle="tab">Day 6</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#day7" data-toggle="tab">Day 7</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="tab-content">
                        <div class="tab-pane active" id="day1">
                            <div>
                                <?php include 'event-day1-gal.php' ?>
                            </div>

                        </div>
                        <div class="tab-pane" id="day2">
                            <div>
                                <?php include 'event-day2-gal.php' ?>
                            </div>

                        </div>
                        <div class="tab-pane" id="day3">
                            <div>
                                <?php include 'event-day3.php' ?>
                            </div>

                        </div>
                        <div class="tab-pane" id="day4">
                            <div>
                                <?php include 'event-day4.php' ?>
                            </div>

                        </div>
                        <div class="tab-pane" id="day5">
                            <div>
                                <?php include 'event-day5.php' ?>
                            </div>

                        </div>
                        <div class="tab-pane" id="day6">
                            <div>
                                <?php include 'event-day6.php' ?>
                            </div>

                        </div>
                        <div class="tab-pane" id="day7">
                            <div>
                                <?php include 'event-day7-gal.php' ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </section>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include "footer.php" ?>


</body>

</html>