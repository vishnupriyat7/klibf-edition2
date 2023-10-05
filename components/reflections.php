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
                      'image' => 'assets/img/about-msg/Pinarayi_Vijyan_File__1__1200x.webp',
                      'title' => "Chief Minister's Words",
                      'content' => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip',
                      'link' => 'speaker-message.php',
                      'video_url' => 'https://www.youtube.com/embed/',
                    ],
                    [
                        'image' => 'assets/img/about-msg/spkr.png',
                        'title' => "Speaker's Message",
                        'content' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt',
                        'link' => 'speaker-message.php',
                        'video_url' => 'https://www.youtube.com/embed/odOihHFxN94',
                    ],
                    [
                        'image' => 'assets/img/about-msg/dyspkr.png',
                        'title' => "Deputy Speaker's Message",
                        'content' => 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere',
                        'link' => 'speaker-message.php',
                        'video_url' => 'https://www.youtube.com/embed/SZ5K-IJ3oqA',
                    ],
                    [
                        'image' => 'assets/img/about-msg/sec.png',
                        'title' => "Secretary Speaks",
                        'content' => 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere',
                        'link' => 'speaker-message.php',
                        'video_url' => 'https://www.youtube.com/embed/GNAq6um21ac',
                    ],
                    [
                        'image' => 'assets/img/about-msg/dyspkr.png',
                        'title' => "Deputy Speaker's Message",
                        'content' => 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere',
                        'link' => 'speaker-message.php',
                        'video_url' => 'https://www.youtube.com/embed/SZ5K-IJ3oqA',
                    ],
                    [
                        'image' => 'assets/img/about-msg/sec.png',
                        'title' => "Secretary Speaks",
                        'content' => 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere',
                        'link' => 'speaker-message.php',
                        'video_url' => 'https://www.youtube.com/embed/GNAq6um21ac',
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

                                 <h4><?= $box['title'] ?></h4>
                                 <!-- <p><?= $box['content'] ?> <a href="<?= $box['link'] ?>" class="open-modal-link">Read More...</a></p> -->
                             </div>
                         <?php endforeach; ?>

                     </div>
                 </div>
                 <!-- End .content-->
             </div>

         </div>

     </div>
 </section>




 <!-- End About Section -->