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
$coupon50_count_sql = "SELECT SUM(cpn_50_count) FROM coupon_publisher;";
$coupon50_count_stmt = $con->prepare($coupon50_count_sql);
$coupon50_count_stmt->execute();
$coupon50_count_result = $coupon50_count_stmt->get_result();
$coupon50_result_count = $coupon50_count_result->fetch_all();
// var_dump($queue_result_count[0][0]);
$coupon50amnt = $coupon50_result_count[0][0] * 50;

$coupon100_count_sql = "SELECT SUM(cpn_100_count) FROM coupon_publisher;";
$coupon100_count_stmt = $con->prepare($coupon100_count_sql);
$coupon100_count_stmt->execute();
$coupon100_count_result = $coupon100_count_stmt->get_result();
$coupon100_result_count = $coupon100_count_result->fetch_all();
// var_dump($queue_result_count[0][0]);
$coupon100amnt = $coupon100_result_count[0][0] * 100;

$coupon200_count_sql = "SELECT SUM(cpn_200_count) FROM coupon_publisher;";
$coupon200_count_stmt = $con->prepare($coupon200_count_sql);
$coupon200_count_stmt->execute();
$coupon200_count_result = $coupon200_count_stmt->get_result();
$coupon200_result_count = $coupon200_count_result->fetch_all();
// var_dump($queue_result_count[0][0]);
$coupon200amnt = $coupon200_result_count[0][0] * 200;

$total_count = $coupon50_result_count[0][0] + $coupon100_result_count[0][0] + $coupon200_result_count[0][0];
$total_amount = $coupon50amnt + $coupon100amnt + $coupon200amnt;

$queue_inst_count_sql = "SELECT id FROM queue;";
$queue_inst_count_stmt = $con->prepare($queue_inst_count_sql);
$queue_inst_count_stmt->execute();
$queue_inst_count_result = $queue_inst_count_stmt->get_result();
$queue_inst_result_count = $queue_inst_count_result->fetch_all();
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
                                    <p class="text-uppercase fw-semibold fs-15 mb-1">Coupon 50</p>
                                    <h5 class="mb-0 text-muted">Count  : <span class="counter-value" data-target="<?php print $coupon50_result_count[0][0]; ?>"></span></h5>
                                    <h5 class="mb-0 text-muted">Amount : <span class="counter-value" data-target="<?php print $coupon50amnt; ?>"></span></h5>

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
                                    <p class="text-uppercase fw-semibold fs-15 mb-1">Coupon 100</p>
                                    <h5 class="mb-0 text-muted">Count  : <span class="counter-value" data-target="<?php print $coupon100_result_count[0][0]; ?>"></span></h5>
                                    <h5 class="mb-0 text-muted">Amount : <span class="counter-value" data-target="<?php print $coupon100amnt; ?>"></span></h5>

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
                                    <p class="text-uppercase fw-semibold fs-15 mb-1">Coupon 200</p>
                                    <h5 class="mb-0 text-muted">Count  : <span class="counter-value" data-target="<?php print $coupon200_result_count[0][0]; ?>"></span></h5>
                                    <h5 class="mb-0 text-muted">Amount : <span class="counter-value" data-target="<?php print $coupon200amnt; ?>"></span></h5>

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
                                    <p class="text-uppercase fw-semibold fs-15 mb-1">Sub Total</p>
                                    <h5 class="mb-0 text-muted">Count  : <span class="counter-value" data-target="<?php print $total_count; ?>"></span></h5>
                                    <h5 class="mb-0 text-muted">Amount : <span class="counter-value" data-target="<?php print $total_amount; ?>"></span></h5>

                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
        </div> <!-- end .h-100-->
    </div> <!-- end col -->
</div>