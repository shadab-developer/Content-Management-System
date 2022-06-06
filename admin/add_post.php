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

            <div class="col-xs-10">
              <?php

              if (isset($_POST['submit'])) {


                insertPost();
              }


              ?>
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="post_title">Post Title</label>
                  <input type="text" name="post_title" class="form-control">
                </div>
                <div class="form-group">
                  <label for="post_category">Post Category</label>
                  <select name="post_category" class="form-control">

                    <?php fetchCategory(); ?>

                  </select>
                </div>
                <div class="form-group">
                  <label for="post_status">Post Status</label>
                  <select class="form-control" name="post_status">
                    <option value='draft'>Draft</option>
                    <option value='published'>Published</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="post_author">Post Author</label>
                  <input type="text" name="post_author" class="form-control">
                </div>
                <div class="form-group">
                  <label for="post_attachment">Image</label>
                  <input type="file" name="post_attachment" class="form-control">
                </div>
                <div class="form-group">
                  <label for="post_tags">Post tags</label>
                  <input type="text" name="post_tags" class="form-control">
                </div>

                <div class="form-group">
                  <label for="post_content">Post content</label>
                  <textarea style="height: 300px;" type="text" name="post_content" class="form-control"></textarea>
                </div>
                <div class="form-group">

                  <input type="submit" class="btn btn-primary" name="submit" value="Add Post">
                </div>
              </form>
            </div>
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