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
<?php
$user_type = 'P';
$users_sql = "SELECT * FROM users WHERE user_type = ?;";
$users_stmt = $con->prepare($users_sql);
$users_stmt->bind_param("s", $user_type);
$users_stmt->execute();
$users_result = $users_stmt->get_result();
// $users = $users_result->fetch_assoc();
$users_count = mysqli_num_rows($users_result);

$stall_count_result = mysqli_query($con, "SELECT SUM(stalls_3x3 + stalls_3x2) FROM stall_booking");
$stall_count_row = mysqli_fetch_row($stall_count_result);
$stall_count_numrows = $stall_count_row[0];

$stall3x3_count_result = mysqli_query($con, "SELECT SUM(stalls_3x3) FROM stall_booking");
$stall3x3_count_row = mysqli_fetch_row($stall3x3_count_result);
$stall3x3_count_numrows = $stall3x3_count_row[0];

$stall3x2_count_result = mysqli_query($con, "SELECT SUM(stalls_3x2) FROM stall_booking");
$stall3x2_count_row = mysqli_fetch_row($stall3x2_count_result);
$stall3x2_count_numrows = $stall3x2_count_row[0];

$user_profile_sql = "SELECT up.id, u.id, u.user_type, up.user_id FROM users u JOIN users_profile up on up.user_id = u.id WHERE u.user_type = ?;";
$user_profile_stmt = $con->prepare($user_profile_sql);
$user_profile_stmt->bind_param("s", $user_type);
$user_profile_stmt->execute();
$user_profile_result = $user_profile_stmt->get_result();
// $users = $users_result->fetch_assoc();
$user_profile_count = mysqli_num_rows($user_profile_result);


// $testqry_stall = "select up.user_id from users_profile up join stall_booking sb where sb.user_id = up.user_id and up.status = 'E'";
// $bookstall = mysqli_query($con, $testqry_stall);
// $users_stall = mysqli_fetch_all($bookstall);
// var_dump($users_stall);die;
// $testqry_stall_count = mysqli_num_rows($testqry_stall_result);

?>


<div class="row">
    <div class="col">
        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">Hii, <?php print $user['name']; ?>!</h4>
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
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Number of Registration</p>
                                    <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $users_count; ?>"></span></h4>
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
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Number of Profiles Created</p>
                                    <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $user_profile_count; ?>"></span></h4>
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
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Stalls Booked Alltogether</p>
                                    <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $stall_count_numrows; ?>"></span></h4>
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
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> 3X3 Stalls Booked</p>
                                    <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $stall3x3_count_numrows; ?>"></span></h4>
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
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> 3X2 Stalls Booked</p>
                                    <h4 class=" mb-0"><span class="counter-value" data-target="<?php print $stall3x2_count_numrows; ?>"></span></h4>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
        </div> <!-- end .h-100-->
    </div> <!-- end col -->
</div>