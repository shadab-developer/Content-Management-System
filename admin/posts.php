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
                <th scope="col">Post Title</th>
                <th scope="col">Author</th>
                <th scope="col">Categories</th>
                <th scope="col">Status</th>
                <th scope="col">Post Date</th>
                <th scope="col">Attachment</th>
                <th scope="col">Tags</th>
                <th scope="col">Comments</th>
                <th scope="col">Post Views</th>
                <th scope="col">View Post</th>

              </tr>
            </thead>
            <tbody>
              <?php
              fetchAllPost()
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