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
          <td><a onclick=\"javascript: return confirm('Are you sure you want to delete ?');\" href='categories.php?delete=$cat_id'><i class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;<a href='categories.php?edit=$cat_id'><i class='fa fa-edit'></i></a></td>
        </tr>
";
  }
}
function fetchAuthor()
{
  global $conn;

  $query = "SELECT * FROM users where user_role = 'author' OR user_role = 'admin'";
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['user_username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];

    echo "<option value='$user_firstname $user_lastname'>$username :: $user_email</option>";
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

    $query = "SELECT * from categories where cat_id = '$cat_id'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
    }

    echo "<form action='' method='POST'>
              <div class='form-group'>
                <label for='cat_title'>Edit Category Title</label>
                <input type='text' name='cat_title' class='form-control' value='$cat_title'>
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
      $post_category_id = $row['post_category_id'];
      $post_date = $row['post_date'];
      $post_attachment = $row['post_attachment'];
      $post_status = $row['post_status'];
      $post_tags = $row['post_tags'];
      $post_comment_count = $row['post_comment_count'];
      $post_views_count = $row['post_views_count'];




      echo "<tr>
      <td><input class='selectBoxes' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>
                <td>$post_title</td>
                <td>$post_author</td>";

      $query1 = "SELECT * from categories WHERE cat_id = {$post_category_id}";

      $result_categories = mysqli_query($conn, $query1);

      while ($row = mysqli_fetch_assoc($result_categories)) {

        $cat_title = $row['cat_title'];
        echo "<td>{$cat_title}</td>";
      }

      echo "
                  <td>$post_status</td>
                <td>$post_date</td>
                <td><img class='img-thumbnail' src='../images/$post_attachment'></td>
              <td>$post_tags</td>
              <td>$post_comment_count</td>
              <td>$post_views_count</td>
              <td><a href='posts.php?reset_views=$post_id'>Reset Views</a></td>
              <td><a href='../post.php?p_id=$post_id' target='_blank'>View Post</a></td>
              <td><a onclick=\"javascript: return confirm('Are you sure you want to delete ?');\" href='posts.php?delete=$post_id'><i class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;<a href='edit_post.php?edit=$post_id'><i class='fa fa-edit'></i></a></td></tr>";
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
  $post_views_count = 0;

  move_uploaded_file($post_attachment_temp, "../images/$post_attachment");

  $query = "INSERT into posts(post_title,post_comment_count, post_views_count , post_category_id ,post_date, post_status , post_author , post_attachment , post_tags , post_content)" .
    "VALUES('$post_title',0 , $post_views_count,$post_category,now(),'$post_status','$post_author','$post_attachment','$post_tags','$post_content')";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "data not inserted" . mysqli_error($conn);
  } else {
    echo "<p class='bg-success'>Post created sucessfully</p>";
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
      echo "<p class='bg-success'>post updated</p>";
    }
  }
}

function fetchAllComment()
{
  global $conn;

  $query = "SELECT * from comments";

  $result = mysqli_query($conn, $query);


  if (!$result) {
    echo "NO comments";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $comment_id = $row['comment_id'];
      $comment_post_id = $row['comment_post_id'];
      $comment_author = $row['comment_author'];
      $comment_email = $row['comment_email'];
      $comment_content = $row['comment_content'];
      $comment_status = $row['comment_status'];
      $comment_date = $row['comment_date'];
      echo "<tr>";
      $query1 = "SELECT * from posts WHERE post_id = {$comment_post_id}";
      $result_categories = mysqli_query($conn, $query1);
      while ($row = mysqli_fetch_assoc($result_categories)) {
        $post_title = $row['post_title'];
        echo "<td><a href='../post.php?p_id=$comment_post_id' target='_blank'>{$post_title}</a></td>";
      }
      echo "
              <td>$comment_author</td>
              <td>$comment_email</td>
              <td>$comment_content</td>
              <td>$comment_status</td>
              <td>$comment_date</td>
              <td><a href='comments.php?approve=$comment_id''>Approve</a></td>
              <td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>
              <td><a onclick=\"javascript: return confirm('Are you sure you want to delete ?');\" href='comments.php?delete=$comment_id'><i class='fa fa-trash'></i></a></td>
              </tr>";
    }
  }
}
function deleteComments()
{
  global $conn;

  $comment_id = $_GET['delete'];

  $query = "DELETE from comments where comment_id = $comment_id";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "Comment Delete nii hua";
  } else {
    echo "Comment Delete ho gya";
  }
}
function approveComment()
{
  global $conn;
  $comment_id = $_GET['approve'];
  echo $comment_id;

  $query = "UPDATE comments set comment_status ='Approved' where comment_id = $comment_id";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "Kuch garbar hai" . mysqli_error($conn);
  } else {
    header("Location: comments.php");
    die();
  }
}
function unapproveComment()
{
  global $conn;
  $comment_id = $_GET['unapprove'];
  echo $comment_id;

  $query = "UPDATE comments set comment_status ='UnApproved' where comment_id = $comment_id";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "Kuch garbar hai" . mysqli_error($conn);
  } else {

    header("Location: comments.php");
    die();
  }
}

