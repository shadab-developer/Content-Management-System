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
            <div>

              <?php
              editUser();

              $user_id = $_GET['edit'];


              $query = "SELECT * from users where user_id = $user_id";

              $result = mysqli_query($conn, $query);

              while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['user_username'];
                $firstname = $row['user_firstname'];
                $lastname = $row['user_lastname'];
                $useremail = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
              }

              if (isset($_POST['edit'])) {
                $username = $_POST['user_username'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_email = $_POST['user_email'];
                $user_role = $_POST['user_role'];
                $user_image = $_FILES['user_image']['name'];
                $user_image_tmp = $_FILES['user_image']['tmp_name'];

                move_uploaded_file($user_image_tmp, "../images/$user_image");


                $query = "UPDATE users set user_username = '$username',user_firstname = '$user_firstname',user_lastname = '$user_lastname',user_email = '$user_email',user_role = '$user_role',user_image = '$user_image' where user_id = $user_id";

                $result = mysqli_query($conn, $query);


                if (!$result) {
                  echo mysqli_error($conn);
                } else {
                  header("Location: users.php");
                  die();
                }
              }


              ?>
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="user_username" value="<?php echo $username; ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label for="username">First Name</label>
                  <input type="text" name="user_firstname" value="<?php echo $firstname; ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label for="username">Last Name</label>
                  <input type="text" name="user_lastname" value="<?php echo $lastname; ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label for="username">Email</label>
                  <input type="email" name="user_email" value="<?php echo $useremail; ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label for="username">Role</label>
                  <select name="user_role" class="form-control">Role
                    <option value="Admin">Admin</option>
                    <option value="Author">Author</option>
                  </select>


                </div>

                <div class="form-group">
                  <label for="username">Image</label>
                  <input type="file" name="user_image" class="form-control">
                  <img width="250" class='img-thumbnail' src='../images/<?php echo $user_image; ?>'>
                </div>

                <div class="form-group">
                  <button type="submit" name="edit" class="btn btn-primary">Create User</button>
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