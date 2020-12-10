<?php

require_once '../objects/objects.php';




if (isset($_POST['post_publish'])) {
  if (
    empty($_POST['title']) ||
    empty($_POST['post_cate']) ||
    empty($_POST['post_content']) ||
    empty($_POST['post_tags']) ||
    empty($_POST['post_status'])

  ) {
    $post_msg = "<strong>First , Filled All Fields</strong>";
    echo print_r($_POST);
  }
   else {

    $post_msg = "All Fields are filled";
    $posts->title    = $_POST['title'];
    $posts->image = $_POST['image'];
    $posts->author_id = 1;
    $posts->meta_tag = $_POST['post_tags'];
    $posts->is_published = $_POST['post_status'];
    $posts->content = $_POST['post_content'];
    $posts->category_id = $_POST['post_cate'];
    $posts->image = "None";
    if($posts->Insert_post())
    {
      $post_msg = "Post Successfully Created";

    }
    else
    {
      $post_msg = "Post Not Successfully Created";

    }
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>TechCake:Posts</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="../public/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../public/css/dashboard.css" rel="stylesheet">
</head>

<body>
  <!-- Include Header -->
  <?php include_once '../include/header.php'; ?>

  <main role="main" class="col-md-8 ml-sm-auto col-lg-10 pt-3 px-4">
    <?php
    if (isset($post_msg)) { ?>
      <div class="alert alert-primary" role="alert">
        <?php echo $post_msg; ?>
      </div>
    <?php
    }
    ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Posts</h1>
      <button class="btn btn-primary">Create Post</button>
    </div>
     <form accept="" method="POST">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="title">Post Title </label>
          <input type="text" class="form-control" id="title" name='title' placeholder="Post Title">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="image">Post Image </label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group col-md-4">
          <label for="image">Post Category </label>
          <select name="post_cate" class="form-control" id="category" name="post_cate">
            <option value="none">Select Post Category</option>
            <?php
            while ($data = mysqli_fetch_assoc($cate_result)) { ?>
              <option value="<?= $data['cate_id'] ?>"><?php echo $data['cate_title'];  ?></option>
            <?php
            } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress2">Post Content</label>
        <textarea name="post_content" class="form-control" name="post_content" id="post_content" placeholder="Wrtite Post Content Here...." cols="30" rows="10"></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="tags">Tags</label>
          <input type="text" class="form-control" id="tags" name="post_tags">
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">Post Status</label>
          <select id="post_status" class="form-control" name="post_status">
            <option selected>Choose Post Status</option>
            <option value="Active">Active</option>
            <option value="Pause">Pause</option>
          </select>
        </div>
      </div>
      <br>
      <button type="submit" name="post_publish" class="btn btn-primary btn-block">Publish Post</button>
      <br>
    </form>
    <hr>
   
  </main>
  </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="/public/js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

  <!-- Graphs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [{
          data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false,
        }
      }
    });
  </script>
</body>

</html>