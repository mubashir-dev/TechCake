<?php
error_reporting();
if (!isset($_GET['cate_id'])) {

    header( "refresh:2;url=http://localhost/TechCake/admin/Categories.php" );
}
require_once '../objects/objects.php';

$category_result_single = $category->get_category_single($_GET['cate_id']);
$data = mysqli_fetch_assoc($category_result_single);
// print_r($data);
if (isset($_POST['cate_edit'])) {
    if (
        empty($_POST['title']) 
    ) {
        $post_msg = "Fill All Fields";
    } else {

        $category->cate_id = $_POST['id'];
        $category->title = $_POST['title'];
        if ($category->Edit_Category()) {
            $post_msg = "Category Successfully Updated";
        } else {
            $post_msg = "Category Not Successfully Updated";
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

    <title>TechCake:Edit Post </title>

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
            <h1 class="h2">Edit Post</h1>
        </div>
        <form accept="" method="POST">
            <input type="hidden" name="id" value=<?php echo $data['cate_id']; ?>>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title">Category Title </label>
                    <input type="text"  value ="<?php echo $data['cate_title'] ?>" class="form-control" id="title" name='title' placeholder="Post Title">
                </div>
            </div>
            <br>
            <button type="submit" name="cate_edit" class="btn btn-primary btn-block">Update Category</button>
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