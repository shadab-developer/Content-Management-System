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
  $user_image = $row['user_image'];
  $user_email = $row['user_email'];
  $user_username = $row['user_username'];
  $user_password = $row['user_password'];
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../index.php">CMS Admin</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    <li>
      <a href="#"><i class="fa fa-fw fa-user"></i> Online User : 1</a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_firstname . '&nbsp;' . $user_lastname ?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
        </li>

        <li class="divider"></li>
        <li>
          <a href="include/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li>
        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
      </li>
      <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="post" class="collapse">
          <li>
            <a href="./add_post.php">Add Post</a>
          </li>

          <li>
            <a href="./posts.php">Posts</a>
          </li>
        </ul>

      <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#categories"><i class="fa fa-fw fa-arrows-v"></i> Categories <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="categories" class="collapse">
          <li>
            <a href="./categories.php">Categories</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="users" class="collapse">
          <li>
            <a href="./add_user.php">Add User</a>
          </li>
          <li>
            <a href="./users.php">Users</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="./comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
      </li>

      <li>
        <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
      </li>
    </ul>
  </div>
</nav>