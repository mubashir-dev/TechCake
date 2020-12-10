<?php
 require_once '../config/config.php';
 require_once '../classes/posts.php';
 require_once '../classes/category.php';
 require_once '../classes/admins.php';


 error_reporting(E_ALL);
 $posts = new post($mysqli);
 $post_result = $posts->Get_posts();

 $category = new category($mysqli);
 $cate_result = $category->Get_Category();
 $cate_list = $category->get_categories();

 $admin = new admins($mysqli);
 $users_list = $admin->Get_users();
 




?>