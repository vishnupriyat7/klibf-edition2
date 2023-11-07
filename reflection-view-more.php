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
        /* Highlighted pagination */
        .pagination {
            /* background-color: #007bff; */
            background: rgba(111, 153, 32, 0.9);
            padding: 10px;
            border-radius: 5px;
        }

        /* Pagination links style */
        .pagination .page-link {
            color: white;
            background-color: transparent;
            border: none;
            font-size: large;
        }

        /* Active page style */
        .pagination .page-item.active .page-link {
            /* background-color: #0056b3; */
            background: rgba(95, 45, 110, 0.9);
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
                    <h2>Reflections</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Reflections</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="reflections" class="reflections">
            <div class="container">
                <div class="row">
                    <!-- Grid column -->
                    <?php
                    // Sample data for each icon box
                    $iconBoxes = [
                                              
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/VM-NZCdQ26U',
                        ],
                        
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/XFg_4dh6gXw',
                        ],
                        
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/_TzaXCz3Tcc',
                        ],
                        
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/q3mZh_ZyO1o',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/mAI-6q3QKdA',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/HbFgM0SS6S8',
                        ],
                        
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/osALdL8nCrw',
                        ],
                       
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/yW6ZuvpOKxY',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/m1uopaXZWng',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/0MZSvrwrKbg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/YnCRkW7uumw',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/g2Kr-07tBLg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/u5ReN2y3IGw',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/fQ40fTGu7CM',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Zhet8evRLxo',
                        ],
                        
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/fxmjy4_y8V0',
                        ],
                      
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/23ndPjLjQdA',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Y2eQUPUllk4',
                        ],
                                              
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/nZ7FAtGUySc',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/lNHGChL_QCA',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/sWZTxGs67eE',
                        ],

                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/wkLEz0lHUng',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Y6p4nUxzSHs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/iHWwaX7kBmk',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/-0S12AJLeWo',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/RsZnEMer3MY',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/4XCmI1Br5w8',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/a3AC6pEREOs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/69h9Jkk8tY0',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/AYzifniTk7k',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/IsWkbZ3_ok4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/SeIFgV_P6G4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/DfbgvvgCxN4',
                        ],
                        
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/3uqI9zGrt-Q',
                        ],

                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/pBgZVq2ndRQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/HNPsREruRy0',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/jBlmv7_UGkA',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/FRaoFhjwyJs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/gG_ZOc0vqdI',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Zz4441kSC1I',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/282dYpr2YHQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/j586OuoUNXs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/ucQZZL4Dl8I',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Yd24pGERN3w',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/oFmxTQSoyb4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Vi0MBVueEI0',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/zXriw5xaumY',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/QNl9upcY1EY',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/-oHjG-xQyZk',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Xik_8W2BBCw',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/1l3sbPgjsAs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/jtMY5MQavoc',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/p1O4gVLWsgs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/bJLsiOJEwng',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/FeiXxaRC-ac',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/jG_AD_Ut3m8',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/18_pYbugxa0',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/1_7bHIYExh4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/MIEf-sSM38I',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/SIODceCTdKQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/tvBWNzetY50',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/dC8oswxgREg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/WpKIZN2wZYE',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/o3-9SEKM8vU',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/q4mlVROeTs4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/xvFmG-2q4ws',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/tJyOmq-iFBw',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/FER613OTDFU',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/IQ9aXOYegzQU',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/tsJvgY5Rlqw',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/_6wyVlAIpcg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/-ILDT4ptLmc',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/74zP3p6oaE4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/-g_Ec90x4KY',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/aC4262pnk-0',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/UFzwsKlj4BE',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/HdyCa64MpoI',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/uiFls0eh3cM',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/ibeu708Y80U',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/U5hnFzGPBhE',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/qRh4dE4prAQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/jrQyeOnv7gQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/OlmzR_EaoCU',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/eYi7GRvdXAg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/eDVuottyTYg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/pzFcJzfUCoI',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/wqUqG_jfg8s',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/8HQ0AqvJjbk',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/u3BHM6qtrkI',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/GvJK4NQJjhk',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/zerUARndr8o',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/c35uWtzIhTQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/VGIWB856AhE',
                        ],
                        [
                            'title' => "Chief Minister's Words",
                            'video_url' => 'https://www.youtube.com/embed/reVml83GCYk',
                        ],

                        // Add data for other icon boxes here

                    ];

                    // Pagination setup
                    $itemsPerPage = 12;  // Adjust the number of items per page as needed
                    $totalItems = count($iconBoxes);
                    $totalPages = ceil($totalItems / $itemsPerPage);
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Calculate the range for the current page
                    $startIndex = ($currentPage - 1) * $itemsPerPage;
                    $endIndex = min($startIndex + $itemsPerPage, $totalItems);

                    // Loop through the items for the current page
                    for ($i = $startIndex; $i < $endIndex; $i++) {
                        $box = $iconBoxes[$i];
                    ?>
                        <div class="col-md-3 icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="youtube-thumbnail">
                                <iframe class="img-fluid" src="<?= $box['video_url'] ?>" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" data-video-src="<?= $box['video_url'] ?>" title="<b>Click to View</b>">
                                </iframe>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- Pagination -->
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
                <!-- End Pagination -->
            </div>
        </section>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include "footer.php" ?>


</body>

</html>