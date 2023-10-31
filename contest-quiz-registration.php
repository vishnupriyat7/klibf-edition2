<!DOCTYPE html>
<html lang="en">

<?php include "head-style.php"; ?>

<style>
    /* Additional CSS for adjusting the card width */
    .card {
        max-width: 100vw;
        /* Allow the card to expand to its container's width */
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
                    <h2>Quiz Registration</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Quiz</li>
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
                                <img class="mx-auto d-block img-fluid" src="./assets/img/contests/quiz-banner.jpg" style="width: 100%;">
                            </div>


                            <div class="card-body p-4">
                                <div class="tab-content">
                                    <div class="d-flex justify-content-end">

                                        <!-- <a href="https://forms.gle/Y58w5WuM5QKu24FN9 " class="mr-2 btn btn-success horizontal-shake" target="_blank"><i class="fa fa-download"></i> Click Here to Apply</a> -->
                                        <!-- <a href="#" class="mr-2 btn btn-success horizontal-shake"><i class="fa fa-download"></i> Click Here to Apply</a> -->

                                    </div>

                                    <div class="align-items-center text-center">
                                        <h3><b>ക്വിസ് മത്സരം - പൊതുമാർഗ്ഗനിർദ്ദേശങ്ങൾ</b></h3>

                                    </div>

                                    <!-- <div class="tab-pane active" id="personalDetails" role="tabpanel"> -->

                                    <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScKw20kdrJw7rUjexrK_vo8HU4-mIN3M1NT7wAXfSbFYrph9w/viewform?embedded=true" width="1000" height="1815" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe> -->
                                    <ul>
                                        <!-- <li class="contact-info color-1 bg-hover active hover-bottom p-2"> -->
                                        <!-- <h3>Rules & Regulations</h3> -->

                                        <h5>
                                            <ul>
                                                <small>
                                                    <li>
                                                        <p>കേരള നിയമസഭ അന്താരാഷ്ട്ര പുസ്തകോത്സവം രണ്ടാം പതിപ്പിന്റെ ഭാഗമായി സ്കൂൾ, കോളേജ് വിദ്യാർത്ഥികൾക്കും പൊതു ജനങ്ങൾക്കുമായി സംഘടിപ്പിക്കുന്ന ക്വിസ് മത്സരത്തിനു താഴെ പറയുന്ന വിഭാഗങ്ങളിൽ രണ്ടു പേരടങ്ങുന്ന ടീമിന് പങ്കെടുക്കാവുന്നതാണ്.</p>
                                                    </li>

                                                    <!-- <li>
                                                            <h5> <b><span> 1. Overview </b></span></h5>
                                                        </li> -->
                                                    <ul>
                                                        <li>ഹൈസ്കൂൾ-ഹയർസെക്കണ്ടറി വിദ്യാർത്ഥികൾ </li><br>
                                                        <li>കോളേജ് വിദ്യാർത്ഥികൾ</li><br>
                                                        <li>പൊതുജനം (21 വയസ്സ് മുതൽ)</li><br>
                                                        <p>(ഒരു ടീമിന് ഒരു വിഭാഗത്തിൽ മത്സരിക്കുന്നതിനുള്ള അവസരമേ
                                                            ലഭിക്കുകയുള്ളു.)</p>
                                                    </ul>
                                                    <li>
                                                        <p>പങ്കെടുക്കാനാഗ്രഹിക്കുന്നവർ KLIBF ന്റെ വെബ്സൈറ്റ് വഴി <b>2023 ഒക്ടോബർ 31, 12.00pm </b> നു മുൻപ് രജിസ്റ്റർ ചെയ്യേണ്ടതാണ്.</p>
                                                    </li>
                                                    <li>
                                                        <p>ഓരോ വിഭാഗത്തിലും പങ്കെടുക്കുന്ന ടീമുകളുടെ എണ്ണം നേരിട്ട് സ്ക്രീനിംഗ് നടത്താൻ കഴിയാത്ത വിധം അധികരിക്കുന്ന പക്ഷം ഓൺലൈൻ സ്ക്രീനിംഗ് നടത്തി പ്രാഥമിക മത്സരത്തിനുള്ള ടീമുകളെ തെരെഞ്ഞെടുക്കുന്നതാണ്.</p>
                                                    </li>
                                                    <li>
                                                        <p>ഹൈസ്കൂൾ-ഹയർസെക്കണ്ടറി വിദ്യാർത്ഥികൾ, കോളേജ് വിദ്യാർത്ഥികൾ, പൊതുജനം (21 വയസ്സ് മുതൽ) എന്നീ വിഭാഗങ്ങൾക്കായി യഥാക്രമം 2023 നവംബർ 1,4,5 തീയതികളിൽ പ്രാഥമിക മത്സരവും ഫൈനൽ മത്സരവും സംഘടിപ്പിക്കുന്നതാണ്.</p>
                                                    </li>
                                                    <li>
                                                        <p>ഓരോ വിഭാഗത്തിലും ഒന്ന്, രണ്ട്, മൂന്ന് സ്ഥാനങ്ങൾ നേടുന്നവർക്ക് യഥാക്രമം 5000/- രൂപയുടെയും 3000/- രൂപയുടെയും 2000/- രൂപയുടെയും പുസ്തകക്കൂപ്പണുകളും കൂടാതെ സർട്ടിഫിക്കറ്റുകളും സമ്മാനമായി നൽകുന്നതാണ്.</p>
                                                    </li>
                                                    <li>
                                                        <p>മത്സരത്തിൽ പങ്കെടുക്കുന്നവർ സ്‌കൂൾ / കോളേജ് ഐ.ഡി കാർഡ്, ആധാർ കാർഡ് എന്നിവ ഹാജരാക്കേണ്ടതാണ്.</p>
                                                    </li>
                                                </small>
                                            </ul>
                                        </h5>
                                        <!-- </li> -->
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