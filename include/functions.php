<?php
function categoriesFetch()
{
  global $conn;

  $query = "SELECT * from categories";

  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<li>";
    echo "<a href='category.php?c_id=$cat_id'>" . $cat_title . "</a>";
    echo "</li>";
  }
}

function postsFetch()
{
  global $conn;
  $query = "SELECT * from posts where post_status = 'Published'";

  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_attachment = $row['post_attachment'];
    $post_content = substr($row['post_content'], 0, 500);


    echo "<h2><a href='post.php?p_id=$post_id'>$post_title</a></h2>";
    echo "<p class='lead'>by <a href='#'>$post_author</a></p>";
    echo "<p><span class='glyphicon glyphicon-time'></span> Posted on $post_date at 10:00 PM</p> <hr>";

    echo "<img class='img-responsive' src='./images/$post_attachment' alt=''><hr>";

    echo "$post_content<br><br>";
    echo "<a class='btn btn-primary' href='post.php?p_id=$post_id'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
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

    $query = "SELECT * FROM posts WHERE post_title OR post_content LIKE '%$search%'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
      echo "we didn't get the tags releated to your search";
    }

    $count = mysqli_num_rows($result);

    if ($count == 0) {
      echo "<h2>NO RESULT</h2>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_attachment = $row['post_attachment'];
        $post_content = $row['post_content'];
        echo "<h2><a href='post.php?p_id=$post_id'>$post_title</a></h2>";
        echo "<p class='lead'>by <a href='#'>$post_author</a></p>";
        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on $post_date at 10:00 PM</p> <hr>";

        echo "<img class='img-responsive' src='./images/$post_attachment' alt=''><hr>";

        echo "<p>$post_content</p>";
        echo "<a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
      }
    }
  }
}

function submitComment()
{
  global $conn, $post_id;

  $author_name = $_POST['comment_author'];
  $author_email = $_POST['comment_email'];
  $author_content = $_POST['comment_content'];


  if (!empty($author_name) && !empty($author_email) && !empty($author_content)) {
    $query = "INSERT into comments(comment_post_id , comment_author , comment_email , comment_content , comment_status , comment_date) VALUES($post_id ,'$author_name' , '$author_email' , '$author_content' , 'UnApproved'  , now() )";

    $result = mysqli_query($conn, $query);

    if (!$result) {
      echo "Not submited" . mysqli_error($conn);
    }
  } elseif (empty($author_name)) {
    echo "Please enter your name";
  } elseif (empty($author_email)) {
    echo "Please enter your email";
  } elseif (empty($author_content)) {
    echo "Please enter your comment";
  } else {
    echo "Please fill all the fields";
  }

  $commentCount = "UPDATE posts SET post_comment_count = post_comment_count + 1 where post_id = $post_id";

  mysqli_query($conn, $commentCount);
}
function registration()
{
  global $conn;
  $user_username = mysqli_real_escape_string($conn, $_POST['username']);
  $user_password = mysqli_real_escape_string($conn, $_POST['password']);
  $user_email = mysqli_real_escape_string($conn, $_POST['email']);

  $sandQuery = "SELECT randSalt FROM users";
  $sandResult = mysqli_query($conn, $sandQuery);
  $row = mysqli_fetch_array($sandResult);
  $salt = $row['randSalt'];
  $rand_user_password = crypt($user_password, $salt);

  if (!empty($user_username) && !empty($user_password) && !empty($user_email)) {
    $query = "INSERT INTO users (user_username,user_password,user_email,user_role) VALUES ('$user_username','$rand_user_password','$user_email','subscriber')";

    $result = mysqli_query($conn, $query);
    if ($result) {
      echo "User created successfully";
    } else {
      echo "Error creating user" . mysqli_error($conn);
    }
  } elseif (!empty($user_username)) {
    echo "Please enter Username";
  } elseif (!empty($user_password)) {
    echo "Please enter password";
  } elseif (!empty($user_email)) {
    echo "Please enter email";
  } else {
    echo "Please enter all fields";
  }
}
