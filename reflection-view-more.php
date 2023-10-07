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
                            'title' => "Chief Minister's Words",
                            'video_url' => 'https://www.youtube.com/embed/reVml83GCYk',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/VGIWB856AhE',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/c35uWtzIhTQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/zerUARndr8o',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/GvJK4NQJjhk',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/u3BHM6qtrkI',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/8HQ0AqvJjbk',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/wqUqG_jfg8s',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/pzFcJzfUCoI',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/eDVuottyTYg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/eYi7GRvdXAg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/OlmzR_EaoCU',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/jrQyeOnv7gQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/qRh4dE4prAQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/U5hnFzGPBhE',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/ibeu708Y80U',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/uiFls0eh3cM',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/HdyCa64MpoI',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/UFzwsKlj4BE',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/aC4262pnk-0',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/-g_Ec90x4KY',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/74zP3p6oaE4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/-ILDT4ptLmc',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/_6wyVlAIpcg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/tsJvgY5Rlqw',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/IQ9aXOYegzQU',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/FER613OTDFU',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/tJyOmq-iFBw',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/xvFmG-2q4ws',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/q4mlVROeTs4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/o3-9SEKM8vU',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/WpKIZN2wZYE',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/dC8oswxgREg',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/tvBWNzetY50',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/SIODceCTdKQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/MIEf-sSM38I',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/1_7bHIYExh4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/18_pYbugxa0',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/jG_AD_Ut3m8',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/FeiXxaRC-ac',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/bJLsiOJEwng',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/p1O4gVLWsgs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/jtMY5MQavoc',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/1l3sbPgjsAs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Xik_8W2BBCw',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/-oHjG-xQyZk',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/QNl9upcY1EY',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/zXriw5xaumY',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Vi0MBVueEI0',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/oFmxTQSoyb4',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Yd24pGERN3w',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/ucQZZL4Dl8I',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/j586OuoUNXs',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/282dYpr2YHQ',
                        ],
                        [
                            'title' => "Speaker's Message",
                            'video_url' => 'https://www.youtube.com/embed/Zz4441kSC1I',
                        ],






                        // Add data for other icon boxes here
                    ];

                    ?>
                    <div class="col-xl-12 d-flex align-items-baseline">
                        <div class="icon-boxes d-flex flex-column justify-content-center">

                            <!-- <h3>About Us</h3> -->
                            <div class="row text-center">
                                <?php foreach ($iconBoxes as $box) :
                                ?>

                                    <div class="col-md-3 icon-box" data-aos="fade-up" data-aos-delay="100">
                                        <!-- <i class="bx bx-receipt"></i> -->

                                        <!-- <h1 class="text-light"><a href="index.html"><span>KLIBF</span></a></h1> -->
                                        <!-- Uncomment below if you prefer to use an image logo -->
                                        <!-- <a class="open-modal" data-video-src="<?= $box['video_url'] ?>" title="<b>Click to View</b>">
                   <img src="<?= $box['image'] ?>" alt="" class="img-fluid">
                 </a> -->
                                        <div class="youtube-thumbnail">
                                            <iframe class="img-fluid video-iframe" src="<?= $box['video_url'] ?>" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" data-video-src="<?= $box['video_url'] ?>" title="<b>Click to View</b>"></iframe>
                                        </div>

                                        <!-- <h4><?= $box['title'] ?></h4> -->
                                        <!-- <p><?= $box['content'] ?> <a href="<?= $box['link'] ?>" class="open-modal-link">Read More...</a></p> -->
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- <div class="text-center">
                         <button type="button" class="about-btn" href="reflection-view-more.php">View More</button>
                     </div> -->


                            <!-- <div><button></button></div> -->
                        </div>
                        <!-- End .content-->
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include "footer.php" ?>

    <script>
        // JavaScript to control video playback
        const videoFrames = document.querySelectorAll('.video-iframe');

        function stopAllVideos() {
            videoFrames.forEach(frame => {
                frame.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*');
            });
        }

        videoFrames.forEach(frame => {
            frame.addEventListener('click', function() {
                const videoIndex = this.getAttribute('data-video-index');
                stopAllVideos();
                frame.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
            });
        });
    </script>
</body>

</html>