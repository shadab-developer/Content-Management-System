<!-- First Blog Post -->
<?php

$post_count = "SELECT * from posts";
$post_result = mysqli_query($conn, $post_count);
$count = mysqli_num_rows($post_result);

$count = ceil($count / 5);

if (isset($_GET['page'])) {
  $per_page = 3;
  $page = $_GET['page'];
} else {
  $page = "";
}

if ($page == "" || $page == 1) {
  $page_1 = 0;
  $per_page = 3;
} else {
  $page_1 = ($page * $per_page) - $per_page;
}

$query = "SELECT * from posts where post_status = 'published' ORDER BY post_date DESC LIMIT $page_1 , $per_page";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_attachment = $row['post_attachment'];
  $post_content = substr($row['post_content'], 0, 500);
  echo "<h2><a href='post.php?p_id=$post_id'>$post_title</a></h2>";
  echo "<p class='lead'>by <a href='author-post.php?a_id=$post_author'>$post_author</a></p>";
  echo "<p><span class='glyphicon glyphicon-time'></span> Posted on $post_date at 10:00 PM</p> <hr>";

  echo "<img class='img-responsive' src='./images/$post_attachment' alt=''><hr>";

  echo "$post_content<br><br>";
  echo "<a class='btn btn-primary' href='post.php?p_id=$post_id'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
}
?>
<hr>