<?php
function fetchCategories()
{
  global $conn;

  $query = "SELECT * FROM categories";

  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];


    echo "<table class='table table-striped table-dark'>
      <thead>
        <tr>
          <th scope='col'>#</th>
          <th scope='col'>Category Name</th>
          <th scope='col'>Option</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope='row'>$cat_id</th>
          <td>$cat_title</td>
          <td><a href='categories.php?delete=$cat_id'><i class='fa fa-trash'></i></a></td>
        </tr>

      </tbody>
    </table>";
  }
}

function fetchPosts()
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
  }
}


function insertCategory()
{
  global $conn;
  if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];

    if ($cat_title == "" || empty($cat_title)) {
      echo "This filed should not be empty";
    } else {
      $query = "INSERT into categories(cat_title)" . "values('$cat_title')";
      mysqli_query($conn, $query);
    }
  }
}

function deleteCategory()
{
  global $conn;
  $cat_id = $_GET['delete'];

  $query = "DELETE from categories where cat_id = '$cat_id'";

  mysqli_query($conn, $query);
}
