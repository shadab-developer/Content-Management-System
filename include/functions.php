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
