<?php
function fetchCategories()
{
  global $conn;

  $query = "SELECT * FROM categories";

  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];


    echo "
        <tr>
          <th scope='row'>$cat_id</th>
          <td>$cat_title</td>
          <td><a href='categories.php?delete=$cat_id'><i class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;<a href='categories.php?edit=$cat_id'><i class='fa fa-edit'></i></a></td>
        </tr>
";
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
      $post_id = $row['post_id'];
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      $post_attachment = $row['post_attachment'];
      $post_content = $row['post_content'];
      $post_status = $row['post_status'];
      $post_tags = $row['post_tags'];
      $post_comment_count = $row['post_comment_count'];
      $post_views_count = $row['post_views_count'];
      echo "<tr>
                <td>$post_title</td>
                <td>$post_author</td>
                <td>Otto</td>
                <td>$post_status</td>
                <td>$post_date</td>
                <td><img class='img-thumbnail' src='../images/$post_attachment'></td>
              <td>$post_tags</td>
              <td>$post_comment_count</td>
              <td>$post_views_count</td>
              <td><a href='#'>View Post</a></td>
              <td><a href='posts.php?delete=$post_id'><i class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;<a href='edit_post.php?edit=$post_id'><i class='fa fa-edit'></i></a></td></tr>";
    }
  }
}

function fetchCategory()
{
  global $conn;

  $query = "SELECT * FROM categories";

  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];


    echo "<option value='$cat_id'>$cat_title</option>";
  }
}
function insertPost()
{
  global $conn;
  $post_title = $_POST['post_title'];
  $post_category = $_POST['post_category'];
  $post_status = $_POST['post_status'];

  $post_author = $_POST['post_author'];
  $post_attachment = $_FILES['post_attachment']['name'];
  $post_attachment_temp = $_FILES['post_attachment']['tmp_name'];
  $post_tags = $_POST['post_tags'];
  $post_content = $_POST['post_content'];
  $post_date = date('d-m-y');
  $post_comment_count = 4;
  $post_views_count = 4;

  move_uploaded_file($post_attachment_temp, "../images/$post_attachment");

  $query = "INSERT into posts(post_title, post_views_count , post_category_id ,post_date,post_comment_count, post_status , post_author , post_attachment , post_tags , post_content)" .
    "VALUES('$post_title',$post_views_count,$post_category,now(),$post_comment_count,'$post_status','$post_author','$post_attachment','$post_tags','$post_content')";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "data not inserted" . mysqli_error($conn);
  } else {
    echo "Post created sucessfully";
  }
}
function deletePost()
{
  global $conn;

  $post_id = $_GET['delete'];

  $query = "DELETE from posts where post_id = '$post_id'";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "Not deleted";
  } else {
    echo "post Delete";
  }
}
function editPost()
{
  global $conn;
  if (isset($_POST['submit'])) {
    $post_id = $_GET['edit'];

    $post_title = $_POST['post_title'];
    $post_category = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_author = $_POST['post_author'];
    $post_attachment = $_FILES['post_attachment']['name'];
    $post_attachment_temp = $_FILES['post_attachment']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_attachment_temp, "../images/$post_attachment");

    $query = "UPDATE posts SET  post_title = '$post_title' ,post_category_id = $post_category ,post_status = '$post_status' ,post_author = '$post_author' ,post_attachment = '$post_attachment' ,post_tags = '$post_tags' ,post_content = '$post_content' WHERE post_id= $post_id";

    $result = mysqli_query($conn, $query);


    if (!$result) {
      echo "Post not updated" . mysqli_error($conn);
    } else {
      echo "post updated";
    }
  }
}
