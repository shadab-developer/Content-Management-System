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

          <?php
          if (isset($_POST['checkBoxArray'])) {
            foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
              $bulkOptions = $_POST['bulkOptions'];
              switch ($bulkOptions) {
                case 'published':
                  $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $checkBoxValue";

                  $result_publish = mysqli_query($conn, $query);

                  if (!$result_publish) {
                    die("Query Failed" . mysqli_error($conn));
                  }

                  break;


                case 'draft':
                  $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $checkBoxValue";

                  $result_draft = mysqli_query($conn, $query);
                  if (!$result_draft) {
                    die("Query Failed" . mysqli_error($conn));
                  }
                  break;

                case 'delete':
                  $query = "DELETE from posts WHERE post_id = $checkBoxValue";

                  $result_delete = mysqli_query($conn, $query);
                  if (!$result_delete) {
                    die("Query Failed" . mysqli_error($conn));
                  }
                  break;
              }
            }
          }
          ?>

          <form action="" method="POST">
            <table class="table table-striped table-dark table-bordered">
              <div id="bulkOptionsContainer" style="margin-left: 0px; margin-bottom : 20px;">
                <div class="col-xs-4">
                  <select name="bulkOptions" class="form-control">
                    <option value="">Select Options</option>
                    <option value="delete">Delete</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>

                  </select>
                </div>
                <div class="col-xs-6">
                  <button type="submit" class="btn btn-success" name="submit">Submit</button>
                  <a href="add_post.php" class="btn btn-primary">Add New</a>
                </div>
              </div>
              <thead>
                <tr>
                  <th scope="col"><input id="selectAllBoxes" type='checkbox'></th>
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
                  <th scope="col">Option</th>

                </tr>
              </thead>
              <tbody>


                <?php
                fetchAllPost();
                if (isset($_GET['delete'])) {
                  deletePost();
                }

                ?>

              </tbody>
            </table>
          </form>
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