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
     z-index: 9999;
     display: flex;
     justify-content: center;
     align-items: center;
   }

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
 </style>

 <!-- ======= About Section ======= -->
 <section id="about" class="about">
   <div class="container">

     <div class="row no-gutters">
       <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-up">
         <div class="content">
           <h3>KLIBF-General Information</h3>
           <p>
           The Kerala Legislature International Book Festival (KLIBF) is one of the unique events, which was born out of the cherished cultural and literary traditions followed in the State of Kerala. The resounding success of the first edition of the KLIBF is an epitome of the love for literature and writing of the people of Kerala. Conceptualized as part of the year long centenary celebrations of the Kerala Legislature Library, the KLIBF bears the imprint of the Literary landscape. The Kerala Legislative Assembly Complex, which hosts as the permanent venue for the festival remains unparalleled with regard to its location, ambience and serenity. The KLIBF etched its mark upon the cultural and literary circles, with its wide ranging events covering not only various literary genres but also by discussing the relevant social issues being addressed through these forms.  </p>
           <!-- <a href="about-inner-page.php" class="about-btn">About us <i class="bx bx-chevron-right"></i></a> -->
         </div>
       </div>

       <?php
        // Sample data for each icon box
        $iconBoxes = [
          [
            'image' => 'assets/img/about-msg/Pinarayi_Vijyan_File__1__1200x.webp',
            'title' => "Chief Minister's Words",
            'content' => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip',
            'link' => 'speaker-message.php',
            'video_url' => 'https://www.youtube.com/embed/odOihHFxN94',
          ],
          [
            'image' => 'assets/img/about-msg/spkr1.jpg',
            'title' => "Speaker's Words",
            'content' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt',
            'link' => 'speaker-message.php',
            'video_url' => 'https://www.youtube.com/embed/YOUR_VIDEO_ID_1',
          ],
          [
            'image' => 'assets/img/about-msg/dyspkr.jpg',
            'title' => "Deputy Speaker's Desk",
            'content' => 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere',
            'link' => 'speaker-message.php',
            'video_url' => 'https://www.youtube.com/embed/YOUR_VIDEO_ID_1',
          ],
          [
            'image' => 'assets/img/about-msg/secretary.jpg',
            'title' => "Message from Secretary",
            'content' => 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere',
            'link' => 'speaker-message.php',
            'video_url' => 'https://www.youtube.com/embed/YOUR_VIDEO_ID_1',
          ],
          // Add data for other icon boxes here
        ];

        ?>
       <div class="col-xl-7 d-flex align-items-stretch">
         <div class="icon-boxes d-flex flex-column justify-content-center">
           <div class="row">
             <?php foreach ($iconBoxes as $box) :
              ?>

               <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                 <!-- <i class="bx bx-receipt"></i> -->

                 <!-- <h1 class="text-light"><a href="index.html"><span>KLIBF</span></a></h1> -->
                 <!-- Uncomment below if you prefer to use an image logo -->
                 <a class="open-modal" data-video-src="<?= $box['video_url'] ?>">
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
     // Open modal when clicking on an icon box
     $(".open-modal").click(function() {
       var videoSrc = $(this).data("video-src");
       $("#youtubePlayer").attr("src", videoSrc);
       $("#videoModal").fadeIn();
     });
     $(".open-modal-link").click(function(e) {
       e.preventDefault();
      //  var videoSrc = $(this).closest('.icon-box').find('.open-modal').data("video-src");
      //  $("#youtubePlayer").attr("src", videoSrc);
// 
       // Get the content from the corresponding <p> tag
       var modalContent = $(this).closest('.icon-box').find('.modal-content-text').html();
       $("#modalContent").html(modalContent);

       $("#videoModal").fadeIn();
     });                                                    

     // Close modal when clicking the close button
     $(".close-modal").click(function() {
       $("#youtubePlayer").attr("src", "");
       $("#videoModal").fadeOut();
     });
   });
 </script>

 <!-- End About Section -->