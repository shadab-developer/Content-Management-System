<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'cms';

$conn = mysqli_connect($server, $username, $password, $db);

if ($conn) {
  echo "Everything is correct and good to go !";
} else {
  echo "Something is wrong";
}
