<?php
function categoriesFetch()
{
  global $conn;

  $query = "SELECT * from categories";

  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {

    $cat_title = $row['cat_title'];

    echo "<li>";
    echo "<a href='#'>" . $cat_title . "</a>";
    echo "</li>";
  }
}

function postsFetch()
{

  global $conn;
  $query = "SELECT * from posts";

  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_attachment = $row['post_attachment'];
    $post_content = $row['post_content'];
    echo "<h2><a href='#'>$post_title</a></h2>";
    echo "<p class='lead'>by <a href='#'>$post_author</a></p>";
    echo "<p><span class='glyphicon glyphicon-time'></span> Posted on $post_date at 10:00 PM</p> <hr>";

    echo "<img class='img-responsive' src='$post_attachment' alt=''><hr>";

    echo "<p>$post_content</p>";
    echo "<a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
  }
}

function tagsFetch()
{
  global $conn;

  $query = "SELECT * from posts";

  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $post_tags = $row['post_tags'];
    echo "<a href=''>" . $post_tags . "</a><br>";
  }
}
function search()
{
  global $conn;

  if (isset($_POST['submit'])) {
    $search = $_POST['search'];

    $query = "SELECT * FROM posts WHERE post_tags OR post_title OR post_content LIKE '%$search%'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
      echo "we didn't get the tags releated to your search";
    }

    $count = mysqli_num_rows($result);

    if ($count == 0) {
      echo "<h2>NO RESULT</h2>";
    } else {
      echo "<h2>we have post releated to your query</h2>";
    }
  }
}
