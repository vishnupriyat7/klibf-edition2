<div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                            <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php $user_sql = "SELECT * FROM users WHERE email = ?;";
            // var_dump($_SESSION['username']);
            // var_dump($user_sql);
$user_stmt = $con->prepare($user_sql);
$user_stmt->bind_param("s", $username);
$user_stmt->execute();
$user_result = $user_stmt->get_result();
$user = $user_result->fetch_assoc();
// var_dump($user);
?>


            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">Howdy, <?php print $user['name']; ?>!</h4>
                                        <p class="text-muted mb-0">Welcome back to your dashboard.</p>
                                    </div>
                                    <div class="mt-3 mt-lg-0">
                                        <form action="javascript:void(0);">

                                        </form>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row h-100">

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-git-merge-fill"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT count(*) FROM book_stall");
                                                $row = mysqli_fetch_row($result);
                                                $numrows = $row[0];

                                                ?>

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Number of Registration</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $numrows; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->


                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-git-merge-fill"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT SUM(stalls_3x3 + stalls_3x2) FROM book_stall");
                                                $row = mysqli_fetch_row($result);
                                                $numrows = $row[0];

                                                ?>

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Stalls Booked Alltogether</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $numrows; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-git-merge-fill"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT count(*) FROM reg_quiz");
                                                $row = mysqli_fetch_row($result);
                                                $numrows = $row[0];

                                                ?>

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Number of Quiz Registration</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $numrows; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-git-merge-fill"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT count(*) FROM queue");
                                                $row = mysqli_fetch_row($result);
                                                // $numrows = $row[0];

                                                ?>

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Number of Queue Registrations</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $row[0]; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-git-merge-fill"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT SUM(count) FROM queue");
                                                $row = mysqli_fetch_row($result);
                                                // $numrows = $row[0];

                                                ?>

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Number of viewers expecting</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $row[0]; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->


                            <!-- <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-git-merge-fill"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT count(*) FROM service");
                                                $row = mysqli_fetch_row($result);
                                                $numrows = $row[0];

                                                ?>

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Services</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $numrows; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div>end card body
                                </div>end card
                            </div>end col -->
                            <!-- <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-server-line"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT count(*) FROM portfolio");
                                                $rowx = mysqli_fetch_row($result);
                                                $nux = $rowx[0];

                                                ?>
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Portfolio</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $nux; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div>end card body
                                </div>end card
                            </div>end col -->
                            <!-- <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-pages-line"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT count(*) FROM blog");
                                                $rod = mysqli_fetch_row($result);
                                                $nud = $rod[0];

                                                ?>
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Blog</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $nud; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div>end card body
                                </div>end card
                            </div>end col -->
                        </div>

                    </div> <!-- end .h-100-->

                </div> <!-- end col -->


            </div>