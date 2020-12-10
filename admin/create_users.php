<?php

require_once '../objects/objects.php';




if (isset($_POST['user_add'])) {
    if (
        empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['user_intro']) ||
        empty($_POST['user_type']) ||
        empty($_POST['password'])

    ) {
        $post_msg = "<strong>First , Filled All Fields</strong>";
    } else {

        $post_msg = "All Fields are filled";
        $admin->name    = $_POST['name'];
        $admin->email = $_POST['email'];
        $admin->password_hash = md5($_POST['password']);
        $admin->profile_intro = $_POST['user_intro'];
        $admin->type = $_POST['user_type'];
        if ($admin->Add_user()) {
            $post_msg = "User Successfully Created";
        } else {
            $post_msg = "User Not Successfully Created";
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

    <title>TechCake:Users</title>

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
            <h1 class="h2">Users</h1>
            <button class="btn btn-primary">Show Users</button>
        </div>
        <form accept="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="User Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Email</label>
                <input type="email" class="form-control" id="email" name='email' placeholder="User Email">
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Type User Password">
                </div>
                <div class="form-group col-md-4">
                        <label for="inputState">User Type</label>
                        <select id="user_type" class="form-control" name="user_type">
                            <option selected>Choose Post Status</option>
                            <option value="admin">Admin</option>
                            <option value="author">Contributor</option>
                        </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">User Intro</label>
                <textarea class="form-control" name="user_intro" id="user_intro" cols="30" rows="10" placeholder="Type Your Introduction Lines"></textarea>
            </div>
            <br>
            <button type="submit" name="user_add" class="btn btn-primary btn-block">Create User</button>
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