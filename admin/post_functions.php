<?php
if (!isset($_GET['id_pause']) | isset($_GET['id_activate']))
{
    header("Location:http://localhost/TechCake/admin/Posts.php");
} 
 else {
    require_once '../objects/objects.php';
    if (isset($_GET['id_pause'])) {
        $posts->id = $_GET['id_pause'];
        $posts->is_published = "Pause";
        if ($posts->Pause_post()) {
            header("Location:http://localhost/TechCake/admin/Posts.php");
        } else {
            header("Location:http://localhost/TechCake/admin/Posts.php");
        }
    }

    if (isset($_GET['id_active'])) {
        echo "Wc";
        // $posts->id = $_GET['id_activate'];
        // $posts->is_published = "Active";
        // echo $_GET['id_activate'];
        //       if($posts->Activate_post())
        //       {
        //         // header("Location:http://localhost/TechCake/admin/Posts.php");
        //       }
        //       else
        //       {
        //         echo "Failed";
        //         // header("Location:http://localhost/TechCake/admin/Posts.php");
        //    } 
    }
}
