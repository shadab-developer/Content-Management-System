<?php

ob_start();
session_start();
include 'include/functions.php';
include '../include/config.php';


if (!isset($_SESSION['user_role'])) {
  header("Location: ../index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Bootstrap Admin Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="./css/sb-admin.css" rel="stylesheet">
  <link href="./assets/loader.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>