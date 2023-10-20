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
                    <h2>News</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>News</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="section d-flex align-items-center ptb_50">
            <div class="container">
                <div class="row">
                    <!-- Grid column -->
                    <?php
                    // Directory where your images are located
                    $imageDirectory = "assets/img/Newpaper/";

                    // Get all image files from the directory
                    $imageFiles = glob($imageDirectory . "*.{jpg,jpeg,png}", GLOB_BRACE);

                    // Function to compare image files based on modification time
                    function compareByModificationTime($a, $b)
                    {
                        return filemtime($b) - filemtime($a);
                    }

                    // Sort the image files based on modification time
                    usort($imageFiles, 'compareByModificationTime');

                    // Number of images per page
                    $imagesPerPage = 6;

                    // Current page number
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Calculate the total number of pages
                    $totalPages = ceil(count($imageFiles) / $imagesPerPage);

                    // Calculate the starting index of images for the current page
                    $startIndex = ($currentPage - 1) * $imagesPerPage;

                    // Slice the image files for the current page
                    $imageFilesOnPage = array_slice($imageFiles, $startIndex, $imagesPerPage);

                    // Loop through the image files and generate HTML for each
                    foreach ($imageFilesOnPage as $index => $imagePath) {
                        $imageName = basename($imagePath);
                    ?>
                        <div class="col-lg-4 col-md-6 mb-0 p-2">
                            <!-- Modal: Name -->
                            <div class="modal fade" id="modal<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <!-- Content -->
                                    <div class="modal-content">
                                        <!-- Body -->
                                        <div class="modal-body mb-0 p-0 d-flex justify-content-center align-items-center">
                                            <div class="embed-responsive">
                                                <img class="card-img-top mx-auto" src="<?php echo $imagePath; ?>" alt="">
                                            </div>
                                        </div>
                                        <!-- Footer -->
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                            <!-- Modal: Name -->
                            <a href="#" data-toggle="modal" data-target="#modal<?php echo $index; ?>" data-html="true" data-placement="bottom" title="<b>Click to Read</b>" class="image-link">
                                <img class="img-fluid z-depth-1 equal-proportion" src="<?php echo $imagePath; ?>" alt="image" data-toggle="modal" data-target="#modal<?php echo $index; ?>">
                            </a>
                            <p style="text-align: center; font-weight: bold;"><?php echo pathinfo($imageName, PATHINFO_FILENAME); ?></p>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- Grid column -->
                </div>

                <!-- Pagination -->
                <!-- <div class="text-center mt-4">
                    <ul class="pagination">
                        <?php
                        for ($page = 1; $page <= $totalPages; $page++) {
                            $activeClass = ($page == $currentPage) ? 'active' : '';
                        ?>
                            <li class="page-item <?php echo $activeClass; ?>">
                                <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div> -->
                <!-- End Pagination -->
                <div class="text-center mt-4">
                    <ul class="pagination justify-content-center">
                        <?php if ($currentPage > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $currentPage - 1 ?>">Previous</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                            <li class="page-item <?= ($page == $currentPage) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($currentPage < $totalPages) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include "footer.php" ?>

    <script>
        // Initialize Bootstrap tooltips
        $(document).ready(function() {
            $('.image-link').tooltip({
                trigger: 'hover',
                html: true
            });
        });
    </script>
</body>

</html>