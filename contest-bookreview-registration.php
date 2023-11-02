<!DOCTYPE html>
<html lang="en">

<?php include "head-style.php"; ?>
<style>
    /* Additional CSS for adjusting the card width */
    .card {
        max-width: 100vw;
        /* Allow the card to expand to its container's width */

    }

    .card ul,
    p {
        list-style: none;
        padding-left: 2%;
        padding-right: 4%;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: large;
    }

    .card li {
        text-align: justify;
        padding-left: 2%;
        padding-right: 4%;
    }

    .horizontal-shake {
        position: relative;
        animation: shake 0.8s infinite;
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
        <!-- <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Book Review Registration</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Book Review</li>
                    </ol>
                </div>

            </div>
        </section> -->
        <!-- End Breadcrumbs Section -->

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

                            <div class="text-center">
                                <img class="mx-auto d-block img-fluid" src="./assets/img/contests/bookrw.jpeg" style="width: 100%;">
                            </div>

                            <div class="card-body p-4">
                                <div class="tab-content">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-success horizontal-shake" data-bs-toggle="modal" data-bs-target="#myModal">Result</button>&emsp;
                                        <a href="https://www.youtube.com/watch?v=tIrV4JzbRF4&list=PLWnK7DhsuZ9CnwyahQsrezv_GYZbDlvQ8" class="mr-2 btn btn-success" target="_blank"><i class="fa fa-download"></i> Entries</a>
                                    </div>

                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="./contestsresult/result-bookreview.pdf" class="embed-responsive-item" width="100%" height="700px"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="align-items-center text-center">
                                        <h3><b>ഓൺലൈൻ മത്സരങ്ങള്‍ - പൊതു മാര്‍ഗ്ഗനിര്‍ദ്ദേശങ്ങള്‍</b></h3>

                                    </div>

                                    <!-- <div class="tab-pane active" id="personalDetails" role="tabpanel"> -->

                                    <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScKw20kdrJw7rUjexrK_vo8HU4-mIN3M1NT7wAXfSbFYrph9w/viewform?embedded=true" width="1000" height="1815" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe> -->
                                    <ul>
                                        <li class="contact-info color-1 bg-hover active hover-bottom p-2">
                                            <!-- <h3>Rules & Regulations</h3> -->

                                            <h5>
                                                <ul>
                                                    <small>
                                                        <p>കേരള നിയമസഭ അന്താരാഷ്ട്ര പുസ്തകോത്സവം രണ്ടാം പതിപ്പിന്റെ ഭാഗമായി സ്കൂൾ കോളേജ് വിദ്യാർത്ഥികൾക്കും പൊതുജനങ്ങൾക്കുമായി സംഘടിപ്പിക്കുന്ന ഓൺലൈൻ മത്സരങ്ങളിൽ താഴെപ്പറയുന്ന വിഭാഗങ്ങളിലായി പങ്കെടുക്കാവുന്നതാണ്.</p>

                                                        <!-- <li>
                                                            <h5> <b><span> 1. Overview </b></span></h5>
                                                        </li> -->
                                                        <ul>
                                                            <li>&emsp;<b>&emsp;*</b>&emsp; 18 വയസ്സ് വരെ- ജൂനിയേഴ്സ് </li><br>
                                                            <li>&emsp;<b>&emsp;*</b>&emsp; 18 മുതൽ 40 വയസ്സ് വരെ- സീനിയേഴ്സ്</li><br>
                                                            <li>&emsp;<b>&emsp;*</b>&emsp; 40 വയസ്സിനു മുകളിൽ- മാസ്റ്റേഴ്സ് </li><br>
                                                            <p>പ്രായപരിധി 1.11.2023 പ്രകാരം നിശ്ചയിക്കുന്നതാണ്.</p>
                                                        </ul>
                                                        <li>
                                                            <h5> <b><span> മത്സരയിനങ്ങൾ </b></span></h5>
                                                        </li>
                                                        <ul>
                                                            <li>&emsp;&emsp;1.&emsp; പുസ്തകാസ്വാദനം- ജൂനിയേഴ്സ്, സീനിയേഴ്സ്, മാസ്റ്റേഴ്സ് </li><br>
                                                            <li>&emsp;&emsp;2.&emsp; പദ്യപാരായണം- ജൂനിയേഴ്‌സ്, സീനിയേഴ്സ്, മാസ്റ്റേഴ്സ്</li><br>
                                                            <li>&emsp;&emsp;3.&emsp; ഒരു കഥ പറയാം- ജൂനിയേഴ്സ്, സീനിയേഴ്സ് </li><br>
                                                            <li>&emsp;&emsp;4.&emsp; എന്നെ സ്വാധീനിച്ച വായനശാല-50 വയസ്സിന് മുകളിലുള്ളവർക്ക് മാത്രം </li><br>
                                                        </ul>
                                                        <li>
                                                            <h5> <b><span> മാനദണ്ഡങ്ങൾ </b></span></h5>
                                                        </li>
                                                        <ul>
                                                            <li>&emsp;&emsp;1.&emsp; മത്സരത്തിൽ പങ്കെടുക്കുന്നവർ klibf.niyamasabha.org മുഖേന നൽകിയിരിക്കുന്ന ഗൂഗിൾ ഫോമിൽ &emsp;&emsp;ആവശ്യമായ രേഖപ്പെടുത്തലുകൾ വരുത്തി രജിസ്റ്റർ ചെയ്ത് പങ്കെടുക്കുന്ന മത്സരയിനത്തിന്റെ 5 മിനുറ്റില്‍‍ കവിയാത്തതും നല്ല ക്വാളിറ്റി ഉള്ളതുമായ വീഡിയോ അപ്‌ലോഡ്‌ ചെയ്യേണ്ടതാണ്. </li><br>
                                                            <li>&emsp;&emsp;2.&emsp; തെരെഞ്ഞെടുക്കപ്പെടുന്ന വീഡിയോകൾ KLIBF ന്റെ ഒഫീഷ്യൽ യൂട്യൂബ് / facebook page എന്നിവയില്‍ അപ്‌ലോഡ് ചെയ്യുന്നതും ആയതിന്റെ ലിങ്ക് മത്സരാർത്ഥികൾക്ക് ഇ-മെയിലിൽ ലഭ്യമാക്കുന്നതുമാണ്. പ്രസ്തുത ലിങ്ക് മത്സരാർത്ഥികൾ തങ്ങളുടെ സോഷ്യൽ മീഡിയ ഹാൻഡിലുകൾ വഴി ഷെയർ ചെയ്യേണ്ടതാണ്.</li><br>
                                                            <li>&emsp;&emsp;3.&emsp; വീഡിയോയ്ക്ക് ലഭിക്കുന്ന views, likes എന്നിവയുടെ എണ്ണം മൂല്യ നിര്‍ണ്ണയത്തിന്റെ ഒരു ഘടകമായിരിക്കും. </li><br>
                                                            <li>&emsp;&emsp;4.&emsp; ഓരോ വിഭാഗത്തില്‍ നിന്നും 10 വിഡീയോകൾ ഷോർട്ട് ലിസ്റ്റ് ചെയ്യുന്നതും അവ 3 അംഗ ജൂറി പാനൽ വിലയിരുത്തി ഒന്ന്, രണ്ട്, മൂന്ന് സ്ഥാനങ്ങള്‍ നിശ്ചയിച്ച് എന്‍ട്രികള്‍ സമര്‍പ്പിച്ചവര്‍ക്ക് യഥാക്രമം, 5000, 3000, 1000 രൂപയുടെ പുസ്തക കൂപ്പണുകളും സർട്ടിഫിക്കറ്റുകളും നൽകുന്നതുമാണ്.</li><br>
                                                            <li>&emsp;&emsp;5.&emsp; വീഡിയോകളുടെ likes, views എന്നിവയിൽ എന്തെങ്കിലും ക്രമക്കേടുകൾ ശ്രദ്ധയിൽപ്പെടുന്നപക്ഷം പ്രസ്തുത എന്‍ട്രികള്‍ അയോഗ്യമാക്കുന്നതായിരിക്കും.</li><br>
                                                            <li>&emsp;&emsp;6.&emsp; ഫലപ്രഖ്യാപനം സംബന്ധിച്ച അന്തിമ തീരുമാനം നിയമസഭാ സെക്രട്ടറിയേറ്റിൽ നിക്ഷിപ്തമായിരിക്കുന്നതാണ്.</li><br>
                                                            <li>&emsp;&emsp;7.&emsp; നിയമസഭാ സെക്രട്ടേറിയറ്റിലെ ജീവനക്കാര്‍ക്ക് (കരാര്‍ ജീവനക്കാര്‍/ദിവസവേതന ജീവനക്കാര്‍‍ ഉള്‍പ്പെടെ ) മത്സരങ്ങളില്‍ പങ്കെടുക്കാന്‍ കഴിയുന്നതല്ല..</li><br>
                                                            <li>&emsp;&emsp;8.&emsp; <span><b>രജിസ്ട്രേഷൻ</span></b> അവസാന തീയതി <span><b>2023 ഒക്ടോബർ 12 </span></b> വരെയും <span><b>എൻട്രികൾ സോഷ്യൽ മീഡിയ വഴി ഷെയർ ചെയ്യേണ്ട അവസാന തീയതി ഒക്ടോബർ 20</span></b> വരെയും ആയിരിക്കും.</li><br>

                                                        </ul>
                                                    </small>
                                                </ul>
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