<?php include "config.php";
session_start();


if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $query = "SELECT * from users where user_username = '$username'";


  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query Failed" . mysqli_error($conn));
  }

  while ($row = mysqli_fetch_array($result)) {
    $user_id = $row['user_id'];
    $db_username = $row['user_username'];
    $firstname = $row['user_firstname'];
    $lastname = $row['user_lastname'];
    $db_password = $row['user_password'];
    $user_role = $row['user_role'];
    $user_image = $row['user_image'];
  }

  echo $password = crypt($password, $db_password);



  if ($username !== $db_username && $password  !== $db_password) {
    header("Location: ../index.php");
  } else if ($username == $db_username && $password  == $db_password && $user_role == 'Admin') {

    $_SESSION['user_username'] = $db_username;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_firstname'] = $firstname;
    $_SESSION['user_lastname'] = $lastname;
    $_SESSION['user_role'] = $user_role;
    $_SESSION['user_image'] = $user_image;

    header("Location: ../admin");
  } else {
    header("Location: ../index.php");
  }
}
