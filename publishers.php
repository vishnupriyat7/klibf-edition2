<!DOCTYPE html>
<html lang="en">

<?php include "head-style.php"; ?>
<?php include "config.php"; ?>

<body>

  <!-- ======= Header ======= -->
  <?php include "header-inner.php"; ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Publisher</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Publisher</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <table class="table table-success table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Sl.No</th>
              <th scope="col">Logo</th>
              <th scope="col">Name</th>
              <th scope="col">Catalog</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </table>
        <table id="example" class="table table-success table-striped table-hover">
          <thead>
            <tr>
              <th data-ordering="false">Sl.No</th>
              <th data-ordering="false">Logo</th>
              <th data-ordering="false">Organization Name</th>
              <th data-ordering="false">Catalog</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT up.user_id, up.org_name, up.logo FROM users_profile up";
            $bookstall = mysqli_query($conn, $query);
            $counter = 0;
            while ($book = mysqli_fetch_array($bookstall)) {
              $id = "$book[id]";
              $pub_user_id = "$book[user_id]";
              $org_name = "$book[org_name]";
              $logo = base64_encode($book['logo']);
            ?>
              <tr>
                <td>
                  <?= ++$counter; ?>
                </td>
                <td>

                  <img src="data:image/jpg;charset=utf8;base64,<?= $logo; ?>" height="70vh">
                  <!-- <?= $logo; ?> -->

                </td>
                <td>
                  <?= $org_name; ?>
                </td>
                <td>
                  <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal<?= $id; ?>">View</button>
                  <div class="modal" id="myModal<?= $id; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title"><?= $org_name; ?></h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <?php
                          $imgQuery = "select challan_img from challan where id = $chellan_id";
                          $imgStmt = mysqli_query($conn, $imgQuery);
                          $challan_image = $imgStmt->fetch_assoc();
                          $img_chellan = base64_encode($challan_image["challan_img"]);
                          ?>
                          <img src="data:image/jpg;charset=utf8;base64,<?= $img_chellan; ?>" height="auto" width="auto" style="max-width: 100%;" class="hover-image">
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php  }  ?>
          </tbody>
        </table>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php" ?>

</body>

</html>