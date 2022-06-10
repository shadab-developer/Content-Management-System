<!-- Head Start Here -->
<?php include 'include/header.php' ?>
<!-- Head End Here -->

<body>

  <div id="wrapper">

    <!-- Navigation Start Here -->
    <?php include 'include/nav.php'; ?>
    <!-- Navigation End Here -->


    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Welcome to admin
              <small>shadabdeveloper</small>
            </h1>

          </div>
          <table class="table table-striped table-dark table-bordered">
            <thead>
              <tr>
                <th scope="col">In Response to</th>
                <th scope="col">Comment Author</th>
                <th scope="col">Email</th>
                <th scope="col">Content</th>
                <th scope="col">Status</th>
                <th scope="col">Comment Date</th>
                <th scope="col">Option</th>

              </tr>
            </thead>
            <tbody>


              <?php


              fetchAllComment();
              if (isset($_GET['delete'])) {
                deleteComments();
              }

              ?>

            </tbody>
          </table>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
  <!-- Footer Start Here -->
  <?php include 'include/footer.php'; ?>
  <!-- Footer End Here -->