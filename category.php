<?php include 'include/header.php';

$cat_id = $_GET['c_id'];

$query = "SELECT * from categories where cat_id = $cat_id";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $cat_title = $row['cat_title'];
}

?>

<body>
  <!-- Navigation Start-->
  <?php include 'include/nav.php'; ?>
  <!-- Navigation End-->


  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="page-header">
          <?php echo $cat_title; ?>
          <small>Latest blog post</small>
        </h1>

        <!-- POST Content START -->
        <?php
        $query = "SELECT * from posts where post_category_id = $cat_id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
          echo "Helelr";
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_attachment = $row['post_attachment'];
            $post_content = substr($row['post_content'], 0, 100);
            echo "<h2><a href='post.php?p_id=$post_id'>$post_title</a></h2>";
            echo "<p class='lead'>by <a href='#'>$post_author</a></p>";
            echo "<p><span class='glyphicon glyphicon-time'></span> Posted on $post_date at 10:00 PM</p> <hr>";

            echo "<img class='img-responsive' src='./images/$post_attachment' alt=''><hr>";

            echo "<p>$post_content</p>";
            echo "<a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
          }
        }

        ?>


        <!-- POST Content END -->

        <!-- Pager -->
        <ul class="pager">
          <li class="previous">
            <a href="#">&larr; Older</a>
          </li>
          <li class="next">
            <a href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Blog Sidebar Widgets Column -->
      <?php include 'include/sidebar.php'; ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include 'include/footer.php'; ?>