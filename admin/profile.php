<!-- Head Start Here -->
<?php include 'include/header.php' ?>
<!-- Head End Here -->


<body>

  <div id="wrapper">

    <!-- Navigation Start Here -->
    <?php include 'include/nav.php'; ?>
    <!-- Navigation End Here -->
    <?php

    $user_id = $_SESSION['user_id'];

    $query = "SELECT * from users where user_id = $user_id ";

    $result = mysqli_query($conn, $query);


    if (!$result) {
      echo mysqli_error($conn);
    }

    while ($row = mysqli_fetch_assoc($result)) {
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_username = $row['user_username'];
      $user_password = $row['user_password'];
    }

    ?>

    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Welcome to admin
              <small><?php echo $_SESSION['user_username'] ?></small>
            </h1>
            <div class="container rounded bg-white mt-5 mb-5">
              <div class="row">
                <div class="col-md-3 border-right">
                  <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../images/<?php echo $_SESSION['user_image'] ?>"> </span></div>
                  <br><input type="file" name="user_image" class="form-control">
                </div>
                <div class="col-md-5 border-right">
                  <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-6"><label class="labels">First Name</label><input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname ?>"></div>
                      <div class="col-md-6"><label class="labels">Last Name</label><input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname ?>"></div>
                    </div>
                    <div class="row mt-3">

                      <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" value="<?php echo $user_email ?>"></div>
                    </div>
                    <br>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="text-right">Security Settings</h4>
                    </div>
                    <div class="col-md-12"><label class="labels">UserName</label><input type="text" class="form-control" value="<?php echo $user_username ?>"></div> <br>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" value="<?php echo $user_password ?>"></div>

                  </div>
                  <div class="row mt-3">
                    <div style="margin-top: 60px;" class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Security Settings</button></div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
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