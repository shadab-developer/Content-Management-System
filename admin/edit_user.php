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
              ?>
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="user_username" placeholder="Enter your Username" class="form-control">
                </div>

                <div class="form-group">
                  <label for="username">First Name</label>
                  <input type="text" name="user_firstname" placeholder="Enter your First Name" class="form-control">
                </div>

                <div class="form-group">
                  <label for="username">Last Name</label>
                  <input type="text" name="user_lastname" placeholder="Enter your Last Name" class="form-control">
                </div>

                <div class="form-group">
                  <label for="username">Email</label>
                  <input type="email" name="user_email" placeholder="Enter your email" class="form-control">
                </div>

                <div class="form-group">
                  <label for="username">password</label>
                  <input type="password" name="user_password" placeholder="Enter your password" class="form-control">
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
                </div>

                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary">Create User</button>
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