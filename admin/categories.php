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
          <?php insertCategory(); ?>
          <div class="col-xs-6">
            <form action="" method="POST">
              <div class="form-group">
                <label for="cat_title">Category Title</label>
                <input type="text" name="cat_title" class="form-control" placeholder="Enter category name">
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
              </div>
            </form>

          </div>

          <div class="col-xs-6">
            <h4>Categories</h4>
            <?php
            if (isset($_GET['delete'])) {
              deleteCategory();
            }

            fetchCategories();
            ?>
          </div>
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