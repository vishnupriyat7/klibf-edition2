 <!-- ======= Contact Section ======= -->

 <section id="schedule" class="contact section-bg">
     <div class="container" data-aos="fade-up">

         <div class="section-title">
             <h2>Schedule</h2>
             <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
         </div>

         <div class="container shadow min-vh-100 py-2">
             <div class="d-flex justify-content-center">
                 <button class="btn btn-success" data-bs-toggle="modal" data-pdf-url="DAY-1.pdf">Day-1</button>&emsp;
                 <button class="btn btn-success" data-bs-toggle="modal" data-pdf-url="DAY-2.pdf">Day-2</button>&emsp;
                 <button class="btn btn-success" data-bs-toggle="modal" data-pdf-url="DAY-3.pdf">Day-3</button>&emsp;
                 <button class="btn btn-success" data-bs-toggle="modal" data-pdf-url="DAY-4.pdf">Day-4</button>&emsp;
                 <button class="btn btn-success" data-bs-toggle="modal" data-pdf-url="DAY-5.pdf">Day-5</button>&emsp;
                 <button class="btn btn-success" data-bs-toggle="modal" data-pdf-url="DAY-6.pdf">Day-6</button>&emsp;
                 <button class="btn btn-success" data-bs-toggle="modal" data-pdf-url="DAY-7.pdf">Day-7</button>&emsp;
             </div>
             <br>


             <div class="embed-responsive embed-responsive-16by9 text-center">
                 <iframe id="pdfFrame" class="embed-responsive-item" width="100%" height="800px"></iframe>
             </div>


         </div>
         <script>
             // Get references to the buttons and the iframe
             const buttons = document.querySelectorAll('.btn-success[data-pdf-url]');
             const pdfFrame = document.getElementById('pdfFrame');

             // Add a click event listener to each button
             buttons.forEach(button => {
                 button.addEventListener('click', function() {
                     // Get the PDF URL from the clicked button's data attribute
                     const pdfUrl = this.getAttribute('data-pdf-url');
                     // Set the iframe's src attribute to the selected PDF URL
                     pdfFrame.src = pdfUrl;
                 });
             });

             // Trigger a click event on the last button to open the last day's PDF by default
             buttons[buttons.length - 1].click();
         </script>

     </div>
 </section><!-- End Contact Section -->