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
          <td><a href='categories.php?delete=$cat_id'><i class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;<a href='categories.php?edit=$cat_id'><i class='fa fa-edit'></i></a></td>
        </tr>

      </tbody>
    </table>";
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
  if (isset($_GET['delete'])) {
    $cat_id = $_GET['delete'];

    $query = "DELETE from categories where cat_id = '$cat_id'";

    mysqli_query($conn, $query);
  }
}
function editCategory()
{
  global $conn;

  if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];

    echo "<form action='' method='POST'>
              <div class='form-group'>
                <label for='cat_title'>Edit Category Title</label>
                <input type='text' name='cat_title' class='form-control' placeholder='Enter category name'>
              </div>
              <div class='form-group'>
                <input class='btn btn-primary' type='submit' name='edit' value='Edit Category'>
              </div>
            </form>";

    if (isset($_POST['edit'])) {
      $cat_title = $_POST['cat_title'];
      $query = "UPDATE categories SET cat_title ='$cat_title' where cat_id = $cat_id";
      mysqli_query($conn, $query);
    }
  }
}
function fetchAllPost()
{
  global $conn;

  $query = "SELECT * from posts";

  $result = mysqli_query($conn, $query);


  if (!$result) {
    echo "NO POST";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      $post_attachment = $row['post_attachment'];
      $post_content = $row['post_content'];
      $post_views_count = $row['post_views_count'];
      echo "<tr>
                <td>$post_title</td>
                <td>$post_author</td>
                <td>Otto</td>
                <td>$post_date</td>
                <td><img class='img-thumbnail' src='$post_attachment'></td>

              <td>$post_views_count</td>
              <td><a href='#'>View Post</a></td></tr>";
    }
  }
}
function insertPost()
{
  global $conn;

  $query = "INSERT into posts()" . "VALUES()";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "data not inserted";
  } else {
    echo "Post created sucessfully";
  }
}
