<?php
error_reporting();
if (!isset($_GET['id']))
{
  // die("Access Denial");
  header("Location:http://localhost/TechCake/admin/Posts.php");

}
else
{
  require_once '../objects/objects.php';
  $posts->id = $_GET['id'];
  if($posts->Delete_post())
  {
    echo $post_msg = "Post Successfully Dropped";
    header("Location:http://localhost/TechCake/admin/Posts.php");
  }
  else
  {
    header("Location:http://localhost/TechCake/admin/Posts.php");
    echo $post_msg = "Post Not Successfully Dropped";
  }
}

