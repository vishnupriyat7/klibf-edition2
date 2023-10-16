<!DOCTYPE html>
<html lang="en">

<?php include "head-style.php"; ?>
<?php include "config.php"; ?>
<style>
  #example {
    width: 60%;
    margin-left: auto;
    margin-right: auto;
  }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">

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
        <table id="example" class="table table-success table-striped table-hover">
          <thead>
            <tr>
              <th data-ordering="false">Sl.No</th>
              <th data-ordering="false">Logo</th>
              <th data-ordering="false">Organization Name</th>
              <!-- <th data-ordering="false">Catalog</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT up.id, up.user_id, up.org_name, up.logo, ch.user_id, ch.status FROM users_profile up JOIN challan ch ON up.user_id = ch.user_id WHERE ch.status = 'A' ORDER BY up.id DESC";
            // $query = "SELECT up.*, sb.*, ch.user_id, ch.bank_name, ch.paid_amt, ch.trnctn_no, ch.trnctn_type, ch.trnctn_date, ch.paye_name, ch.ifsc, ch.status, ch.updated_date, ch.invoice_no, ch.id as chid FROM users_profile up JOIN stall_booking sb ON up.user_id = sb.user_id JOIN challan ch ON up.user_id = ch.user_id ORDER BY up.id DESC";
            $publshrdetls = mysqli_query($conn, $query);
            // var_dump($publshrdetls);
            $counter = 0;
            while ($publshr = mysqli_fetch_array($publshrdetls)) {
              $id = "$publshr[id]";
              $pub_user_id = "$publshr[user_id]";
              $org_name = "$publshr[org_name]";
              $logo = base64_encode($publshr['logo']);
            ?>
              <tr>
                <td>
                  <?= ++$counter; ?>
                </td>
                <td>
                  <img src="data:image/jpg;charset=utf8;base64,<?= $logo; ?>" height="80vh" width="95vw">
                  <!-- <?= $logo; ?> -->
                </td>
                <td>
                  <?= $org_name; ?>
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        paging: true,
      });
    });
  </script>

</body>

</html>