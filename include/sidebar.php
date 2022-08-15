<div class="col-md-4">

  <?php



  ?>

  <!-- Blog Search Well -->
  <div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="POST">
      <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
          <button class="btn btn-default" type="search" name="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </form>
    <!-- /.input-group -->
  </div>

  <!-- Login Widget Well Start-->
  <div class="well">
    <?php
    if (isset($_SESSION['user_role'])) {
      echo "<p>Logged in as <b>{$_SESSION['user_username']}</b></p>";
      echo "<p><a class='btn btn-primary' href='./admin/include/logout.php'>Logout</a></p>";
    } else {
      echo "
      <h4>Login</h4>
      <form action='include/login.php' method='POST'>
      <div class='form-group'>
        <label for='username'>Username</label>
        <input type='text' name='username' class='form-control'>
      </div>

      <div class='form-group'>
        <label for='password'>Password</label>
        <input type='password' name='password' class='form-control'>
      </div>

      <div class='form-group'>
        <button class='btn btn-primary' type='submit' name='login'>Login</button>
      </div>

    </form>

    <p><a class='btn btn-success' href='./registration.php'>Register</a></p>
      ";
    }
    ?>
  </div>
  <!-- Login Widget Well End-->

  <!-- Blog Categories Well Start -->
  <div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-unstyled">
          <?php
          categoriesFetch()
          ?>
        </ul>
      </div>

    </div>
    <!-- /.row -->
  </div>
  <!-- Blog Categories Well End -->

  <!-- Blog Categories Well Start -->
  <div class="well">
    <h4>Tags</h4>
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-unstyled">
          <?php
          tagsFetch()
          ?>
        </ul>
      </div>

    </div>
    <!-- /.row -->
  </div>
  <!-- Blog Categories Well End -->




</div>