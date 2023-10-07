 <style>
     /* CSS for the modal */



     .img-fluid:hover {
         /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); */

         cursor: pointer;
     }
 </style>

 <!-- ======= About Section ======= -->
 <section id="reflections" class="reflections">
     <div class="container">
         <div class="section-title">
             <h2>Reflections</h2>
             <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
         </div>


         <div class="row no-gutters">

             <?php
                // Sample data for each icon box
                $iconBoxes = [
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
                    [
                        'title' => "Speaker's Message",
                        'video_url' => 'https://www.youtube.com/embed/zXriw5xaumY',
                    ],
                    [
                        'title' => "Speaker's Message",
                        'video_url' => 'https://www.youtube.com/embed/Vi0MBVueEI0',
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
                                     <iframe class="img-fluid" src="<?= $box['video_url'] ?>" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" data-video-src="<?= $box['video_url'] ?>" title="<b>Click to View</b>">
                                     </iframe>
                                 </div>

                                 <!-- <h4><?= $box['title'] ?></h4> -->
                                 <!-- <p><?= $box['content'] ?> <a href="<?= $box['link'] ?>" class="open-modal-link">Read More...</a></p> -->
                             </div>
                         <?php endforeach; ?>
                     </div>
                     <!-- <div class="text-center">
                         <button type="button" class="about-btn" href="reflection-view-more.php">View More</button>
                     </div> -->
                     <div class="text-center">
                         <!-- <a href="https://docs.google.com/forms/d/11d3YLOtjtA_osjraiAfxXyNvLuv2N14Om0dKEuGdJpY/edit" class="mr-2 btn btn-success" target="_blank"><i class="fa fa-download"></i> <span class="horizontal-shake">Click Here to Apply</a></span> -->
                         <a href="reflection-view-more.php" class="mr-2 btn about-btn">View More</a>

                     </div>

                     <!-- <div><button></button></div> -->
                 </div>
                 <!-- End .content-->
             </div>

         </div>

     </div>
 </section>




 <!-- End About Section -->