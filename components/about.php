 <style>
   /* CSS for the modal */
   .modal {
     display: none;
     position: fixed;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     background-color: rgba(0, 0, 0, 0.7);
     justify-content: center;
     /* Center horizontally */
     align-items: center;
     /* Center vertically */
     z-index: 9999;
   }

   /* CSS for the modal content */
   .modal-content {
     background-color: #fff;
     max-width: 800px;
     padding: 30px;
     position: relative;
   }

   .close-modal {
     position: absolute;
     top: 10px;
     right: 10px;
     font-size: 24px;
     cursor: pointer;
   }

   /* CSS for the iframe video player */
   #youtubePlayer {
     width: 100%;
     height: 400px;
   }

   .img-fluid:hover {
     /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); */
     box-shadow: 0px 0px 10px rgba(111, 153, 32, 0.9);
     cursor: pointer;
   }
 </style>

 <!-- ======= About Section ======= -->
 <section id="about" class="about">
   <div class="container">
     <div class="section-title">
       <h2>About Us</h2>
       <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
     </div>


     <div class="row no-gutters">
       <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-up">
         <div class="content">
           <!-- <h3>About Us</h3> -->
           <p>
             The Kerala Legislature International Book Festival (KLIBF) is one of the unique events, which was born out of the cherished cultural and literary traditions followed in the State of Kerala. The resounding success of the first edition of the KLIBF is an epitome of the love for literature and writing of the people of Kerala. Conceptualized as part of the year long centenary celebrations of the Kerala Legislature Library, the KLIBF bears the imprint of the Literary landscape. The Kerala Legislative Assembly Complex, which hosts as the permanent venue for the festival remains unparalleled with regard to its location, ambience and serenity. The KLIBF etched its mark upon the cultural and literary circles, with its wide ranging events covering not only various literary genres but also by discussing the relevant social issues being addressed through these forms. </p>
           <!-- <a href="about-inner-page.php" class="about-btn">About us <i class="bx bx-chevron-right"></i></a> -->
         </div>
       </div>

       <?php
        // Sample data for each icon box
        $iconBoxes = [
          // [
          //   'image' => 'assets/img/about-msg/Pinarayi_Vijyan_File__1__1200x.webp',
          //   'title' => "Chief Minister's Words",
          //   'content' => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip',
          //   'link' => 'speaker-message.php',
          //   'video_url' => 'https://www.youtube.com/embed/',
          // ],
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
          // Add data for other icon boxes here
        ];

        ?>
       <div class="col-xl-7 d-flex align-items-baseline">
         <div class="icon-boxes d-flex flex-column">

           <!-- <h3>About Us</h3> -->
           <div class="row justify-content-around text-center">
             <?php foreach ($iconBoxes as $box) :
              ?>

               <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                 <!-- <i class="bx bx-receipt"></i> -->

                 <!-- <h1 class="text-light"><a href="index.html"><span>KLIBF</span></a></h1> -->
                 <!-- Uncomment below if you prefer to use an image logo -->
                 <a class="open-modal" data-video-src="<?= $box['video_url'] ?>" title="<b>Click to View</b>">
                   <img src="<?= $box['image'] ?>" alt="" class="img-fluid">
                 </a>

                 <h4><?= $box['title'] ?></h4>
                 <!-- <p><?= $box['content'] ?> <a href="<?= $box['link'] ?>" class="open-modal-link">Read More...</a></p> -->
               </div>
             <?php endforeach; ?>

           </div>
         </div>
         <!-- End .content-->
       </div>
       <!-- Modal -->
       <div id="videoModal" class="modal">
         <div class="modal-content">
           <span class="close-modal">&times;</span>
           <iframe id="youtubePlayer" src="" frameborder="0"></iframe>
         </div>
       </div>
       <!-- Modal -->
     </div>

   </div>
 </section>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
   $(document).ready(function() {
     $("#videoModal").hide();

     $(".open-modal").click(function() {
       var videoSrc = $(this).data("video-src");
       $("#youtubePlayer").attr("src", videoSrc);
       $("#videoModal").css("display", "flex"); // Use flexbox for centering
     });

     $(".close-modal").click(function() {
       $("#youtubePlayer").attr("src", "");
       $("#videoModal").hide(); // Hide modal
     });

     $('.open-modal').tooltip({
       trigger: 'hover',
       html: true
     });
   });
 </script>

 <!-- End About Section -->