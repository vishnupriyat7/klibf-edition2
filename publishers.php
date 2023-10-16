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

  .container {
    text-align: center;
  }

  .pagination {
    display: flex;
    align-items: center;
    justify-content: center;

    /* padding: 10px; */
    border-radius: 5px;
  }

  .pagination a {
    background: rgba(111, 153, 32, 0.9);
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
  }
</style>



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
            $query = "SELECT up.id, up.user_id, up.org_name, up.logo, ch.user_id, ch.status FROM users_profile up JOIN challan ch ON up.user_id = ch.user_id WHERE ch.status = 'A' ORDER BY up.org_name ASC";
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
      <div class="pagination " id="pagination">
        <a id="prev" href="#">Previous</a>
        <div id="pageNumbers"></div>
        <a id="next" href="#">Next</a>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php" ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      var rowsPerPage = 10;
      var currentPage = 1;
      var totalRows = $('#example tbody tr').length;

      function showPage(page) {
        var tableRows = $('#example tbody tr');
        tableRows.hide();
        tableRows.slice((page - 1) * rowsPerPage, page * rowsPerPage).show();
      }

      function generatePageNumbers() {
        var totalPages = Math.ceil(totalRows / rowsPerPage);
        var pageNumbersHtml = '';

        for (var i = 1; i <= totalPages; i++) {
          pageNumbersHtml += '<a class="page" href="#" data-page="' + i + '">' + i + '</a>';
        }

        $('#pageNumbers').html(pageNumbersHtml);
      }

      function updatePagination() {
        generatePageNumbers();
        $('.page').removeClass('active');
        $('.page[data-page="' + currentPage + '"]').addClass('active');
      }

      // Initial display
      showPage(currentPage);
      updatePagination();

      // Previous page
      $('#prev').click(function(e) {
        e.preventDefault();
        if (currentPage > 1) {
          currentPage--;
          showPage(currentPage);
          updatePagination();
        }
      });

      // Next page
      $('#next').click(function(e) {
        e.preventDefault();
        if (currentPage < Math.ceil(totalRows / rowsPerPage)) {
          currentPage++;
          showPage(currentPage);
          updatePagination();
        }
      });

      // Click on page number
      $(document).on('click', '.page', function(e) {
        e.preventDefault();
        var newPage = $(this).data('page');
        if (newPage !== currentPage) {
          currentPage = newPage;
          showPage(currentPage);
          updatePagination();
        }
      });
    });
  </script>

</body>

</html>