function fetchUser()
{
  global $conn;

  $query = "SELECT * from users";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo mysqli_error($conn);
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $user_id = $row['user_id'];
      $user_username = $row['user_username'];
      $user_firstname = $row['user_firstname'];
      $user_email = $row['user_email'];
      $user_lastname = $row['user_lastname'];
      $user_role = $row['user_role'];
      $user_image = $row['user_image'];
      echo "

                  <tr>
                <th scope='row'> $user_id</th>
                <td>$user_username</td>
                <td>$user_firstname</td>
                <td>$user_lastname</td>
                <td>$user_email</td>
                <td><img width='100' height='100' class='img-thumbnail rounded' src='../images/$user_image'></td>
                <td>$user_role</td>

                <td><a href='users.php?change_to_admin=$user_id'>Change to admin</td>
                <td><a href='users.php?change_to_author=$user_id'>Change to author</td>
                <td><a onclick=\"javascript: return confirm('Are you sure you want to delete ?');\" href='users.php?delete=$user_id'><i class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;<a href='edit_user.php?edit=$user_id'><i class='fa fa-edit'></i></a></td>
              </tr>
                  ";
    }
  }
}

function deleteUser()
{
  global $conn;
  $user_id = $_GET['delete'];

  $query = "DELETE from users where user_id = $user_id";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo mysqli_error($conn);
  } else {
    header("Location: users.php");
    die();
  }
}
function insertUser()
{
  global $conn;


  $username = $_POST['user_username'];
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $user_role = $_POST['user_role'];
  $user_image = $_FILES['user_image']['name'];
  $user_image_tmp = $_FILES['user_image']['tmp_name'];

  move_uploaded_file($user_image_tmp, "../images/$user_image");



  $password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));



  $query = "INSERT into users(user_username,user_firstname,user_lastname,user_password,user_email,user_role, user_image,randSalt)
  VALUES('$username' , '$user_firstname' , '$user_lastname' ,'$password' , '$user_email' , '$user_role','$user_image','sd2352563')";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo mysqli_error($conn);
  } else {
    echo "User created by " . $_SESSION['user_firstname'] . " <a href='users.php'>View Users</a>";
  }
}
function changeRole()
{
  global $conn;

  $change_to_admin = $_GET['change_to_admin'];
  $change_to_author = $_GET['change_to_author'];

  if (isset($_GET['change_to_admin'])) {
    $query = "UPDATE users set user_role ='Admin' where user_id = $change_to_admin";

    $result = mysqli_query($conn, $query);

    if (!$result) {
      echo mysqli_error($conn);
    } else {
      header("Location: users.php");
      die();
    }
  } elseif (isset($_GET['change_to_author'])) {
    $query = "UPDATE users set user_role ='Author' where user_id = $change_to_author";

    $result = mysqli_query($conn, $query);

    if (!$result) {
      echo mysqli_error($conn);
    } else {
      header("Location: users.php");
      die();
    }
  }
}

function saveProfile()
{
  global $conn, $user_id;

  $user_image = $_FILES['user_image']['name'];
  $user_image_tmp = $_FILES['user_image']['tmp_name'];
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_email = $_POST['user_email'];


  move_uploaded_file($user_image_tmp, "../images/$user_image");

  $query = "UPDATE users set user_image = '$user_image' , user_firstname = '$user_firstname' , user_lastname = '$user_lastname' , user_email = '$user_email' where user_id = $user_id";


  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo mysqli_error($conn);
  } else {
    header("Location: profile.php");
    die();
  }
}
function saveSecurity()
{
  global $conn, $user_id;

  $user_username = $_POST['user_username'];
  $user_password = $_POST['user_password'];

  $sandQuery = "SELECT randSalt FROM users";
  $sandResult = mysqli_query($conn, $sandQuery);
  $row = mysqli_fetch_array($sandResult);
  $salt = $row['randSalt'];
  $rand_user_password = crypt($user_password, $salt);

  $query = "UPDATE users set user_username = '$user_username' , user_password = '$rand_user_password' where user_id = $user_id";

  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo mysqli_error($conn);
  } else {
    header("Location: profile.php");
    die();
  }
}
function resetViews()
{
  global $conn;
  $post_id = $_GET['reset_views'];

  $query = "UPDATE posts set post_views_count = 0 where post_id = $post_id";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo mysqli_error($conn);
  } else {
    header("Location: posts.php");
    die();
  }
}
function user_online()
{
  if (isset($_GET['onlineusers'])) {

    global $conn;
    if (!$conn) {
      session_start();
      include '../../include/config.php';

      $session = session_id();
      $time = time();
      $time_out_in_seconds = 30;
      $time_out = $time - $time_out_in_seconds;


      $query_user_online = "SELECT * from users_online where session = '$session'";
      $result_user_online = mysqli_query($conn, $query_user_online);

      $count_online = mysqli_num_rows($result_user_online);

      if ($count_online == NULL) {
        mysqli_query($conn, "INSERT into users_online(session, time) VALUES('$session', '$time')");
      } else {
        mysqli_query($conn, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
      }


      $user_online_query = "SELECT * from users_online where time > '$time_out'";
      $user_online_result = mysqli_query($conn, $user_online_query);
      echo $count_user_online = mysqli_num_rows($user_online_result);
    }
  } // Get request isset onlineusers

}
user_online();
